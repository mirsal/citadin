<?php use_stylesheet('property_list')?>

<?php slot('head') ?>
<link rel="canonical" href="<?php echo url_for('property_index') ?>" />
<?php end_slot() ?>

<div class="property-filters-container">
	<form class="filter" method="post" action="<?php echo url_for('@property_index')?>">
	    <?php echo $filters->renderGlobalErrors() ?>
        <ul class="filters">
	    <?php foreach($filters as $filter_name => $filter): ?>
		    <li class="<?php !in_array($filter_name, $sf_user->getAttribute('visible_filters', array())) and print('hidden')?>">
		        <fieldset class="filter">
		            <span class="name"><?php echo $filter->renderLabel() ?></span>
                    <?php echo str_replace('<br />', '', $filter->render()) ?>
                    <a class="delete-filter" href="<?php echo(url_for('remove_property_filter', array('filter' => $filter_name))) ?>">Supprimer ce critère</a>
                    <?php echo $filter->renderError() ?>
                </fieldset>
		    </li>
		<?php endforeach; ?>
        <?php if(!$sf_request->getParameter('show_add_filter_form')): ?>
            <li>
                <fieldset class="filter">
                    <span class="name">&nbsp;</span>
                    <a class="add-filter" href="<?php echo url_for('property_index', array('show_add_filter_form' => true)) ?>">Ajouter un critère</a>
                <?php if(count($sf_user->getAttribute('visible_filters', array()))): ?>
                    <input type="submit" value="Rechercher"/>
                <?php endif; ?>
                </fieldset>
            </li>
        <?php endif; ?>
	    </ul>
    </form>
	<span class="help">
        <?php if($sf_request->getParameter('show_add_filter_form')): ?>
        <?php $add_filter_form = new AddPropertyFilterForm() ?>
        Choisissez le critère à ajouter:
        <form class="add_filter" action="<?php echo url_for('@add_property_filter') ?>" method="post">
            <?php echo $add_filter_form['filter'] ?>
            <input type="submit" value="Ajouter">
            <a href="<?php echo url_for('@property_index') ?>">Annuler</a>
        </form>
        <?php else: ?>
            Vous pouvez modifier votre recherche en direct grâce aux filtres ci-dessus.
        <?php endif; ?>
    </span>
</div>
<div class="property-list-container">
	<div class="controls">
    	<h2>
    		<span><?php echo 'Résultats de votre recherche' ?> - </span>
            <strong>
                <?php echo sprintf($pager->getNbResults() > 1 ? '%d réponses' : '%d réponse', $pager->getNbResults()) ?>
            </strong>
    	</h2>
        <form class="page-length" method="post", action="<?php echo url_for('@update_property_page_length') ?>">
            <?php echo new PageLengthForm() ?>
            <input type="submit" value="Appliquer" />
    	</form>
    </div>
    <hr />
	<div class="property-list wrapper">
	<?php foreach ($pager->getResults() as $property): ?>
	    <article class="<?php echo $property->getType() === PropertyPeer::TYPE_RENTAL ? 'rental' : 'sale' ?>
	                    <?php $property->isAvailable() and print('available') ?>">
            <figure class="thumbnail">
                <a href="<?php echo url_for('property_show', $property)?>">
                    <div class="mask">
                        <?php $img = $property->getRandomFileAttachment() ?>
                        <img src="<?php if(!is_null($img)) echo url_for('render_attachment', array('sf_subject' => $img, 'thumbnail' => FileAttachmentPeer::SIZE_MEDIUM))?>" />
                        <div class="overlay"></div>
                    </div>
                </a>
            </figure>
    		<h3>
    			<a href="<?php echo url_for('property_show', $property)?>"><?php echo $property->getName()?></a>
    		</h3>
	    	<meter class="surface"><?php echo sprintf('%dm²', $property->getSurface()) ?></meter>
	    	<address class="location"><?php echo $property->getLocation() ?></address>
            <meter class="price"><?php echo sprintf('%d€ CC', $property->getPrice()) ?></meter>
	    </article>
	<?php endforeach; ?>
	</div>
</div>
