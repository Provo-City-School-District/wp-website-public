<?php
get_header();

// Sanitize the $_GET parameters
$staff_member = isset($_GET['staff']) ? sanitize_text_field($_GET['staff']) : '';
$prefillsubject = isset($_GET['subject']) ? sanitize_text_field($_GET['subject']) : '';
$prefillfrom = isset($_GET['from']) ? sanitize_email($_GET['from']) : '';
$prefillcarbon = isset($_GET['carbon']) ? sanitize_text_field($_GET['carbon']) : '';
$prefillsenderphone = isset($_GET['senderphone']) ? sanitize_text_field($_GET['senderphone']) : '';
$prefillmessage = isset($_GET['message']) ? sanitize_textarea_field($_GET['message']) : '';

// Board Districts
$district1 = '(District 1: Lisa Boyce)';
$district2 = '(District 2: Melanie Hall)';
$district3 = '(District 3: Megan Van Wagenen)';
$district4 = '(District 4: Jennifer Partridge)';
$district5 = '(District 5: Teri McCabe)';
$district6 = '(District 6: Rebecca Nielsen)';
$district7 = '(District 7: Gina Hales)';

?>
<main id="mainContent" class="sidebar">

	<section class="content page contact">
		<?php custom_breadcrumbs(); ?>
		<div id="currentPage">
			<article id="activePost" class="activePost emailForm">
				<h2>Contact <?php echo esc_html(get_the_title($staff_member)); ?></h2>
				<form action="https://provo.edu/email-sent/" method='post' id="emailForm" class="emailForm">
					<label for="from">From: </label>
					<input type="email" id="from" name="senderemail" placeholder="username@example.com" <?php if (!empty($prefillfrom)) {
																											echo 'value="' . esc_attr($prefillfrom) . '"';
																										} ?> required>
					<label for="fromPhone">Phone: </label>
					<input type="tel" id="fromPhone" name="senderphone" placeholder="801-374-4800 (Optional)" <?php if (!empty($prefillsenderphone)) {
																													echo 'value="' . esc_attr($prefillsenderphone) . '"';
																												} ?>>
					<?php
					if ($staff_member == '76000') {
					?>
						<label for="boundarySchool">Which School Do you Live in the Boundary of:</label>
						<select name="boundarySchool" id="boundarySchool" required>
							<option value="" disabled selected>Select an option</option>
							<option value="Amelia Earhart <?php echo esc_html($district5); ?>">Amelia Earhart</option>
							<option value="Canyon Crest <?php echo esc_html($district1); ?>">Canyon Crest</option>
							<option value="Edgemont <?php echo esc_html($district2); ?>">Edgemont</option>
							<option value="Franklin <?php echo esc_html($district5); ?>">Franklin</option>
							<option value="Lakeview <?php echo esc_html($district6); ?>">Lakeview</option>
							<option value="Provo Peaks <?php echo esc_html($district3); ?>">Provo Peaks</option>
							<option value="Provost <?php echo esc_html($district4); ?>">Provost</option>
							<option value="Rock Canyon <?php echo esc_html($district2); ?>">Rock Canyon</option>
							<option value="Spring Creek <?php echo esc_html($district4); ?>">Spring Creek</option>
							<option value="Sunset View <?php echo esc_html($district5); ?>">Sunset View</option>
							<option value="Timpanogos <?php echo esc_html($district7); ?>">Timpanogos</option>
							<option value="Wasatch <?php echo esc_html($district3); ?>">Wasatch</option>
							<option value="Westridge <?php echo esc_html($district6); ?>">Westridge</option>
							<option value="Centennial Middle <?php echo esc_html($district4); ?>">Centennial Middle</option>
							<option value="Dixon Middle <?php echo esc_html($district7); ?>">Dixon Middle</option>
							<option value="Independence High <?php echo esc_html($district5); ?>">Independence High</option>
							<option value="Provo High <?php echo esc_html($district6); ?>">Provo High</option>
							<option value="Timpview High <?php echo esc_html($district1); ?>">Timpview High</option>
							<option value="eSchool <?php echo esc_html($district7); ?>">eSchool</option>
							<option value="Oak Springs <?php echo esc_html($district7); ?>">Oak Springs</option>
							<option value="Slate Canyon <?php echo esc_html($district7); ?>">Slate Canyon</option>
							<option value="Not Assigned to Any School">Not Assigned to Any School</option>
						</select>
					<?php
					}

					?>

					<p><strong>I am a...</strong></p><br>
					<label>
						<input type="radio" name="role" value="Community Member" id="commRadio" required> Community Member
					</label>
					<br>
					<label>
						<input type="radio" name="role" value="Parent" id="parentRadio"> Parent
					</label>
					<br>
					<label>
						<input type="radio" name="role" value="Vendor" id="vendorRadio"> Vendor
					</label>
					<br>
					<label>
						<input type="radio" name="role" value="Student" id="studentRadio"> Student
					</label>
					<div id="studentNameField" style="display: none;">
						<label for="studentName">Student Full Name:</label>
						<input type="text" id="studentName" name="studentName">
					</div>
					<p id="vendorBlurb">Current affiliates should contact their designated district contacts directly. Please note that cold solicitations submitted through this form will not receive a response.</p>

					<br>
					<label for="to_staff">To: </label>
					<input type="text" name="to_staff" value="<?php echo esc_html(get_the_title($staff_member)); ?>" readonly>
					<label for="subject">Subject: </label>
					<input id="subject" name="subject" <?php if (!empty($prefillsubject)) {
															echo 'value="' . esc_attr($prefillsubject) . '"';
														} ?>>
					<label for="message">Message: </label>
					<textarea id="textareamessage" name="message" minlength="15" placeholder="What would you like to say..." required><?php if (!empty($prefillmessage)) {
																																			echo esc_textarea($prefillmessage);
																																		} ?></textarea>
					<input type="checkbox" name="carbon" <?php if (!empty($prefillcarbon)) {
																echo 'checked';
															} ?>>
					<p>Send a copy to my address</p>
					<label for="staff_id"></label><input type="hidden" id="staff_id" name="staff_id" value="<?php echo esc_attr($staff_member); ?>" readonly>
					<input type="checkbox" name="sanity" id="sanity" class="sanity" unchecked><label for="sanity" class="sanity"></label>
					<input type="submit" value="Send Message" class="g-recaptcha">
				</form>

				<div class="clear"></div>
			</article>
		</div>
	</section>
	<?php get_sidebar(); ?>
</main>
<script>
	// Get all the radio buttons
	var radioButtons = document.querySelectorAll('input[type="radio"]');

	// Function to show or hide the student name input field
	function toggleStudentNameField() {
		// Get the radio buttons
		var parentRadio = document.getElementById('parentRadio');
		var vendorRadio = document.getElementById('vendorRadio');
		// Get fields used as triggers
		var studentNameInput = document.getElementById('studentNameField');
		var vendorBlurb = document.getElementById('vendorBlurb');

		if (parentRadio.checked) {
			// if parent radio button is checked, show student name field. 
			studentNameInput.style.display = 'block';
			vendorBlurb.style.display = 'none';
		} else if (vendorRadio.checked) {
			// If vendor radio button is checked, show the vendor blurb
			vendorBlurb.style.display = 'block';
			studentNameInput.style.display = 'none';
		} else {
			// If neither radio button is checked, hide both
			studentNameInput.style.display = 'none';
			vendorBlurb.style.display = 'none';
		}
	}


	// Call the function initially to set the field based on the default selection
	toggleStudentNameField();

	// Add event listener to all radio buttons
	for (var i = 0; i < radioButtons.length; i++) {
		radioButtons[i].addEventListener('change', toggleStudentNameField);
	}
</script>
<?php
get_footer();
?>