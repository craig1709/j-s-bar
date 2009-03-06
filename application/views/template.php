<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>J's - Oswestry Coffee Bar, Wine Bar and Night Club</title>
        <link rel="stylesheet" href="/assets/css/main.php" type="text/css">
		<script type="text/javascript" src="/assets/js/mootools.js"></script>
		<script type="text/javascript" src="/assets/js/slimbox.js"></script>

    </head>
    <body id="<?php echo uri::segment(1, 'home'); ?>">

		<div id="wrapper">
			
			<div id="header">
				<h1>
					<a href="/home/"><img src="/images/logo_96.png" alt="J's"></a>
					Coffee Bar &bull; Wine Bar &bull; Night Club
				</h1>
			</div>
			
			<ul id="menu">
			<?php
				foreach ($menu as $link => $title) {
					$class = (uri::segment(1, 'home') == $link) ? ' class="current"' : '';
					if ($submenu_parent !== NULL) {
						$class = ($link == $submenu_parent) ? ' class="current"' : '';
					}
					echo '<li><a'.$class.' href="/'.$link.'/">'.$title.'</a></li>';
				}
			?>
			</ul>
			
			<?php
				if ($submenu !== NULL) {
					echo '<ul id="submenu">';
						foreach ($submenu as $item) {
							$class = (uri::segment(1, 'home') == $item['link']) ? ' class="current"' : '';
							echo '<li><a'.$class.' href="/'.$item['link'].'/">'.$item['title'].'</a></li>';
						}
					echo '</ul>';
				}
			?>
			
			<div id="content">
				<?php echo $content; ?>
			</div>
			
			<div id="footer">
				<p><strong>Tel:</strong> 01691 676476 - <strong>Bookings:</strong> <a href="mailto:js@btconnect.com">js-bar@btconnect.com</a></p>
				<p><strong>Address:</strong> 1 Castle Court, Oswestry, SY11 1PX</p>
				<p>&copy; 2008 Jason Pierpoint. <a href="/admin/">Administration</a></p>
			</div>
			
		</div>
	
    </body>
</html>
