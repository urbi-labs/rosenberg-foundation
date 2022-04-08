<?php

/**
 * Register Custom Block Styles
 */
if (function_exists("register_block_style")) {

    function block_styles_register_block_styles()
    {
        /**
         * Register stylesheet
         */
        if (is_admin()) {
            wp_register_style(
                "block-alt-styles",
                get_stylesheet_directory_uri() . "/style-blocks.css",
                [],
                "1.1"
            );
        }

        /**
         * Register block style
         */
        register_block_style("core/cover", [
            "name" => "block-cover-full-width",
            "label" => "Full Width Cover",
            "style_handle" => "block-alt-styles",
        ]);

        register_block_style("core/paragraph", [
            "name" => "block-paragraph-left-border",
            "label" => "Left border",
            "style_handle" => "block-alt-styles",
        ]);

    }

    add_action("init", "block_styles_register_block_styles");
}
