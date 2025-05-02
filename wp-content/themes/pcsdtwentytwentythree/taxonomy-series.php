<?php
get_header();
?>

<main id="mainContent" class="sidebar">

	<ol class="breadcrumbs" id="breadcrumbs">
		<li><a href="https://provo.edu/">Home</a> / </li>
		<li>Podcasts / </li>
		<li><?php single_cat_title(); ?></li>
	</ol>
	<div id="currentPage">
		<article class="activePost">
			<h1>Podcasts: <?php single_cat_title(); ?></h1>
			<img src="https://provo.edu/wp-content/uploads/2023/08/podcast-banner-4.jpeg" alt="Sup With the Sup" />
			<?php
			//if (have_posts()) :
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				'post_type' => 'podcast',
				'posts_per_page' => 18, // Set to 18 to match WP setting -> https://provo.edu/wp-admin/options-reading.php
				'paged' => $paged,
				//'category_name' => 'category-name', // Fetch posts from the 'category-name' category.
			);
			
			$query = new WP_Query($args);
			
			if ($query->have_posts()) : 
			?>
				<div class="series-archive">
					<?php while ($query->have_posts()) : $query->the_post(); ?>
						<div class="episode">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<?php if (function_exists('ssp_player')) : ?>
								<div class="episode-player">
									<?php //echo ssp_player(); 
									// echo do_shortcode('[ss_player]');
									the_excerpt();
									?>
								</div>
							<?php endif; ?>
						</div>
					<?php endwhile; ?>
					<nav class="archiveNav">
						<?php echo paginate_links(array('total' => $query->max_num_pages)); ?>
					</nav>
				</div>
			<?php
			else :
				echo 'No episodes found.';
			endif;
			
			// Reset post data after custom query
			wp_reset_postdata();
			?>
		</article>
	</div>
	<aside id="rightSidebar" class="rightSidebar">
		<?php
		$page = get_post(80354);
		if ($page) {
			echo do_shortcode(apply_filters('the_content', $page->post_content));
		} else {
			echo '<p>Page not found.</p>';
		}
		?>
	</aside>
</main>
<?php
get_footer();
?>