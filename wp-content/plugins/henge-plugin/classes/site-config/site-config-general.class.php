<?php
// this is a static class for site config general content
class Site_Config_General_Content {

    // logo
    public static function get_logo() {
        $img_obj = get_field('field_5dd834b402288', 'site-config-general-content');
        return APPC_UTILITY::get_ACF_image($img_obj);
    }

}