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
				<li><a href="<?php echo url_for('property_index')?>">Rechercher un bien</a></li>
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
    <div class="search_form_wrapper">
        <div class="search_form">
            <form class="manual_search">
            <h2>Recherche Manuelle</h2>
	            <fieldset class="left">
		            <label>Type de Bien</label>
		            <select>
			            <option>Vente</option>
			            <option>Location</option>
		            </select>
	            </fieldset>

	            <fieldset class="right">
		            <label>Nombre de pièces</label>
		            <input type="text" size="3" />
	            </fieldset>

	            <fieldset class="left">
		            <label>Situé à</label>
		            <input type="text" size="12" />
	            </fieldset>

	            <fieldset class="right">
		            <label>Nombre de chambres</label>
		            <input type="text" size="3" />
	            </fieldset>

	            <fieldset class="topspace left">
		            <h4>Budget (&euro;)</h4>
		            <label>Min</label>
		            <input type="text" size="4" />
		            <label>Max</label>
		            <input type="text" size="4" />
	            </fieldset>

	            <fieldset class="topspace right">
		            <h4>Surface (m²)</h4>
		            <label>Min</label>
		            <input type="text" size="4"/>
		            <label>Max</label>
		            <input type="text" size="4" />
	            </fieldset>

	            <input type="submit" class="submit" value="Lancer la recherche" />
            </form>
            <form class="assisted_search">
                <h2>Recherche assistée</h2>
                <p class="help">Nos conseillers peuvent rechercher gratuitement un bien pour vous. Remplissez le formulaire ci-dessous et nous vous contacterons avec nos résultats</p>
                <fieldset class="left">
                    <input type="text" value="Votre nom" />
                    <input type="text" value="Votre adresse e-mail" />
                    <textarea>Décrivez ce que vous recherchez, nous nous occupons du reste</textarea>
                    <input type="submit" class="submit" />
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
