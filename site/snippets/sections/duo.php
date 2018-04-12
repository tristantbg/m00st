<?php
//image 1
	$image1 = $data->content1()->toFile();
	$srcset1 = '';
	for ($i = 500; $i <= 2000; $i += 500) $srcset1 .= $image1->width($i)->url() . ' ' . $i . 'w,';
//image 2
	$image2 = $data->content2()->toFile();
	$srcset2 = '';
	for ($i = 500; $i <= 2000; $i += 500) $srcset2 .= $image2->width($i)->url() . ' ' . $i . 'w,';
?>
<div class="slide">
	<div class="duo-content patternify">
		<div class="group">
			<div class="image-content">
				<img 
				src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" 
				data-src="<?= $image1->width(1500)->url() ?>" 
				data-srcset="<?= $srcset1 ?>" 
				data-sizes="auto" 
				data-optimumx="1.5" 
				alt="<?= $caption ?>" 
				class="lazyimg" 
				height="100%" width="auto">
				<div class="lsd">
					<img 
					src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" 
					data-src="<?= $image1->width(1500)->url() ?>" 
					data-srcset="<?= $srcset1 ?>" 
					data-sizes="auto" 
					data-optimumx="1.5" 
					alt="<?= $caption ?>" 
					class="lazyimg" 
					height="100%" width="auto">
				</div>
				<?php if($seo): ?>
				<noscript>
					<img src="<?= $image1->width(1500)->url() ?>" alt="<?= $caption ?>" height="100%" width="auto" />
				</noscript>
				<?php endif ?>
			</div><!-- gap
--><div class="image-content">
	<img 
	src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" 
	data-src="<?= $image2->width(1500)->url() ?>" 
	data-srcset="<?= $srcset2 ?>" 
	data-sizes="auto" 
	data-optimumx="1.5" 
	alt="<?= $caption ?>" 
	class="lazyimg" 
	height="100%" width="auto">
	<div class="lsd">
		<img 
		src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" 
		data-src="<?= $image2->width(1500)->url() ?>" 
		data-srcset="<?= $srcset2 ?>" 
		data-sizes="auto" 
		data-optimumx="1.5" 
		alt="<?= $caption ?>" 
		class="lazyimg" 
		height="100%" width="auto">
	</div>
	<?php if($seo): ?>
	<noscript>
		<img src="<?= $image2->width(1500)->url() ?>" alt="<?= $caption ?>" height="100%" width="auto" />
	</noscript>
	<?php endif ?>
</div>
		</div>
	</div>
</div>