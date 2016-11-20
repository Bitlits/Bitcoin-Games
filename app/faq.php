<?php

$content = array(
	"title" => $settings["name"],
	"faq" => true,
	"pagecss" => "faq",
);

$content = array_merge($content,$settings);
echo $m->render("pages/faq", $content);
?>