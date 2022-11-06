<?php
define('EFAQ_section_MY_PLUGIN_SLUG', 'FAQ-plugin-slug');
//Create a normal admin menu
    add_action('admin_menu', 'EFAQ_section_plugin_settings_options');
    function EFAQ_section_plugin_settings_options()
    {
        add_options_page('FAQ Settings', 'FAQ Settings', 'manage_options', EFAQ_section_MY_PLUGIN_SLUG, 'EFAQ_section_plugin_settings_page');

    }

   
	
	//Creating plugin setting page form
    function EFAQ_section_plugin_settings_page(){

    	//Getting options values from options table and passing into our form for update 
     	$card_header_color = get_option('card_header_color');
        $faq_font_color = get_option('faq_font_color');
        $card_body_bgcolor = get_option('card_body_bgcolor');
        $card_body_fontcolor = get_option('card_body_fontcolor');
        $faq_section_width = get_option('faq_section_width');
    	
    	?>
    	<h2>FAQ Settings</h2>
    	<form action="" method="POST">
    		<label>FAQ Question Header Color:</label>
    		<input type="color" name="card_header_color" id="card_header_color" placeholder="Select card header color" value="<?php echo esc_attr($card_header_color); ?>">
    		<br><br>
    		<label>FAQ Question Font Color:</label>
    		<input type="color" name="faq_font_color" id="faq_font_color" placeholder="Select FAQ text color" value="<?php echo esc_attr($faq_font_color); ?>"><br><br>
    		<label>FAQ Answer body Color:</label>
    		<input type="color" name="card_body_bgcolor" id="card_body_bgcolor" value="<?php echo esc_attr($card_body_bgcolor); ?>"><br><br>
    		<label>FAQ Answer body Font Color:</label>
    		<input type="color" name="card_body_fontcolor" id="card_body_fontcolor" value="<?php echo esc_attr($card_body_fontcolor); ?>"><br><br>

            <label>FAQ Section Width(%):</label>
            <input type="text" name="faq_section_width" id="faq_section_width" value="<?php echo esc_attr($faq_section_width); ?>"><br><br>
    		<?php 
    		if(!empty($card_header_color) && !empty($faq_font_color)){ ?>
    			<input type="hidden" name="_nonce" value="<?php echo wp_create_nonce('update-settings') ?>">
				<input type="submit" name="update_setting" value="Update Setting">

    		<?php }else{ ?>
    			<input type="submit" name="save_faq_settings" id="save_settings" value="Save Settings" class="btn btn-primary">
        <?php } ?>	
		</form>
    <?php }


    if(isset($_POST['save_faq_settings'])){


	$card_header_color = sanitize_hex_color($_POST['card_header_color']);
	$faq_font_color = sanitize_hex_color($_POST['faq_font_color']);
	$card_body_bgcolor = sanitize_hex_color($_POST['card_body_bgcolor']);
    $card_body_fontcolor = sanitize_hex_color($_POST['card_body_fontcolor']);
    $faq_section_width = sanitize_text_field($_POST['faq_section_width']);

	if(isset($card_header_color) && isset($faq_font_color)){
			add_option('card_header_color', $card_header_color);
        	add_option('faq_font_color', $faq_font_color);
        	add_option('card_body_bgcolor', $card_body_bgcolor);
        	add_option('card_body_fontcolor', $card_body_fontcolor);
            add_option('faq_section_width', $faq_section_width);
        	echo "Setting inserted successfully";

	}else{
		$card_header_color = sanitize_hex_color('#3a5b7f');
		$faq_font_color = sanitize_hex_color('#ffffff');
		$card_body_bgcolor = sanitize_hex_color('#ffffff');
		$card_body_fontcolor = sanitize_hex_color('#ffffff');
        $faq_section_width = sanitize_text_field('50');
		//echo "Default Setting";

	}

}

	//Updating plugin setting data
        if (isset($_POST['update_setting']))
        {
            if (wp_verify_nonce($_POST['_nonce'], 'update-settings'))
            {
                $card_header_color = sanitize_hex_color($_POST['card_header_color']);
                $faq_font_color = sanitize_hex_color($_POST['faq_font_color']);
                $card_body_bgcolor = sanitize_hex_color($_POST['card_body_bgcolor']);
                $card_body_fontcolor = sanitize_hex_color($_POST['card_body_fontcolor']);

                $faq_section_width = sanitize_text_field($_POST['faq_section_width']);
                if (!empty($card_header_color) && !empty($faq_font_color))
                {
                    update_option('card_header_color', $card_header_color, '', 'yes');
                    update_option('faq_font_color', $faq_font_color, '', 'yes');
                    update_option('card_body_bgcolor', $card_body_bgcolor, '', 'yes');
                    update_option('card_body_fontcolor', $card_body_fontcolor, '', 'yes');
                    update_option('faq_section_width', $faq_section_width, '', 'yes');
                    echo "Updated Successfully!!";
                    
                }
            }

        }