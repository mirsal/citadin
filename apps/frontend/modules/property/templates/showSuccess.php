<?php use_stylesheet('property_details')?>

<?php slot('head') ?>
<link rel="canonical" href="<?php echo url_for('property_show', $property) ?>" />
<?php end_slot() ?>

<div class="property-details container <?php echo $property->getType() === PropertyPeer::TYPE_RENTAL ? 'rental' : 'sale' ?>">
	<div class="left">
		<section class="gallery">
			<ul class="thumbnails">
			<?php foreach($property->getFileAttachments() as $img): ?>
				<li>
    				<figure class="thumbnail">
				        <a href="<?php echo url_for('property_show', array('sf_subject' => $property, 'image' => $img->getId())) ?>">
    						<div class="mask">
    							<img src="<?php echo url_for('render_attachment', array('sf_subject' => $img, 'thumbnail' => FileAttachmentPeer::SIZE_SMALL))?>" />
    						</div>
    					</a>
					</figure>
				</li>
			<?php endforeach; ?>
			</ul>
			<figure class="pic">
				<div class="mask">
				    <?php $img = isset($image) ? $image : $property->getRandomFileAttachment() ?>
					<img src="<?php if(!is_null($img)) echo url_for('render_attachment', array('sf_subject' => $img, 'thumbnail' => FileAttachmentPeer::SIZE_BIG))?>" />
					<div class="overlay"></div>
				</div>
				<hgroup>
					<?php echo sprintf('%d €', $property->getPrice())?> - 
					<?php echo $property->getName() ?> - 
					<?php echo $property->getLocation() ?>
				</hgroup>
			</figure>
		</section>
		<section class="sub">
	        <?php if($similar_properties = $property->getSimilarProperties()): ?>
		   	<div class="property-list wrapper">
		    	<h2>Biens similaires</h2>
                <?php foreach($property->getSimilarProperties() as $p): ?>
		    	<article class="rental">
                    <figure class="thumbnail">
                        <a href="<?php echo url_for('property_show', $p) ?>">
                            <div class="mask">
                                <?php $img = $p->getRandomFileAttachment(); ?>
                                <img src="<?php if(!is_null($img)) echo url_for('render_attachment', array('sf_subject' => $img, 'thumbnail' => FileAttachmentPeer::SIZE_SMALL))?>" />
                            </div>
                        </a>
                    </figure>
                    <h3><a href="<?php echo url_for('property_show', $p) ?>"><?php echo $p->getName() ?></a>
</h3>
                    <meter class="surface"><?php echo sprintf('%dm²', $p->getSurface()) ?></meter>
                    <address class="location"><?php echo $p->getLocation() ?></address>
                    <meter class="price"><?php echo sprintf('%d€ CC', $p->getPrice()) ?></meter>
                </article>
                <?php endforeach; ?>
	    	</div>
	    	<?php endif; ?>
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
			<?php foreach($property->getMetadataFields(BasePeer::TYPE_FIELDNAME) as $k => $v): ?>
			    <?php if(!is_null($v) and !(is_bool($v) and !$v)): ?>
				<li>
					<strong class="attribute-name"><?php echo PropertyPeer::getFieldLabel($k) ?></strong>
					<span class="attribute-value"><?php echo is_bool($v) ? 'Oui' : $v ?></span>
				</li>
				<?php endif; ?>
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
