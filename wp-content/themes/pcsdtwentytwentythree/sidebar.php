<aside id="rightSidebar" class="rightSidebar">
	<?php
	$sidebar = get_field('sidebar');
	if ($sidebar) {
		switch ($sidebar) {
			case 'categories':
				$page_id = 123; // Replace with the actual page ID for Business
				break;
			case 'business-finance':
				$page_id = 123; // Replace with the actual page ID for Business
				break;
			case 'childNutrition':
				$page_id = 124; // Replace with the actual page ID for Child Nutrition
				break;
			case 'constructionSidbar':
				$page_id = 125; // Replace with the actual page ID for Construction Projects
				break;
			case 'counseling':
				$page_id = 126; // Replace with the actual page ID for Counseling
				break;
			case 'cte':
				$page_id = 127; // Replace with the actual page ID for CTE
				break;
			case 'demographics':
				$page_id = 128; // Replace with the actual page ID for Demographics
				break;
			case 'eastbay':
				$page_id = 129; // Replace with the actual page ID for East Bay Post High
				break;
			case 'eschool':
				$page_id = 130; // Replace with the actual page ID for eSchool
				break;
			case 'employment':
				$page_id = 131; // Replace with the actual page ID for Employment Opportunities
				break;
			case 'foundation':
				$page_id = 132; // Replace with the actual page ID for Provo Foundation
				break;
			case 'humanResources':
				$page_id = 133; // Replace with the actual page ID for Human Resources
				break;
			case 'maint':
				$page_id = 134; // Replace with the actual page ID for Maintenance
				break;
			case 'nurses':
				$page_id = 135; // Replace with the actual page ID for Nurse
				break;
			case 'officeDirectory':
				$page_id = 136; // Replace with the actual page ID for Office Directory
				break;
			case 'pae':
				$page_id = 137; // Replace with the actual page ID for Provo Adult Education
				break;
			case 'policiesSidebar':
				$page_id = 138; // Replace with the actual page ID for Policies
				break;
			case 'preschool':
				$page_id = 139; // Replace with the actual page ID for PreSchool
				break;
			case 'prSidebar':
				$page_id = 140; // Replace with the actual page ID for Public Relations
				break;
			case 'SchoolBoard':
				$page_id = 141; // Replace with the actual page ID for School Board
				break;
			case 'schools':
				$page_id = 142; // Replace with the actual page ID for Schools Listing
				break;
			case 'spanishpoliciesSidebar':
				$page_id = 143; // Replace with the actual page ID for Spanish Policies Sidebar
				break;
			case 'specialEd':
				$page_id = 144; // Replace with the actual page ID for Special Education
				break;
			case 'studentServices':
				$page_id = 145; // Replace with the actual page ID for Student Services
				break;
			case 'teachingLearning':
				$page_id = 146; // Replace with the actual page ID for Teaching & Learning
				break;
			case 'titlei':
				$page_id = 79815; // Replace with the actual page ID for Title I
				break;
			case 'transportation':
				$page_id = 148; // Replace with the actual page ID for Transportation
				break;
			case 'superintendent':
				$page_id = 149; // Replace with the actual page ID for Superintendent
				break;
			case 'peachjar':
				$page_id = 150; // Replace with the actual page ID for Peachjar
				break;
			case 'initiative':
				$page_id = 151; // Replace with the actual page ID for Provo Way Innovative Learning Initiative
				break;
			case 'school-fees':
				$page_id = 152; // Replace with the actual page ID for School Fees
				break;
			case 'studentDataPrivacy':
				$page_id = 153; // Replace with the actual page ID for Student Data Privacy
				break;
			case 'camp':
				$page_id = 154; // Replace with the actual page ID for Camp Big Springs
				break;
			case 'equity':
				$page_id = 155; // Replace with the actual page ID for Equity & Diversity
				break;
			case 'tech':
				$page_id = 156; // Replace with the actual page ID for Technology
				break;
			case 'covid':
				$page_id = 157; // Replace with the actual page ID for Coronavirus
				break;
			case 'SealOfBiliteracy':
				$page_id = 158; // Replace with the actual page ID for Seal of Biliteracy
				break;
			case 'ctecaps':
				$page_id = 159; // Replace with the actual page ID for CTE CAPS
				break;
			default:
				$page_id = null; // Default case if no match is found
				break;
		}
		// Display the content of the selected page
		if ($page_id) {
			$page = get_post($page_id);
			if ($page) {
				echo do_shortcode(apply_filters('the_content', $page->post_content));
			} else {
				echo '<p>Page not found.</p>';
			}
		} else {
			echo '<p>No content available for this sidebar.</p>';
		}
	}
	?>
</aside>