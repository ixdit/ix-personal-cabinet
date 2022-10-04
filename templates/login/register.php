<?php

?>
<div class="form_wrapper">
    <h3><?php echo _e( 'Register', 'ixpc' ); ?></h3>
    <form class="reg_form user_action_form" method="post">
        <div class="form-group">
            <input type="text" class="form-input" placeholder="Ваш логин" name="username" id="reg-login" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="email" class="form-input" placeholder="Ваш E-mail*" name="email" id="reg-email" required="required"  autocomplete="off">
        </div>
        <div class="form-group">
            <input type="password" class="form-input compare_pass" placeholder="Ваш пароль" name="password" id="password" required="required"  autocomplete="new-password">

        </div>
        <div class="form-group">
            <input type="password" class="form-input compare_pass" placeholder="Повторить пароль" name="confirm_password" id="confirm_password" required="required"  autocomplete="new-password">
        </div>
        <div class="form-group__btn-block">
            <button type="submit" class="btn btn--gold-border btn--size-lg btn--block mt-2 js-spinner" data-rout="<?php echo rest_url(IXPC_REST_ROUT_PREFIX.'register/'); ?>">
                <span class="js-spinner__text">Зарегистрироваться</span>
            </button>
        </div>

    </form>
</div>

