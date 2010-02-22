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
    </div>
</div>
