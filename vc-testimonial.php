<?php

/*VC Custom Testimonial*/

 function vc_testimonial() {
    // Title
    vc_map(
        array(
			'name' => __('Testimonial', 'text-domain'),
			'base' => 'vc_testimonial_content',
			'description' => __("Simple Testimonial box", 'text-domain'), 
			'category' => __('Custom Elements', 'text-domain'),   
			//"icon" => get_template_directory_uri()."/assets/img/vc-icon.png",
			//'admin_enqueue_css' => array(get_template_directory()."/vc-custom-elements/vc-elements.css"),
			'params' => array(  
                
				array(
                        "type" => "textfield",
                        "holder" => "h3",
                        //"class" => "tm_client_name",
                        "heading" => __( "Client name", "text-domain" ),
                        "param_name" => "cname",
                        //"value" => __( "Nishan M", "text-domain" ),
                        "description" => __( "Name Of your client", "text-domain" ),
                        "admin_label" => false,
                        "weight" => 0,
                        "group" => "Client Details",
                    ),  
                    array(
                        "type" => "textfield",
                        "holder" => "p",
                        //"class" => "tm_designation",
                        "heading" => __( "Designation", "text-domain" ),
                        "param_name" => "cdesignation",
                        //"value" => __( "Chirman of the Board and Chief Executive Officer", "text-domain" ),
                        "description" => __( "Designation Of your client", "text-domain" ),
                        "admin_label" => false,
                        "weight" => 0,
                        "group" => "Client Details",
                    ),
					array(
						"type" => "attach_image",
						"holder" => "img",
						//"class" => "",
						"heading" => __( "Client Image", "text-domain" ),
						"param_name" => "cimage",
						"value" => __( "", "text-domain" ),
						"description" => __( "Upload your clients image", "text-domain" ),
						"admin_label" => false,
                        "weight" => 0,
                        "group" => "Client Image",
					),
					array(
						"type" => "colorpicker",
						//"class" => "",
						"heading" => __( "Background Color", "text-domain" ),
						"param_name" => "bcolor",
						"value" => __( '#F4EFE9', "text-domain" ),
						"description" => __( "Choose Background color", "text-domain" ),
						"admin_label" => false,
                        "weight" => 0,
                        "group" => "Color",
					),                 
					array(
						"type" => "colorpicker",
						//"class" => "",
						"heading" => __( "Title", "text-domain" ),
						"param_name" => "ctitle",
						"value" => __( '#030000', "text-domain" ),
						"description" => __( "Choose Title text color", "text-domain" ),
						"admin_label" => false,
                        "weight" => 0,
                        "group" => "Color",
					),
					array(
						"type" => "colorpicker",
						//"class" => "",
						"heading" => __( "Designation", "text-domain" ),
						"param_name" => "cdesignationc",
						"value" => __( '#173223', "text-domain" ),
						"description" => __( "Choose Designation Text color", "text-domain" ),
						"admin_label" => false,
                        "weight" => 0,
                        "group" => "Color",
					),
					array(
						"type" => "colorpicker",
						//"class" => "",
						"heading" => __( "Border", "text-domain" ),
						"param_name" => "cborder",
						"value" => __( '#173223', "text-domain" ),
						"description" => __( "Choose Border color", "text-domain" ),
						"admin_label" => false,
                        "weight" => 0,
                        "group" => "Color",
					),

            )
        )
    );
}

add_action( 'vc_before_init', 'vc_testimonial' );


function vc_testimonial_structure( $atts, $content ) {
	$vc_tm_shortcode = shortcode_atts(
		array(
			'cname'   => '',
			'cdesignation' => '',
			'cimage' => 'cimage',
			'bcolor' => '',
			'ctitle' => '',
			'cdesignationc' => '',
			'cborder' => '',
		), 
	$atts );

	$image_ids = explode(',',$vc_tm_shortcode['cimage']);
	 
	$return = '<div class="tm_body" style="background: '.$vc_tm_shortcode["bcolor"].';">';
	$return .=	'<div class="tm_des">'; 
					foreach( $image_ids as $image_id ){
					$images = wp_get_attachment_image_src( $image_id, 'client_image' );
					$return .='<img class="tm_client_img" src="'.$images[0].'" alt="'.$atts['title'].'">';
					$images++;
					}
	$return .=		'<div class="tm_content" style="border-color: '.$vc_tm_shortcode["cborder"].';">';
	$return .=			'<h3 style="color: '.$vc_tm_shortcode["ctitle"].';">'.$vc_tm_shortcode["cname"].'</h3>';
	$return .=			'<p style="color: '.$vc_tm_shortcode["cdesignationc"].';">'.$vc_tm_shortcode["cdesignation"].'</p>';
	$return .=		'</div>';
	$return .=	'</div>';
	$return .='</div>';
	return $return;
}   
add_shortcode( 'vc_testimonial_content', 'vc_testimonial_structure' );


