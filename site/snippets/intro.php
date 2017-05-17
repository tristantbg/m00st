<?php if($site->introimage()->isNotEmpty()): ?>
<?php $intro = $site->introimage()->toFile(); ?>
<div id="intro">
	<div id="intro-image" style="background-image: url(<?= resizeOnDemand($intro, 2500) ?>)"></div>
</div>
<?php endif ?>