<?php use_stylesheet('property_list')?>
<div class="property-filters-container">
	<form class="filter" method="post" action="<?php echo url_for('@property_index')?>">
        <ul class="filters">
	    <?php foreach($filters as $filter_name => $filter): ?>
		    <li class="<?php !in_array($filter_name, $sf_user->getAttribute('visible_filters', array())) and print('hidden')?>">
		        <fieldset class="filter">
		            <span class="name"><?php echo $filter->renderLabel() ?></span>
                    <?php echo $filter ?>
                </fieldset>
		    </li>
		<?php endforeach; ?>
            <li>
                <fieldset class="filter">
                    <span class="name">&nbsp;</span>
                    <a class="add-filter" href="#">Ajouter un filtre</a>
                <?php if(count($sf_user->getAttribute('visible_filters', array()))): ?>
                    <input type="submit" value="Rechercher"/>
                <?php endif; ?>
                </fieldset>
            </li>
	    </ul>
    </form>
	<span class="help"><?php echo 'Vous pouvez modifier votre recherche en direct grâce aux filtres ci-dessus.' ?></span>
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
	    <article class="rental">
            <figure class="thumbnail">
                <a href="<?php echo url_for('property_show', $property)?>">
                    <div class="mask">
                        <img src="<?php echo url_for('render_attachment', array('sf_subject' => $property->getRandomFileAttachment(), 'thumbnail' => FileAttachmentPeer::SIZE_MEDIUM))?>" />
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
