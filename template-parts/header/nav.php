<?php 
/**
 * Header navigation template.
 * 
 * @package virilis_theme
 */
?>

<nav class="mx-auto container">
    <div class="md:flex md:justify-between md:items-center border-b py-6">
        <div class="flex justify-between items-center">
            <div class="max-h-20 max-w-xs">
                <?php if ( has_custom_logo() ) { ?>
                    <?php the_custom_logo(); ?>
                <?php } else { ?>
                    <div class="text-lg uppercase">
                        <a href="<?php echo get_bloginfo( 'url' ); ?>" class="font-extrabold text-lg uppercase">
                            <?php echo get_bloginfo( 'name' ); ?>
                        </a>
                    </div>

                    <p class="text-sm font-light text-gray-600">
                        <?php echo get_bloginfo( 'description' ); ?>
                    </p>

                <?php } ?>
            </div>

            <div class="md:hidden">
                <a href="#" aria-label="Toggle navigation" id="primary-menu-toggle">
                    <svg viewBox="0 0 20 20" class="inline-block w-6 h-6" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g stroke="none" stroke-width="1" fill="currentColor" fill-rule="evenodd">
                            <g id="icon-shape">
                                <path d="M0,3 L20,3 L20,5 L0,5 L0,3 Z M0,9 L20,9 L20,11 L0,11 L0,9 Z M0,15 L20,15 L20,17 L0,17 L0,15 Z"
                                        id="Combined-Shape"></path>
                            </g>
                        </g>
                    </svg>
                </a>
            </div>
        </div>

        <?php
        wp_nav_menu(
            array(
                'container_id'    => 'primary-menu',
                'container_class' => 'hidden bg-gray-100 mt-4 p-4 md:mt-0 md:p-0 md:bg-transparent md:block',
                'menu_class'      => 'md:flex md:-mx-4',
                'theme_location'  => 'virilis-header-menu',
                'li_class'        => 'md:mx-4',
                'fallback_cb'     => false,
            )
        );
        ?>
    </div>
</nav>