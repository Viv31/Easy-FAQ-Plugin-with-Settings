<?php
if(function_exists('save_Default_Settings')){
	function save_Default_Settings(){
		 $card_header_color = sanitize_hex_color('#3a5b7f');
          $faq_font_color = sanitize_hex_color('#000000');
           $card_body_bgcolor = sanitize_hex_color('#007CBA');
          $card_body_fontcolor = sanitize_hex_color('#000000');
          $faq_section_width = sanitize_text_field('100');

           add_option('card_header_color', $card_header_color, '', 'yes');
           add_option('faq_font_color', $faq_font_color, '', 'yes');
           add_option('card_body_bgcolor', $card_body_bgcolor, '', 'yes');
           add_option('card_body_fontcolor', $card_body_fontcolor, '', 'yes');
           add_option('faq_section_width', $faq_section_width, '', 'yes');
          
          

          echo "Default Options added";

	}
	add_action('init','save_Default_Settings');

}


