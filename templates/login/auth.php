<?php

?>
<h3>auth form</h3>
<form action="" class="login-form user_action_form">
	<div class="form-group">
		<input type="text" class="form-input" placeholder="Логин*" required="required" id="login" name="login">
	</div>
	<div class="form-group">
		<input type="password" class="form-input" placeholder="Пароль*" required="required" id="pass" name="password">
	</div>

	<div class="text-right">

	</div>
    <div class="form_group">
        <input type="checkbox" name="remember" checked>Запомнить
    </div>
	<button type="submit" class="mt-2 btn btn--gold-border btn--size-lg btn--block" data-rout="<?php echo rest_url(IXPC_REST_ROUT_PREFIX.'auth/'); ?>">
		Войти
	</button>

    <button type="button" class="get_forms mt-2 btn btn--gold-border btn--size-lg btn--block" data-form_type="register" data-rout="<?php echo rest_url(IXPC_REST_ROUT_PREFIX.'get_form/'); ?>">
        регистрация
    </button>
    <button type="button" class="get_forms mt-2 btn btn--gold-border btn--size-lg btn--block" data-form_type="reminder" data-rout="<?php echo rest_url(IXPC_REST_ROUT_PREFIX.'get_form/'); ?>">
        восстановить пароль
    </button>
</form>
