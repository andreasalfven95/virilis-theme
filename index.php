<?php get_header(); ?>

<div class="container mx-auto my-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">

	<?php if (have_posts()) : ?>
		<?php
		while (have_posts()) :
			the_post();
		?>

			<?php get_template_part('template-parts/content', get_post_format()); ?>

		<?php endwhile; ?>

	<?php endif; ?>


</div>
<div class="container mx-auto">
	<?php
	echo virilis_pagination();
	?>
</div>

<?php
get_footer();
