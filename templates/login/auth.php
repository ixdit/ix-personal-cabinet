<?php

?>
<h3>auth form</h3>
<form action="" class="js-login-form" novalidate>
	<div class="form-group">
		<input type="text" class="form-input" placeholder="Логин" required="required" id="login" name="login">
		<div class="invalid-feedback">
			Поле обязательно для заполнения
		</div>
	</div>
	<div class="form-group">
		<input type="password" class="form-input" placeholder="Пароль" required="required" id="pass" name="pass">
		<div class="invalid-feedback form-error">
			Поле обязательно для заполнения
		</div>
	</div>
	<div class="text-right">

	</div>
	<button type="submit" class="mt-2 btn btn--gold-border btn--size-lg btn--block">
		Войти
	</button>

    <button type="button" class="mt-2 btn btn--gold-border btn--size-lg btn--block">
        регистрация
    </button>
    <button type="button" class="mt-2 btn btn--gold-border btn--size-lg btn--block">
        восстановить пароль
    </button>
</form>
