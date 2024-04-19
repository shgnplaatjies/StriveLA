<?php
/**
 * The template for displaying archive of custom post types.
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<main id="content" <?php post_class('site-main'); ?>>

	<?php if (apply_filters('hello_elementor_page_title', true)): ?>
		<header class="page-header">
			<h1 class="entry-title"><?php post_type_archive_title(); ?></h1>
		</header>
	<?php endif; ?>

	<div class="page-content">

		<?php
		$args = array(
			'post_type' => 'wpss_course',
			'posts_per_page' => -1,
		);

		$custom_query = new WP_Query($args);

		if ($custom_query->have_posts()): ?>
			<div class="archive-custom-post-type">
				<?php while ($custom_query->have_posts()):
					$custom_query->the_post(); ?>

					<div id="course-<?php the_ID(); ?>" <?php post_class('course-item'); ?>>
						<h2 class="entry-title"><?php the_title(); ?></h2>
						<div class="entry-content">
							<?php the_content(); ?>
						</div>
					</div>

				<?php endwhile; ?>
			</div>
			<?php wp_reset_postdata(); ?>
		<?php else: ?>
			<p><?php esc_html_e('No courses found.', 'hello-elementor'); ?></p>
		<?php endif; ?>

	</div>

</main>

<?php get_footer(); ?>