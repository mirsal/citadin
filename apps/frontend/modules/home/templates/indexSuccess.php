<?php use_stylesheet('homepage') ?>
<div class="home-page container">
	<div class="banner">
		<div class="shadow_left"></div>
		<div class="content"></div>
    	<div class="shadow_right"></div>
    </div>
    <div class="sub_content">
    	<div class="property-list wrapper">
	    	<h2>Derniers Ajouts</h2>
            <?php foreach(PropertyPeer::getLastProperties(10) as $p): ?>
		    	<article class="rental">
                    <figure class="thumbnail">
                        <a href="<?php echo url_for('property_show', $p) ?>">
                            <div class="mask">
                                <img src="<?php echo url_for('render_attachment', array('sf_subject' => $p->getRandomFileAttachment(), 'thumbnail' => FileAttachmentPeer::SIZE_SMALL))?>" />
                            </div>
                        </a>
                    </figure>
                    <h3><a href="<?php echo url_for('property_show', $p) ?>"><?php echo $p->getName() ?></a></h3>
                    <meter class="surface"><?php echo sprintf('%dm²', $p->getSurface()) ?></meter>
                    <address class="location"><?php echo $p->getLocation() ?></address>
                    <meter class="price"><?php echo sprintf('%d€ CC', $p->getPrice()) ?></meter>
                </article>
            <?php endforeach; ?>
    	</div>
    </div>
</div>
