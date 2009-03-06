<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>J's Bar</title>
        <link rel="stylesheet" href="/assets/css/admin/main.php" type="text/css">
		<!-- TinyMCE -->
			<script type="text/javascript" src="/assets/js/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
			<script type="text/javascript">
				tinyMCE.init({
					mode : "textareas",
					theme : "advanced",
					content_css : "/assets/css/tinymce/content.css",
					theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,sup,sub,|,undo,redo,|,bullist,numlist,|,image,anchor,|,styleselect,formatselect",
					theme_advanced_buttons2 : "",
					theme_advanced_buttons3 : ""
				});
			</script>
		<!-- /TinyMCE -->
    </head>
    <body id="<?php echo uri::segment(1, 'home'); ?>">

		<div id="wrapper">
			
			<div id="header">
				<h1>
					Administration
				</h1>
				<ul id="menu">
					<?php
						foreach ($menu as $link => $title) {
							$class = ('/admin/'.uri::segment(2).'/' == $link) ? ' class="current"' : '';
							echo "<li><a $class href=\"$link\">$title</a></li>";
						}
					?>
				</ul>
			</div>
			
			<div id="content">
				<?php echo $content; ?>
			</div>
			
		</div>
	
    </body>
</html>
