<?php

?>
<h3>set pass form</h3>
<form class="reg_form user_action_form" method="post">

	<div class="form-group">
		<input type="password" class="form-input" placeholder="Ваш пароль" name="password" id="reg-pass" required="required">
		<div class="invalid-feedback">
			Поле обязательно для заполнения
		</div>
	</div>
	<div class="form-group">
		<input type="password" class="form-input" placeholder="Повторить пароль" name="rpassword" id="reg-rpass" required="required">
		<div class="invalid-feedback">
			Поле обязательно для заполнения
		</div>
	</div>
	<button type="submit" class="btn btn--gold-border btn--size-lg btn--block mt-2 js-spinner" data-rout="<?php echo rest_url(IXPC_REST_ROUT_PREFIX.'setpass/'); ?>">
		<span class="js-spinner__text">Отправить</span>
	</button>
</form>
