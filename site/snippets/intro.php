<?php

$introImage = $page->featuredimages()->toStructure()->shuffle()->first();

?>

<?php if($introImage): ?>
<?php $introImage = $introImage->toFile(); ?>
<div id="intro">
		<div id="intro-image" style="background-image: url(<?= $introImage->width(3000)->url() ?>)">
		<div class="lsd" style="background-image: url(<?= $introImage->width(3000)->url() ?>)"></div>
			<a href="<?= $projectsPage->url() ?>" data-target>
				<span><?= $site->title()->html() ?></span>
			</a>
		</div>
</div>
<?php endif ?>