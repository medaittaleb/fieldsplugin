<?php






add_action('init', 'we_widgets_fields');
function we_widgets_fields() {
    if ( class_exists( 'fusionredux' ) ) {
    //global $fusionredux;
    $opt_name = "fusion_options";

        fusionredux::setField($opt_name, array(
            'section_id' => 'header_info_1',
            'id' => 'weMap',
            'type'        => 'textarea',
            'title' => __('Iframe Map', 'AVADA'),
            'subtitle' => __('shortcode [weMap] OU CSS class "weMap"', 'AVADA'),
            'validate' => 'string'
        ));

        fusionredux::setField($opt_name, array(
            'section_id' => 'header_info_1',
            'id' => 'weHoraire',
            'type'        => 'textarea',
            'title' => __('Horaires d’ouverture', 'AVADA'),
            'subtitle' => __('shortcode [weHoraire] OU CSS class "weHoraire"', 'AVADA'),
            'validate' => 'string'
        ));

        fusionredux::setField($opt_name, array(
            'section_id' => 'header_info_1',
            'id' => 'weAdress',
            'type'        => 'text',
            'title' => __('Adress', 'AVADA'),
            'subtitle' => __('shortcode [weAdress] OU CSS class "weAdress"', 'AVADA'),
            'validate' => 'string'
        ));


    }
}


function shortcode_weMap() {
    return fusion_get_option('weMap');
}
add_shortcode('weMap', 'shortcode_weMap');

function shortcode_weAdress() {
    return fusion_get_option('weAdress');
}
add_shortcode('weAdress', 'shortcode_weAdress');

function shortcode_weHoraire() {
    return fusion_get_option('weHoraire');
}
add_shortcode('weHoraire', 'shortcode_weHoraire');