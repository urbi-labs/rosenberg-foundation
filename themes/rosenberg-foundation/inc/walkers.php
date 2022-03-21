<?php

function mapSvgMenuItem($item_output, $item, $depth, $args)
{

    if (in_array('mapSVG', $item->classes)) {
        $item_output = '<a href="' . site_url() . '/state" aria-label="States Map">' . file_get_contents(IMAGES_SERVER . '/map-header.svg') . '</a>';
    }

    return $item_output;
}

add_filter('walker_nav_menu_start_el', 'mapSvgMenuItem', 10, 4);

class Mobile_Walker extends Walker_Nav_Menu
{

    function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
    {
        $id_field = $this->db_fields['id'];
        if (is_object($args[0])) {
            $args[0]->has_children = !empty($children_elements[$element->$id_field]);
        }
        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $mobileArrow = '';

        $title = $item->title;
        $permalink = $item->url;

        if ($depth == 0 && is_object($item) && is_array($item->classes) && in_array('menu-item-has-children', $item->classes)) {
            $mobileArrow = '<a href="#" class="mobileToggle"><span class="accessible-text">Click to expand menu.</span><i class="fa fa-caret-down"></i><i class="fa fa-caret-up"></i></a>';
        }

        $classes = is_object($item) && is_array($item->classes) ? implode(" ", $item->classes) : false;
        $output .= '<li id="menu-item-' . $item->ID . '" class="' .  $classes . '" >';
        $output .= '<a href="' . $permalink . '">';
        $output .= $title;
        $output .= '</a>' . $mobileArrow;
    }
}



class Menu_Walker extends Walker_Nav_Menu
{
    function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
    {
        $id_field = $this->db_fields['id'];
        if (is_object($args[0])) {
            $args[0]->has_children = !empty($children_elements[$element->$id_field]);
        }
        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {


        $title = $item->title;
        $permalink = $item->url;


        $classes =         "";
        if (is_object($item) && is_array($item->classes)) {
            $classes = implode(" ", $item->classes);
            $classes .= in_array("current_page_item", $item->classes) ? ' menu__header__link--active' : '';
        }





        if ($title == "LEADINGEDGEFUND") {
            $classes .= " menu__leadingedgefund  ";
            $title =  "LEADING<span>EDGE</span>FUND";
        }


        $classesLink = "menu__header__link";


        $output .= '<li id="menu-item-' . $item->ID . '" class="' .  $classes . '" >';
        $output .= '<a href="' . $permalink . '" class="' . $classesLink . '">';
        $output .= $title;
        $output .= '</a>';
    }
}


class Menu_Mobile_Walker extends Walker_Nav_Menu
{
    function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
    {
        $id_field = $this->db_fields['id'];
        if (is_object($args[0])) {
            $args[0]->has_children = !empty($children_elements[$element->$id_field]);
        }
        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {


        $title = $item->title;
        $permalink = $item->url;


        $classes =         "";
        if (is_object($item) && is_array($item->classes)) {
            $classes = implode(" ", $item->classes);
            $classes .= in_array("current_page_item", $item->classes) ? ' menu__header__link--active' : '';
        }





        if ($title == "LEADINGEDGEFUND") {
            $classes .= " menu__leadingedgefund  ";
            $title =  "LEADING<span>EDGE</span>FUND";
        }


        $classesLink = "menu__mobile__link";


        $output .= '<li id="menu-item-' . $item->ID . '" class="' .  $classes . '" >';
        $output .= '<a href="' . $permalink . '" class="' . $classesLink . '">';
        $output .= $title;
        $output .= '</a>';
    }
}


class Footer_Walker extends Walker_Nav_Menu
{
    function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
    {
        $id_field = $this->db_fields['id'];
        if (is_object($args[0])) {
            $args[0]->has_children = !empty($children_elements[$element->$id_field]);
        }
        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {


        $title = $item->title;
        $permalink = $item->url;


        $classes =         "";
        if (is_object($item) && is_array($item->classes)) {
            $classes = implode(" ", $item->classes);
            $classes .= in_array("current_page_item", $item->classes) ? ' menu__header__link--active' : '';
        }





        if ($title == "LEADINGEDGEFUND") {
            $classes .= " menu__leadingedgefund ";
            $title =  "LEADING<span>EDGE</span>FUND";
        }


        $classesLink = "footer__menu__link";


        $output .= '<li id="menu-item-' . $item->ID . '" class="' .  $classes . '" >';
        $output .= '<a href="' . $permalink . '" class="' . $classesLink . '">';
        $output .= $title;
        $output .= '</a>';
    }
}