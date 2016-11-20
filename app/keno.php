<?php

$content = array(
	"title" => $settings["name"],
	"keno" => true,
	"pagecss" => "keno",
);


$content = array_merge($content,$settings);
echo $m->render("pages/keno", $content);
?>