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
	<div class="container_12">
		<header>
			<div class="wrapper">
				<figure class="logo">Citad'in</figure>
				<nav><ol>
					<li><a href="#">Accueil</a></li>
					<li><a href="#">Recherche manuelle</a></li>
					<li><a href="#">Recherche assistée</a></li>
					<li><a href="#">Contact</a></li>
					<li><form><input type="text" /></form></li>
				</ol></nav>
			</div>
		</header>
	    <?php echo $sf_content ?>
	    <footer>
	    	<h2>Derniers ajouts</h2>
	    	<article>
	    		<figure class="thumbnail"></figure>
	    		<h3>T3</h3>
	    		<meter class="surface">75m2</meter>
	    		<address class="location">LYON 03</address>
	    	</article>
	    </footer>
    </div>
</body>
</html>
