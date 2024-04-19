<?php
/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
 *
 * @package HelloElementor
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

get_header();

while (have_posts()):
	the_post();

	$course_style = get_post_meta(get_the_ID(), 'wpss_course_style', true);
	$duration_style = get_post_meta(get_the_ID(), 'wpss_course_duration_style', true);
	?>

	<main id="content" <?php post_class('site-main'); ?>>

		<?php if (apply_filters('hello_elementor_page_title', true)): ?>
			<header class="page-header">
				<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
			</header>
		<?php endif; ?>

		<div class="page-content">

			<?php
			$args = array(
				'post_type' => 'wpss_course',
				'posts_per_page' => -1,
			);

			$custom_query = new WP_Query($args);

			if ($custom_query->have_posts()):
				while ($custom_query->have_posts()):
					$custom_query->the_post();

					$border_radius = ($course_style == 'Square') ? 'rounded-none' : 'rounded-lg';
					?>

					<div id="course-card"
						class="bg-white shadow-lg flex items-center justify-center <?php echo esc_attr($border_radius); ?> overflow-hidden flex">
						<?php
						$course_icon = get_post_meta(get_the_ID(), 'wpss_course_course_icon', true);

						if (!empty($course_icon)): ?>
							<img id="course-icon" src="<?php echo esc_url($course_icon); ?>" alt="Methodology Icon"
								class="object-cover h-full w-1/2">
						<?php else: ?>
							<div id="course-name" class="w-1/2 flex items-center justify-center bg-gray-200">
								<h2 class="text-3xl font-semibold text-gray-700 p-6">
									<?php the_title(); ?>
								</h2>
							</div>
						<?php endif; ?>

						<div id="course-info" class="w-1/2 p-6 flex flex-col justify-between h-max-content">
							<div>
								<h4 class="text-lg font-semibold mb-4">Overview</h4>
								<p class="text-gray-700">
									<?php echo esc_html(get_post_meta(get_the_ID(), 'wpss_course_overview', true)); ?>
								</p>

								<h4 id='details' class="text-lg font-semibold mt-6 mb-4">Details</h4>
								<p class="text-gray-700">
									<?php echo esc_html(get_post_meta(get_the_ID(), 'wpss_course_summary', true)); ?>
								</p>
								<?php
								$start_date = strtotime(get_post_meta(get_the_ID(), 'wpss_course_start_date', true));
								$end_date = strtotime(get_post_meta(get_the_ID(), 'wpss_course_end_date', true));
								if ($duration_style === 'Absolute'): ?>
									<p class="text-gray-700">
										<?php esc_html_e('Starts:', 'hello-elementor'); ?> 				<?php echo esc_html(date('j F Y', $start_date)); ?>
									</p>
									<p class="text-gray-700">
										<?php esc_html_e('Ends:', 'hello-elementor'); ?> 				<?php echo esc_html(date('j F Y', $end_date)); ?>
									</p>
								<?php elseif ($duration_style === 'Relative'):
									$duration_days = ceil(($end_date - $start_date) / (60 * 60 * 24));
									?>
									<p class="text-gray-700">
										<?php esc_html_e('Days:', 'hello-elementor'); ?> 				<?php echo esc_html($duration_days); ?>
									</p>
								<?php endif; ?>
								<div class="flex items-center mt-4 course-price-container">
									<icon class="w-3 h-3 bg-green-300 rounded-full mr-2"></icon>
									<p class="text-green-500 font-semibold mb-0 py-0">
										<?php
										if (class_exists('WooCommerce') && function_exists('get_woocommerce_currency_symbol'))
											echo esc_html(get_woocommerce_currency_symbol());
										else
											echo esc_html(get_post_meta(get_the_ID(), 'wpss_course_currency', true));
										?>

										<?php echo esc_html(get_post_meta(get_the_ID(), 'wpss_course_price', true)); ?>
									</p>
								</div>
							</div>

							<?php
							$course_button_text = get_post_meta(get_the_ID(), 'wpss_course_text', true);
							$course_button_link = get_post_meta(get_the_ID(), 'wpss_course_link', true);

							if (!empty($course_button_text) && !empty($course_button_link)): ?>
								<a href="<?php echo esc_url($course_button_link); ?>"
									class="mt-6 w-32 bg-green-500 text-white py-2 px-4  <?php echo esc_attr($border_radius); ?> inline-block hover:bg-green-600 transition duration-300 ease-in-out">
									<?php echo esc_html($course_button_text); ?>
								</a>
							<?php endif; ?>
						</div>

					</div>

				<?php endwhile;
				wp_reset_postdata();
			endif; ?>

			<div class="post-tags">
				<?php the_tags('<span class="tag-links">' . esc_html__('Tagged ', 'hello-elementor'), null, '</span>'); ?>
			</div>
			<?php wp_link_pages(); ?>
		</div>

		<?php comments_template(); ?>

	</main>

<?php endwhile; ?>

<?php get_footer(); ?>