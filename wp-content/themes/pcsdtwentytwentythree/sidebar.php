<aside id="rightSidebar" class="rightSidebar">
	<?php
	$sidebar = get_field('sidebar');
	if ($sidebar) {
		switch ($sidebar) {
			case 'categories':
				$page_id = 80354;
				break;
			case 'business-finance':
				$page_id = 80356;
				break;
			case 'childNutrition':
				$page_id = 80470;
				break;
			case 'counseling':
				$page_id = 80474;
				break;
			case 'cte':
				$page_id = 80477;
				break;
			case 'demographics':
				$page_id = 80479;
				break;
			case 'eastbay':
				$page_id = 80481;
				break;
			case 'eschool':
				$page_id = 80483;
				break;
			case 'employment':
				$page_id = 80486;
				break;
			case 'foundation':
				$page_id = 80490;
				break;
			case 'humanResources':
				$page_id = 80492;
				break;
			case 'maint':
				$page_id = 80495;
				break;
			case 'nurses':
				$page_id = 80497;
				break;
			case 'officeDirectory':
				$page_id = 80499;
				break;
			case 'pae':
				$page_id = 80501;
				break;
			case 'policiesSidebar':
				$page_id = 80504;
				break;
			case 'preschool':
				$page_id = 80506;
				break;
			case 'prSidebar':
				$page_id = 80510;
				break;
			case 'SchoolBoard':
				$page_id = 80512;
				break;
			case 'spanishpoliciesSidebar':
				$page_id = 80520;
				break;
			case 'specialEd':
				$page_id = 80522;
				break;
			case 'studentServices':
				$page_id = 80524;
				break;
			case 'teachingLearning':
				$page_id = 80526;
				break;
			case 'titlei':
				$page_id = 80528;
				break;
			case 'transportation':
				$page_id = 80530;
				break;
			case 'superintendent':
				$page_id = 80532;
				break;
			case 'peachjar':
				$page_id = 80534;
				break;
			case 'initiative':
				$page_id = 80536;
				break;
			case 'school-fees':
				$page_id = 80538;
				break;
			case 'studentDataPrivacy':
				$page_id = 80540;
				break;
			case 'camp':
				$page_id = 80542;
				break;
			case 'equity':
				$page_id = 80544;
				break;
			case 'tech':
				$page_id = 80546;
				break;
			case 'covid':
				$page_id = 80548;
				break;
			case 'SealOfBiliteracy':
				$page_id = 80550;
				break;
			case 'ctecaps':
				$page_id = 80552;
				break;
			case 'slateMountain':
				$page_id = 80554;
				break;
			default:
				$page_id = 80354; // Default case if no match is found
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