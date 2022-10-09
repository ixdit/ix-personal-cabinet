<section class="personal_cabinet-area">
    <div class="personal_cabinet__container">
        <aside>
	        <?php
	        /**
	         * Account navigation.
	         *
	         */
	        do_action( 'ixpc_account_navigation' );
	        ?>

        </aside>
        <main>
            <div class="personal_cabinet__content">

	            <?php
	            /**
	             * Account content.
	             *
	             */
	            do_action( 'ixpc_account_content' );
	            ?>

            </div>
        </main>
    </div>

</section><!-- #primary -->



