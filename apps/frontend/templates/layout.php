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
				<li><a href="<?php echo url_for('homepage')?>">Accueil</a></li>
				<li class="separator"></li>
				<li><a href="<?php echo url_for('@show_search_panel')?>">Rechercher un bien</a></li>
				<li class="separator"></li>
				<li><a href="">Proposer un bien</a><li>
				<li class="separator"></li>
				<li><a href="<?php echo url_for('contact') ?>">Qui sommes-nous ?</a></li>
				<li class="separator"></li>
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
    <div class="search_form_wrapper <?php $sf_request->getParameter('show_search_panel') and print('visible')?>">
        <div class="search_form">
            <?php $manual_search_form = $sf_user->getPropertyFilters(); ?>
            <form class="manual_search" method="post" action="<?php echo url_for('property_index', array('reset_filters' => true))?>">
            <h2>Recherche Manuelle</h2>
	            <fieldset class="left">
		            <label>Type de Bien</label>
                    <?php echo $manual_search_form['type']->render() ?>
	            </fieldset>

	            <fieldset class="right">
		            <label>Situé à</label>
                    <?php echo $manual_search_form['location']->render(array('size' => 12)) ?>
	            </fieldset>

	            <fieldset class="topspace left">
	                <h4>Nombre de pièces</h4>
                    <?php echo $manual_search_form['rooms']->render(array(
                        'from' => array('size' => 4),
                        'to' => array('size' => 4)
                    )) ?>
	            </fieldset>

	            <fieldset class="topspace right">
	                <h4>Nombre de chambres</h4>
                    <?php echo $manual_search_form['bedrooms']->render(array(
                        'from' => array('size' => 4),
                        'to' => array('size' => 4)
                    )) ?>
	            </fieldset>

	            <fieldset class="topspace left">
		            <h4>Budget (&euro;)</h4>
                    <?php echo $manual_search_form['price']->render(array(
                        'from' => array('size' => 4),
                        'to' => array('size' => 4)
                    )); ?>
	            </fieldset>

	            <fieldset class="topspace right">
		            <h4>Surface (m²)</h4>
                    <?php echo $manual_search_form['surface']->render(array(
                        'from' => array('size' => 4),
                        'to' => array('size' => 4)
                    )); ?>
	            </fieldset>

	            <input type="submit" class="submit" value="Lancer la recherche" />
            </form>
            <form class="assisted_search">
                <h2>Recherche assistée</h2>
                <p class="help">Nos chasseurs immobiliers peuvent également vous accompagner dans une recherche personnalisée et adaptée à vos besoins.<br />Remplissez le formulaire ci-dessous et nous vous contacterons au plus vite.</p>
                <fieldset class="left">
                    <input type="text" value="Votre nom" />
                    <input type="text" value="Votre adresse e-mail" />
                    <textarea>Décrivez ce que vous recherchez, nous nous occupons du reste</textarea>
                    <input type="submit" class="submit" value="Envoyer"/>
                </fieldset>
            </form>
        </div>
    </div>
		<?php echo $sf_content ?>
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
