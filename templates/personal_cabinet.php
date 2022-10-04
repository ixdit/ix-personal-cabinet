<section class="personal_cabinet-area">
    <div class="personal_cabinet__container">
        <aside>
            <ul>
                <li>
                    <a href="#"><?php _e( 'Dashboard', 'ixpc' ); ?></a>
                </li>
                <li>
                    <a href="#"><?php _e( 'Articles', 'ixpc' ); ?></a>
                </li>
                <li>
                    <a href="#"><?php _e( 'Profile', 'ixpc' ); ?></a>
                </li>
                <li>
                    <a href="#"><?php _e( 'change-pass', 'ixpc' ); ?></a>
                </li>
                <li>
                    <a href="#"><?php _e( 'Over', 'ixpc' ); ?></a>
                </li>
            </ul>

        </aside>
        <main>
            <div class="personal_cabinet__content">

	            <?php
	            /**
	             * My Account content.
	             *
	             */
	            do_action( 'ixpc_account_content' );
	            ?>

            </div>
        </main>
    </div>

</section><!-- #primary -->



