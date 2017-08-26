<?php $newslide = 0 ?>
<?php foreach ($images as $key => $file): ?>
<?php if($image = $project->image($file)): ?>
<div class="thumbnail<?php e($newslide == 0 or $lazygallery, ' newslide') ?>">
	<a href="<?= $project->url() ?>" 
	data-anchor="<?= $project->uid() ?>" 
	data-slide="<?= $slide ?>" 
	data-target="project">
		<img 
		src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" 
		data-srcset="<?= resizeOnDemand($image, 200) ?> 200w, <?= resizeOnDemand($image, 500) ?> 500w, <?= resizeOnDemand($image, 700) ?> 700w" 
		data-src="<?= resizeOnDemand($image, 500) ?>" 
		data-sizes="auto" 
		data-optimumx="1.5" 
		class="lazyimg lazyload" 
		height="150" width="auto">
	</a>
	<div class="slide-number"></div>
	
</div>
<?php $newslide++ ?>
<?php endif ?>
<?php if($lazygallery) $slide++ ?>
<?php endforeach ?>