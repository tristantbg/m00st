<?php

return function ($site, $pages, $page) {
	$projectsPage = page('series');
	$projects = $projectsPage->children()->visible();
	return array(
	'about'	=> page('about'),
	'projectsPage'	=> $projectsPage,
	'projects'	=> $projects,
	'first'	=> $projects->first(),
	'last'	=> $projects->last()
	);
}

?>
