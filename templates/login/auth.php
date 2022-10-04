<?php

?>
<div class="form_wrapper">
    <h3><?php echo _e( 'Login', 'ixpc' ); ?></h3>
    <form action="" class="login-form user_action_form">
        <div class="form-group">
            <input type="text" class="form-input" placeholder="Логин*" required="required" id="login" name="login">
        </div>
        <div class="form-group">
            <input type="password" class="form-input" placeholder="Пароль*" required="required" id="pass" name="password">
        </div>

        <div class="form-group form-group__remember-and-links">
            <div class="text-left">
                <input type="checkbox" name="remember" checked> <?php echo _e( 'Remember me', 'ixpc' ); ?>
            </div>
            <div class="text-right">
                <div class="text-right__item">
                    <a href="#" class="get_forms link_reg_form" autocomplete="off" data-form_type="register" data-rout="<?php echo rest_url(IXPC_REST_ROUT_PREFIX.'get_form/'); ?>">
						<?php echo _e( 'Register', 'ixpc' ); ?>
                    </a>
                </div>
                <div class="text-right__item">
                    <a href="#" class="get_forms link_forgot_form" autocomplete="off" data-form_type="reminder" data-rout="<?php echo rest_url(IXPC_REST_ROUT_PREFIX.'get_form/'); ?>">
						<?php echo _e( 'Forgot password?', 'ixpc' ); ?>
                    </a>
                </div>
            </div>
        </div>
        <div class="form-group form-group__btn-block">
            <button type="submit" class="btn btn_login" data-rout="<?php echo rest_url(IXPC_REST_ROUT_PREFIX.'auth/'); ?>">
				<?php echo _e( 'Login', 'ixpc' ); ?>
            </button>
        </div>

        <!--	<button type="submit" class="mt-2 btn btn--gold-border btn--size-lg btn--block" data-rout="--><?php //echo rest_url(IXPC_REST_ROUT_PREFIX.'auth/'); ?><!--">-->
        <!--		--><?php //echo _e( 'Register', 'ixpc' ); ?>
        <!--	</button>-->
        <!---->
        <!--    <button type="button" class="get_forms mt-2 btn btn--gold-border btn--size-lg btn--block" data-form_type="register" data-rout="--><?php //echo rest_url(IXPC_REST_ROUT_PREFIX.'get_form/'); ?><!--">-->
        <!--        регистрация-->
        <!--    </button>-->
        <!--    <button type="button" class="get_forms mt-2 btn btn--gold-border btn--size-lg btn--block" data-form_type="reminder" data-rout="--><?php //echo rest_url(IXPC_REST_ROUT_PREFIX.'get_form/'); ?><!--">-->
        <!--        восстановить пароль-->
        <!--    </button>-->
    </form>
</div>

