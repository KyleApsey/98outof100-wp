<?php
class APPC_CPT_Work extends Abstract_CPT {

    public function get_date() {
        $date_picker = get_field('field_5ddf03b6b75a0', $this->get_id());
        return (!empty($date_picker) ? $date_picker : parent::get_date());
    }

    public function get_gallery() {
        $gallery_field = get_field('field_5ddf03a4b759f', $this->get_id());
        return APPC_UTILITY::get_ACF_media_gallery($gallery_field);
    }

}