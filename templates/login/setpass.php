<?php
/**
 *
 * @global $args
 */

$user = $args['user'];

?>
<div class="form_wrapper">
    <h3><?php echo _e( 'Set Password', 'ixpc' ); ?></h3>

        <form class="reg_form user_action_form" method="post">

            <div class="form-group">
                <input type="password" class="form-input" placeholder="Ваш пароль" name="new_pass" id="reg-pass" required="required">
<!--                <div class="invalid-feedback">-->
<!--                    Поле обязательно для заполнения-->
<!--                </div>-->
            </div>
            <div class="form-group">
                <input type="password" class="form-input" placeholder="Повторить пароль" name="rpassword" id="reg-rpass" required="required">
<!--                <div class="invalid-feedback">-->
<!--                    Поле обязательно для заполнения-->
<!--                </div>-->
            </div>
            <div class="form-group__btn-block">
                <button type="submit" class="btn" data-rout="<?php echo rest_url(IXPC_REST_ROUT_PREFIX.'setpass/'); ?>">
                    <span class="js-spinner__text"><?php echo _e( 'Set Password', 'ixpc' ); ?></span>
                </button>
            </div>

            <input type="hidden" name="user_id" value="<?php echo $user->ID;?>">
        </form>
</div>
