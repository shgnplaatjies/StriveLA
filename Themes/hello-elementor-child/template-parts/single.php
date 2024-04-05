<?php
/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

while (have_posts()):
	the_post();

	// Retrieve the value of the 'wpss_course_style' custom field
	$course_style = get_post_meta(get_the_ID(), 'wpss_course_style', true);
	?>

	<main id="content" <?php post_class('site-main'); ?>>

		<?php if (apply_filters('hello_elementor_page_title', true)): ?>
			<header class="page-header">
				<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
			</header>
		<?php endif; ?>

		<div class="page-content">

			<?php
			// Define the custom query arguments
			$args = array(
				'post_type' => 'wpss_course', // Replace 'wpss_course' with your custom post type slug
				'posts_per_page' => -1, // Display all posts
			);

			// Instantiate a new WP_Query object
			$custom_query = new WP_Query($args);

			// Check if there are any posts
			if ($custom_query->have_posts()):
				while ($custom_query->have_posts()):
					$custom_query->the_post();

					// Apply different CSS classes based on the value of the custom field 'wpss_course_style'
					$container_class = ($course_style == 'Square') ? 'square-container' : 'rounded-container';
					?>

					<div id="course-card" class="bg-white shadow-lg <?php echo $container_class; ?> overflow-hidden flex">

						<?php if (has_post_thumbnail()): ?>
							<div id="featured-image" class="w-1/2">
								<?php the_post_thumbnail('large', ['class' => 'object-cover w-full h-full']); ?>
							</div>
						<?php else: ?>
							<div id="course-name" class="w-1/2 flex items-center justify-center bg-gray-200">
								<h2 class="text-3xl font-semibold text-gray-700 p-6">
									<?php the_title(); ?>
								</h2>
							</div>
						<?php endif; ?>

						<div id="course-info" class="w-1/2 p-6 flex flex-col justify-between">
							<div>
								<h4 class="text-lg font-semibold mb-4">Overview</h4>
								<p class="text-gray-700">
									<?php echo get_post_meta(get_the_ID(), 'wpss_course_summary', true); ?>
								</p>

								<h4 id='details' class="text-lg font-semibold mt-6 mb-4">Details</h4>
								<p class="text-gray-700">
									<?php echo get_post_meta(get_the_ID(), 'wpss_course_summary', true); ?>
								</p>
								<p class="text-gray-700">
									Ends:
									<?php echo get_post_meta(get_the_ID(), 'wpss_course_end_date', true); ?>
								</p>
								<div class="flex items-center mt-4 course-price-container">
									<icon class="w-3 h-3 bg-green-300 rounded-full mr-2"></icon>
									<p class="text-green-500 font-semibold mb-0 py-0">
										<?php echo get_post_meta(get_the_ID(), 'wpss_course_price', true); ?>
									</p>
								</div>
							</div>
							<a href="<?php the_permalink(); ?>"
								class="mt-6 w-32 bg-green-500 text-white py-2 px-4 rounded-lg inline-block hover:bg-green-600 transition duration-300 ease-in-out">
								Learn More
							</a>
						</div>

					</div>

				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>

			<div class="post-tags">
				<?php the_tags('<span class="tag-links">' . esc_html__('Tagged ', 'hello-elementor'), null, '</span>'); ?>
			</div>
			<?php wp_link_pages(); ?>
		</div>

		<?php comments_template(); ?>

	</main>

<?php endwhile; ?>