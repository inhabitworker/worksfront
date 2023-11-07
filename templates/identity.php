<aside>
    <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
        <?php the_custom_logo(); ?>
    <?php else : ?> 
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo( 'name' ); ?>">
            <?php bloginfo('name') ?>
        </a>
    <?php endif; ?>
</aside>