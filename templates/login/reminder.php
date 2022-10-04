<?php

?>
<div class="form_wrapper">
    <h3><?php echo _e( 'Forgot Password', 'ixpc' ); ?></h3>
    <form action="" class="reminder_form user_action_form">
        <div class="form-group">
            <input type="text" class="form-input" placeholder="Ваш E-mail*" name="email" id="remail" required="required">
<!--            <div class="invalid-feedback form-error">-->
<!--                Необходимо ввести валидный E-mail-->
<!--            </div>-->
        </div>

        <div class="form-group__btn-block">
            <button type="submit" class="btn" data-rout="<?php echo rest_url(IXPC_REST_ROUT_PREFIX.'reminder/'); ?>">
		        <?php echo _e( 'Forgot Password', 'ixpc' ); ?>
            </button>
        </div>
    </form>
</div>
