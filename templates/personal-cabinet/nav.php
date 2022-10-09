<?php
/**
 * @global $args
 */

?>

<ul>
	<?php foreach ( $args as $key => $value ) : ?>
		<?php
		if ( $key === 'logout' ) {
			$link = $value['cabinet_page_url'];
		} else {
			$link = $value['cabinet_page_url'] . $key;
		}
		?>

        <li>
            <a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $value['title'] ); ?></a>
        </li>

	<?php endforeach; ?>
</ul>
