<h3><?php echo _e( 'Account details', 'ixpc' ); ?></h3>
<form class="pc-user-form edit_accaunt" method="post">

	<div class="form-group">
		<input type="text" class="form-input" placeholder="First name*" name="account_first_name" id="account_first_name" required="required" autocomplete="off">
		<input type="text" class="form-input" placeholder="Last name*" name="account_last_name" id="account_last_name" required="required"  autocomplete="off">
	</div>

	<div class="form-group">
		<input type="text" class="form-input" placeholder="Display name*" name="account_display_name" id="account_display_name" required="required" autocomplete="off">
	</div>

	<div class="form-group">
		<input type="email" class="form-input" placeholder="Email address*" name="account_email" id="account_email" required="required"  autocomplete="off">
	</div>

	<div class="form-group__btn-block">
		<button type="submit" class="btn" data-rout="<?php echo rest_url(IXPC_REST_ROUT_PREFIX.'register/'); ?>">
			<span class="js-spinner__text"><?php echo _e( 'Save changes', 'ixpc' ); ?></span>
		</button>
	</div>

</form>