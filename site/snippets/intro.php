<?php

$introImage = $page->featuredimages()->toStructure()->shuffle()->first();

?>

<?php if($introImage): ?>
<?php $introImage = $introImage->toFile(); ?>
<div id="intro">
		<div id="intro-image" style="background-image: url(<?= resizeOnDemand($introImage, 3000) ?>)">
		<div class="lsd" style="background-image: url(<?= resizeOnDemand($introImage, 3000) ?>)"></div>
			<a href="<?= $projectsPage->url() ?>" data-target>
				<span><?= $site->title()->html() ?></span>
			</a>
		</div>
</div>
<?php endif ?>