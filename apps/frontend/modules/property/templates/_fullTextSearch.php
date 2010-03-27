<form action="<?php echo $sf_request->getUri() ?>" method="post">
	<span class="left"></span>
	<input type="text" class="searchfield" size="10" name="query" />
	<span class="right"></span>
	<div class="reset"></div>
</form>

<?php if($properties): ?>
	<ul class="results">
	<?php foreach($properties as $property): ?>
		<li><?php echo $property ?></li>		
	<?php endforeach; ?>
	</ul>
<?php endif; ?>