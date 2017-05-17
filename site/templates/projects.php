<?php snippet('header') ?>

<div id="page-content" class="page index">

<div id="top-bar">
	<div class="column-index">
		<h1>INDEX</h1>
	</div>
	<div class="column-index">
		<span event-target="list-toggle"></span>
	</div>
	<div id="close-btn">
		<a href="<?= $site->url() ?>" data-target="index">CLOSE</a>
	</div>
</div>

<div id="index-content">

	<?php foreach ($projects as $key => $project): ?>

	<div
		class="index-serie" 
		data-num="<?= $project->num() ?>" 
		data-title="<?= $project->title()->html() ?>" 
		data-subtitle="<?php e($project->date(), $project->date('Y').' '); echo $project->subtitle()->html(); ?>" 
		data-anchor="<?= $project->uid() ?>">

			<a href="<?= $project->url() ?>" 
			data-anchor="<?= $project->uid() ?>" 
			data-target="project" 
			data-slide="1" 
			<?php if($project->featured()->isNotEmpty()): ?>
			data-hover="<?= resizeOnDemand($project->featured()->toFile(), 1500) ?>" 
			<?php endif ?>
			>
			<h2><?= $project->title()->html() ?></h2>
			</a>
			
			<?php $slideIdx = 1 ?>

			<?php foreach($project->medias()->toStructure() as $section): ?>

				<?php 
					$lazygallery = false;
					if ($section->_fieldset() == 'twoimages') {
						$images = array($section->content1(), $section->content2());
					} 
					 else {
						$images = $section->content()->yaml();
					}
					if ($section->_fieldset() == 'gallery') {
						$lazygallery = true;
					}
				?>

				<?php snippet('index', array('project' => $project, 'images' => $images, 'slide' => $slideIdx, 'lazygallery' => $lazygallery)) ?>

				<?php 
				if ($lazygallery) {
					$slideIdx += count($images);
				} else {
					$slideIdx++;
				}
				?>

			<?php endforeach ?>

	</div>

	<?php endforeach ?>

</div>

<img id="image-hover" src="">

</div>

<?php snippet('footer') ?>