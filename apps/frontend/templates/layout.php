<?php use_javascript('in-widget-labels') ?>
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
			<a href="<?php echo url_for('homepage')?>" title="Citad'in">
				<figure class="logo">Citad'in</figure>
			</a>			
    		<?php if($sf_user->hasFlash('notification')): ?>
			<div class="notification"><?php echo $sf_user->getFlash('notification') ?></div>
			<?php endif; ?>
			<nav><ul>
				<li class="left"></li>
				<li><a href="<?php echo url_for('homepage')?>">Accueil</a></li>
				<li class="separator"></li>
				<li><a href="<?php echo url_for('@show_search_panel')?>">Rechercher un bien</a></li>
				<li class="separator"></li>
				<li><a href="<?php echo url_for('@show_submit_property_panel') ?>">Proposer un bien</a><li>
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
		            <label>Sélectionner</label>
                    <?php echo $manual_search_form['type']->render() ?>
	            </fieldset>

	            <fieldset class="right">
		            <label>Situé à</label>
                    <?php echo $manual_search_form['location']->render(array('size' => 12)) ?>
	            </fieldset>

	            <fieldset class="topspace left">
	                <h4>Catégorie</h4>
                    <?php echo $manual_search_form['category']->render(array('class' => 'fullwidth')) ?>
	            </fieldset>

	            <fieldset class="topspace right">
	                <h4>Nombre de pièces</h4>
                    <?php echo $manual_search_form['rooms']->render(array(
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
            <?php $assisted_search_form = $sf_user->getAssistedSearchRequest() ?>
            <form class="assisted_search in_widget_labels <?php $assisted_search_form->isBound() or print('unbound')?>" method="post" action="<?php echo url_for('@send_assisted_search_request')?>">
                <h2>Recherche assistée</h2>
                <p class="help">Nos chasseurs immobiliers peuvent également vous accompagner dans une recherche personnalisée et adaptée à vos besoins. Remplissez le formulaire ci dessous et nous vous contacterons au plus vite.</p>
                <fieldset class="left">
                    <?php echo $assisted_search_form['name'] ?>
                    <?php echo $assisted_search_form['contact'] ?>
                    <?php echo $assisted_search_form['message'] ?>
                    <input type="submit" class="submit" value="Envoyer"/>
                </fieldset>
            </form>
        </div>
    </div>
    <div class="submit_property_form_wrapper <?php $sf_request->getParameter('show_submit_property_panel') and print('visible')?>">
        <div class="submit_property_form">
            <?php $submit_property_form = $sf_user->getDirectoryAdditionRequest() ?>
            <form class="submit_property in_widget_labels <?php $submit_property_form->isBound() or print('unbound')?>" method="post" action="<?php echo url_for('@submit_property')?>">
                <h2>Proposer un bien</h2>
                <p class="help">Vous souhaitez faire apparaitre votre bien immobilier dans notre catalogue ? Remplissez le formulaire ci-dessous et nous vous contacterons au plus vite</p>
                <fieldset class="left">
                    <?php echo $submit_property_form['name'] ?>
                    <?php echo $submit_property_form['contact'] ?>
                    <?php echo $submit_property_form['message'] ?>
                    <input type="submit" class="submit" value="Envoyer"/>
                </fieldset>
            </form>
        </div>
    </div>
		<?php echo $sf_content ?>
    <footer>
	    <figure class="logo">Citad'in</figure>
		<nav><ul>
				<li><a href="<?php echo url_for('homepage')?>">Accueil</a></li>
				<li><a href="<?php echo url_for('@show_search_panel')?>">Rechercher un bien</a></li>
				<li><a href="">Proposer un bien</a></li>
				<li><a href="<?php echo url_for('contact') ?>">Contact</a></li>
			</ul></nav>
    </footer>
</body>
</html>
