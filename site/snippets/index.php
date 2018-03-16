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
		data-srcset="<?= $image->width(200)->url() ?> 200w, <?= $image->width(500)->url() ?> 500w, <?= $image->width(700)->url() ?> 700w" 
		data-src="<?= $image->width(500)->url() ?>" 
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