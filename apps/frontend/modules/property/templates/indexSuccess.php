<?php use_stylesheet('property_list')?>
<div class="property-filters-container">
	<ul class="filters">
		<li>
			<form class="filter">
				<span class="name">Nombre de pièces</span> 
				<input type="text" /> 
			</form>
		</li>
		<li>
			<form class="filter">
				<span class="name">Prix</span>
				<input type="text" /> 
			</form>
		</li>
		<li>
			<form class="filter">
				<span class="name">Lieu</span>
				<input type="text" />
				<a class="add-filter">Cliquez pour ajouter un filtre</a>
			</form>
		</li>
	</ul>
	<span class="help"><?php echo 'Vous pouvez modifier votre recherche en direct grâce aux filtres ci-dessus.' ?></span>
</div>
<div class="property-list-container">
	<div class="controls">
    	<h2>
    		<span><?php echo 'Résultats de votre recherche' ?> - </span>
    		<?php $properties_count = count($properties) ?>
    		<strong><?php echo sprintf($properties_count > 1 ? '%d réponses' : '%d réponse', $properties_count) ?></strong>
    	</h2>
    	<form class="page-length">
    		<label>Nombre de résultats par page</label>
    		<select>
    			<option>12</option>
    		</select>
    	</form>
    </div>
    <hr />
	<div class="property-list wrapper">
	<?php foreach ($properties as $property): ?>
	    <article class="rental">
	    	<figure class="thumbnail"></figure>
    		<h3>
    			<a href="<?php echo url_for('property_show', $property)?>"><?php echo $property->getName()?></a>
    		</h3>
	    	<meter class="surface"><?php echo sprintf('%dm²', $property->getSurface()) ?></meter>
	    	<address class="location"><?php echo $property->getLocation() ?></address>
	    </article>
	<?php endforeach; ?>
	</div>
</div>