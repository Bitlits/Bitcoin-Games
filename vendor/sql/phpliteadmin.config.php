<?php 
//
// This is sample configuration file
//
// You can configure phpliteadmin in one of 2 ways:
// 1. Rename current configuration file to phpliteadmin.config.php and change parameters here.
//    You can leave here only your custom settings. All other settings will be set to defaults.
// 2. Change parameters directly in main phpliteadmin.php file
//
// Please see http://code.google.com/p/phpliteadmin/wiki/Configuration for more details

//password to gain access
$password = 'pass1234word';

//directory relative to this file to search for databases (if false, manually list databases in the $databases variable)
$directory = '/srv/www/worldcoincasino.com/base';

//whether or not to scan the subdirectories of the above directory infinitely deep
$subdirectories = false;

//if the above $directory variable is set to false, you must specify the databases manually in an array as the next variable
//if any of the databases do not exist as they are referenced by their path, they will be created automatically
// $databases = array(
// 	array(
// 		'path'=> 'database1.sqlite',
// 		'name'=> 'Database 1'
// 	),
// 	array(
// 		'path'=> 'database2.sqlite',
// 		'name'=> 'Database 2'
// 	),
// );


/* ---- Interface settings ---- */

// Theme! If you want to change theme, save the CSS file in same folder of phpliteadmin or in folder "themes"
$theme = 'phpliteadmin.css';

// the default language! If you want to change it, save the language file in same folder of phpliteadmin or in folder "languages"
// More about localizations (downloads, how to translate etc.): http://code.google.com/p/phpliteadmin/wiki/Localization
$language = 'en';

// set default number of rows. You need to relog after changing the number
$rowsNum = 30;

// reduce string characters by a number bigger than 10
$charsNum = 300;


/* ---- Custom functions ---- */

//a list of custom functions that can be applied to columns in the databases
//make sure to define every function below if it is not a core PHP function
$custom_functions = array('md5', 'md5rev', 'sha1', 'sha1rev', 'time', 'mydate', 'strtotime', 'myreplace');

//define all the non-core custom functions
function md5rev($value)
{
	return strrev(md5($value));
}

function sha1rev($value)
{
	return strrev(sha1($value));
}

function mydate($value)
{
	return date('g:ia n/j/y', intval($value));
}

function myreplace($value)
{
	return preg_replace('/[^A-Za-z0-9]/', '', strval($value));	
}


/* ---- Advanced options ---- */

//changing the following variable allows multiple phpLiteAdmin installs to work under the same domain.
$cookie_name = 'pla3412';

//whether or not to put the app in debug mode where errors are outputted
$debug = false;

// the user is allowed to create databases with only these extensions
$allowed_extensions = array('db','db3','sqlite','sqlite3');

