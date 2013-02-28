<html>
<head></head>
<body>
	<h1>This is the error handling page</h1>
	<?php 

		if (SITE_STATUS == 'PRODUCTION') {
			echo '<p><strong>404: Page not found</strong> Whoops we couldn\'t find this page.</p>';
		} else if ($errorHTML) {
			echo $errorHTML;
		} else {
			echo '<p><strong>Site Error</strong> Something was borked when loading this page (check the url spelling)</p>';
		}
		
	?>
</body>
</html>