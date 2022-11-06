<?php
if (!function_exists('EFAQ_section'))
{
    function EFAQ_section($attr)
    {
        /*
        * Getting inserted values from options table and passing into our shortcode
        */
        $card_header_color = get_option('card_header_color');
        $faq_font_color = get_option('faq_font_color');
        $faq_font_color = get_option('faq_font_color');
        $card_body_fontcolor = get_option('card_body_fontcolor');
        $card_body_bgcolor = get_option('card_body_bgcolor');
        $faq_section_width = get_option('faq_section_width');
        

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
        
        if(empty($card_header_color) && empty($faq_font_color) && empty($card_body_bgcolor) && empty($card_body_fontcolor)){

          $card_header_color = sanitize_hex_color('#3a5b7f');
          $faq_font_color = sanitize_hex_color('#000000');
           $card_body_bgcolor = sanitize_hex_color('#007CBA');
          $card_body_fontcolor = sanitize_hex_color('#000000');
          $faq_section_width = sanitize_text_field('100');

           $card_header_color = add_option($card_header_color);
          $faq_font_color = add_option($faq_font_color);
           $card_body_bgcolor = add_option($card_body_bgcolor);
          $card_body_fontcolor = add_option($card_body_fontcolor);
          $faq_section_width = add_option($faq_section_width);


        }else{
             $card_header_color = get_option('card_header_color');
        $faq_font_color = get_option('faq_font_color');
        $faq_font_color = get_option('faq_font_color');
        $card_body_fontcolor = get_option('card_body_fontcolor');
        $card_body_bgcolor = get_option('card_body_bgcolor');
        $faq_section_width = get_option('faq_section_width');
        

        }
?>
<style type="text/css">
    div.accordion {
    width: <?= $faq_section_width;?>!important;
    max-width: <?= $faq_section_width;?>!important;
}

.card{
    border-radius: 5px!important;
}

</style>

<?php
        //shortcode function
        static $i = 0; //checking how many times shortcode paste.
        $i++;
        $options = shortcode_atts(array(
            'question' => 'Question goes here ?',
            'answer' => 'Answer goews here',
            'card-header-color' => $card_header_color,//Passing variable for header color 
            'card-font-color' => $faq_font_color, //passing variable for font color
            'card_body_bgcolor' => $card_body_bgcolor,
            'card_body_fontcolor' => $card_body_fontcolor,
            'faq_section_width'=>$faq_section_width
            ) , $attr);
        $output_data = "<div id='accordion" . $i . "' class='accordion' style='max-width:".$options['faq_section_width']."%!important;width:".$options['faq_section_width']."%!important;'><div class='card'><div class='card-header' id='headingOne' class='btn btn-primary' data-toggle='collapse' data-target='#collapseOne" . $i . "' aria-expanded='true' aria-controls='collapseOne' style='background-color:".$options['card-header-color'].";color:".$faq_font_color."'> $i)&nbsp;" . $options['question'] . "<i class='fa fa-plus'></i></div><div id='collapseOne" . $i . "' class='collapse show' aria-labelledby='headingOne' data-parent='#accordion" . $i . "'><div class='card-body' style='background-color:".$options['card_body_bgcolor']."!important;color:".$options['card_body_fontcolor']."!important;'>" . $options['answer'] . "</div></div></div></div>";
        return $output_data;
    }
    add_shortcode('EFAQ', 'EFAQ_section'); // EFAQ is shortcode and EFAQ_section is function name
    
}

?>
