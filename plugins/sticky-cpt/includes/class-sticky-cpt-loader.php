<?php

defined( 'ABSPATH' ) or die( 'Cheatin&#8217; uh?' );


if ( ! class_exists( 'Sticky_cpt_Loader' ) ) :

    class Sticky_cpt_Loader {

        protected static $instance = null;

        public function __construct() {

            add_action( 'admin_init', array( $this, 'init' ) );

            add_action( 'admin_footer-post.php', array( $this , 'add_sticky' ) );
            add_action( 'admin_footer-post-new.php', array( $this , 'add_sticky' ) );
            add_action( 'admin_footer-edit.php', array( $this, 'add_sticky_quick_edit' ) );

            add_action( 'enqueue_block_editor_assets', array($this, 'block_enqueue'), 20 );

            add_action('init', array($this, 'register_meta_sticky_cpt'));

            add_action( 'added_post_meta', array($this, 'added_post_meta_sticky'), 10, 4 );
            add_action( 'updated_post_meta', array($this, 'added_post_meta_sticky'), 10, 4 );
            add_action( 'deleted_post_meta', array($this, 'deleted_post_meta_sticky'), 10, 4 );

            add_action('add_option_sticky_posts', array($this, 'add_option_sticky_posts'), 10, 2);
            add_action('update_option_sticky_posts', array($this, 'update_option_sticky_posts'), 15, 2);


            add_action('admin_notices', array($this, 'general_admin_notice'));
        }


        function general_admin_notice(){

            $currentScreen = get_current_screen();

            if(in_array($currentScreen->post_type, $this->get_all_cpt())){
                if($currentScreen->base == 'post' && $currentScreen->is_block_editor == 1) {
                    if ( !post_type_supports( $currentScreen->post_type, 'custom-fields' ) ) {
                        echo '<div class="notice notice-warning is-dismissible"><p>'.__("Please add custom-fields support on your Custom Post Type to work with Gutenberg.").' <a href="https://developer.wordpress.org/reference/functions/add_post_type_support/" target="_blank">add_post_type_support</a></p></div>';
                    }
                }
            }



        }


        public function add_option_sticky_posts($option_name, $new_value) {
            remove_action('added_post_meta', array($this, 'added_post_meta_sticky'), 10, 4);
            foreach ($new_value as $item) {
                if (!add_post_meta($item, 'sticky_value_cpt', 1, true)) {
                    update_post_meta($item, 'sticky_value_cpt', 1);
                }
            }


        }

        public function update_option_sticky_posts( $old_value, $new_value ) {
            remove_action('updated_post_meta', array($this, 'added_post_meta_sticky'), 10, 4);
            $remove = array_diff($old_value, $new_value);

            if(count($remove) > 0) {
                $remove = array_shift($remove);
                if ( ! add_post_meta( $remove, 'sticky_value_cpt', 0, true ) ) {
                    update_post_meta ( $remove, 'sticky_value_cpt', 0 );
                }
            }else {
                $add = array_diff($new_value, $old_value);

                if(count($add) > 0) {
                    $add = array_shift($add);
                    if (!add_post_meta($add, 'sticky_value_cpt', 1, true)) {
                        update_post_meta($add, 'sticky_value_cpt', 1);
                    }

                }
            }



        }


        private function update_sticky_option($new_value) {
            $option_name = 'sticky_posts';
            if ( get_option( $option_name ) !== false ) {
                update_option( $option_name, $new_value );
            } else {
                add_option( $option_name, $new_value );
            }
        }

        function deleted_post_meta_sticky( $deleted_meta_ids, $post_id, $meta_key, $only_delete_these_meta_values )
        {
            if ( 'sticky_value_cpt' == $meta_key ) {
                $stickies = get_option( 'sticky_posts' );

                if (($key = array_search($post_id, $stickies)) !== false) {
                    unset($stickies[$key]);
                    $this->update_sticky_option( $stickies );
                }
            }
        }
        function added_post_meta_sticky( $meta_id, $post_id, $meta_key, $meta_value )
        {
            if ( 'sticky_value_cpt' == $meta_key ) {
                $stickies = get_option( 'sticky_posts' );

                if($meta_value == 1) {
                    if(is_array($stickies) && count($stickies) > 0) {
                        $stickies[] = $post_id;
                    } else {
                        $stickies = array($post_id);
                    }


                } else {
                    if (($key = array_search($post_id, $stickies)) !== false) {
                        unset($stickies[$key]);
                    }
                }

                $this->update_sticky_option( $stickies );
            }

        }
        function register_meta_sticky_cpt() {

            register_post_meta('', 'sticky_value_cpt', array(
                'show_in_rest' => true,
                'type' => 'boolean',
                'single' => true,
                'sanitize_callback' => 'sanitize_text_field',
                'auth_callback' => function() {
                    return current_user_can('edit_posts');
                }
            ));

        }


        public function init() {
            $post_types = $this->get_all_cpt();

            array_walk( $post_types, array( $this, 'add_prefix' ) );

            foreach( $post_types as $hook )
                add_filter( "views_$hook",  array( $this, 'edit_counter' ) );

        }


        public function block_enqueue() {
            $screen = get_current_screen();


            if(!in_array($screen->post_type, $this->get_all_cpt())) return false;

            if ( post_type_supports( $screen->post_type, 'custom-fields' ) ) {
                wp_enqueue_script(
                    'who-sticky-cpt', // Unique handle.
                    plugin_dir_url(__DIR__) . 'gut/js/blocks.js',
                    array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor', 'wp-plugins', 'wp-edit-post'), // Dependencies, defined above.
                    null
                );
            } else {
                wp_enqueue_script(
                    'who-sticky-cpt-info', // Unique handle.
                    plugin_dir_url(__DIR__) . 'gut/js/info.js',
                    array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor', 'wp-plugins', 'wp-edit-post'), // Dependencies, defined above.
                    null
                );
            }
        }

        private function add_prefix( &$n ) {
            $n = 'edit-'.$n;
        }


        public function edit_counter( $views ) {
            return Sticky_cpt_posts::edit_counter( $views );
        }


        private function get_all_cpt() {
            $args = array(
                'public'   => true,
                '_builtin' => false
            );
            $post_types = get_post_types( $args );

            return apply_filters( 'sticky_cpt_add_cpt', $post_types );
        }


        public function add_sticky_quick_edit() {

            global $typenow, $pagenow;

            $post_types = $this->get_all_cpt();

            if ( $pagenow != 'edit.php' || !in_array( $typenow, $post_types ) || !current_user_can( 'edit_others_posts' ) ) return false;

            $label         = __( "Make this post sticky" );
            $labelBulkEdit = __( "Sticky" );
            $NotSticky     = __( "Not Sticky" );
            $NoChange      = __( "&mdash; No Change &mdash;" );

            $script = <<<HTML
<script>
    jQuery(function($) {
        var sticky = "<label class='alignleft'><input type='checkbox' value='sticky' name='sticky'><span class='checkbox-title'>$label</span></label>";
        $('.quick-edit-row .inline-edit-status').parent().append(sticky);

        var bulkEdit = "<label class='alignright'><span class='title'>$labelBulkEdit</span><select name='sticky'> <option value='-1'>$NoChange</option> <option value='sticky'>$labelBulkEdit</option> <option value='unsticky'>$NotSticky</option>  </select> </label>";

        $('#bulk-edit .inline-edit-status').parent().append(bulkEdit);
    });
</script>
HTML;
            echo $script;
        }

        public function add_sticky() {
            global $post, $typenow;

            $currentScreen = get_current_screen();
            if($currentScreen->is_block_editor() == 1) return false;

            $post_types = $this->get_all_cpt();

            if ( !in_array( $typenow, $post_types ) || !current_user_can( 'edit_others_posts' ) ) return false;

            $label   = __( "Stick this post to the front page" );
            $checked = checked( is_sticky( $post->ID ) );
            $title   = '';

            if( is_sticky() ) {
                $title = "$('#post-visibility-display').text('".__( 'Public, Sticky' )."')";
            }

            $script = <<<HTML
<script>
    jQuery(function($) {
        $('.edit-post-post-status .components-panel__row').last().append('<div class="components-panel__row"><div class="components-base-control"><div class="components-base-control__field"><span class="components-checkbox-control__input-container"><input id="inspector-checkbox-control-1" class="components-checkbox-control__input" type="checkbox" value="1"></span><label class="components-checkbox-control__label" for="inspector-checkbox-control-1">Épingler en haut du blog</label></div></div></div>');
        var sticky = "<br/><span id='sticky-span'><input id='sticky' name='sticky' type='checkbox' value='sticky' $checked /> <label for='sticky' class='selectit'>$label</label><br /></span>";
        $('[for=visibility-radio-public]').append(sticky);
        $title
    });
</script>
HTML;
            echo $script;
        }


        public static function get_instance() {

            if ( null == self::$instance ) {
                self::$instance = new self;
            }

            return self::$instance;
        }

    }

    Sticky_cpt_Loader::get_instance();

endif;