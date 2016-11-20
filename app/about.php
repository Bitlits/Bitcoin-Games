<?php

$content = array(
	"title" => $settings["name"],
	"about" => true,
	"pagecss" => "about",
);

$content = array_merge($content,$settings);
echo $m->render("pages/about", $content);
?>
