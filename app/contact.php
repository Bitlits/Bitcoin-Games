<?php

$content = array(
	"title" => $settings["name"],
	"contact" => true,
	"pagecss" => "contact",
);

$content = array_merge($content,$settings);
echo $m->render("pages/contact", $content);
?>
