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
				<li><a href="#">Accueil</a></li>
				<li><a href="#">Recherche manuelle</a></li>
				<li><a href="#">Recherche assistée</a></li>
				<li><a href="#">Contact</a></li>
				<li class="form">
					<form>
						<span class="left"></span>
						<input type="text" class="searchfield" size="10" />
						<span class="right"></span>
						<div class="reset"></div>
					</form>
				</li>
				<li class="right"></li>
			</ul></nav>
		</div>
	</header>
	<div class="separator"></div>
	<div class="wrapper">
		<div class="content_left"></div>
		<div class="content">
    		<?php echo $sf_content ?>
    	</div>
    	<div class="content_right"></div>
    </div>
    <div class="sub_content">
    	<div class="wrapper">
	    	<h2>Derniers ajouts</h2>
	    	<article>
	    		<figure class="thumbnail"></figure>
	    		<h3>T3</h3>
	    		<meter class="surface">75m2</meter>
	    		<address class="location">LYON 03</address>
	    	</article>
    	</div>
    </div>
    <footer>
	    <figure class="logo">Citad'in</figure>
		<nav><ul>
				<li><a href="#">Accueil</a></li>
				<li><a href="#">Recherche manuelle</a></li>
				<li><a href="#">Recherche assistée</a></li>
				<li><a href="#">Contact</a></li>
			</ul></nav>
    </footer>
</body>
</html>
