<?php

?>
<h3>reminder form</h3>
<form action="" class="reminder_form user_action_form">
	<div class="form-group">
		<input type="text" class="form-input" placeholder="Ваш E-mail*" name="email" id="remail" required="required">
		<div class="invalid-feedback form-error">
			Необходимо ввести валидный E-mail
		</div>
	</div>

	<button type="submit" class="mt-2 btn btn--gold-border btn--size-lg btn--block" data-rout="<?php echo rest_url(IXPC_REST_ROUT_PREFIX.'reminder/'); ?>">
		Восстановить пароль
	</button>
</form>
