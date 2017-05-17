<?php foreach ($images as $key => $file): ?>
<?php if($image = $project->image($file)): ?>
<div class="thumbnail">
	<a href="<?= $project->url() ?>" 
	data-anchor="<?= $project->uid() ?>" 
	data-slide="<?= $slide ?>" 
	data-target="project">
		<img 
		src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" 
		data-src="<?= resizeOnDemand($image, 200) ?>" 
		data-sizes="auto" 
		data-optimumx="1.5" 
		class="lazyimg lazyload" 
		height="auto" width="auto">
	</a>
</div>
<?php endif ?>
<?php if($lazygallery) $slide++ ?>
<?php endforeach ?>