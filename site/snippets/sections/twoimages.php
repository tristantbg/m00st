<?php
//image 1
	$image1 = $data->content1()->toFile();
	$size1 = $data->size1();
	$srcset1 = '';
	for ($i = 500; $i <= 2000; $i += 500) $srcset1 .= resizeOnDemand($image1, $i) . ' ' . $i . 'w,';
//image 2
	$image2 = $data->content2()->toFile();
	$size2 = $data->size2();
	$srcset2 = '';
	for ($i = 500; $i <= 2000; $i += 500) $srcset2 .= resizeOnDemand($image2, $i) . ' ' . $i . 'w,';
?>
<div class="slide">
	<div class="two-images-content patternify">
		<div class="image-content half<?php e($size1 == 'full', ' full', ' contain') ?>">
			<img 
			src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" 
			data-src="<?= resizeOnDemand($image1, 1500) ?>" 
			data-srcset="<?= $srcset1 ?>" 
			data-sizes="auto" 
			data-optimumx="1.5" 
			alt="<?= $caption ?>" 
			class="lazyimg" 
			height="100%" width="auto">
			<?php if($seo): ?>
			<noscript>
				<img src="<?= resizeOnDemand($image1, 1500) ?>" alt="<?= $caption ?>" height="100%" width="auto" />
			</noscript>
			<?php endif ?>
		</div>
		<div class="image-content half<?php e($size2 == 'full', ' full', ' contain') ?>">
			<img 
			src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" 
			data-src="<?= resizeOnDemand($image2, 1500) ?>" 
			data-srcset="<?= $srcset2 ?>" 
			data-sizes="auto" 
			data-optimumx="1.5" 
			alt="<?= $caption ?>" 
			class="lazyimg" 
			height="100%" width="auto">
			<?php if($seo): ?>
			<noscript>
				<img src="<?= resizeOnDemand($image2, 1500) ?>" alt="<?= $caption ?>" height="100%" width="auto" />
			</noscript>
			<?php endif ?>
		</div>
	</div>
</div>