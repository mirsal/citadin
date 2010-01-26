<?php use_stylesheet('property_details')?>
<div class="property-details container">
	<div class="left">
		<section class="gallery">
			<ul class="thumbnails">
				<li>
					<figure class="thumbnail">
						<div class="mask">
							<img src="http://www.moneywalks.com/wp-content/uploads/2007/06/real-estate-2.jpg" />
						</div>
					</figure>
				</li>
				<li>
					<figure class="thumbnail">
						<div class="mask">
							<img src="http://www.shubhkriti.net/images/palm-beach-real-estate.jpg" />
						</div>
					</figure>
				</li>
				<li>
					<figure class="thumbnail">
						<div class="mask">
							<img src="http://www.adamcoupe.com/resource/dynamic/image/portfolio_entry/358/lara_croft_interior_1/128x128/lara_croft_interior_1.jpg" />
						</div>
					</figure>
				</li>
			</ul>
			<figure class="pic">
				<div class="mask">
					<img src="http://api.ning.com/files/I8T04TMPt7cL8Mqa31SFXF1ne2z1yu79fvPuH-54KglKjv7CQ5cwxe5ta2*PaVWgdIGGzSDGgs34WVcitQSeSRhOOsPVhLEw/RealEstate.jpg" />
				</div>
				<hgroup>
					<?php echo sprintf('%d €', $property->getPrice())?> - 
					<?php echo $property->getName() ?> - 
					<?php echo $property->getLocation() ?>
				</hgroup>
			</figure>
		</section>
		<section class="sub">
		   	<div class="property-list wrapper">
		    	<h2>Biens similaires</h2>
		    	<article class="rental">
		    		<figure class="thumbnail"></figure>
		    		<h3>T3</h3>
		    		<meter class="surface">75m2</meter>
		    		<address class="location">LYON 03</address>
		    	</article>
		    	<article class="sale">
		    		<figure class="thumbnail"></figure>
		    		<h3>T3</h3>
		    		<meter class="surface">75m2</meter>
		    		<address class="location">LYON 03</address>
		    	</article>
		    	<article class="rental">
		    		<figure class="thumbnail"></figure>
		    		<h3>T3</h3>
		    		<meter class="surface">75m2</meter>
		    		<address class="location">LYON 03</address>
		    	</article>
		    	<article class="sale">
		    		<figure class="thumbnail"></figure>
		    		<h3>T3</h3>
		    		<meter class="surface">75m2</meter>
		    		<address class="location">LYON 03</address>
		    	</article>
		    	<article class="rental">
		    		<figure class="thumbnail"></figure>
		    		<h3>T3</h3>
		    		<meter class="surface">75m2</meter>
		    		<address class="location">LYON 03</address>
		    	</article>
	    	</div>
	    	<a class="more">Plus de biens similaires</a>
		</section>
	</div>
	<aside>
		<details class="attributes">
			<ul class="attribute-group">
				<li>
					<strong class="attribute-name">Ville</strong>
					<span class="attribute-value"><?php echo $property->getLocation() ?></span>
				</li>
				<li>
					<strong class="attribute-name">Nature du bien</strong>
					<span class="attribute-value"><?php echo $property->getName() ?></span>
				</li>
			</ul>
			<ul class="attribute-group">
			<?php foreach($property->getMetadataFields() as $k => $v): ?>
				<li>
					<strong class="attribute-name"><?php echo $k ?></strong>
					<span class="attribute-value"><?php echo $v ?></span>
				</li>
			<?php endforeach;?>
			</ul>
		</details>
	<?php if($description = $property->getDescription()): ?>
		<details class="description">
			<p><?php echo $description ?></p>
		</details>
	<?php endif;?>
	</aside>
</div>