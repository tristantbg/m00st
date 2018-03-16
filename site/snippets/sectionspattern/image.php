<?php
	$image = $data->content()->toFile();
	$height = $data->height();
	$imagesize = $data->imagesize();
	$contain = $data->contain()->bool();
	$srcset = '';
	for ($i = 500; $i <= 2000; $i += 500) $srcset .= $image->width($i)->url() . ' ' . $i . 'w,';
?>
<div class="slide middle-align">
	<div class="image-content solo patternify<?php e($imagesize == 'full', ' full') ?>"  
	<?php if($imagesize == 'custom'): ?>
		style="height: <?= $height ?>%;"
	<?php endif ?>>
	<img 
	src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" 
	data-src="<?= $image->width(1500)->url() ?>" 
	data-srcset="<?= $srcset ?>" 
	data-sizes="auto" 
	data-optimumx="1.5" 
	alt="<?= $caption ?>" 
	class="lazyimg" 
	height="100%" width="auto">
	<?php if($seo): ?>
	<noscript>
		<img src="<?= $image->width(1500)->url() ?>" alt="<?= $caption ?>" height="100%" width="auto" />
	</noscript>
	<?php endif ?>
	</div>
</div>