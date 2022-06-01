<?php

/**
 * Template for displaying posts
 * 
 * @package virilis_theme
 */

$the_post_id = get_the_ID();
$has_post_thumbnail = get_the_post_thumbnail($the_post_id);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mb-8'); ?>>

	<header class="entry-header mb-4">
		<?php the_title(sprintf('<h2 class="entry-title text-2xl md:text-3xl font-extrabold leading-tight mb-1"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
		<time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished" class="text-sm text-gray-700"><?php echo get_the_date(); ?></time>
		<?php
		//Post thumbnail
		if ($has_post_thumbnail) {
		?>
			<div class="entry-image mb-4">
				<a href="<?php echo esc_url(get_permalink()); ?>">
					<?php
					the_post_custom_thumbnail(
						$the_post_id,
						"featured-thumbnail max-h-80",
						[
							"sizes" => "(max-width 350px) 350px, 250px",
							"class" => "attachment-featured-thumbnail size-featured-image"
						]
					)
					?>
				</a>
			</div>
		<?php
		}
		?>
	</header>

	<?php if (is_search() || is_archive()) : ?>

		<div class="entry-summary">
			<?php
			the_excerpt();
			echo virilis_excerpt_more();
			?>
		</div>

	<?php else : ?>

		<div class="entry-content">
			<?php
			/* translators: %s: Name of current post */
			the_excerpt();
			echo virilis_excerpt_more();
			/* the_content(
				sprintf(
					__( 'Continue reading %s', 'virilis_theme' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				)
			); */

			/* wp_link_pages(
				array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'virilis_theme') . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __('Page', 'virilis_theme') . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				)
			); */
			?>
		</div>

	<?php endif; ?>
</article>