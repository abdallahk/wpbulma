<?php

function create_topbar_menu( $theme_location ) {
    if ( ($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location]) ) {

        global $wp;
        $current_url = home_url( add_query_arg( array(), $wp->request ) );

        $menu_list  = '<nav class="navbar-menu">' ."\n";
        $menu_list .= '<div class="navbar-start">' ."\n";

        $menu = get_term( $locations[$theme_location], 'nav_menu' );
        $menu_items = wp_get_nav_menu_items($menu->term_id);

        foreach( $menu_items as $menu_item ) {


            if( $menu_item->menu_item_parent == 0 ) {

                $parent = $menu_item->ID;

                $menu_array = array();

                foreach( $menu_items as $submenu ) {

                    if( $submenu->menu_item_parent == $parent ) {
                        $bool = true;
                        $menu_array[] = '<a class="navbar-item" href="' . $submenu->url . '">' . $submenu->title . '</a>' ."\n";
                    }

                }

                if( $bool == true && count( $menu_array ) > 0 ) {

                    $menu_list .= '<div class="navbar-item has-dropdown is-hoverable">' ."\n";
                    $menu_list .= '<a href="' . $menu_item->url . '" class="navbar-link">' . $menu_item->title . '</a>' ."\n";

                    $menu_list .= '<div class="navbar-dropdown">' ."\n";
                    $menu_list .= implode( "\n", $menu_array );
                    $menu_list .= '</div></div>' ."\n";

                } else {

                    if($menu_item->url === $current_url."/"){
                        $menu_list .= '<a class="navbar-item is-active" href="' . $menu_item->url . '">' . $menu_item->title . '</a>' ."\n";
                    } else {
                        $menu_list .= '<a class="navbar-item" href="' . $menu_item->url . '">' . $menu_item->title . '</a>' ."\n";
                    }
                }

            }

        }

        $menu_list .= '</div>' ."\n";
        $menu_list .= '</nav>' ."\n";

    } else {

        $menu_list = '<!-- no menu defined in location "'.$theme_location.'" -->';

    }

    echo $menu_list;
}

