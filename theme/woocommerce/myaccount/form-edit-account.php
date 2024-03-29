<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_edit_account_form' ); ?>

<form class="woocommerce-EditAccountForm edit-account" action="" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >

	<?php do_action( 'woocommerce_edit_account_form_start' ); ?>

	<div class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
		<div class="wrap-label"><label for="account_first_name"><?php esc_html_e( 'First name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label></div>
		<div class="wrap-input-field"><input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" /></div>
	</div>

	<div class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
		<div class="wrap-label"><label for="account_last_name"><?php esc_html_e( 'Last name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label></div>
		<div class="wrap-input-field"><input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" /></div>
	</div>
	<div class="clear"></div>

	<div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<div class="wrap-label"><label for="account_display_name"><?php esc_html_e( 'Display name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label></div>
		<div class="wrap-input-field"><input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_display_name" id="account_display_name" value="<?php echo esc_attr( $user->display_name ); ?>" /> <span><em><?php esc_html_e( 'This will be how your name will be displayed in the account section and in reviews', 'woocommerce' ); ?></em></span></div>
	</div>

	<div class="clear"></div>

	<div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
		<div class="wrap-label"><label for="account_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label></div>
		<div class="wrap-input-field"><input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" /></div>
	</div>

	<fieldset>
		<legend><?php esc_html_e( 'Password change', 'woocommerce' ); ?></legend>

		<div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<div class="wrap-label"><label for="password_current"><?php esc_html_e( 'Current password (leave blank to leave unchanged)', 'woocommerce' ); ?></label></div>
			<div class="wrap-input-field"><input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" autocomplete="off" /></div>
		</div>
		<div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<div class="wrap-label"><label for="password_1"><?php esc_html_e( 'New password (leave blank to leave unchanged)', 'woocommerce' ); ?></label></div>
			<div class="wrap-input-field"><input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" autocomplete="off" /></div>
		</div>
		<div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			<div class="wrap-label"><label for="password_2"><?php esc_html_e( 'Confirm new password', 'woocommerce' ); ?></label></div>
			<div class="wrap-input-field"><input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" autocomplete="off" /></div>
		</div>
	</fieldset>
	<div class="clear"></div>

	<?php do_action( 'woocommerce_edit_account_form' ); ?>

	
	<div class="save-changes-btn">
		<?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
		<div class="wrap-button"><button type="submit" class="woocommerce-Button button" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"><?php esc_html_e( 'Save changes', 'woocommerce' ); ?></button></div>
		<input type="hidden" name="action" value="save_account_details" />
	</div>

	<?php do_action( 'woocommerce_edit_account_form_end' ); ?>

</form>

<div class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
		<div class="profile-pic-heading">
				Update your profile picture
		</div>
		<div class="profile-pictures-wrap">
			
			<?php 
				$images = get_field("default_profile_pictures");
				if($images){
					foreach($images as $img){ ?>
						<div class="profile-image-wrap">
							<img src="<?php echo $img['image']['url']?>" class="profile-picture-img">
						</div>
					<?php }?>
					<script>
						$(".profile-pictures-wrap .profile-image-wrap:eq(0)").addClass("active");
						$(".profile-pictures-wrap .profile-image-wrap").click(function(){
							$(".acf-field-619c056ba4305.profile-img .acf-radio-list li:eq("+$(this).index()+") input").click();
							if($(this).hasClass("active")){
								$(this).removeClass("active");
							}else{
								$(".profile-pictures-wrap .profile-image-wrap").removeClass("active");
								$(this).addClass("active");
							}
						});
					</script>
				<?php }
			?>	
		</div>
		<?php
				 $options = array(
                            'post_id' => 'user_'.wp_get_current_user()->ID,
                            'fields' => array('field_619c056ba4305'),
                            'form' => true, 
                            'html_before_fields' => '',
                            'html_after_fields' => '',
                            'submit_value' => 'Update profile picture' 
                        );
               	acf_form( $options );
       ?>
</div>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
