<?php use_stylesheet('main') ?>
<?php use_stylesheet('layout')?>
<?php use_stylesheet('backend')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />

<!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lte IE 7]>
	<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE8.js" type="text/javascript"></script><![endif]-->
</head>

<body>
	<header>
		<div class="wrapper">
			<figure class="logo">Citad'in</figure>
			<nav><ul>
				<li class="left"></li>
				<li><a href="<?php echo url_for('property')?>">Biens</a></li>
				<li class="separator"></li>
				<li><a href="<?php echo url_for('homepage')?>">Clients</a></li>
                <li class="separator"></li>
				<li><a href="<?php echo url_for('homepage')?>">Paramètres avancés</a></li>
				<li class="right"></li>
			</ul></nav>
		</div>
	</header>
	<div class="separator"></div>
		<?php echo $sf_content ?>
    <footer>
	    <figure class="logo">Citad'in</figure>
    </footer>
</body>
</html>
