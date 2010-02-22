<?php foreach ($property->getFileAttachments() as $attachment): ?>
    <?php echo image_tag(url_for('render_attachment', $attachment)) ?>
<?php endforeach; ?>
