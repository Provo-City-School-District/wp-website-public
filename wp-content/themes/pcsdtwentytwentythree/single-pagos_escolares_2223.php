<?php
get_header();
?>
<main id="mainContent" class="sidebar">
	<ol class="breadcrumbs" id="breadcrumbs">
		<li><a href="https://provo.edu/">Home</a> / </li>
		<li><a href="https://provo.edu/pagos-escolares/">Pagos Escolares</a> / </li>
		<li><a href="https://provo.edu/pagos-escolares-22-23/">Pagos Escolares 22-23</a> / </li>
		<li><?php single_post_title(); ?></li>
	</ol>
	<section id="currentPage">
		<article class="activePost feePost">
			<?php
			?>
			<p class="lastmodified"><em>Last modified: <?php the_modified_date(); ?></em></p>
			<?php
			wp_reset_query();
			wp_reset_postdata();
			$fields = get_fields();
			?>
			<h1><?php single_post_title(); ?></h1>
			<h2>Maximum Activity Fees</h2>
			<section class="feeDisplay">
				<table>
					<thead>
						<tr>
							<th>Tarifa (no exceder)</th>
							<th>Recaudación de fondos (no exceder)</th>
							<th>Tarifa máxima total</th>
							<th>Notas</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php echo $fields['overall_activity_fee_amounts']['overall_activity_fee']; ?></td>
							<td><?php echo $fields['overall_activity_fee_amounts']['overall_course_fundraising']; ?></td>
							<td><?php echo $fields['overall_activity_fee_amounts']['overall_course_total']; ?></td>
							<td><?php echo $fields['overall_activity_fee_amounts']['notes']; ?></td>
						</tr>
					</tbody>
				</table>
			</section>

			<?php
			// Check that there are location specific fees
			if ($fields['location_specific_fees']) {
			?>
				<h2>Desglose de tarifas por ubicación</h2>
				<?php
				// Separate each location into its own array
				foreach ($fields['location_specific_fees'] as $location) {
				?>
					<h3><?php echo $location['location']; ?></h3>
					<section class="feeDisplay feeBreakdown">
						<table>
							<thead>
								<tr>
									<th>Descripción de tarifa</th>
									<th>Tarifa</th>
									<th>Recaudación de fondos</th>
									<th>Total</th>
									<th>Notas</th>
									<th>Tarifa aprobada del año anterior</th>
								</tr>
							</thead>
							<tbody>
								<?php
								// Display the actual fees
								foreach ($location['breakdown_of_fees'] as $fee) {
								?>
									<tr>
										<td><?php echo $fee['fee_description']; ?></td>
										<td><?php echo $fee['fee']; ?></td>
										<td><?php echo $fee['fundraising']; ?></td>
										<td><?php echo $fee['total']; ?></td>
										<td><?php echo $fee['notes']; ?></td>
										<td><?php echo $fee['prior_year_approved_fee']; ?></td>
									</tr>
								<?php
								} // End the breakdown_of_fees loop
								?>
							</tbody>
						</table>
					</section>
			<?php
				} //end the location_specific_fees loop
			} //end if check on location_specific_fees
			wp_reset_query();
			wp_reset_postdata();
			?>
			<div class="bottom"></div>
		</article>
	</section>
	<?php get_sidebar('school-fees'); ?>
</main>
<?php
get_footer();
?>