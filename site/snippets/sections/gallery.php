<?php foreach ($data->content()->yaml() as $key => $file): ?>
<?php if($image = $project->image($file)): ?>
<?php
	$srcset = '';
	for ($i = 500; $i <= 2000; $i += 500) $srcset .= $image->width($i)->url() . ' ' . $i . 'w,';
?>
<div class="slide middle-align">
	<div class="image-content solo gallery patternify">
	<img 
	src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" 
	data-src="<?= $image->width(1500)->url() ?>" 
	data-srcset="<?= $srcset ?>" 
	data-sizes="auto" 
	data-optimumx="1.5" 
	alt="<?= $caption ?>" 
	class="lazyimg" 
	height="100%" width="auto">
	<div class="lsd">
		<img 
		src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" 
		data-src="<?= $image->width(1500)->url() ?>" 
		data-srcset="<?= $srcset ?>" 
		data-sizes="auto" 
		data-optimumx="1.5" 
		alt="<?= $caption ?>" 
		class="lazyimg" 
		height="100%" width="auto">
	</div>
	<?php if($seo): ?>
	<noscript>
		<img src="<?= $image->width(1500)->url() ?>" alt="<?= $caption ?>" height="100%" width="auto" />
	</noscript>
	<?php endif ?>
	</div>
</div>
<?php endif ?>
<?php endforeach ?>