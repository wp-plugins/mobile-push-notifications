<!--Now display the settings editing screen -->

 <div class="wrap">

     <!-- header -->

    <h2><?php __( 'Menu Test Plugin Settings', 'push-notification' ) ?></h2>

    <!-- // settings form -->
    
 

	<form name="push-form" method="post" action="">
		<input type="hidden" name="<?php echo HIDDEN_FIELD_NAME; ?>" value="Y">

		<p>	<label><?php _e("Secret Key of Apps:", 'push-notification' ); ?> </label> 
			<input type="text" name="<?php echo DATA_FIELD_NAME; ?>" value="<?php echo $key_val; ?>" size="100">
		</p>
		<p><label><?php _e("Apps Username:", 'push-notification' ); ?> </label> 
			<input type="text" name="<?php echo USER_NAME; ?>" value="<?php echo $user_name_val; ?>" size="40">
		</p>
		<p><label><?php _e("Apps Password:", 'push-notification' ); ?> </label> 
			<input type="text" name="<?php echo USER_PASSWORD_NAME; ?>" value="<?php echo $user_password_val; ?>" size="40">
		</p>
		<p><label><?php _e("Push Channel:", 'push-notification' ); ?> </label> 
			<input type="text" name="<?php echo CHANNEL_NAME; ?>" value="<?php echo $channel_val; ?>" size="40">
		</p>
		<hr />

		<!-- select post type -->
		<p>
		<label>Seelct Post for push notification</label>
		<select name="custome_post_type[]" size="6" multiple="multiple" class="inputbox" id="cb_estatura2">
		<?php 
			$post_types= ontreat_get_all_post_type();
			
			$choosen_post = $custome_post_type_val;

			foreach ($post_types as $post_type )
			     {
			      $selected = (in_array($post_type,$choosen_post) ? 'selected="selected"' : ''); 
			      echo "<option value='$post_type' $selected>$post_type</option>";
			     } 
		?>
		</select>
		</p>
		<hr/>

			


		<p class="submit">
			<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
		</p>

	</form>
</div>


<style type="text/css">
	p label{
		width: 150px;
		font-weight: bold;
		float: left;
	}
</style>