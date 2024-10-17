<?php
/* Template Name: Digital Signage */
?>

<head>
	<!-- This line auto refreshes the page content= in seconds till the refresh -->
	<meta http-equiv="refresh" content="3600">
	<!-- these lines tell the browser to not cache the content of this page -->
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Expires" content="0" />
	<!-- simple styling to remove scroll bars -->
	<style>
		iframe,
		video,
		img {
			overflow: hidden !important;
		}
	</style>
</head>

<?php
wp_reset_query();
$displayCategory = get_field('digital_signage_category');
$the_query = new WP_Query(
	array(
		'post_status' => 'publish',
		'posts_per_page' => 1,
		'post_type'  => array('digital_signage'),
		'tax_query' => array(
			array(
				'taxonomy' => 'digital_signage_category',
				'terms' => $displayCategory
			)
		),
	)
);
if ($the_query->have_posts()) :
	while ($the_query->have_posts()) : $the_query->the_post();

		if (get_field('google_media')) {
			$url = get_field('google_media');
			$url = str_replace('/pub?', '/embed?', $url)
?>
			<iframe src="<?php echo $url ?>" frameborder="0" width="3820" height="2140" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true" allow="autoplay"></iframe>
		<?php
		} elseif (get_field('video')) {
		?>
			<video src="<?php the_field('video'); ?>" width="3820" height="2140" autoplay loop></video>
		<?php
		} else {
		?>
			<img src="<?php the_field('image'); ?>" width="3820" height="2140" alt="" />
<?php
		}
	endwhile;
else :
	echo '<p>No Content Found</p>';
endif;
wp_reset_query();
?>