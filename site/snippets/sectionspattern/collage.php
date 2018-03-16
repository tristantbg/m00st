<div class="slide middle-align">
	<div class="collage-content">
		<?php $numItems = $data->content()->length() ?>
		<?php foreach ($data->content()->yaml() as $key => $file): ?>
		<?php if($image = $project->image($file)): ?>
		<?php 
		$position = json_decode($image->position());
		$srcset = '';
		for ($i = 500; $i <= 2000; $i += 500) $srcset .= $image->width($i)->url() . ' ' . $i . 'w,';
		?>
		<div class="collage-item patternify" 
		<?php if($position): ?>
		style="width: <?= $position->size ?>%; top: <?= $position->top ?>%; left: <?= $position->left ?>%; z-index: <?= $numItems - $key ?>;" 
		<?php endif ?>>
			<img 
			src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" 
			data-src="<?= $image->width(1500)->url() ?>" 
			data-srcset="<?= $srcset ?>" 
			data-sizes="auto" 
			data-optimumx="1.5" 
			alt="<?= $caption ?>" 
			class="lazyimg" 
			width="100%" 
			height="auto">
			<?php if($seo): ?>
			<noscript>
				<img src="<?= $image->width(1500)->url() ?>" alt="<?= $caption ?>" height="100%" width="auto" />
			</noscript>
			<?php endif ?>
		</div>
		<?php endif ?>
		<?php endforeach ?>
	</div>
</div>