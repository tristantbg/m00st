<?php snippet('header') ?>

<?php snippet('') ?>

<?php if ($first): ?>

<div id="elevator">

<?php foreach ($projects as $key => $project): ?>

<div 
	class="serie" 
	data-num="<?= $project->num() ?>" 
	data-title="<?= $project->title()->html() ?>" 
	data-subtitle="<?php e($project->date(), $project->date('Y').' '); echo $project->subtitle()->html(); ?>" 
	data-anchor="<?= $project->uid() ?>" 
	<?php if($project->hasPrev()): ?>
	data-previous="<?= $project->prev()->uid() ?>" 
	<?php else: ?>
	data-previous="<?= $last->uid() ?>" 
	<?php endif ?>
	<?php if($project->hasNext()): ?>
	data-next="<?= $project->next()->uid() ?>" 
	<?php else: ?>
	data-next="<?= $first->uid() ?>" 
	<?php endif ?>
	>
	
	<?php $caption = $project->title()->html().' — © '.$site->title()->html(); ?>
	
	<?php if ($project->intendedTemplate() == 'project.video'): ?>
	<div class="slider video-player">
		<?php if ($project->embed()->isNotEmpty()): ?>
			<?php if ($thumb = $project->featured()->toFile()): ?>
			<div class="player"><?= $project->embed()->embed(['lazyvideo' => true, 'thumb' => $thumb->width(2000)->url()]) ?></div>
			<?php else: ?>
			<div class="player"><?= $project->embed()->embed(['lazyvideo' => true]) ?></div>
			<?php endif ?>
			<div class="slide"></div>
		<?php endif ?>
	</div>
	<?php else: ?>
	<div class="slider">
		<?php foreach($project->medias()->toStructure() as $section): ?>

			<?php snippet('sections/' . $section->_fieldset(), array('project' => $project, 'data' => $section, 'caption' => $caption, 'seo' => false)) ?>

		<?php endforeach ?>
	</div>
	<?php endif ?>

</div>

<?php endforeach ?>

</div>

		
<div id="bottom-bar">
	<div id="image-number">
		Image
		<br><span>1/<?= count($first->medias()->yaml()) ?></span>
	</div>
	<div id="serie-infos" class="hover">
		<?= $first->title()->html().'<br>'.$first->date('Y').' '.$first->subtitle()->html() ?>
	</div>
	<div id="index-btn" class="title hover"><a href="<?= $indexPage->url() ?>" data-title="<?= $indexPage->title()->html() ?>" data-target="page"><?= $indexPage->title()->html() ?></a></div>
	<div id="serie-number" class="hover">
		Serie
		<br><span>1</span>/<?= count($projects) ?>
	</div>
	<div id="serie-nav" class="hover">
		<a href="" id="prev-serie" event-target="prev">Previous serie</a>
		<br><a href="" id="next-serie" event-target="next">Next serie</a>
	</div>
	<div id="about-btn" class="title hover"><a href="<?= $about->url() ?>" data-title="<?= $about->title()->html() ?>" data-target="page"><?= $about->title()->html() ?></a></div>
</div>

<?php endif ?>

<?php snippet('footer') ?>