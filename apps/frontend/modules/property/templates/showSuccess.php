<?php use_stylesheet('property_details')?>
<div class="property-details container">
	<div class="left">
		<section class="gallery">
			<ul class="thumbnails">
			<?php foreach($property->getFileAttachments() as $image): ?>
				<li>
					<figure class="thumbnail">
						<div class="mask">
							<img src="<?php echo url_for('render_attachment', array('sf_subject' => $image, 'thumbnail' => FileAttachmentPeer::SIZE_SMALL))?>" />
						</div>
					</figure>
				</li>
			<?php endforeach; ?>
			</ul>
			<figure class="pic">
				<div class="mask">
					<img src="<?php echo url_for('render_attachment', array('sf_subject' => $property->getRandomFileAttachment(), 'thumbnail' => FileAttachmentPeer::SIZE_BIG))?>" />
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
                <?php foreach(PropertyPeer::doSelect(new Criteria()) as $p): ?>
		    	<article class="rental">
                    <figure class="thumbnail">
                        <div class="mask">
                            <img src="<?php echo url_for('render_attachment', array('sf_subject' => $p->getRandomFileAttachment(), 'thumbnail' => FileAttachmentPeer::SIZE_SMALL))?>" />
                        </div>
                    </figure>
                    <h3><?php echo $p->getName() ?></h3>
                    <meter class="surface"><?php echo sprintf('%dm²', $p->getSurface()) ?></meter>
                    <address class="location"><?php echo $p->getLocation() ?></address>
                </article>
            <?php endforeach; ?>
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
