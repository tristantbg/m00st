<?php snippet('header') ?>

<?php 

function _bot_detected() {

  if (isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/bot|crawl|slurp|spider/i', $_SERVER['HTTP_USER_AGENT'])) {
    return TRUE;
  }
  else {
    return FALSE;
  }

}

$bot = _bot_detected();

?>

<?php if(!$bot): ?>
<script>
	window.location = window.location.href.replace("series/", "series/#");
</script>
<?php endif ?>

<div id="page-content" class="serie">
	
	<?php $caption = $page->title()->html().' — © '.$site->title()->html(); ?>
	
	<div class="slider">
		<?php foreach($page->medias()->toStructure() as $section): ?>

			<?php snippet('sections/' . $section->_fieldset(), array('project' => $page, 'data' => $section, 'caption' => $caption, 'seo' => true)) ?>

		<?php endforeach ?>
	</div>
	
	<div id="bottom-bar">
	<div id="image-number">
		Image
		<br><span>1/<?= count($page->medias()->yaml()) ?></span>
	</div>
	<div id="serie-infos" class="hover">
		<?= $page->title()->html().'<br>'.$page->date('Y').' '.$page->subtitle()->html() ?>
	</div>
	<div id="index-btn" class="title hover">Index</div>
	<div id="serie-number" class="hover">
		Serie
		<br><span>1</span>/<?= count($projects) ?>
	</div>
	<div id="serie-nav" class="hover">
		<?php if($page->hasPrev()): ?>
		<a href="<?= $site->url().'/#'.$page->prev()->uid() ?>" id="prev-serie">Previous serie</a>
		<?php else: ?>
		<a href="<?= $site->url().'/#'.$last->uid() ?>" id="prev-serie">Previous serie</a>
		<?php endif ?>
		<?php if($page->hasNext()): ?>
		<br><a href="<?= $site->url().'/#'.$page->next()->uid() ?>" id="next-serie">Next serie</a>
		<?php else: ?>
		<br><a href="<?= $site->url().'/#'.$first->uid() ?>" id="next-serie">Next serie</a>
		<?php endif ?>
	</div>
	<div id="about-btn" class="title hover">About</div>
	</div>

</div>

<?php snippet('footer') ?>