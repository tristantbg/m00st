<?php snippet('header') ?>

<div id="page-content" class="page dark">
	<div id="top-bar" class="desktop">
		<div class="title">
			<h1><a href="<?= $site->url() ?>" data-target="index"><span><?= $site->title()->upper()->html() ?></span><span>CLOSE</span></a></h1>
		</div>
		<div id="about-bar">
			<div class="column-about">
				<h2>CLIENTS</h2>
			</div>
			<div class="column-about">
				<h2>MAGAZINES</h2>
			</div>
		</div>
	</div>
	<div id="about-content">
		<div class="row">
			<h1 class="mobile"><a href="<?= $site->url() ?>" data-target="index"><span><?= $site->title()->upper()->html() ?></span><span>CLOSE</span></a></h1>
			<?= $page->text()->kt() ?>
		</div>
		
		<div class="row">
			<h2 class="mobile">CONTACT</h2>
			<?= $page->contact()->kt() ?>
		</div>
		
		<div class="row credits desktop">
			<?php snippet('credits') ?>
		</div>
	</div>
	
	<div id="about-clients">
		<div class="column-about">
			<h2 class="mobile">CLIENTS</h2>
			<?= $page->clients()->kt() ?>
		</div>

		<div class="column-about">
			<h2 class="mobile">MAGAZINES</h2>
			<?= $page->magazines()->kt() ?>
		</div>

		<div class="row credits mobile">
			<?php snippet('credits') ?>
		</div>
	</div>

</div>

<?php snippet('footer') ?>