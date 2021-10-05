<?php






add_action('init', 'we_widgets_fields');
function we_widgets_fields() {
    if ( class_exists( 'fusionredux' ) ) {
    //global $fusionredux;
    $opt_name = "fusion_options";
        fusionredux::setField($opt_name, array(
            'section_id' => 'header_info_1',
            'id' => 'weMap',
            'type'        => 'text',
            'title' => __('Map Adress', 'AVADA'),
            'subtitle' => __('shortcode [weMap] OU CSS class "weMap"', 'AVADA'),
            'validate' => 'string'
        ));
    }
}


function shortcode_weMap() {
    return "<a href='tel:".fusion_get_option('weMap')."' class='dib'>".fusion_get_option('weMap')."</a>";
}
add_shortcode('weMap', 'shortcode_weMap');