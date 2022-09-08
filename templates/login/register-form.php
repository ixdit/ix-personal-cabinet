<?php

?>

<form action="" class="js-reg-form" novalidate>
	<div class="form-group">
		<input type="text" class="form-input" placeholder="Ваш логин" name="reg-login" id="reg-login" required="required">
		<div class="invalid-feedback">
			Поле обязательно для заполнения
		</div>
	</div>
	<div class="form-group">
		<input type="email" class="form-input" placeholder="Ваш E-mail*" name="reg-email" id="reg-email" required="required">
		<div class="invalid-feedback form-error">
			Необходимо ввести валидный E-mail
		</div>
	</div>
	<div class="form-group">
		<input type="password" class="form-input" placeholder="Ваш пароль" name="reg-pass" id="reg-pass" required="required">
		<div class="invalid-feedback">
			Поле обязательно для заполнения
		</div>
	</div>
	<div class="form-group">
		<input type="password" class="form-input" placeholder="Повторить пароль" name="reg-rpass" id="reg-rpass" required="required">
		<div class="invalid-feedback">
			Поле обязательно для заполнения
		</div>
	</div>
	<button type="submit" class="btn btn--gold-border btn--size-lg btn--block mt-2 js-spinner">
		<span class="js-spinner__text">Зарегистрироваться</span>
	</button>
</form>
