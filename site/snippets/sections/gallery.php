<?php foreach ($data->content()->yaml() as $key => $file): ?>
<?php if($image = $project->image($file)): ?>
<?php
	$srcset = '';
	for ($i = 500; $i <= 2000; $i += 500) $srcset .= resizeOnDemand($image, $i) . ' ' . $i . 'w,';
?>
<div class="slide middle-align">
	<div class="image-content solo gallery patternify">
	<img 
	src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" 
	data-src="<?= resizeOnDemand($image, 1500) ?>" 
	data-srcset="<?= $srcset ?>" 
	data-sizes="auto" 
	data-optimumx="1.5" 
	alt="<?= $caption ?>" 
	class="lazyimg" 
	height="100%" width="auto">
	<?php if($seo): ?>
	<noscript>
		<img src="<?= resizeOnDemand($image, 1500) ?>" alt="<?= $caption ?>" height="100%" width="auto" />
	</noscript>
	<?php endif ?>
	</div>
</div>
<?php endif ?>
<?php endforeach ?>