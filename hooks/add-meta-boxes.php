<?php

// Add Meta Boxes Call
function license_manager_metaboxes() {
	// Main Data
	add_meta_box(
		'license-data',
		__('License data', 'the-license-manager'),
		'license_manager_metabox_callback_general',
		'license',
		'normal',
		'high'
	);
	// Google
	add_meta_box(
		'google-data',
		__('Google', 'the-license-manager'),
		'license_manager_metabox_callback_google',
		'license',
		'normal',
		'low'
	);
	// Support Data
	add_meta_box(
		'support-data',
		__('Support data', 'the-license-manager'),
		'license_manager_metabox_callback_support',
		'license',
		'normal',
		'low'
	);
	// Pricing
	add_meta_box(
		'pricing-data',
		__('License price', 'the-license-manager'),
		'license_manager_metabox_callback_pricing',
		'license',
		'side',
		'low'
	);
}
add_action('add_meta_boxes', 'license_manager_metaboxes');

// Meta Box 1 | License Data
function license_manager_metabox_callback_general( $post ) {
	wp_nonce_field(basename(__FILE__), 'license-manager-nonce');
	$license_manager_meta = get_post_meta(get_the_ID()); ?>
	<div class="row" id="license-manager-post-metabox-layout">
		<div class="col">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 mt-3 mb-5">
					<div class="form-group">
						<label for="license-key"><?php _e('License key','the-license-manager'); ?>:</label>
						<input type="text" name="license-key" class="form-control" id="license-key" placeholder="<?php _e('XXXX-XXXX-XXXX-XXXX','the-license-manager'); ?>" aria-label="<?php _e('License key','the-license-manager'); ?>" value="<?php if (isset ($license_manager_meta['license_key'])) echo $license_manager_meta['license_key'][0]; ?>" />
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-2 mt-3 mb-5">
					<div class="form-group">
						<label for="purchase-type"><?php _e('Purchase type', 'the-license-manager'); ?>:</label>
						<?php
						
						
						$value = $license_manager_meta['purchase-type'][0];
						// var_dump($value);
						
						?>
						<select name="purchase-type" class="form-select" id="purchase-type">
							<option value=""><?php _e('Please select', 'the-license-manager'); ?></option>
							<option value="single-purchase" <?php selected($value, 'single-purchase', true); ?>><?php _e('Single purchase', 'the-license-manager'); ?></option>
							<option value="monthly-subscribtion" <?php selected($value, 'monthly-subscribtion', true); ?>><?php _e('Monthly subscribtion', 'the-license-manager'); ?></option>
							<option value="yearly-subscribtion" <?php selected($value, 'yearly-subscribtion', true); ?>><?php _e('Yearly subscribtion', 'the-license-manager'); ?></option>
							<option value="yearly-renewal-required" <?php selected($value, 'yearly-renewal-required', true); ?>><?php _e('Yearly renewal required', 'the-license-manager'); ?></option>
						</select>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-2 mt-3 mb-5">
					<label for="purchase-date"><?php _e('License purchase date','the-license-manager'); ?>:</label>
					<input type="text" name="purchase-date" id="purchase-date" placeholder="<?php _e('01.01.2022', 'the-license-manager'); ?>" class="form-control" value="<?php if (isset ($license_manager_meta['purchase-date'])) echo $license_manager_meta['purchase-date'][0]; ?>">
				</div>
				<div class="col-xs-12 col-sm-12 col-md-2 mt-3 mb-5">
					<label for="expiry-date"><?php _e('License expiry date','the-license-manager'); ?>:</label>
					<input type="text" name="expiry-date" id="expiry-date" placeholder="<?php _e('31.12.2023', 'the-license-manager'); ?>" class="form-control" value="<?php if (isset ($license_manager_meta['expiry_date'])) echo $license_manager_meta['expiry_date'][0]; ?>">
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-4">
					<div class="form-group">
						<label for="login-url"><?php _e('Login url','the-license-manager'); ?>:</label>
						<div class="input-group">
							<input type="text" name="login-url" class="form-control" id="login-url" placeholder="<?php _e('https://example.com/login/','the-license-manager'); ?>" aria-label="<?php _e('https://example.com/login/','the-license-manager'); ?>" value="<?php if (isset ($license_manager_meta['login_url'])) echo $license_manager_meta['login_url'][0]; ?>" />
							<span class="input-group-text"><a href="<?php if (isset ($license_manager_meta['login_url'])) echo $license_manager_meta['login_url'][0]; ?>" class="external-link" target="_blank"><?php _e('Go to login', 'the-license-manager'); ?></a></span>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4">
					<div class="form-group">
						<label for="associated-email"><?php _e('Associated e-mail','the-license-manager'); ?>:</label>
						<input type="email" name="associated_email" class="form-control" id="associated-email" placeholder="<?php _e('webmaster@example.com','the-license-manager'); ?>" aria-label="<?php _e('Associated e-mail','the-license-manager'); ?>" value="<?php if (isset ($license_manager_meta['associated_email'])) echo $license_manager_meta['associated_email'][0]; ?>" autocomplete="off" />
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4">
					<div class="form-group">
						<label for="associated-password"><?php _e('Associated password','the-license-manager'); ?>:</label>
						<div class="input-group mb-3">
							<input type="password" name="associated-password" class="form-control" id="associated-password" placeholder="<?php _e('s0m3r4nd0m$tr!n5','the-license-manager'); ?>" aria-label="<?php _e('s0m3r4nd0m$tr!n5','the-license-manager'); ?>" value="<?php if (isset ($license_manager_meta['associated_password'])) echo $license_manager_meta['associated_password'][0]; ?>" autocomplete="new-password" />
							<span class="input-group-text" id="toggle-pw-visibility-addon">
								<button type="button" id="btn-toggle-password-visibility" class="btn btn-default">
									<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16"><path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/><path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299l.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/><path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709z"/><path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/></svg>
								</button>
							</span>
							<span class="input-group-text" id="copy-password-addon">
								<button type="button" id="btn-copy-password" class="btn btn-default btn-sm copy-button" data-clipboard-action="copy" data-clipboard-target="#associated-password">
									<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="bi bi-clipboard-plus" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/><path fill-rule="evenodd" d="M9.5 1h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3zM8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z"/></svg>
								</button>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<!-- website url -->
				<div class="col-xs-12 col-sm-12 col-md-4 mb-3">
					<div class="form-group">
						<label for="website-url"><?php _e('Website url','the-license-manager'); ?>:</label>
						<div class="input-group">
							<input type="url" name="website_url" class="form-control" id="website-url" placeholder="<?php _e('https://example.com','the-license-manager'); ?>" aria-label="<?php _e('https://example.com','the-license-manager'); ?>" value="<?php if (isset ($license_manager_meta['website_url'])) echo $license_manager_meta['website_url'][0]; ?>" />
							<span class="input-group-text"><a href="#" target="_blank"><?php _e('Go to website', 'the-license-manager'); ?></a></span>
						</div>
					</div>
				</div>
				<!-- Associated owner -->
				<div class="col-xs-12 col-sm-12 col-md-4 mb-3">
					<div class="form-group">
						<label for="associated-owner"><?php _e('Associated owner','the-license-manager'); ?>:</label>
						<input type="text" name="associated_owner" class="form-control" id="associated-owner" placeholder="<?php _e('Gundlach-IT','the-license-manager'); ?>" aria-label="<?php _e('Gundlach-IT','the-license-manager'); ?>" value="<?php if (isset ($license_manager_meta['associated_owner'])) echo $license_manager_meta['associated_owner'][0]; ?>" />
					</div>
				</div>
				<!-- License name -->
				<div class="col-xs-12 col-sm-12 col-md-4 mb-3">
					<div class="form-group">
						<label for="license-name"><?php _e('License name','the-license-manager'); ?>:</label>
						<input type="text" name="license_name" class="form-control" id="license-name" placeholder="<?php _e('e.g. basic, business, etc.','the-license-manager'); ?>" aria-label="<?php _e('Gundlach-IT','the-license-manager'); ?>" value="<?php if (isset ($license_manager_meta['license_name'])) echo $license_manager_meta['license_name'][0]; ?>" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-7 my-3">
					<label for="license-notes"><?php _e('Notes', 'the-license-manager'); ?>:</label>
					<textarea name="license-notes" class="form-control" rows="3" id="license-notes">
						<?php if (isset ($license_manager_meta['license_notes'])) echo $license_manager_meta['license_notes'][0]; ?>
					</textarea>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-5 my-3">
					<p class="label-style mb-5"><?php _e('Please choose the type of the license', 'the-license-manager'); ?>:</p>
					<div class="license-types-wrapper">
						<?php
							if(!metadata_exists('post', get_the_ID(), 'license_type')){
								$license_manager_meta['license_type'][0] = 'single-license';
							}
							$value = $license_manager_meta['license_type'][0];
						?>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="license_type" id="license-type-single-license" value="single_license" <?php checked($license_manager_meta['license_type'][0], 'single_license', true); ?>>
							<label class="form-check-label" for="license-type-single-license"><?php _e('Single license', 'the-license-manager'); ?></label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="license_type" id="license-type-multisite-capable" value="multisite_capable" <?php checked($license_manager_meta['license_type'][0], 'multisite_capable', true); ?>>
							<label class="form-check-label" for="license-type-multisite-capable"><?php _e('Multisite capable', 'the-license-manager'); ?></label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="license_type" id="license-type-volume-license" value="volume_license" <?php checked($license_manager_meta['license_type'][0], 'volume_license', true); ?>>
							<label class="form-check-label" for="license-type-volume-license"><?php _e('Volume license', 'the-license-manager'); ?></label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}

// Metabox 2 | Google
function license_manager_metabox_callback_google( $post ) {
	wp_nonce_field(basename(__FILE__), 'license-manager-nonce');
	$license_manager_meta = get_post_meta(get_the_ID()); ?>
	<div class="row" id="license-manager-post-google-layout">
		<div class="col">
			<div class="row">
				<!-- User Token / Client Secret -->
				<div class="col-xs-12 col-sm-12 col-md-6 my-3">
					<div class="form-group">
						<label for="user-token"><?php _e('User Token / Client Secret','the-license-manager'); ?>:</label>
						<input type="text" name="user-token" class="form-control" id="user-token" placeholder="<?php _e('1474089446-dl7ksm1h6a9df898df98je','the-license-manager'); ?>" aria-label="<?php _e('1474089446-dl7ksm1h6a9df898df98je','the-license-manager'); ?>" value="<?php if (isset ($license_manager_meta['user-token'])) echo $license_manager_meta['user-token'][0]; ?>" />
					</div>
				</div>
				<!-- API Key -->
				<div class="col-xs-12 col-sm-12 col-md-6 my-3">
					<div class="form-group">
						<label for="api-key"><?php _e('API Key','the-license-manager'); ?>:</label>
						<input type="text" name="api-key" class="form-control" id="api-key" placeholder="<?php _e('dalskdj239e20ad','the-license-manager'); ?>" aria-label="<?php _e('dalskdj239e20ad','the-license-manager'); ?>" value="<?php if (isset ($license_manager_meta['api-key'])) echo $license_manager_meta['api-key'][0]; ?>" />
					</div>
				</div>
			</div>
			<div class="row">
				<!-- Javascript origin-->
				<div class="col-xs-12 col-sm-12 col-md-4 mb-3">
					<div class="form-group">
						<label for="javascript-origin"><?php _e('Javascript Origin','the-license-manager'); ?>:</label>
						<input type="url" name="javascript-origin" class="form-control" id="javascript-origin" placeholder="<?php _e('https://example.com/','the-license-manager'); ?>" aria-label="<?php _e('https://example.com/','the-license-manager'); ?>" value="<?php if (isset ($license_manager_meta['javascript-origin'])) echo $license_manager_meta['javascript-origin'][0]; ?>" />
					</div>
				</div>
				<!-- Associated owner -->
				<div class="col-xs-12 col-sm-12 col-md-4 mb-3">
					<div class="form-group">
						<label for="javascript-auth-url"><?php _e('Javascript Auth URL','the-license-manager'); ?>:</label>
						<input type="text" name="javascript-auth-url" class="form-control" id="javascript-auth-url" placeholder="<?php _e('https://example.com?options.php=authorized-endpoint','the-license-manager'); ?>" aria-label="<?php _e('https://example.com?options.php=authorized-endpoint','the-license-manager'); ?>" value="<?php if (isset ($license_manager_meta['javascript-auth-url'])) echo $license_manager_meta['javascript-auth-url'][0]; ?>" />
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}

// Metabox 3 | Support
function license_manager_metabox_callback_support( $post ) {
	wp_nonce_field(basename(__FILE__), 'license-manager-nonce');
	$license_manager_meta = get_post_meta(get_the_ID()); ?>
	<div class="row" id="license-manager-post-support-layout">
		<div class="col">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-4 my-3">
					<div class="form-group">
						<label for="person-of-contact"><?php _e('Person of contact','the-license-manager'); ?>:</label>
						<input type="text" name="person-of-contact" class="form-control" id="person-of-contact" placeholder="<?php _e('John Doe','the-license-manager'); ?>" aria-label="<?php _e('John doe','the-license-manager'); ?>" value="<?php if (isset ($license_manager_meta['person_of_contact'])) echo $license_manager_meta['person_of_contact'][0]; ?>" />
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 my-3">
					<div class="form-group">
						<label for="support-email"><?php _e('Support e-mail','the-license-manager'); ?>:</label>
						<input type="text" name="support-email" class="form-control" id="support-email" placeholder="<?php _e('support@product.com','the-license-manager'); ?>" aria-label="<?php _e('support@product.com','the-license-manager'); ?>" value="<?php if (isset ($license_manager_meta['support_email'])) echo $license_manager_meta['support_email'][0]; ?>" />
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 my-3">
					<div class="form-group">
						<label for="support-phone"><?php _e('Support phone','the-license-manager'); ?>:</label>
						<input type="text" name="support-phone" class="form-control" id="support-phone" placeholder="<?php _e('+49 2345 234','the-license-manager'); ?>" aria-label="<?php _e('+49 2345 234','the-license-manager'); ?>" value="<?php if (isset ($license_manager_meta['support_phone'])) echo $license_manager_meta['support_phone'][0]; ?>" />
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}

// Metabox 4 | Pricing
function license_manager_metabox_callback_pricing( $post ) {
	wp_nonce_field(basename(__FILE__), 'license-manager-nonce');
	$license_manager_meta = get_post_meta(get_the_ID()); ?>
	<div class="row" id="license-manager-post-pricing-layout">
		<div class="col">
			<div class="input-group input-group-sm my-3">
				<input type="text" name="price_euro" id="license-price-euro" class="form-control" placeholder="e.g. 99,99" aria-label="license-price-euro" aria-describedby="license-price-euro-symbol" value="<?php if (isset ($license_manager_meta['price_euro'])) echo $license_manager_meta['price_euro'][0]; ?>">
				<span class="input-group-text" id="license-price-euro-symbol">€ (Euro)</span>
			</div>
			<div class="input-group input-group-sm mb-3">
				<span class="input-group-text" id="license-price-dollar-symbol">(U.S.) $</span>
				<input type="text" name="price_dollar" class="form-control" placeholder="e.g. 59,99" aria-label="price_dollar" aria-describedby="license-price-dollar-symbol" value="<?php if (isset ($license_manager_meta['price_dollar'])) echo $license_manager_meta['price_dollar'][0]; ?>">
			</div>
			
			<div class="input-group input-group-sm mb-1">
				<span class="input-group-text" id="license-price-pound-symbol">GBP (£)</span>
				<input type="text" name="price_pound" class="form-control" placeholder="e.g. 49,99" aria-label="price_pound" aria-describedby="license-price-pound-symbol" value="<?php if (isset ($license_manager_meta['price_pound'])) echo $license_manager_meta['price_pound'][0]; ?>">
			</div>
		</div>
	</div>
	<?php
}

function license_manager_metabox_save($post_id) {
	// Check Save Status of the post
	$is_autosave = wp_is_post_autosave($post_id);
	$is_revision = wp_is_post_revision($post_id);
	$is_valid_nonce = (isset($_POST['license-manager-nonce']) && wp_verify_nonce($_POST['license-manager-nonce'], basename(__FILE__))) ? true : false;

	if($is_autosave || $is_revision || !$is_valid_nonce) {
		return;
	}
	/* Start Saves --------------------------------------------------- */
	// Row 1
	if(isset($_POST['license-key'])) {
		update_post_meta($post_id, 'license-key', sanitize_text_field($_POST['license_key']));
	}
	if(isset($_POST['purchase-type'])) {
		update_post_meta($post_id, 'purchase-type', sanitize_text_field($_POST['purchase-type']));
	}
	if(isset($_POST['purchase-date'])) {
		update_post_meta($post_id, 'purchase-date', sanitize_text_field($_POST['purchase-date']));
	}
	if(isset($_POST['expiry-date'])) {
		update_post_meta($post_id, 'expiry-date', sanitize_text_field($_POST['expiry-date']));
	}
	
	// Row 2
	if(isset($_POST['login-url'])) {
		update_post_meta($post_id, 'login-url', sanitize_text_field($_POST['login-url']));
	}
	if(isset($_POST['associated-email'])) {
		update_post_meta($post_id, 'associated-email', sanitize_text_field($_POST['associated-email']));
	}
	if(isset($_POST['associated-password'])) {
		update_post_meta($post_id, 'associated-password', sanitize_text_field($_POST['associated-password']));
	}
	// Row 3
	if(isset($_POST['website-url'])) {
		update_post_meta($post_id, 'website-url', sanitize_text_field($_POST['website-url']));
	}
	if(isset($_POST['associated-owner'])) {
		update_post_meta($post_id, 'associated-owner', sanitize_text_field($_POST['associated-owner']));
	}
	if(isset($_POST['license-name'])) {
		update_post_meta($post_id, 'license-name', sanitize_text_field($_POST['license-name']));
	}
	if(isset($_POST['license-notes'])) {
		update_post_meta($post_id, 'license-notes', sanitize_text_field($_POST['license-notes']));
	}
	if(isset($_POST['license-type'])) {
		update_post_meta($post_id, 'license-type', sanitize_text_field($_POST['license-type']));
	}
	// Row 4
	if(isset($_POST['user-token'])) {
		update_post_meta($post_id, 'user-token', sanitize_text_field($_POST['user-token']));
	}
	if(isset($_POST['api-key'])) {
		update_post_meta($post_id, 'api-key', sanitize_text_field($_POST['api-key']));
	}
	if(isset($_POST['javascript-origin'])) {
		update_post_meta($post_id, 'javascript-origin', sanitize_text_field($_POST['javascript-origin']));
	}
	if(isset($_POST['javascript-auth-url'])) {
		update_post_meta($post_id, 'javascript-auth-url', sanitize_text_field($_POST['javascript-auth-url']));
	}

	// Support
	if(isset($_POST['person-of-contact'])) {
		update_post_meta($post_id, 'person-of-contact', sanitize_text_field($_POST['person-of-contact']));
	}
	if(isset($_POST['support-email'])) {
		update_post_meta($post_id, 'support-email', sanitize_text_field($_POST['support-email']));
	}
	if(isset($_POST['support-phone'])) {
		update_post_meta($post_id, 'support-phone', sanitize_text_field($_POST['support-phone']));
	}
	
	// Pricing 
	if(isset($_POST['price-euro'])) {
		update_post_meta($post_id, 'price-euro', sanitize_text_field($_POST['price-euro']));
	}
	if(isset($_POST['price-dollar'])) {
		update_post_meta($post_id, 'price-dollar', sanitize_text_field($_POST['price-dollar']));
	}
	if(isset($_POST['price-pound'])) {
		update_post_meta($post_id, 'price-pound', sanitize_text_field($_POST['price-pound']));
    }

	/* Ende Saves --------------------------------------------------- */
}
add_action('save_post', 'license_manager_metabox_save');