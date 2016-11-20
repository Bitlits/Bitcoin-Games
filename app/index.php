<?php

$content = array(
	"title" => $settings["name"],
	"index" => true,
	"pagecss" => "index",
);

$content = array_merge($content,$settings);
echo $m->render("pages/index", $content);
?>