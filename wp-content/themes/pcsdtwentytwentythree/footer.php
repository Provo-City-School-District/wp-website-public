<footer id="mainFooter">
	<section class="footerMenu">
		<ul class="footerMenu">
			<li><a href="https://provo.edu/notice-of-non-discrimination/">Notice of Non-Discrimination & Accessibility</a> | </li>
			<li><a href="/website-feedback/">Help us improve our website</a> | </li>
			<li><a href="https://usbe.az1.qualtrics.com/jfe/form/SV_3eLYRHTJ6wVdzYq">Public Education Hotline Report a Concern Form</a></li>
		</ul>
	</section>
</footer>
<?php wp_footer(); ?>
<?php

if (is_page('search-results')) {
?>
	<!-- <script type="text/javascript" src="//customer.cludo.com/scripts/bundles/search-script.min.js"></script> -->
	<script>
		var CludoSearch;
		(function() {
			var cludoSettings = {
				customerId: 10000352,
				engineId: 10000520,
				// searchUrl: 'https://provo.edu/search-results/',
				searchUrl: 'https://provo.edu/search-results/',
				language: 'en',
				searchInputs: ['cludo-search-form'],
				template: 'StandardInlineImages',
				type: 'inline'
			};
			CludoSearch = new Cludo(cludoSettings);
			CludoSearch.init();
		})();
	</script>
	<!--[if lte IE 9]>
	<script src="https://api.cludo.com/scripts/xdomain.js" slave="https://api.cludo.com/proxy.html" type="text/javascript"></script>
	<![endif]-->
<?php
}
?>
</body>