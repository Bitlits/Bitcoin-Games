<?php

//
//  Project: phpLiteAdmin (http://phpliteadmin.googlecode.com)
//  Version: 1.9.4.1
//  Summary: PHP-based admin tool to manage SQLite2 and SQLite3 databases on the web
//  Last updated: 2013-03-18
//  Developers:
//     Dane Iracleous (daneiracleous@gmail.com)
//     Ian Aldrighetti (ian.aldrighetti@gmail.com)
//     George Flanagin & Digital Gaslight, Inc (george@digitalgaslight.com)
//     Christopher Kramer (crazy4chrissi@gmail.com, http://en.christosoft.de)
//     Ayman Teryaki (http://havalite.com)
//     Dreadnaut (dreadnaut@gmail.com, http://dreadnaut.altervista.org)
//
//
//  Copyright (C) 2013  phpLiteAdmin
//
//  This program is free software: you can redistribute it and/or modify
//  it under the terms of the GNU General Public License as published by
//  the Free Software Foundation, either version 3 of the License, or
//  (at your option) any later version.
//
//  This program is distributed in the hope that it will be useful,
//  but WITHOUT ANY WARRANTY; without even the implied warranty of
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//  GNU General Public License for more details.
//
//  You should have received a copy of the GNU General Public License
//  along with this program.  If not, see <http://www.gnu.org/licenses/>.
//
///////////////////////////////////////////////////////////////////////////

//please report any bugs you encounter to http://code.google.com/p/phpliteadmin/issues/list


//BEGIN USER-DEFINED VARIABLES
//////////////////////////////

// These are the default configuration value for phpLiteAdmin and will be overridden
// by the optional configuration file. Feel free to edit below if you want to use
// phpLiteAdmin as a single file; otherwise, rename phpliteadmin.config.sample.php to
// phpliteadmin.config.php and edit it.
//
// Please see http://code.google.com/p/phpliteadmin/wiki/Configuration for more details

//password to gain access
$password = 'pass1234word';

// Theme! If you want to change theme, save the CSS file in same folder of phpliteadmin or in folder 'themes'
$theme = 'phpliteadmin.css';

// the default language! If you want to change it, save the language file in same folder of phpliteadmin or in folder 'languages'
// More about localizations (downloads, how to translate etc.): http://code.google.com/p/phpliteadmin/wiki/Localization
$language = 'en';

// set default number of rows. You need to relog after changing the number
$rowsNum = 30;

// reduce string characters by a number bigger than 10
$charsNum = 300;

//directory relative to this file to search for databases (if false, manually list databases in the $databases variable)
$directory = '.';

//whether or not to scan the subdirectories of the above directory infinitely deep
$subdirectories = false;

//if the above $directory variable is set to false, you must specify the databases manually in an array as the next variable
//if any of the databases do not exist as they are referenced by their path, they will be created automatically
$databases = array();

//a list of custom functions that can be applied to columns in the databases
//make sure to define every function below if it is not a core PHP function
$custom_functions = array('md5', 'sha1', 'time', 'strtotime');

//changing the following variable allows multiple phpLiteAdmin installs to work under the same domain.
$cookie_name = 'pla3412';

//whether or not to put the app in debug mode where errors are outputted
$debug = false;

// the user is allowed to create databases with only these extensions 
$allowed_extensions = array('db','db3','sqlite','sqlite3');

////////////////////////////
//END USER-DEFINED VARIABLES

// load optional configuration file
$config_filename = './phpliteadmin.config.php';
if (is_readable($config_filename)) {
	include_once $config_filename;
}


// Start English language-texts
// Read our wiki on how to translate: http://code.google.com/p/phpliteadmin/wiki/Localization
$lang = array(
	"direction" => "LTR",
	"date_format" => 'g:ia \o\n F j, Y (T)',  // see http://php.net/manual/en/function.date.php for what the letters stand for
	"ver" => "version",
	"for" => "for",
	"to" => "to",
	"go" => "Go",
	"yes" => "Yes",
	"sql" => "SQL",
	"csv" => "CSV",
	"csv_tbl" => "Table that CSV pertains to",
	"srch" => "Search",
	"srch_again" => "Do Another Search",
	"login" => "Log In",
	"logout" => "Logout",
	"view" => "View",
	"confirm" => "Confirm",
	"cancel" => "Cancel",
	"save_as" => "Save As",
	"options" => "Options",
	"no_opt" => "No options",
	"help" => "Help",
	"installed" => "installed",
	"not_installed" => "not installed",
	"done" => "done",
	"insert" => "Insert",
	"export" => "Export",
	"import" => "Import",
	"rename" => "Rename",
	"empty" => "Empty",
	"drop" => "Drop",
	"tbl" => "Table",
	"chart" => "Chart",
	"err" => "ERROR",
	"act" => "Action",
	"rec" => "Records",
	"col" => "Column",
	"cols" => "Columns",
	"rows" => "row(s)",
	"edit" => "Edit",
	"del" => "Delete",
	"add" => "Add",
	"backup" => "Backup database file",
	"before" => "Before",
	"after" => "After",
	"passwd" => "Password",
	"passwd_incorrect" => "Incorrect password.",
	"chk_ext" => "Checking supported SQLite PHP extensions",
	"autoincrement" => "Autoincrement",
	"not_null" => "Not NULL",
	"attention" => "Attention",
	
	"sqlite_ext" => "SQLite extension",
	"sqlite_ext_support" => "It appears that none of the supported SQLite library extensions are available in your installation of PHP. You may not use %s until you install at least one of them.",
	"sqlite_v" => "SQLite version",
	"sqlite_v_error" => "It appears that your database is of SQLite version %s but your installation of PHP does not contain the necessary extensions to handle this version. To fix the problem, either delete the database and allow %s to create it automatically or recreate it manually as SQLite version %s.",
	"report_issue" => "The problem cannot be diagnosed properly. Please file an issue report at",
	"sqlite_limit" => "Due to the limitations of SQLite, only the field name and data type can be modified.",
	
	"php_v" => "PHP version",
	
	"db_dump" => "database dump",
	"db_f" => "database file",
	"db_ch" => "Change Database",
	"db_event" => "Database Event",
	"db_name" => "Database name",
	"db_rename" => "Rename Database",
	"db_renamed" => "Database '%s' has been renamed to",
	"db_del" => "Delete Database",
	"db_path" => "Path to database",
	"db_size" => "Size of database",
	"db_mod" => "Database last modified",
	"db_create" => "Create New Database",
	"db_vac" => "The database, '%s', has been VACUUMed.",
	"db_not_writeable" => "The database, '%s', does not exist and cannot be created because the containing directory, '%s', is not writable. The application is unusable until you make it writable.",
	"db_setup" => "There was a problem setting up your database, %s. An attempt will be made to find out what's going on so you can fix the problem more easily",
	"db_exists" => "A database, other file or directory of the name '%s' already exists.",
	
	"exported" => "Exported",
	"struct" => "Structure",
	"struct_for" => "structure for",
	"on_tbl" => "on table",
	"data_dump" => "Data dump for",
	"backup_hint" => "Hint: To backup your database, the easiest way is to %s.",
	"backup_hint_linktext" => "download the database-file",
	"total_rows" => "a total of %s rows",
	"total" => "Total",
	"not_dir" => "The directory you specified to scan for databases does not exist or is not a directory.",
	"bad_php_directive" => "It appears that the PHP directive, 'register_globals' is enabled. This is bad. You need to disable it before continuing.",
	"page_gen" => "Page generated in %s seconds.",
	"powered" => "Powered by",
	"remember" => "Remember me",
	"no_db" => "Welcome to %s. It appears that you have selected to scan a directory for databases to manage. However, %s could not find any valid SQLite databases. You may use the form below to create your first database.",
	"no_db2" => "The directory you specified does not contain any existing databases to manage, and the directory is not writable. This means you can't create any new databases using %s. Either make the directory writable or manually upload databases to the directory.",
	
	"create" => "Create",
	"created" => "has been created",
	"create_tbl" => "Create new table",
	"create_tbl_db" => "Create new table on database",
	"create_trigger" => "Creating new trigger on table",
	"create_index" => "Creating new index on table",
	"create_index1" => "Create Index",
	"create_view" => "Create new view on database",
	
	"trigger" => "Trigger",
	"triggers" => "Triggers",
	"trigger_name" => "Trigger name",
	"trigger_act" => "Trigger Action",
	"trigger_step" => "Trigger Steps (semicolon terminated)",
	"when_exp" => "WHEN expression (type expression without 'WHEN')",
	"index" => "Index",
	"indexes" => "Indexes",
	"index_name" => "Index name",
	"name" => "Name",
	"unique" => "Unique",
	"seq_no" => "Seq. No.",
	"emptied" => "has been emptied",
	"dropped" => "has been dropped",
	"renamed" => "has been renamed to",
	"altered" => "has been altered successfully",
	"inserted" => "inserted",
	"deleted" => "deleted",
	"affected" => "affected",
	"blank_index" => "Index name must not be blank.",
	"one_index" => "You must specify at least one index column.",
	"docu" => "Documentation",
	"license" => "License",
	"proj_site" => "Project Site",
	"bug_report" => "This may be a bug that needs to be reported at",
	"return" => "Return",
	"browse" => "Browse",
	"fld" => "Field",
	"fld_num" => "Number of Fields",
	"fields" => "Fields",
	"type" => "Type",
	"operator" => "Operator",
	"val" => "Value",
	"update" => "Update",
	"comments" => "Comments",
	
	"specify_fields" => "You must specify the number of table fields.",
	"specify_tbl" => "You must specify a table name.",
	"specify_col" => "You must specify a column.",
	
	"tbl_exists" => "Table of the same name already exists.",
	"show" => "Show",
	"show_rows" => "Showing %s row(s). ",
	"showing" => "Showing",
	"showing_rows" => "Showing rows",
	"query_time" => "(Query took %s sec)",
	"syntax_err" => "There is a problem with the syntax of your query (Query was not executed)",
	"run_sql" => "Run SQL query/queries on database '%s'",
	
	"ques_empty" => "Are you sure you want to empty the table '%s'?",
	"ques_drop" => "Are you sure you want to drop the table '%s'?",
	"ques_drop_view" => "Are you sure you want to drop the view '%s'?",
	"ques_del_rows" => "Are you sure you want to delete row(s) %s from table '%s'?",
	"ques_del_db" => "Are you sure you want to delete the database '%s'?",
	"ques_del_col" => "Are you sure you want to delete column(s) %s from table '%s'?",
	"ques_del_index" => "Are you sure you want to delete index '%s'?",
	"ques_del_trigger" => "Are you sure you want to delete trigger '%s'?",
	
	"export_struct" => "Export with structure",
	"export_data" => "Export with data",
	"add_drop" => "Add DROP TABLE",
	"add_transact" => "Add TRANSACTION",
	"fld_terminated" => "Fields terminated by",
	"fld_enclosed" => "Fields enclosed by",
	"fld_escaped" => "Fields escaped by",
	"fld_names" => "Field names in first row",
	"rep_null" => "Replace NULL by",
	"rem_crlf" => "Remove CRLF characters within fields",
	"put_fld" => "Put field names in first row",
	"null_represent" => "NULL represented by",
	"import_suc" => "Import was successful.",
	"import_into" => "Import into",
	"import_f" => "File to import",
	"rename_tbl" => "Rename table '%s' to",
	
	"rows_records" => "row(s) starting from record # ",
	"rows_aff" => "row(s) affected. ",
	
	"as_a" => "as a",
	"readonly_tbl" => "'%s' is a view, which means it is a SELECT statement treated as a read-only table. You may not edit or insert records.",
	"chk_all" => "Check All",
	"unchk_all" => "Uncheck All",
	"with_sel" => "With Selected",
	
	"no_tbl" => "No table in database.",
	"no_chart" => "If you can read this, it means the chart could not be generated. The data you are trying to view may not be appropriate for a chart.",
	"no_rows" => "There are no rows in the table for the range you selected.",
	"no_sel" => "You did not select anything.",
	
	"chart_type" => "Chart Type",
	"chart_bar" => "Bar Chart",
	"chart_pie" => "Pie Chart",
	"chart_line" => "Line Chart",
	"lbl" => "Labels",
	"empty_tbl" => "This table is empty.",
	"click" => "Click here",
	"insert_rows" => "to insert rows.",
	"restart_insert" => "Restart insertion with ",
	"ignore" => "Ignore",
	"func" => "Function",
	"new_insert" => "Insert As New Row",
	"save_ch" => "Save Changes",
	"def_val" => "Default Value",
	"prim_key" => "Primary Key",
	"tbl_end" => "field(s) at end of table",
	"query_used_table" => "Query used to create this table",
	"query_used_view" => "Query used to create this view",
	"create_index2" => "Create an index on",
	"create_trigger2" => "Create a new trigger",
	"new_fld" => "Adding new field(s) to table '%s'",
	"add_flds" => "Add Fields",
	"edit_col" => "Editing column '%s'",
	"vac" => "Vacuum",
	"vac_desc" => "Large databases sometimes need to be VACUUMed to reduce their footprint on the server. Click the button below to VACUUM the database '%s'.",
	"event" => "Event",
	"each_row" => "For Each Row",
	"define_index" => "Define index properties",
	"dup_val" => "Duplicate values",
	"allow" => "Allowed",
	"not_allow" => "Not Allowed",
	"asc" => "Ascending",
	"desc" => "Descending",
	"warn0" => "You have been warned.",
	"warn_passwd" => "You are using the default password, which can be dangerous. You can change it easily at the top of %s.",
	"warn_dumbass" => "You didn't change the value dumbass ;-)",
	"sel_state" => "Select Statement",
	"delimit" => "Delimiter",
	"back_top" => "Back to Top",
	"choose_f" => "Choose File",
	"instead" => "Instead of",
	"define_in_col" => "Define index column(s)",
	
	"delete_only_managed" => "You can only delete databases managed by this tool!",
	"rename_only_managed" => "You can only rename databases managed by this tool!",
	"db_moved_outside" => "You either tried to move the database into a directory where it cannot be managed anylonger, or the check if you did this failed because of missing rights.",
	"extension_not_allowed" => "The extension you provided is not within the list of allowed extensions. Please use one of the following extensions",
	"add_allowed_extension" => "You can add extensions to this list by adding your extension to \$allowed_extensions in the configuration.",
	"directory_not_writable" => "The database-file itself is writable, but to write into it, the containing directory needs to be writable as well. This is because SQLite puts temporary files in there for locking.",
	"tbl_inexistent" => "Table %s does not exist",

	// errors that can happen when ALTER TABLE fails. You don't necessarily have to translate these.
	"alter_failed" => "Altering of Table %s failed",
	"alter_tbl_name_not_replacable" => "could not replace the table name with the temporary one",
	"alter_no_def" => "no ALTER definition",
	"alter_parse_failed" =>"failed to parse ALTER definition",
	"alter_action_not_recognized" => "ALTER action could not be recognized",
	"alter_no_add_col" => "no column to add detected in ALTER statement",
	"alter_pattern_mismatch"=>"Pattern did not match on your original CREATE TABLE statement",
	"alter_col_not_recognized" => "could not recognize new or old column name",
	"alter_unknown_operation" => "Unknown ALTER operation!",
	
	/* Help documentation */
	"help_doc" => "Help Documentation",
	"help1" => "SQLite Library Extensions",
	"help1_x" => "%s uses PHP library extensions that allow interaction with SQLite databases. Currently, %s supports PDO, SQLite3, and SQLiteDatabase. Both PDO and SQLite3 deal with version 3 of SQLite, while SQLiteDatabase deals with version 2. So, if your PHP installation includes more than one SQLite library extension, PDO and SQLite3 will take precedence to make use of the better technology. However, if you have existing databases that are of version 2 of SQLite, %s will be forced to use SQLiteDatabase for only those databases. Not all databases need to be of the same version. During the database creation, however, the most advanced extension will be used.",
	"help2" => "Creating a New Database",
	"help2_x" => "When you create a new database, the name you entered will be appended with the appropriate file extension (.db, .db3, .sqlite, etc.) if you do not include it yourself. The database will be created in the directory you specified as the \$directory variable.",
	"help3" => "Tables vs. Views",
	"help3_x" => "On the main database page, there is a list of tables and views. Since views are read-only, certain operations will be disabled. These disabled operations will be apparent by their omission in the location where they should appear on the row for a view. If you want to change the data for a view, you need to drop that view and create a new view with the appropriate SELECT statement that queries other existing tables. For more information, see <a href='http://en.wikipedia.org/wiki/View_(database)' target='_blank'>http://en.wikipedia.org/wiki/View_(database)</a>",
	"help4" => "Writing a Select Statement for a New View",
	"help4_x" => "When you create a new view, you must write an SQL SELECT statement that it will use as its data. A view is simply a read-only table that can be accessed and queried like a regular table, except it cannot be modified through insertion, column editing, or row editing. It is only used for conveniently fetching data.",
	"help5" => "Export Structure to SQL File",
	"help5_x" => "During the process for exporting to an SQL file, you may choose to include the queries that create the table and columns.",
	"help6" => "Export Data to SQL File",
	"help6_x" => "During the process for exporting to an SQL file, you may choose to include the queries that populate the table(s) with the current records of the table(s).",
	"help7" => "Add Drop Table to Exported SQL File",
	"help7_x" => "During the process for exporting to an SQL file, you may choose to include queries to DROP the existing tables before adding them so that problems do not occur when trying to create tables that already exist.",
	"help8" => "Add Transaction to Exported SQL File",
	"help8_x" => "During the process for exporting to an SQL file, you may choose to wrap the queries around a TRANSACTION so that if an error occurs at any time during the importation process using the exported file, the database can be reverted to its previous state, preventing partially updated data from populating the database.",
	"help9" => "Add Comments to Exported SQL File",
	"help9_x" => "During the process for exporting to an SQL file, you may choose to include comments that explain each step of the process so that a human can better understand what is happening."
	
	);


//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//there is no reason for the average user to edit anything below this comment
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//constants 1
define("PROJECT", "phpLiteAdmin");
define("VERSION", "1.9.4.1");
define("PAGE", basename(__FILE__));
define("FORCETYPE", false); //force the extension that will be used (set to false in almost all circumstances except debugging)
define("SYSTEMPASSWORD", $password); // Makes things easier.
define('PROJECT_URL','http://phpliteadmin.googlecode.com');
define('PROJECT_BUGTRACKER_LINK','<a href="http://code.google.com/p/phpliteadmin/issues/list" target="_blank">http://code.google.com/p/phpliteadmin/issues/list</a>');

// Resource output (css and javascript files)
// we get out of the main code as soon as possible, without inizializing the session
if (isset($_GET['resource'])) {
	Resources::output($_GET['resource']);
	exit();
}

// don't mess with this - required for the login session
ini_set('session.cookie_httponly', '1');
session_start();

if($debug==true)
{
	ini_set("display_errors", 1);
	error_reporting(E_STRICT | E_ALL);
} else
{
	@ini_set("display_errors", 0);
}

// start the timer to record page load time
$pageTimer = new MicroTimer();

// load language file
if($language != 'en') {
	if(is_file('languages/lang_'.$language.'.php'))
		include('languages/lang_'.$language.'.php');
	elseif(is_file('lang_'.$language.'.php'))
		include('lang_'.$language.'.php');
}
// version-number added so after updating, old session-data is not used anylonger
// cookies names cannot contain symbols, except underscores
define("COOKIENAME", preg_replace('/[^a-zA-Z0-9_]/', '_', $cookie_name . '_' . VERSION) );

// stripslashes if MAGIC QUOTES is turned on
// This is only a workaround. Please better turn off magic quotes!
// This code is from http://php.net/manual/en/security.magicquotes.disabling.php
if (get_magic_quotes_gpc()) {
	$process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
	while (list($key, $val) = each($process)) {
		foreach ($val as $k => $v) {
			unset($process[$key][$k]);
			if (is_array($v)) {
				$process[$key][stripslashes($k)] = $v;
				$process[] = &$process[$key][stripslashes($k)];
			} else {
				$process[$key][stripslashes($k)] = stripslashes($v);
			}
		}
	}
	unset($process);
}


//data types array
$types = array("INTEGER", "REAL", "TEXT", "BLOB");
define("DATATYPES", serialize($types));

//available SQLite functions array (don't add anything here or there will be problems)
$functions = array("abs", "hex", "length", "lower", "ltrim", "random", "round", "rtrim", "trim", "typeof", "upper");
define("FUNCTIONS", serialize($functions));
define("CUSTOM_FUNCTIONS", serialize($custom_functions));

//function that allows SQL delimiter to be ignored inside comments or strings
function explode_sql($delimiter, $sql)
{
	$ign = array('"' => '"', "'" => "'", "/*" => "*/", "--" => "\n"); // Ignore sequences.
	$out = array();
	$last = 0;
	$slen = strlen($sql);
	$dlen = strlen($delimiter);
	$i = 0;
	while($i < $slen)
	{
		// Split on delimiter
		if($slen - $i >= $dlen && substr($sql, $i, $dlen) == $delimiter)
		{
			array_push($out, substr($sql, $last, $i - $last));
			$last = $i + $dlen;
			$i += $dlen;
			continue;
		}
		// Eat comments and string literals
		foreach($ign as $start => $end)
		{
			$ilen = strlen($start);
			if($slen - $i >= $ilen && substr($sql, $i, $ilen) == $start)
			{
				$i+=strlen($start);
				$elen = strlen($end);
				while($i < $slen)
				{
					if($slen - $i >= $elen && substr($sql, $i, $elen) == $end)
					{
						// SQL comment characters can be escaped by doubling the character. This recognizes and skips those.
						if($start == $end && $slen - $i >= $elen*2 && substr($sql, $i, $elen*2) == $end.$end)
						{
							$i += $elen * 2;
							continue;
						}
						else
						{
							$i += $elen;
							continue 3;
						}
					}
					$i++;
				}
				continue 2;
			}		
		}
		$i++;
	}
	if($last < $slen)
		array_push($out, substr($sql, $last, $slen - $last));
	return $out;
}

//function to scan entire directory tree and subdirectories
function dir_tree($dir)
{
	$path = '';
	$stack[] = $dir;
	while($stack)
	{
		$thisdir = array_pop($stack);
		if($dircont = scandir($thisdir))
		{
			$i=0;
			while(isset($dircont[$i]))
			{
				if($dircont[$i] !== '.' && $dircont[$i] !== '..')
				{
					$current_file = $thisdir.DIRECTORY_SEPARATOR.$dircont[$i];
					if(is_file($current_file))
					{
						$path[] = $thisdir.DIRECTORY_SEPARATOR.$dircont[$i];
					}
					elseif (is_dir($current_file))
					{
						$path[] = $thisdir.DIRECTORY_SEPARATOR.$dircont[$i];
						$stack[] = $current_file;
					}
				}
				$i++;
			}
		}
	}
	return $path;
}

//the function echo the help [?] links to the documentation
function helpLink($name)
{
	global $lang;
	return "<a href='".PAGE."?help=1' onclick='openHelp(\"".$name."\"); return false;' class='helpq' title='".$lang['help'].": ".$name."' target='_blank'><span>[?]</span></a>";	
}

// function to encode value into HTML just like htmlentities, but with adjusted default settings
function htmlencode($value, $flags=ENT_QUOTES, $encoding ="UTF-8")
{
	return htmlentities($value, $flags, $encoding);
}

// 22 August 2011: gkf added this function to support display of
//                 default values in the form used to INSERT new data.
function deQuoteSQL($s)
{
	return trim(trim($s), "'");
}

// reduce string chars
function subString($str)
{
	global $charsNum;
	if($charsNum > 10){
		if(strlen($str)>$charsNum) $str = substr($str, 0, $charsNum).'...';
	}
	return $str;
}

function getRowId($table, $where=''){
	global $db;
	$query = "SELECT ROWID FROM ".$db->quote_id($table).$where;
	$result = $db->selectArray($query);
	return $result;
}

// checks the (new) name of a database file  
function checkDbName($name)
{
	global $allowed_extensions;
	$info = pathinfo($name);
	if(isset($info['extension']) && !in_array($info['extension'], $allowed_extensions))
	{
		return false;
	} else
	{
		return (!is_file($name) && !is_dir($name));
	}

}

// check whether a path is a db managed by this tool
// requires that $databases is already filled!
// returns the key of the db if managed, false otherwise.
function isManagedDB($path)
{
	global $databases;
	foreach($databases as $db_key => $database)
	{
		if($path == $database['path'])
		{
			// a db we manage. Thats okay.
			// return the key.
			return $db_key;
		}
	}
	// not a db we manage!
	return false;
}

//
// Authorization class
// Maintains user's logged-in state and security of application
//
class Authorization
{
	private $authorized;
	private $login_failed;
	private $system_password_encrypted;

	public function __construct()
	{
		// the salt and password encrypting is probably unnecessary protection but is done just
		// for the sake of being very secure
		if(!isset($_SESSION[COOKIENAME.'_salt']) && !isset($_COOKIE[COOKIENAME.'_salt']))
		{
			// create a random salt for this session if a cookie doesn't already exist for it
			$_SESSION[COOKIENAME.'_salt'] = self::generateSalt(20);
		}
		else if(!isset($_SESSION[COOKIENAME.'_salt']) && isset($_COOKIE[COOKIENAME.'_salt']))
		{
			// session doesn't exist, but cookie does so grab it
			$_SESSION[COOKIENAME.'_salt'] = $_COOKIE[COOKIENAME.'_salt'];
		}

		// salted and encrypted password used for checking
		$this->system_password_encrypted = md5(SYSTEMPASSWORD."_".$_SESSION[COOKIENAME.'_salt']);

		$this->authorized =
			// no password
			SYSTEMPASSWORD == ''
			// correct password stored in session
			|| isset($_SESSION[COOKIENAME.'password']) && $_SESSION[COOKIENAME.'password'] == $this->system_password_encrypted 
			// correct password stored in cookie
			|| isset($_COOKIE[COOKIENAME]) && isset($_COOKIE[COOKIENAME.'_salt']) && md5(SYSTEMPASSWORD."_".$_COOKIE[COOKIENAME.'_salt']) == $_COOKIE[COOKIENAME];
	}

	public function attemptGrant($password, $remember)
	{
		if ($password == SYSTEMPASSWORD) {
			if ($remember) {
				// user wants to be remembered, so set a cookie
				$expire = time()+60*60*24*30; //set expiration to 1 month from now
				setcookie(COOKIENAME, $this->system_password_encrypted, $expire, null, null, null, true);
				setcookie(COOKIENAME."_salt", $_SESSION[COOKIENAME.'_salt'], $expire, null, null, null, true);
			} else {
				// user does not want to be remembered, so destroy any potential cookies
				setcookie(COOKIENAME, "", time()-86400, null, null, null, true);
				setcookie(COOKIENAME."_salt", "", time()-86400, null, null, null, true);
				unset($_COOKIE[COOKIENAME]);
				unset($_COOKIE[COOKIENAME.'_salt']);
			}

			$_SESSION[COOKIENAME.'password'] = $this->system_password_encrypted;
			$this->authorized = true;
			return true;
		}

		$this->login_failed = true;
		return false;
	}

	public function revoke()
	{
		//destroy everything - cookies and session vars
		setcookie(COOKIENAME, "", time()-86400, null, null, null, true);
		setcookie(COOKIENAME."_salt", "", time()-86400, null, null, null, true);
		unset($_COOKIE[COOKIENAME]);
		unset($_COOKIE[COOKIENAME.'_salt']);
		session_unset();
		session_destroy();
		$this->authorized = false;
	}

	public function isAuthorized()
	{
		return $this->authorized;      
	}

	public function isFailedLogin()
	{
		return $this->login_failed;
	}

	public function isPasswordDefault()
	{
		return SYSTEMPASSWORD == 'admin';
	}

	private static function generateSalt($saltSize)
	{
		$set = 'ABCDEFGHiJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		$setLast = strlen($set) - 1;
		$salt = '';
		while ($saltSize-- > 0) {
			$salt .= $set[mt_rand(0, $setLast)];
		}
		return $salt;
	}

}

//
// Database class
// Generic database abstraction class to manage interaction with database without worrying about SQLite vs. PHP versions
//
class Database
{
	protected $db; //reference to the DB object
	protected $type; //the extension for PHP that handles SQLite
	protected $data;
	protected $lastResult;
	protected $fns;
	protected $alterError;

	public function __construct($data)
	{
		global $lang;
		$this->data = $data;
		$this->fns = array();
		try
		{
			if(!file_exists($this->data["path"]) && !is_writable(dirname($this->data["path"]))) //make sure the containing directory is writable if the database does not exist
			{
				echo "<div class='confirm' style='margin:20px;'>";
				printf($lang['db_not_writeable'], htmlencode($this->data["path"]), htmlencode(dirname($this->data["path"])));
				echo "<form action='".PAGE."' method='post'>";
				echo "<input type='submit' value='Log Out' name='".$lang['logout']."' class='btn'/>";
				echo "</form>";
				echo "</div><br/>";
				exit();
			}

			$ver = $this->getVersion();

			switch(true)
			{
				case (FORCETYPE=="PDO" || ((FORCETYPE==false || $ver!=-1) && class_exists("PDO") && ($ver==-1 || $ver==3))):
					$this->db = new PDO("sqlite:".$this->data['path']);
					if($this->db!=NULL)
					{
						$this->type = "PDO";
						$cfns = unserialize(CUSTOM_FUNCTIONS);
						for($i=0; $i<sizeof($cfns); $i++)
						{
							$this->db->sqliteCreateFunction($cfns[$i], $cfns[$i], 1);
							$this->addUserFunction($cfns[$i]);	
						}
						break;
					}
				case (FORCETYPE=="SQLite3" || ((FORCETYPE==false || $ver!=-1) && class_exists("SQLite3") && ($ver==-1 || $ver==3))):
					$this->db = new SQLite3($this->data['path']);
					if($this->db!=NULL)
					{
						$cfns = unserialize(CUSTOM_FUNCTIONS);
						for($i=0; $i<sizeof($cfns); $i++)
						{
							$this->db->createFunction($cfns[$i], $cfns[$i], 1);
							$this->addUserFunction($cfns[$i]);	
						}
						$this->type = "SQLite3";
						break;
					}
				case (FORCETYPE=="SQLiteDatabase" || ((FORCETYPE==false || $ver!=-1) && class_exists("SQLiteDatabase") && ($ver==-1 || $ver==2))):
					$this->db = new SQLiteDatabase($this->data['path']);
					if($this->db!=NULL)
					{
						$cfns = unserialize(CUSTOM_FUNCTIONS);
						for($i=0; $i<sizeof($cfns); $i++)
						{
							$this->db->createFunction($cfns[$i], $cfns[$i], 1);
							$this->addUserFunction($cfns[$i]);	
						}
						$this->type = "SQLiteDatabase";
						break;
					}
				default:
					$this->showError();
					exit();
			}
		}
		catch(Exception $e)
		{
			$this->showError();
			exit();
		}
	}
	
	public function getUserFunctions()
	{
		return $this->fns;	
	}
	
	public function addUserFunction($name)
	{
		array_push($this->fns, $name);	
	}
	
	public function getError()
	{
		if($this->alterError!='')
		{
			$error = $this->alterError;
			$this->alterError = ""; 
			return $error;
		}
		else if($this->type=="PDO")
		{
			$e = $this->db->errorInfo();
			return $e[2];	
		}
		else if($this->type=="SQLite3")
		{
			return $this->db->lastErrorMsg();
		}
		else
		{
			return sqlite_error_string($this->db->lastError());
		}
	}
	
	public function showError()
	{
		global $lang;
		$classPDO = class_exists("PDO");
		$classSQLite3 = class_exists("SQLite3");
		$classSQLiteDatabase = class_exists("SQLiteDatabase");
		if($classPDO)
			$strPDO = $lang['installed'];
		else
			$strPDO = $lang['not_installed'];
		if($classSQLite3)
			$strSQLite3 = $lang['installed'];
		else
			$strSQLite3 = $lang['not_installed'];
		if($classSQLiteDatabase)
			$strSQLiteDatabase = $lang['installed'];
		else
			$strSQLiteDatabase = $lang['not_installed'];
		echo "<div class='confirm' style='margin:20px;'>";
		printf($lang['db_setup'], $this->getPath());
		echo ".<br/><br/><i>".$lang['chk_ext']."...<br/><br/>";
		echo "<b>PDO</b>: ".$strPDO."<br/>";
		echo "<b>SQLite3</b>: ".$strSQLite3."<br/>";
		echo "<b>SQLiteDatabase</b>: ".$strSQLiteDatabase."<br/><br/>...".$lang['done'].".</i><br/><br/>";
		if(!$classPDO && !$classSQLite3 && !$classSQLiteDatabase)
			printf($lang['sqlite_ext_support'], PROJECT);
		else
		{
			if(!$classPDO && !$classSQLite3 && $this->getVersion()==3)
				printf($lang['sqlite_v_error'], 3, PROJECT, 2);
			else if(!$classSQLiteDatabase && $this->getVersion()==2)
				printf($lang['sqlite_v_error'], 2, PROJECT, 3);
			else
				echo $lang['report_issue'].' '.PROJECT_BUGTRACKER_LINK.'.';
		}
		echo "</div><br/>";
	}

	public function __destruct()
	{
		if($this->db)
			$this->close();
	}

	//get the exact PHP extension being used for SQLite
	public function getType()
	{
		return $this->type;
	}

	//get the name of the database
	public function getName()
	{
		return $this->data["name"];
	}

	//get the filename of the database
	public function getPath()
	{
		return $this->data["path"];
	}

	//is the db-file writable?
	public function isWritable()
	{
		return $this->data["writable"];
	}

	//is the db-folder writable?
	public function isDirWritable()
	{
		return $this->data["writable_dir"];
	}

	//get the version of the database
	public function getVersion()
	{
		if(file_exists($this->data['path'])) //make sure file exists before getting its contents
		{
			$content = strtolower(file_get_contents($this->data['path'], NULL, NULL, 0, 40)); //get the first 40 characters of the database file
			$p = strpos($content, "** this file contains an sqlite 2"); //this text is at the beginning of every SQLite2 database
			if($p!==false) //the text is found - this is version 2
				return 2;
			else
				return 3;
		}
		else //return -1 to indicate that it does not exist and needs to be created
		{
			return -1;
		}
	}

	//get the size of the database (in KB)
	public function getSize()
	{
		return round(filesize($this->data["path"])*0.0009765625, 1);
	}

	//get the last modified time of database
	public function getDate()
	{
		global $lang;
		return date($lang['date_format'], filemtime($this->data['path']));
	}

	//get number of affected rows from last query
	public function getAffectedRows()
	{
		if($this->type=="PDO")
			return $this->lastResult->rowCount();
		else if($this->type=="SQLite3")
			return $this->db->changes();
		else if($this->type=="SQLiteDatabase")
			return $this->db->changes();
	}

	public function close()
	{
		if($this->type=="PDO")
			$this->db = NULL;
		else if($this->type=="SQLite3")
			$this->db->close();
		else if($this->type=="SQLiteDatabase")
			$this->db = NULL;
	}

	public function beginTransaction()
	{
		$this->query("BEGIN");
	}

	public function commitTransaction()
	{
		$this->query("COMMIT");
	}

	public function rollbackTransaction()
	{
		$this->query("ROLLBACK");
	}

	//generic query wrapper
	public function query($query, $ignoreAlterCase=false)
	{
		global $debug;
		if(strtolower(substr(ltrim($query),0,5))=='alter' && $ignoreAlterCase==false) //this query is an ALTER query - call the necessary function
		{
			preg_match("/^\s*ALTER\s+TABLE\s+\"((?:[^\"]|\"\")+)\"\s+(.*)$/i",$query,$matches);
			if(!isset($matches[1]) || !isset($matches[2]))
			{
				if($debug) echo "<span title='".htmlencode($query)."' onclick='this.innerHTML=\"".htmlencode(str_replace('"','\"',$query))."\"' style='cursor:pointer'>SQL?</span><br />";
				return false;
			}
			$tablename = str_replace('""','"',$matches[1]);
			$alterdefs = $matches[2];
			if($debug) echo "ALTER TABLE QUERY=(".htmlencode($query)."), tablename=($tablename), alterdefs=($alterdefs)<hr>";
			$result = $this->alterTable($tablename, $alterdefs);
		}
		else //this query is normal - proceed as normal
		{
			$result = $this->db->query($query);
			if($debug) echo "<span title='".htmlencode($query)."' onclick='this.innerHTML=\"".htmlencode(str_replace('"','\"',$query))."\"' style='cursor:pointer'>SQL?</span><br />";
		}
		if(!$result)
			return false;
		$this->lastResult = $result;
		return $result;
	}

	//wrapper for an INSERT and returns the ID of the inserted row
	public function insert($query)
	{
		$result = $this->query($query);
		if($this->type=="PDO")
			return $this->db->lastInsertId();
		else if($this->type=="SQLite3")
			return $this->db->lastInsertRowID();
		else if($this->type=="SQLiteDatabase")
			return $this->db->lastInsertRowid();
	}

	//returns an array for SELECT
	public function select($query, $mode="both")
	{
		$result = $this->query($query);
		if(!$result) //make sure the result is valid
			return NULL;
		if($this->type=="PDO")
		{
			if($mode=="assoc")
				$mode = PDO::FETCH_ASSOC;
			else if($mode=="num")
				$mode = PDO::FETCH_NUM;
			else
				$mode = PDO::FETCH_BOTH;
			return $result->fetch($mode);
		}
		else if($this->type=="SQLite3")
		{
			if($mode=="assoc")
				$mode = SQLITE3_ASSOC;
			else if($mode=="num")
				$mode = SQLITE3_NUM;
			else
				$mode = SQLITE3_BOTH;
			return $result->fetchArray($mode);
		}
		else if($this->type=="SQLiteDatabase")
		{
			if($mode=="assoc")
				$mode = SQLITE_ASSOC;
			else if($mode=="num")
				$mode = SQLITE_NUM;
			else
				$mode = SQLITE_BOTH;
			return $result->fetch($mode);
		}
	}

	//returns an array of arrays after doing a SELECT
	public function selectArray($query, $mode="both")
	{
		$result = $this->query($query);
		if(!$result) //make sure the result is valid
			return NULL;
		if($this->type=="PDO")
		{
			if($mode=="assoc")
				$mode = PDO::FETCH_ASSOC;
			else if($mode=="num")
				$mode = PDO::FETCH_NUM;
			else
				$mode = PDO::FETCH_BOTH;
			return $result->fetchAll($mode);
		}
		else if($this->type=="SQLite3")
		{
			if($mode=="assoc")
				$mode = SQLITE3_ASSOC;
			else if($mode=="num")
				$mode = SQLITE3_NUM;
			else
				$mode = SQLITE3_BOTH;
			$arr = array();
			$i = 0;
			while($res = $result->fetchArray($mode))
			{
				$arr[$i] = $res;
				$i++;
			}
			return $arr;
		}
		else if($this->type=="SQLiteDatabase")
		{
			if($mode=="assoc")
				$mode = SQLITE_ASSOC;
			else if($mode=="num")
				$mode = SQLITE_NUM;
			else
				$mode = SQLITE_BOTH;
			return $result->fetchAll($mode);
		}
	}

	
	// SQlite supports multiple ways of surrounding names in quotes:
	// single-quotes, double-quotes, backticks, square brackets.
	// As sqlite does not keep this strict, we also need to be flexible here.
	// This function generates a regex that matches any of the possibilities.
	private function sqlite_surroundings_preg($name,$preg_quote=true,$notAllowedIfNone="'\"")
	{
		if($name=="*" || $name=="+")
		{
			// use possesive quantifiers to save memory
			$nameSingle   = "(?:[^']$name+|'')$name+";
			$nameDouble   = "(?:[^\"]$name+|\"\")$name+";
			$nameBacktick = "(?:[^`]$name+|``)$name+";
			$nameSquare   = "(?:[^\]]$name+|\]\])$name+";
			$nameNo = "[^".$notAllowedIfNone."]$name";
		}
		else
		{
			if($preg_quote) $name = preg_quote($name,"/");
			
			$nameSingle = str_replace("'","''",$name);
			$nameDouble = str_replace('"','""',$name);
			$nameBacktick = str_replace('`','``',$name);
			$nameSquare = str_replace(']',']]',$name);
			$nameNo = $name;
		}
		
		$preg =	"(?:'".$nameSingle."'|".   // single-quote surrounded or not in quotes (correct SQL for values/new names)
				$nameNo."|".               // not surrounded (correct SQL if not containing reserved words, spaces or some special chars)
				"\"".$nameDouble."\"|".    // double-quote surrounded (correct SQL for identifiers)
				"`".$nameBacktick."`|".    // backtick surrounded (MySQL-Style)
				"\[".$nameSquare."\])";    // square-bracket surrounded (MS Access/SQL server-Style)
		return $preg;
	}
	
	// function that is called for an alter table statement in a query
	// code borrowed with permission from http://code.jenseng.com/db/
	// this has been completely debugged / rewritten by Christopher Kramer
	public function alterTable($table, $alterdefs)
	{
		global $debug, $lang;
		$this->alterError="";
		$errormsg = sprintf($lang['alter_failed'],htmlencode($table)).' - ';
		if($debug) echo "ALTER TABLE: table=($table), alterdefs=($alterdefs)<hr>";
		if($alterdefs != '')
		{
			$recreateQueries = array();
			$tempQuery = "SELECT sql,name,type FROM sqlite_master WHERE tbl_name = ".$this->quote($table);
			$result = $this->query($tempQuery);
			$resultArr = $this->selectArray($tempQuery);
			if($this->type=="PDO")
				$result->closeCursor();
			if(sizeof($resultArr)<1)
			{
				$this->alterError = $errormsg . sprintf($lang['tbl_inexistent'], htmlencode($table));
				if($debug) echo "ERROR: unknown table<hr>";
				return false;
			}
			for($i=0; $i<sizeof($resultArr); $i++)
			{
				$row = $resultArr[$i];
				if($row['type'] != 'table')
				{
					// store the CREATE statements of triggers and indexes to recreate them later
					$recreateQueries[] = $row['sql']."; ";
					if($debug) echo "recreate=(".$row['sql'].";)<hr />";
				}
				else
				{
					// ALTER the table
					$tmpname = 't'.time();
					$origsql = $row['sql'];
					$preg_remove_create_table = "/^\s*+CREATE\s++TABLE\s++".$this->sqlite_surroundings_preg($table)."\s*+(\(.*+)$/is";
					$origsql_no_create = preg_replace($preg_remove_create_table, '$1', $origsql, 1);
					if($debug) echo "origsql=($origsql)<br />preg_remove_create_table=($preg_remove_create_table)<hr>";
					if($origsql_no_create == $origsql)
					{
						$this->alterError = $errormsg . $lang['alter_tbl_name_not_replacable'];
						if($debug) echo "ERROR: could not get rid of CREATE TABLE<hr />";
						return false;
					}
					$createtemptableSQL = "CREATE TEMPORARY TABLE ".$this->quote($tmpname)." ".$origsql_no_create;
					if($debug) echo "createtemptableSQL=($createtemptableSQL)<hr>";
					$createindexsql = array();
					preg_match_all("/(?:DROP|ADD|CHANGE|RENAME TO)\s+(?:\"(?:[^\"]|\"\")+\"|'(?:[^']|'')+')((?:[^,')]|'[^']*')+)?/i",$alterdefs,$matches);
					$defs = $matches[0];
					
					$get_oldcols_query = "PRAGMA table_info(".$this->quote_id($table).")";
					$result_oldcols = $this->selectArray($get_oldcols_query);
					$newcols = array();
					$coltypes = array();
					foreach($result_oldcols as $column_info)
					{
						$newcols[$column_info['name']] = $column_info['name'];
						$coltypes[$column_info['name']] = $column_info['type'];
					}
					$newcolumns = '';
					$oldcolumns = '';
					reset($newcols);
					while(list($key, $val) = each($newcols))
					{
						$newcolumns .= ($newcolumns?', ':'').$this->quote_id($val);
						$oldcolumns .= ($oldcolumns?', ':'').$this->quote_id($key);
					}
					$copytotempsql = 'INSERT INTO '.$this->quote_id($tmpname).'('.$newcolumns.') SELECT '.$oldcolumns.' FROM '.$this->quote_id($table);
					$dropoldsql = 'DROP TABLE '.$this->quote_id($table);
					$createtesttableSQL = $createtemptableSQL;
					if(count($defs)<1)
					{
						$this->alterError = $errormsg . $lang['alter_no_def'];
						if($debug) echo "ERROR: defs&lt;1<hr />";
						return false;
					}
					foreach($defs as $def)
					{
						if($debug) echo "def=$def<hr />";
						$parse_def = preg_match("/^(DROP|ADD|CHANGE|RENAME TO)\s+(?:\"((?:[^\"]|\"\")+)\"|'((?:[^']|'')+)')((?:\s+'((?:[^']|'')+)')?\s+(TEXT|INTEGER|BLOB|REAL).*)?\s*$/i",$def,$matches);
						if($parse_def===false)
						{
							$this->alterError = $errormsg . $lang['alter_parse_failed'];
							if($debug) echo "ERROR: !parse_def<hr />";
							return false;
						}
						if(!isset($matches[1]))
						{
							$this->alterError = $errormsg . $lang['alter_action_not_recognized'];
							if($debug) echo "ERROR: !isset(matches[1])<hr />";
							return false;
						}
						$action = strtolower($matches[1]);
						if($action == 'add' || $action == 'rename to')	
							$column = str_replace("''","'",$matches[3]);		// enclosed in ''
						else
							$column = str_replace('""','"',$matches[2]);		// enclosed in ""
							
						$column_escaped = str_replace("'","''",$column);

						if($debug) echo "action=($action), column=($column), column_escaped=($column_escaped)<hr />";

						/* we build a regex that devides the CREATE TABLE statement parts:
						  Part example                            Group  Explanation
						  1. CREATE TABLE t... (                  $1
						  2. 'col1' ..., 'col2' ..., 'colN' ...,  $3     (with col1-colN being columns that are not changed and listed before the col to change)
						  3. 'colX' ...,                                 (with colX being the column to change/drop)
						  4. 'colX+1' ..., ..., 'colK')           $5     (with colX+1-colK being columns after the column to change/drop)
						*/
						$preg_create_table = "\s*+(CREATE\s++TEMPORARY\s++TABLE\s++".preg_quote($this->quote($tmpname),"/")."\s*+\()";   // This is group $1 (keep unchanged)
						$preg_column_definiton = "\s*+".$this->sqlite_surroundings_preg("+",false," '\"\[`,")."(?:\s+".$this->sqlite_surroundings_preg("*",false,"'\",`\[ ").")++";		// catches a complete column definition, even if it is
														// 'column' TEXT NOT NULL DEFAULT 'we have a comma, here and a double ''quote!'
						if($debug) echo "preg_column_definition=(".$preg_column_definiton.")<hr />";
						$preg_columns_before =  // columns before the one changed/dropped (keep)
							"(?:".
								"(".			// group $2. Keep this one unchanged!
									"(?:".
										"$preg_column_definiton,\s*+".		// column definition + comma
									")*".								// there might be any number of such columns here
									$preg_column_definiton.				// last column definition 
								")".			// end of group $2
								",\s*+"			// the last comma of the last column before the column to change. Do not keep it!
							.")?";    // there might be no columns before
						if($debug) echo "preg_columns_before=(".$preg_columns_before.")<hr />";
						$preg_columns_after = "(,\s*(.+))?"; // the columns after the column to drop. This is group $3 (drop) or $4(change) (keep!)
												// we could remove the comma using $6 instead of $5, but then we might have no comma at all.
												// Keeping it leaves a problem if we drop the first column, so we fix that case in another regex.
						$table_new = $table;
	
						switch($action)
						{
							case 'add':
								if(!isset($matches[4]))
								{
									$this->alterError = $errormsg . ' (add) - '. $lang['alter_no_add_col'];
									return false;
								}
								$new_col_definition = "'$column_escaped' ".$matches[4];
								$preg_pattern_add = "/^".$preg_create_table.   // the CREATE TABLE statement ($1)
									"((?:(?!,\s*(?:PRIMARY\s+KEY\s*\(|CONSTRAINT\s|UNIQUE\s*\(|CHECK\s*\(|FOREIGN\s+KEY\s*\()).)*)". // column definitions ($2)
									"(.*)\\)\s*$/s"; // table-constraints like PRIMARY KEY(a,b) ($3) and the closing bracket
								// append the column definiton in the CREATE TABLE statement
								$newSQL = preg_replace($preg_pattern_add, '$1$2, '.strtr($new_col_definition, array('\\' => '\\\\', '$' => '\$')).' $3', $createtesttableSQL).')';
								if($debug)
								{
									echo $createtesttableSQL."<hr>";
									echo $newSQL."<hr>";
									echo $preg_pattern_add."<hr>";
								}
								if($newSQL==$createtesttableSQL) // pattern did not match, so column adding did not succed
									{
									$this->alterError = $errormsg . ' (add) - '.$lang['alter_pattern_mismatch'].'. '.$lang['bug_report'].' '.PROJECT_BUGTRACKER_LINK;
									return false;
									}
								$createtesttableSQL = $newSQL;
								break;
							case 'change':
								if(!isset($matches[5]) || !isset($matches[6]))
								{
									$this->alterError = $errormsg . ' (change) - '.$lang['alter_col_not_recognized'];
									return false;
								}
								$new_col_name = $matches[5];
								$new_col_type = $matches[6];
								$new_col_definition = "'$new_col_name' $new_col_type";
								$preg_column_to_change = "\s*".$this->sqlite_surroundings_preg($column)."(?:\s+".preg_quote($coltypes[$column]).")?(\s+(?:".$this->sqlite_surroundings_preg("*",false,",'\"`\[").")+)?";
												// replace this part (we want to change this column)
												// group $3 contains the column constraints (keep!). the name & data type is replaced.
								$preg_pattern_change = "/^".$preg_create_table.$preg_columns_before.$preg_column_to_change.$preg_columns_after."\s*\\)\s*$/s";

								// replace the column definiton in the CREATE TABLE statement
								$newSQL = preg_replace($preg_pattern_change, '$1$2,'.strtr($new_col_definition, array('\\' => '\\\\', '$' => '\$')).'$3$4)', $createtesttableSQL);
								// remove comma at the beginning if the first column is changed
								// probably somebody is able to put this into the first regex (using lookahead probably).
								$newSQL = preg_replace("/^\s*(CREATE\s+TEMPORARY\s+TABLE\s+".preg_quote($this->quote($tmpname),"/")."\s+\(),\s*/",'$1',$newSQL);
								if($debug)
								{
									echo "preg_column_to_change=(".$preg_column_to_change.")<hr />";
									echo $createtesttableSQL."<hr />";
									echo $newSQL."<hr />";

									echo $preg_pattern_change."<hr />";
									
								}
								if($newSQL==$createtesttableSQL || $newSQL=="") // pattern did not match, so column removal did not succed
								{
									$this->alterError = $errormsg . ' (change) - '.$lang['alter_pattern_mismatch'].'. '.$lang['bug_report'].' '.PROJECT_BUGTRACKER_LINK;
									return false;
								}
								$createtesttableSQL = $newSQL;
								$newcols[$column] = str_replace("''","'",$new_col_name);
								break;
							case 'drop':
								$preg_column_to_drop = "\s*".$this->sqlite_surroundings_preg($column)."\s+(?:".$this->sqlite_surroundings_preg("*",false,",'\"\[`").")+";      // delete this part (we want to drop this column)
								$preg_pattern_drop = "/^".$preg_create_table.$preg_columns_before.$preg_column_to_drop.$preg_columns_after."\s*\\)\s*$/s";

								// remove the column out of the CREATE TABLE statement
								$newSQL = preg_replace($preg_pattern_drop, '$1$2$3)', $createtesttableSQL);
								// remove comma at the beginning if the first column is removed
								// probably somebody is able to put this into the first regex (using lookahead probably).
								$newSQL = preg_replace("/^\s*(CREATE\s+TEMPORARY\s+TABLE\s+".preg_quote($this->quote($tmpname),"/")."\s+\(),\s*/",'$1',$newSQL);
								if($debug)
								{
									echo $createtesttableSQL."<hr>";
									echo $newSQL."<hr>";
									echo $preg_pattern_drop."<hr>";
								}
								if($newSQL==$createtesttableSQL || $newSQL=="") // pattern did not match, so column removal did not succed
								{
									$this->alterError = $errormsg . ' (drop) - '.$lang['alter_pattern_mismatch'].'. '.$lang['bug_report'].' '.PROJECT_BUGTRACKER_LINK;
									return false;
								}
								$createtesttableSQL = $newSQL;
								unset($newcols[$column]);
								break;
							case 'rename to':
								// don't change column definition at all
								$newSQL = $createtesttableSQL;
								// only change the name of the table
								$table_new = $column;
								break;
							default:
								if($debug) echo 'ERROR: unknown alter operation!<hr />';
								$this->alterError = $errormsg . $lang['alter_unknown_operation'];
								return false;
						}
					}
					$droptempsql = 'DROP TABLE '.$this->quote_id($tmpname);

					$createnewtableSQL = "CREATE TABLE ".$this->quote($table_new)." ".preg_replace("/^\s*CREATE\s+TEMPORARY\s+TABLE\s+'?".str_replace("'","''",preg_quote($tmpname,"/"))."'?\s+(.*)$/is", '$1', $createtesttableSQL, 1);

					$newcolumns = '';
					$oldcolumns = '';
					reset($newcols);
					while(list($key,$val) = each($newcols))
					{
						$newcolumns .= ($newcolumns?', ':'').$this->quote_id($val);
						$oldcolumns .= ($oldcolumns?', ':'').$this->quote_id($key);
					}
					$copytonewsql = 'INSERT INTO '.$this->quote_id($table_new).'('.$newcolumns.') SELECT '.$oldcolumns.' FROM '.$this->quote_id($tmpname);
				}
			}
			$alter_transaction  = 'BEGIN; ';
			$alter_transaction .= $createtemptableSQL.'; ';  //create temp table
			$alter_transaction .= $copytotempsql.'; ';       //copy to table
			$alter_transaction .= $dropoldsql.'; ';          //drop old table
			$alter_transaction .= $createnewtableSQL.'; ';   //recreate original table
			$alter_transaction .= $copytonewsql.'; ';        //copy back to original table
			$alter_transaction .= $droptempsql.'; ';         //drop temp table

			$preg_index="/^\s*(CREATE\s+(?:UNIQUE\s+)?INDEX\s+(?:".$this->sqlite_surroundings_preg("+",false," '\"\[`")."\s*)*ON\s+)(".$this->sqlite_surroundings_preg($table).")(\s*\((?:".$this->sqlite_surroundings_preg("+",false," '\"\[`")."\s*)*\)\s*;)\s*$/i";				
			for($i=0; $i<sizeof($recreateQueries); $i++)
			{
				// recreate triggers / indexes
				if($table == $table_new)
				{
					// we had no RENAME TO, so we can recreate indexes/triggers just like the original ones
				    $alter_transaction .= $recreateQueries[$i];
				} else
				{
					// we had a RENAME TO, so we need to exchange the table-name in the CREATE-SQL of triggers & indexes
					// first let's try if it's an index...
					$recreate_queryIndex = preg_replace($preg_index, '$1'.$this->quote_id(strtr($table_new, array('\\' => '\\\\', '$' => '\$'))).'$3 ', $recreateQueries[$i]);
					if($recreate_queryIndex!=$recreateQueries[$i] && $recreate_queryIndex != NULL)
					{
						// the CREATE INDEX regex did match
						$alter_transaction .= $recreate_queryIndex;
					} else
					{
						// the CREATE INDEX regex did not match, so we try if it's a CREATE TRIGGER
						
					    $recreate_queryTrigger = $recreateQueries[$i];
						// TODO: IMPLEMENT
					    
						$alter_transaction .= $recreate_queryTrigger;
					}
				}
			}
			$alter_transaction .= 'COMMIT;';
			if($debug) echo $alter_transaction;
			return $this->multiQuery($alter_transaction);
		}
	}

	//multiple query execution
	public function multiQuery($query)
	{
		$error = "Unknown error.";
		if($this->type=="PDO")
		{
			$success = $this->db->exec($query);
			if(!$success) $error =  implode(" - ", $this->db->errorInfo());
		}
		else if($this->type=="SQLite3")
		{
			$success = $this->db->exec($query);
			if(!$success) $error = $this->db->lastErrorMsg();
		}
		else
		{
			$success = $this->db->queryExec($query, $error);
		}
		if(!$success)
		{
			return "Error in query: '".htmlencode($error)."'";
		}
		else
		{
			return true;	
		}
	}

	
	// checks whether a table has a primary key
	public function hasPrimaryKey($table)
	{
		$query = "PRAGMA table_info(".$this->quote_id($table).")";
		$table_info = $this->selectArray($query);
		foreach($table_info as $row_id => $row_data)
		{
			if($row_data['pk'])
			{
				return true;
			}
		 
		}
		return false;
	}
	
	//get number of rows in table
	public function numRows($table, $dontTakeLong = false)
	{
		// as Count(*) can be slow on huge tables without PK,
		// if $dontTakeLong is set and the size is > 2MB only count() if there is a PK
		if(!$dontTakeLong || $this->getSize() <= 2000 || $this->hasPrimaryKey($table))
		{
			$result = $this->select("SELECT Count(*) FROM ".$this->quote_id($table));
			return $result[0];
		} else
		{
			return '?';
		}
	}

	//correctly escape a string to be injected into an SQL query
	public function quote($value)
	{
		if($this->type=="PDO")
		{
			// PDO quote() escapes and adds quotes
			return $this->db->quote($value);
		}
		else if($this->type=="SQLite3")
		{
			return "'".$this->db->escapeString($value)."'";
		}
		else
		{
			return "'".sqlite_escape_string($value)."'";
		}
	}

	//correctly escape an identifier (column / table / trigger / index name) to be injected into an SQL query
	public function quote_id($value)
	{
		// double-quotes need to be escaped by doubling them
		$value = str_replace('"','""',$value);
		return '"'.$value.'"';
	}


	//import sql
	public function import_sql($query)
	{
		return $this->multiQuery($query);
	}
	
	//import csv
	public function import_csv($filename, $table, $field_terminate, $field_enclosed, $field_escaped, $null, $fields_in_first_row)
	{
		// CSV import implemented by Christopher Kramer - http://www.christosoft.de
		$csv_handle = fopen($filename,'r');
		$csv_insert = "BEGIN;\n";
		$csv_number_of_rows = 0;
		// PHP requires enclosure defined, but has no problem if it was not used
		if($field_enclosed=="") $field_enclosed='"';
		// PHP requires escaper defined
		if($field_escaped=="") $field_escaped='\\';
		while(!feof($csv_handle))
		{
			$csv_data = fgetcsv($csv_handle, 0, $field_terminate, $field_enclosed, $field_escaped); 
			if($csv_data[0] != NULL || count($csv_data)>1)
			{
				$csv_number_of_rows++;
				if($fields_in_first_row && $csv_number_of_rows==1) continue; 
				$csv_col_number = count($csv_data);
				$csv_insert .= "INSERT INTO ".$this->quote_id($table)." VALUES (";
				foreach($csv_data as $csv_col => $csv_cell)
				{
					if($csv_cell == $null) $csv_insert .= "NULL";
					else
					{
						$csv_insert.= $this->quote($csv_cell);
					}
					if($csv_col == $csv_col_number-2 && $csv_data[$csv_col+1]=='')
					{
						// the CSV row ends with the separator (like old phpliteadmin exported)
						break;
					} 
					if($csv_col < $csv_col_number-1) $csv_insert .= ",";
				}
				$csv_insert .= ");\n";
				
				if($csv_number_of_rows > 5000)
				{
					$csv_insert .= "COMMIT;\nBEGIN;\n";
					$csv_number_of_rows = 0;
				}
			}
		}
		$csv_insert .= "COMMIT;";
		fclose($csv_handle);
		return $this->multiQuery($csv_insert);

	}
	
	//export csv
	public function export_csv($tables, $field_terminate, $field_enclosed, $field_escaped, $null, $crlf, $fields_in_first_row)
	{
		$field_enclosed = $field_enclosed;
		$query = "SELECT * FROM sqlite_master WHERE type='table' or type='view' ORDER BY type DESC";
		$result = $this->selectArray($query);
		for($i=0; $i<sizeof($result); $i++)
		{
			$valid = false;
			for($j=0; $j<sizeof($tables); $j++)
			{
				if($result[$i]['tbl_name']==$tables[$j])
					$valid = true;
			}
			if($valid)
			{
				$query = "PRAGMA table_info(".$this->quote_id($result[$i]['tbl_name']).")";
				$temp = $this->selectArray($query);
				$cols = array();
				for($z=0; $z<sizeof($temp); $z++)
					$cols[$z] = $temp[$z][1];
				if($fields_in_first_row)
				{
					for($z=0; $z<sizeof($cols); $z++)
					{
						echo $field_enclosed.$cols[$z].$field_enclosed;
						// do not terminate the last column!
						if($z < sizeof($cols)-1)
							echo $field_terminate;
					}
					echo "\r\n";	
				}
				$query = "SELECT * FROM ".$this->quote_id($result[$i]['tbl_name']);
				$arr = $this->selectArray($query, "assoc");
				for($z=0; $z<sizeof($arr); $z++)
				{
					for($y=0; $y<sizeof($cols); $y++)
					{
						$cell = $arr[$z][$cols[$y]];
						if($crlf)
						{
							$cell = str_replace("\n","", $cell);
							$cell = str_replace("\r","", $cell);
						}
						$cell = str_replace($field_terminate,$field_escaped.$field_terminate,$cell);
						$cell = str_replace($field_enclosed,$field_escaped.$field_enclosed,$cell);
						// do not enclose NULLs
						if($cell == NULL)
							echo $null;  
						else
							echo $field_enclosed.$cell.$field_enclosed;
						// do not terminate the last column!
						if($y < sizeof($cols)-1)
							echo $field_terminate;
					}
					if($z<sizeof($arr)-1)
						echo "\r\n";	
				}
				if($i<sizeof($result)-1)
					echo "\r\n";
			}
		}
	}
	
	//export sql
	public function export_sql($tables, $drop, $structure, $data, $transaction, $comments)
	{
		global $lang;
		if($comments)
		{
			echo "----\r\n";
			echo "-- ".PROJECT." ".$lang['db_dump']." (".PROJECT_URL.")\r\n";
			echo "-- ".PROJECT." ".$lang['ver'].": ".VERSION."\r\n";
			echo "-- ".$lang['exported'].": ".date($lang['date_format'])."\r\n";
			echo "-- ".$lang['db_f'].": ".$this->getPath()."\r\n";
			echo "----\r\n";
		}
		$query = "SELECT * FROM sqlite_master WHERE type='table' OR type='index' OR type='view' OR type='trigger' ORDER BY type='trigger', type='index', type='view', type='table'";
		$result = $this->selectArray($query);

		if($transaction)
			echo "BEGIN TRANSACTION;\r\n";

		//iterate through each table
		for($i=0; $i<sizeof($result); $i++)
		{
			$valid = false;
			for($j=0; $j<sizeof($tables); $j++)
			{
				if($result[$i]['tbl_name']==$tables[$j])
					$valid = true;
			}
			if($valid)
			{
				if($drop)
				{
					if($comments)
					{
						echo "\r\n----\r\n";
						echo "-- ".$lang['drop']." ".$result[$i]['type']." ".$lang['for']." ".$result[$i]['name']."\r\n";
						echo "----\r\n";
					}
					echo "DROP ".strtoupper($result[$i]['type'])." ".$this->quote_id($result[$i]['name']).";\r\n";
				}
				if($structure)
				{
					if($comments)
					{
						echo "\r\n----\r\n";
						if($result[$i]['type']=="table" || $result[$i]['type']=="view")
							echo "-- ".ucfirst($result[$i]['type'])." ".$lang['struct_for']." ".$result[$i]['tbl_name']."\r\n";
						else // index or trigger
							echo "-- ".$lang['struct_for']." ".$result[$i]['type']." ".$result[$i]['name']." ".$lang['on_tbl']." ".$result[$i]['tbl_name']."\r\n";
						echo "----\r\n";
					}
					echo $result[$i]['sql'].";\r\n";
				}
				if($data && $result[$i]['type']=="table")
				{
					$query = "SELECT * FROM ".$this->quote_id($result[$i]['tbl_name']);
					$arr = $this->selectArray($query, "assoc");

					if($comments)
					{
						echo "\r\n----\r\n";
						echo "-- ".$lang['data_dump']." ".$result[$i]['tbl_name'].", ".sprintf($lang['total_rows'], sizeof($arr))."\r\n";
						echo "----\r\n";
					}
					$query = "PRAGMA table_info(".$this->quote_id($result[$i]['tbl_name']).")";
					$temp = $this->selectArray($query);
					$cols = array();
					$cols_quoted = array();
					$vals = array();
					for($z=0; $z<sizeof($temp); $z++)
					{
						$cols[$z] = $temp[$z][1];
						$cols_quoted[$z] = $this->quote_id($temp[$z][1]);
					}
					for($z=0; $z<sizeof($arr); $z++)
					{
						for($y=0; $y<sizeof($cols); $y++)
						{
							if(!isset($vals[$z]))
								$vals[$z] = array();
							if($arr[$z][$cols[$y]] === NULL)
								$vals[$z][$cols[$y]] = 'NULL';
							else
								$vals[$z][$cols[$y]] = $this->quote($arr[$z][$cols[$y]]);
						}
					}
					for($j=0; $j<sizeof($vals); $j++)
						echo "INSERT INTO ".$this->quote_id($result[$i]['tbl_name'])." (".implode(",", $cols_quoted).") VALUES (".implode(",", $vals[$j]).");\r\n";
				}
			}
		}
		if($transaction)
			echo "COMMIT;\r\n";
	}
}

$auth = new Authorization(); //create authorization object

// check if user has attempted to log out
if (isset($_POST['logout']))
	$auth->revoke();
// check if user has attempted to log in
else if (isset($_POST['login']) && isset($_POST['password']))
	$auth->attemptGrant($_POST['password'], isset($_POST['remember']));

if ($auth->isAuthorized())
{

	//user is creating a new Database
	if(isset($_POST['new_dbname']))
	{
		if($_POST['new_dbname']=='')
		{
			// TODO: Display an error message (do NOT echo here. echo below in the html-body!)
		}
		else
		{
			$str = preg_replace('@[^\w-.]@','', $_POST['new_dbname']);
			$dbname = $str;
			$dbpath = $str;
			if(checkDbName($dbname))
			{
				$tdata = array();	
				$tdata['name'] = $dbname;
				$tdata['path'] = $directory.DIRECTORY_SEPARATOR.$dbpath;
				$td = new Database($tdata);
				$td->query("VACUUM");
			} else
			{
				if(is_file($dbname) || is_dir($dbname)) $dbexists = true;
				else $extension_not_allowed=true;
			}
		}
	}
	
	//if the user wants to scan a directory for databases, do so
	if($directory!==false)
	{
		if($directory[strlen($directory)-1]==DIRECTORY_SEPARATOR) //if user has a trailing slash in the directory, remove it
			$directory = substr($directory, 0, strlen($directory)-1);
			
		if(is_dir($directory)) //make sure the directory is valid
		{
			if($subdirectories===true)
				$arr = dir_tree($directory);
			else
				$arr = scandir($directory);
			$databases = array();
			$j = 0;
			for($i=0; $i<sizeof($arr); $i++) //iterate through all the files in the databases
			{
				if($subdirectories===false)
					$arr[$i] = $directory.DIRECTORY_SEPARATOR.$arr[$i];
				
				if(@!is_file($arr[$i])) continue;
				$con = file_get_contents($arr[$i], NULL, NULL, 0, 60);
				if(strpos($con, "** This file contains an SQLite 2.1 database **", 0)!==false || strpos($con, "SQLite format 3", 0)!==false)
				{
					$databases[$j]['path'] = $arr[$i];
					if($subdirectories===false)
						$databases[$j]['name'] = basename($arr[$i]);
					else
						$databases[$j]['name'] = $arr[$i];
					$databases[$j]['writable'] = is_writable($databases[$j]['path']);
					$databases[$j]['writable_dir'] = is_writable(dirname($databases[$j]['path']));
					$databases[$j]['readable'] = is_readable($databases[$j]['path']);
					$j++;
				}
			}
			// 22 August 2011: gkf fixed bug #50.
			sort($databases);
			if(isset($tdata))
			{
				foreach($databases as $db_id => $database)
				{
					if($database['path'] == $tdata['path'])
					{
						$_SESSION[COOKIENAME.'currentDB'] = $database;
						break;
					}
				}
			}
		}
		else //the directory is not valid - display error and exit
		{
			echo "<div class='confirm' style='margin:20px;'>".$lang['not_dir']."</div>";
			exit();
		}
	}
	else
	{
		for($i=0; $i<sizeof($databases); $i++)
		{
			if(!file_exists($databases[$i]['path']))
				continue; //skip if file not found ! - probably a warning can be displayed - later
			$databases[$i]['writable'] = is_writable($databases[$i]['path']);
			$databases[$i]['writable_dir'] = is_writable(dirname($databases[$i]['path']));
			$databases[$i]['readable'] = is_readable($databases[$i]['path']);
		}
		sort($databases);
	}
	// we now have the $databases array set. Check whethet currentDB is a managed Db (is in this array)
	if(isset($_SESSION[COOKIENAME.'currentDB']) && isManagedDB($_SESSION[COOKIENAME.'currentDB']['path']) === false)
		unset($_SESSION[COOKIENAME.'currentDB']);
	
	//user is deleting a database
	if(isset($_GET['database_delete']))
	{
		$dbpath = $_POST['database_delete'];
		// check whether $dbpath really is a db we manage
		$checkDB = isManagedDB($dbpath);
		if($checkDB !== false)
		{
			unlink($dbpath);
			unset($_SESSION[COOKIENAME.'currentDB']);
			unset($databases[$checkDB]);
		} else die($lang['err'].': '.$lang['delete_only_managed']);
	}
	
	//user is renaming a database
	if(isset($_GET['database_rename']))
	{
		$oldpath = $_POST['oldname'];
		$newpath = $_POST['newname'];
		$oldpath_parts = pathinfo($oldpath);
		$newpath_parts = pathinfo($newpath);
		// only rename?
		$newpath = $oldpath_parts['dirname'].DIRECTORY_SEPARATOR.basename($_POST['newname']);
		if($newpath != $_POST['newname'] && $subdirectories)
		{
			// it seems that the file should not only be renamed but additionally moved.
			// we need to make sure it stays within $directory...
			$new_realpath = realpath($newpath_parts['dirname']).DIRECTORY_SEPARATOR;
			$directory_realpath = realpath($directory).DIRECTORY_SEPARATOR;
			if(strpos($new_realpath, $directory_realpath)===0)
			{
				// its okay, the new directory is within $directory
				$newpath =  $_POST['newname'];
			}
			else die($lang['err'].': '.$lang['db_moved_outside']);
		}
		
		if(checkDbName($newpath))
		{
			$checkDB = isManagedDB($oldpath);
			if($checkDB !==false )
			{
				rename($oldpath, $newpath);
				$databases[$checkDB]['path'] = $newpath;
				$databases[$checkDB]['name'] = basename($newpath);
				$_SESSION[COOKIENAME.'currentDB'] = $databases[$checkDB]; 
				$justrenamed = true;
			}
			else die($lang['err'].': '.$lang['rename_only_managed']);
		}
		else
		{
			if(is_file($newpath) || is_dir($newpath)) $dbexists = true;
			else $extension_not_allowed = true;	
		}
	}

	
	//user is downloading the exported database file
	if(isset($_POST['export']))
	{
		if($_POST['export_type']=="sql")
		{
			header('Content-Type: text/sql');
			header('Content-Disposition: attachment; filename="'.$_POST['filename'].'.'.$_POST['export_type'].'";');
			if(isset($_POST['tables']))
				$tables = $_POST['tables'];
			else
			{
				$tables = array();
				$tables[0] = $_POST['single_table'];
			}
			$drop = isset($_POST['drop']);
			$structure = isset($_POST['structure']);
			$data = isset($_POST['data']);
			$transaction = isset($_POST['transaction']);
			$comments = isset($_POST['comments']);
			$db = new Database($_SESSION[COOKIENAME.'currentDB']);
			echo $db->export_sql($tables, $drop, $structure, $data, $transaction, $comments);
		}
		else if($_POST['export_type']=="csv")
		{
			header("Content-type: application/csv");
			header('Content-Disposition: attachment; filename="'.$_POST['filename'].'.'.$_POST['export_type'].'";');
			header("Pragma: no-cache");
			header("Expires: 0");
			if(isset($_POST['tables']))
				$tables = $_POST['tables'];
			else
			{
				$tables = array();
				$tables[0] = $_POST['single_table'];
			}
			$field_terminate = $_POST['export_csv_fieldsterminated'];
			$field_enclosed = $_POST['export_csv_fieldsenclosed'];
			$field_escaped = $_POST['export_csv_fieldsescaped'];
			$null = $_POST['export_csv_replacenull'];
			$crlf = isset($_POST['export_csv_crlf']);
			$fields_in_first_row = isset($_POST['export_csv_fieldnames']);
			$db = new Database($_SESSION[COOKIENAME.'currentDB']);
			echo $db->export_csv($tables, $field_terminate, $field_enclosed, $field_escaped, $null, $crlf, $fields_in_first_row);
		}
		exit();
	}
	
	//user is importing a file
	if(isset($_POST['import']))
	{
		$db = new Database($_SESSION[COOKIENAME.'currentDB']);
		if($_POST['import_type']=="sql")
		{
			$data = file_get_contents($_FILES["file"]["tmp_name"]);
			$importSuccess = $db->import_sql($data);
		}
		else
		{
			$field_terminate = $_POST['import_csv_fieldsterminated'];
			$field_enclosed = $_POST['import_csv_fieldsenclosed'];
			$field_escaped = $_POST['import_csv_fieldsescaped'];
			$null = $_POST['import_csv_replacenull'];
			$fields_in_first_row = isset($_POST['import_csv_fieldnames']);
			$importSuccess = $db->import_csv($_FILES["file"]["tmp_name"], $_POST['single_table'], $field_terminate, $field_enclosed, $field_escaped, $null, $fields_in_first_row);
		}
	}
}

header('Content-Type: text/html; charset=utf-8');

// here begins the HTML.
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<!-- Copyright <?php echo date("Y").' '.PROJECT.' ('.PROJECT_URL.')'; ?> -->
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<link rel="shortcut icon" href="<?php echo PAGE ?>?resource=favicon" />
<title><?php echo PROJECT ?></title>

<?php
if(isset($_GET['theme'])) $theme = basename($_GET['theme']);

// allow themes to be dropped in subfolder "themes"
if(is_file('themes/'.$theme)) $theme = 'themes/'.$theme;

if (file_exists($theme))
	// an external stylesheet exists - import it
	echo "<link href='{$theme}' rel='stylesheet' type='text/css' />", PHP_EOL;
else
	// only use the default stylesheet if an external one does not exist
	echo "<link href='", PAGE, "?resource=css' rel='stylesheet' type='text/css' />", PHP_EOL;

if(isset($_GET['help'])) //this page is used as the popup help section
{
	//help section array
	$help = array
	(
		$lang['help1'] => sprintf($lang['help1_x'], PROJECT, PROJECT, PROJECT), $lang['help2'] => $lang['help2_x'], $lang['help3'] => $lang['help3_x'], 
		$lang['help4'] => $lang['help4_x'], $lang['help5'] => $lang['help5_x'], $lang['help6'] => $lang['help6_x'],
		$lang['help7'] => $lang['help7_x'], $lang['help8'] => $lang['help8_x'], $lang['help9'] => $lang['help9_x']
	);
	?>
	</head>
	<body style="direction:<?php echo $lang['direction']; ?>;">
	<div id='help_container'>
	<?php
	echo "<div class='help_list'>";
	echo "<span style='font-size:18px;'>".PROJECT." v".VERSION." ".$lang['help_doc']."</span><br/><br/>";
	foreach((array)$help as $key => $val)
	{
		echo "<a href='#".$key."'>".$key."</a><br/>";
	}
	echo "</div>";
	echo "<br/><br/>";
	foreach((array)$help as $key => $val)
	{
		echo "<div class='help_outer'>";
		echo "<a class='headd' name='".$key."'>".$key."</a>";
		echo "<div class='help_inner'>";
		echo $val;
		echo "</div>";
		echo "<a class='help_top' href='#top'>".$lang['back_top']."</a>"; 
		echo "</div>";
	}
	?>
	</div>
	</body>
	</html>
	<?php
	exit();		
}
?>
<!-- JavaScript Support -->
<script type='text/javascript' src='<?php echo PAGE ?>?resource=javascript'></script>
</head>
<body style="direction:<?php echo $lang['direction']; ?>;">
<?php
if(ini_get("register_globals") == "on" || ini_get("register_globals")=="1") //check whether register_globals is turned on - if it is, we need to not continue
{
	echo "<div class='confirm' style='margin:20px;'>".$lang['bad_php_directive']."</div>";
	echo "</body></html>";
	exit();
}

if(!$auth->isAuthorized()) //user is not authorized - display the login screen
{
	echo "<div id='loginBox'>";
	echo "<h1><span id='logo'>".PROJECT."</span> <span id='version'>v".VERSION."</span></h1>";
	echo "<div style='padding:15px; text-align:center;'>";
	if ($auth->isFailedLogin())
		echo "<span class='warning'>".$lang['passwd_incorrect']."</span><br/><br/>";
	echo "<form action='".PAGE."' method='post'>";
	echo $lang['passwd'].": <input type='password' name='password'/><br/>";
	echo "<label><input type='checkbox' name='remember' value='yes' checked='checked'/> ".$lang['remember']."</label><br/><br/>";
	echo "<input type='submit' value='".$lang['login']."' class='btn'/>";
	echo "<input type='hidden' name='login' value='true' />";
	echo "</form>";
	echo "</div>";
	echo "</div>";
	echo "<br/>";
	echo "<div style='text-align:center;'>";
	echo "<span style='font-size:11px;'>".$lang['powered']." <a href='".PROJECT_URL."' target='_blank' style='font-size:11px;'>".PROJECT."</a> | "; 
	printf($lang['page_gen'], $pageTimer);
	echo "</span></div>";
}
else //user is authorized - display the main application
{
	if(!isset($_SESSION[COOKIENAME.'currentDB']) && count($databases)>0)
	{
		//set the current database to the first existing one in the array (default)
		$i=0;
		// this might not be $databases[0], as this might have just been dropped
		while(!isset($databases[$i]) && $i<(count($databases)+1)) $i++;
		$_SESSION[COOKIENAME.'currentDB'] = $databases[$i];
	}
	if(sizeof($databases)>0)
		$currentDB = $_SESSION[COOKIENAME.'currentDB'];
	else //the database array is empty - show error and halt execution
	{
		if($directory!==false && is_writable($directory))
		{
			echo "<div class='confirm' style='margin:20px;'>";
			printf($lang['no_db'], PROJECT, PROJECT);
			echo "</div>";	
			if(isset($extension_not_allowed))
			{
				echo "<div class='confirm' style='margin:10px 20px;'>";
				echo $lang['err'].': '.$lang['extension_not_allowed'].': ';
				foreach($allowed_extensions as $ext_i => $extension)
					echo htmlencode($extension). ($ext_i==count($allowed_extensions)-1?'':', ');
				echo '<br />'.$lang['add_allowed_extension'];
				echo "</div><br/>";
			}			
			echo "<fieldset style='margin:15px;'><legend><b>".$lang['db_create']."</b></legend>";
			echo "<form name='create_database' method='post' action='".PAGE."'>";
			echo "<input type='text' name='new_dbname' style='width:150px;'/> <input type='submit' value='".$lang['create']."' class='btn'/>";
			echo "</form>";
			echo "</fieldset>";
		}
		else
		{
			echo "<div class='confirm' style='margin:20px;'>";
			echo $lang['err'].": ".sprintf($lang['no_db2'], PROJECT);
			echo "</div><br/>";	
		}
		exit();
	}

	if(isset($_POST['database_switch'])) //user is switching database with drop-down menu
	{
		foreach($databases as $db_id => $database)
		{
			if($database['path'] == $_POST['database_switch'])
			{
				$_SESSION[COOKIENAME."currentDB"] = $database;
				break;
			}
		}
		$currentDB = $_SESSION[COOKIENAME.'currentDB'];
	}
	else if(isset($_GET['switchdb']))
	{
		foreach($databases as $db_id => $database)
		{
			if($database['path'] == $_GET['switchdb'])
			{
				$_SESSION[COOKIENAME."currentDB"] = $database;
				break;
			}
		}
		$currentDB = $_SESSION[COOKIENAME.'currentDB'];
	}
	if(isset($_SESSION[COOKIENAME.'currentDB']) && in_array($_SESSION[COOKIENAME.'currentDB'], $databases))
		$currentDB = $_SESSION[COOKIENAME.'currentDB'];

	//create the objects
	$db = new Database($currentDB); //create the Database object

	//switch board for various operations a user could have requested - these actions are invisible and produce no output
	if(isset($_GET['action']) && isset($_GET['confirm']))
	{
		switch($_GET['action'])
		{
			//table actions
			/////////////////////////////////////////////// create table
			case "table_create":
				$num = intval($_POST['rows']);
				$name = $_POST['tablename'];
				$primary_keys = array();
				for($i=0; $i<$num; $i++)
				{
					if($_POST[$i.'_field']!="" && isset($_POST[$i.'_primarykey']))
					{
						$primary_keys[] = $_POST[$i.'_field'];
					}
				}
				$query = "CREATE TABLE ".$db->quote($name)." (";
				for($i=0; $i<$num; $i++)
				{
					if($_POST[$i.'_field']!="")
					{
						$query .= $db->quote($_POST[$i.'_field'])." ";
						$query .= $_POST[$i.'_type']." ";
						if(isset($_POST[$i.'_primarykey']))
						{
							if(count($primary_keys)==1)
							{
								$query .= "PRIMARY KEY "; 
								if(isset($_POST[$i.'_autoincrement']) && $db->getType() != "SQLiteDatabase")
									$query .=  "AUTOINCREMENT ";
							}
							$query .= "NOT NULL ";
						}
						if(!isset($_POST[$i.'_primarykey']) && isset($_POST[$i.'_notnull']))
							$query .= "NOT NULL ";
						if($_POST[$i.'_defaultvalue']!="")
						{
							if($_POST[$i.'_type']=="INTEGER" && is_numeric($_POST[$i.'_defaultvalue']))
								$query .= "default ".$_POST[$i.'_defaultvalue']."  ";
							else
								$query .= "default ".$db->quote($_POST[$i.'_defaultvalue'])." ";
						}
						$query = substr($query, 0, sizeof($query)-2);
						$query .= ", ";
					}
				}
				if (count($primary_keys)>1)
				{
					$compound_key = "";
					foreach ($primary_keys as $primary_key)
					{
						$compound_key .= ($compound_key=="" ? "" : ", ") . $db->quote($primary_key);
					}
					$query .= "PRIMARY KEY (".$compound_key."), ";
				}
				$query = substr($query, 0, sizeof($query)-3);
				$query .= ")";
				$result = $db->query($query);
				if(!$result)
					$error = true;
				$completed = $lang['tbl']." '".htmlencode($_POST['tablename'])."' ".$lang['created'].".<br/><span style='font-size:11px;'>".htmlencode($query)."</span>";
				break;
			/////////////////////////////////////////////// empty table
			case "table_empty":
				$query = "DELETE FROM ".$db->quote_id($_POST['tablename']);
				$result = $db->query($query);
				if(!$result)
					$error = true;
				$query = "VACUUM";
				$result = $db->query($query);
				if(!$result)
					$error = true;
				$completed = $lang['tbl']." '".htmlencode($_POST['tablename'])."' ".$lang['emptied'].".<br/><span style='font-size:11px;'>".htmlencode($query)."</span>";
				break;
			/////////////////////////////////////////////// create view
			case "view_create":
				$query = "CREATE VIEW ".$db->quote($_POST['viewname'])." AS ".$_POST['select'];
				$result = $db->query($query);
				if(!$result)
					$error = true;
				$completed = $lang['view']." '".htmlencode($_POST['viewname'])."' ".$lang['created'].".<br/><span style='font-size:11px;'>".htmlencode($query)."</span>";
				break;
			/////////////////////////////////////////////// drop table
			case "table_drop":
				$query = "DROP TABLE ".$db->quote_id($_POST['tablename']);
				$result=$db->query($query);
				if(!$result)
					$error = true;
				$completed = $lang['tbl']." '".htmlencode($_POST['tablename'])."' ".$lang['dropped'].".";
				break;
			/////////////////////////////////////////////// drop view
			case "view_drop":
				$query = "DROP VIEW ".$db->quote_id($_POST['viewname']);
				$result=$db->query($query);
				if(!$result)
					$error = true;
				$completed = $lang['view']." '".htmlencode($_POST['viewname'])."' ".$lang['dropped'].".";
				break;
			/////////////////////////////////////////////// rename table
			case "table_rename":
				$query = "ALTER TABLE ".$db->quote_id($_POST['oldname'])." RENAME TO ".$db->quote($_POST['newname']);
				if($db->getVersion()==3)
					$result = $db->query($query, true);
				else
					$result = $db->query($query, false);
				if(!$result)
					$error = true;
				$completed = $lang['tbl']." '".htmlencode($_POST['oldname'])."' ".$lang['renamed']." '".htmlencode($_POST['newname'])."'.<br/><span style='font-size:11px;'>".htmlencode($query)."</span>";
				break;
			//row actions
			/////////////////////////////////////////////// create row
			case "row_create":
				$completed = "";
				$num = $_POST['numRows'];
				$fields = explode(":", $_POST['fields']);
				$z = 0;
				
				$query = "PRAGMA table_info(".$db->quote_id($_GET['table']).")";
				$result = $db->selectArray($query);
				
				for($i=0; $i<$num; $i++)
				{
					if(!isset($_POST[$i.":ignore"]))
					{
						$query = "INSERT INTO ".$db->quote_id($_GET['table'])." (";
						for($j=0; $j<sizeof($fields); $j++)
						{
							$query .= "".$db->quote_id($fields[$j]).",";
						}
						$query = substr($query, 0, sizeof($query)-2);
						$query .= ") VALUES (";
						for($j=0; $j<sizeof($fields); $j++)
						{
							// PHP replaces space with underscore
							$fields[$j] = str_replace(" ","_",$fields[$j]);
							
							$null = isset($_POST[$i.":".$fields[$j]."_null"]);
							if(!$null)
							{
								if(!isset($_POST[$i.":".$fields[$j]]) && $debug)
								{
									echo "MISSING POST INDEX (".$i.":".$fields[$j].")<br><pre />";
									var_dump($_POST);
									echo "</pre><hr />";
								} 
								$value = $_POST[$i.":".$fields[$j]];
							}
							else
								$value = "";
							$type = $result[$j]['type'];
							$function = $_POST["function_".$i."_".$fields[$j]];
							if($function!="")
								$query .= $function."(";
								//di - messed around with this logic for null values
							if(($type=="TEXT" || $type=="BLOB") && $null==false)
								$query .= $db->quote($value);
							else if(($type=="INTEGER" || $type=="REAL") && $null==false && $value=="")
								$query .= "NULL";
							else if($null==true)
								$query .= "NULL";
							else
								$query .= $db->quote($value);
							if($function!="")
								$query .= ")";
							$query .= ",";
						}
						$query = substr($query, 0, sizeof($query)-2);
						$query .= ")";
						$result1 = $db->query($query);
						if(!$result1)
							$error = true;
						$completed .= "<span style='font-size:11px;'>".htmlencode($query)."</span><br/>";
						$z++;
					}
				}
				$completed = $z." ".$lang['rows']." ".$lang['inserted'].".<br/><br/>".$completed;
				break;
			/////////////////////////////////////////////// delete row
			case "row_delete":
				$pks = explode(":", $_GET['pk']);
				$query = "DELETE FROM ".$db->quote_id($_GET['table'])." WHERE ROWID = ".$pks[0];
				for($i=1; $i<sizeof($pks); $i++)
				{
					$query .= " OR ROWID = ".$pks[$i];
				}
				$result = $db->query($query);
				if(!$result)
					$error = true;
				$completed = sizeof($pks)." ".$lang['rows']." ".$lang['deleted'].".<br/><span style='font-size:11px;'>".htmlencode($query)."</span>";
				break;
			/////////////////////////////////////////////// edit row
			case "row_edit":
				$pks = explode(":", $_GET['pk']);
				$fields = explode(":", $_POST['fieldArray']);
				
				$z = 0;
				
				$query = "PRAGMA table_info(".$db->quote_id($_GET['table']).")";
				$result = $db->selectArray($query);
				
				if(isset($_POST['new_row']))
					$completed = "";
				else
					$completed = sizeof($pks)." ".$lang['rows']." ".$lang['affected'].".<br/><br/>";

				for($i=0; $i<sizeof($pks); $i++)
				{
					if(isset($_POST['new_row']))
					{
						$query = "INSERT INTO ".$db->quote_id($_GET['table'])." (";
						for($j=0; $j<sizeof($fields); $j++)
						{
							$query .= $db->quote_id($fields[$j]).",";
						}
						$query = substr($query, 0, sizeof($query)-2);
						$query .= ") VALUES (";
						for($j=0; $j<sizeof($fields); $j++)
						{
							$field_index = str_replace(" ","_",$fields[$j]);
							$value = $_POST[$pks[$i].":".$field_index];
							$null = isset($_POST[$pks[$i].":".$field_index."_null"]);
							$type = $result[$j][2];
							$function = $_POST["function_".$pks[$i]."_".$field_index];
							if($function!="")
								$query .= $function."(";
								//di - messed around with this logic for null values
							if(($type=="TEXT" || $type=="BLOB") && $null==false)
								$query .= $db->quote($value);
							else if(($type=="INTEGER" || $type=="REAL") && $null==false && $value=="")
								$query .= "NULL";
							else if($null==true)
								$query .= "NULL";
							else
								$query .= $db->quote($value);
							if($function!="")
								$query .= ")";
							$query .= ",";
						}
						$query = substr($query, 0, sizeof($query)-2);
						$query .= ")";
						$result1 = $db->query($query);
						if(!$result1)
							$error = true;
						$z++;
					}
					else
					{
						$query = "UPDATE ".$db->quote_id($_GET['table'])." SET ";
						for($j=0; $j<sizeof($fields); $j++)
						{
							if(!is_numeric($pks[$i])) continue;
							$field_index = str_replace(" ","_",$fields[$j]);
							$function = $_POST["function_".$pks[$i]."_".$field_index];
							$null = isset($_POST[$pks[$i].":".$field_index."_null"]);
							$query .= $db->quote_id($fields[$j])."=";
							if($function!="")
								$query .= $function."(";
							if($null)
								$query .= "NULL";
							else
								$query .= $db->quote($_POST[$pks[$i].":".$field_index]);
							if($function!="")
								$query .= ")";
							$query .= ", ";
						}
						$query = substr($query, 0, sizeof($query)-3);
						$query .= " WHERE ROWID = ".$pks[$i];
						$result1 = $db->query($query);
						if(!$result1)
						{
							$error = true;
						}
					}
					$completed .= "<span style='font-size:11px;'>".htmlencode($query)."</span><br/>";
				}
				if(isset($_POST['new_row']))
					$completed = $z." ".$lang['rows']." ".$lang['inserted'].".<br/><br/>".$completed;
				break;
			//column actions
			/////////////////////////////////////////////// create column
			case "column_create":
				$num = intval($_POST['rows']);
				for($i=0; $i<$num; $i++)
				{
					if($_POST[$i.'_field']!="")
					{
						$query = "ALTER TABLE ".$db->quote_id($_GET['table'])." ADD ".$db->quote($_POST[$i.'_field'])." ";
						$query .= $_POST[$i.'_type']." ";
						if(isset($_POST[$i.'_primarykey']))
							$query .= "PRIMARY KEY ";
						if(isset($_POST[$i.'_notnull']))
							$query .= "NOT NULL ";
						if($_POST[$i.'_defaultvalue']!="")
						{
							if($_POST[$i.'_type']=="INTEGER" && is_numeric($_POST[$i.'_defaultvalue']))
								$query .= "DEFAULT ".$_POST[$i.'_defaultvalue']."  ";
							else
								$query .= "DEFAULT ".$db->quote($_POST[$i.'_defaultvalue'])." ";
						}
						if($db->getVersion()==3)
							$result = $db->query($query, true);
						else
							$result = $db->query($query, false);
						if(!$result)
							$error = true;
					}
				}
				$completed = $lang['tbl']." '".htmlencode($_GET['table'])."' ".$lang['altered'].".";
				break;
			/////////////////////////////////////////////// delete column
			case "column_delete":
				$pks = explode(":", $_GET['pk']);
				$query = "ALTER TABLE ".$db->quote_id($_GET['table']).' DROP '.$db->quote_id($pks[0]);
				for($i=1; $i<sizeof($pks); $i++)
				{
					$query .= ", DROP ".$db->quote_id($pks[$i]);
				}
				$result = $db->query($query);
				if(!$result)
					$error = true;
				$completed = $lang['tbl']." '".htmlencode($_GET['table'])."' ".$lang['altered'].".";
				break;
			/////////////////////////////////////////////// edit column
			case "column_edit":
				$query = "ALTER TABLE ".$db->quote_id($_GET['table']).' CHANGE '.$db->quote_id($_POST['oldvalue'])." ".$db->quote($_POST['0_field'])." ".$_POST['0_type'];
				$result = $db->query($query);
				if(!$result)
					$error = true;
				$completed = $lang['tbl']." '".htmlencode($_GET['table'])."' ".$lang['altered'].".";
				break;
			/////////////////////////////////////////////// delete trigger
			case "trigger_delete":
				$query = "DROP TRIGGER ".$db->quote_id($_GET['pk']);
				$result = $db->query($query);
				if(!$result)
					$error = true;
				$completed = $lang['trigger']." '".htmlencode($_GET['pk'])."' ".$lang['deleted'].".<br/><span style='font-size:11px;'>".htmlencode($query)."</span>";
				break;
			/////////////////////////////////////////////// delete index
			case "index_delete":
				$query = "DROP INDEX ".$db->quote_id($_GET['pk']);
				$result = $db->query($query);
				if(!$result)
					$error = true;
				$completed = $lang['index']." '".htmlencode($_GET['pk'])."' ".$lang['deleted'].".<br/><span style='font-size:11px;'>".htmlencode($query)."</span>";
				break;
			/////////////////////////////////////////////// create trigger
			case "trigger_create":
				$str = "CREATE TRIGGER ".$db->quote($_POST['trigger_name']);
				if($_POST['beforeafter']!="")
					$str .= " ".$_POST['beforeafter'];
				$str .= " ".$_POST['event']." ON ".$db->quote_id($_GET['table']);
				if(isset($_POST['foreachrow']))
					$str .= " FOR EACH ROW";
				if($_POST['whenexpression']!="")
					$str .= " WHEN ".$_POST['whenexpression'];
				$str .= " BEGIN";
				$str .= " ".$_POST['triggersteps'];
				$str .= " END";
				$query = $str;
				$result = $db->query($query);
				if(!$result)
					$error = true;
				$completed = $lang['trigger']." ".$lang['created'].".<br/><span style='font-size:11px;'>".htmlencode($query)."</span>";
				break;
			/////////////////////////////////////////////// create index
			case "index_create":
				$num = $_POST['num'];
				if($_POST['name']=="")
				{
					$completed = $lang['blank_index'];
				}
				else if($_POST['0_field']=="")
				{
					$completed = $lang['one_index'];
				}
				else
				{
					$str = "CREATE ";
					if($_POST['duplicate']=="no")
						$str .= "UNIQUE ";
					$str .= "INDEX ".$db->quote($_POST['name'])." ON ".$db->quote_id($_GET['table'])." (";
					$str .= $db->quote_id($_POST['0_field']).$_POST['0_order'];
					for($i=1; $i<$num; $i++)
					{
						if($_POST[$i.'_field']!="")
							$str .= ", ".$_POST[$i.'_field'].$_POST[$i.'_order'];
					}
					$str .= ")";
					$query = $str;
					$result = $db->query($query);
					if(!$result)
						$error = true;
					$completed = $lang['index']." ".$lang['created'].".<br/><span style='font-size:11px;'>".htmlencode($query)."</span>";
				}
				break;
		}
	}

	echo '<table class="body_tbl" width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td valign="top" class="left_td" style="width:100px; padding:9px 2px 9px 9px;">';
	echo "<div id='leftNav'>";
	echo "<h1><a href='".PAGE."'>";
	echo "<span id='logo'>".PROJECT."</span> <span id='version'>v".VERSION."</span>";
	echo "</a></h1>";
	echo "<div id='headerlinks'>";
	echo "<a href='javascript:void' onclick='openHelp(\"top\");'>".$lang['docu']."</a> | ";
	echo "<a href='http://www.gnu.org/licenses/gpl.html' target='_blank'>".$lang['license']."</a> | ";
	echo "<a href='".PROJECT_URL."' target='_blank'>".$lang['proj_site']."</a>";
	echo "</div>";
	echo "<fieldset style='margin:15px;'><legend><b>".$lang['db_ch']."</b></legend>";
	if(sizeof($databases)<10) //if there aren't a lot of databases, just show them as a list of links instead of drop down menu
	{
		$i=0;
		foreach($databases as $database)
		{
			$i++;
			echo '[' . ($database['readable'] ? 'r':' ' ) . ($database['writable'] && $database['writable_dir'] ? 'w':' ' ) . '] ';
			$url_path = str_replace(DIRECTORY_SEPARATOR,'/',$database['path']);
			if($database == $_SESSION[COOKIENAME.'currentDB'])
				echo "<a href='".PAGE."?switchdb=".urlencode($database['path'])."' class='active_db'>".htmlencode($database['name'])."</a>  (<a href='".htmlencode($url_path)."' title='".$lang['backup']."'>&darr;</a>)";
			else
				echo "<a href='".PAGE."?switchdb=".urlencode($database['path'])."'>".htmlencode($database['name'])."</a>  (<a href='".htmlencode($url_path)."' title='".$lang['backup']."'>&darr;</a>)";
			if($i<sizeof($databases))
				echo "<br/>";
		}
	}
	else //there are a lot of databases - show a drop down menu
	{
		echo "<form action='".PAGE."' method='post'>";
		echo "<select name='database_switch'>";
		foreach($databases as $database)
		{
			$perms_string = htmlencode('[' . ($database['readable'] ? 'r':' ' ) . ($database['writable'] && $database['writable_dir'] ? 'w':' ' ) . '] ');
			if($database == $_SESSION[COOKIENAME.'currentDB'])
				echo "<option value='".htmlencode($database['path'])."' selected='selected'>".$perms_string.htmlencode($database['name'])."</option>";
			else
				echo "<option value='".htmlencode($database['path'])."'>".$perms_string.htmlencode($database['name'])."</option>";
		}
		echo "</select> ";
		echo "<input type='submit' value='".$lang['go']."' class='btn'>";
		echo "</form>";
	}
	echo "</fieldset>";
	echo "<fieldset style='margin:15px;'><legend>";
	echo "<a href='".PAGE."'";
	if(!isset($_GET['table']))
		echo " class='active_table'";
	echo ">".htmlencode($currentDB['name'])."</a>";
	echo "</legend>";
	//Display list of tables
	$query = "SELECT type, name FROM sqlite_master WHERE type='table' OR type='view' ORDER BY name";
	$result = $db->selectArray($query);
	$j=0;
	for($i=0; $i<sizeof($result); $i++)
	{
		if(substr($result[$i]['name'], 0, 7)!="sqlite_" && $result[$i]['name']!="")
		{
			echo "<span class='sidebar_table'>[".$lang[$result[$i]['type']=='table'?'tbl':'view']."]</span> ";
			echo "<a href='".PAGE."?action=row_view&amp;table=".urlencode($result[$i]['name']).($result[$i]['type']=='view'?'&amp;view=1':'')."'";
			if(isset($_GET['table']) && $_GET['table']==$result[$i]['name'])
				echo " class='active_table'";
			echo ">".htmlencode($result[$i]['name'])."</a><br/>";
			$j++;
		}
	}
	if($j==0)
		echo $lang['no_tbl'];
	echo "</fieldset>";
	
	if($directory!==false && is_writable($directory))
	{
		echo "<fieldset style='margin:15px;'><legend><b>".$lang['db_create']."</b> ".helpLink($lang['help2'])."</legend>"; 
		echo "<form name='create_database' method='post' action='".PAGE."'>";
		echo "<input type='text' name='new_dbname' style='width:150px;'/> <input type='submit' value='".$lang['create']."' class='btn'/>";
		echo "</form>";
		echo "</fieldset>";
	}
	
	echo "<div style='text-align:center;'>";
	echo "<form action='".PAGE."' method='post'>";
	echo "<input type='submit' value='".$lang['logout']."' name='logout' class='btn'/>";
	echo "</form>";
	echo "</div>";
	echo "</div>";
	echo '</td><td valign="top" id="main_column" class="right_td" style="padding:9px 2px 9px 9px;">';

	//breadcrumb navigation
	echo "<a href='".PAGE."'>".htmlencode($currentDB['name'])."</a>";
	if(isset($_GET['table']))
		echo " &rarr; <a href='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=row_view'>".htmlencode($_GET['table'])."</a>";
	echo "<br/><br/>";

	//user has performed some action so show the resulting message
	if(isset($_GET['confirm']))
	{
		echo "<div id='main'>";
		echo "<div class='confirm'>";
		if(isset($error) && $error) //an error occured during the action, so show an error message
			echo $lang['err'].": ".$db->getError().".<br/>".$lang['bug_report'].' '.PROJECT_BUGTRACKER_LINK;
		else //action was performed successfully - show success message
			echo $completed;
		echo "</div>";
		if($_GET['action']=="row_delete" || $_GET['action']=="row_create" || $_GET['action']=="row_edit")
			echo "<br/><br/><a href='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=row_view'>".$lang['return']."</a>";
		else if($_GET['action']=="column_create" || $_GET['action']=="column_delete" || $_GET['action']=="column_edit" || $_GET['action']=="index_create" || $_GET['action']=="index_delete" || $_GET['action']=="trigger_delete" || $_GET['action']=="trigger_create")
			echo "<br/><br/><a href='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=column_view'>".$lang['return']."</a>";
		else
			echo "<br/><br/><a href='".PAGE."'>".$lang['return']."</a>";
		echo "</div>";
	}

	//show the various tab views for a table
	if(!isset($_GET['confirm']) && isset($_GET['table']) && isset($_GET['action']) && ($_GET['action']=="table_export" || $_GET['action']=="table_import" || $_GET['action']=="table_sql" || $_GET['action']=="row_view" || $_GET['action']=="row_create" || $_GET['action']=="column_view" || $_GET['action']=="table_rename" || $_GET['action']=="table_search" || $_GET['action']=="table_triggers"))
	{
		if(!isset($_GET['view']))
		{
			echo "<a href='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=row_view' ";
			if($_GET['action']=="row_view")
				echo "class='tab_pressed'";
			else
				echo "class='tab'";
			echo ">".$lang['browse']."</a>";
			echo "<a href='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=column_view' ";
			if($_GET['action']=="column_view")
				echo "class='tab_pressed'";
			else
				echo "class='tab'";
			echo ">".$lang['struct']."</a>";
			echo "<a href='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=table_sql' ";
			if($_GET['action']=="table_sql")
				echo "class='tab_pressed'";
			else
				echo "class='tab'";
			echo ">".$lang['sql']."</a>";
			echo "<a href='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=table_search' ";
			if($_GET['action']=="table_search")
				echo "class='tab_pressed'";
			else
				echo "class='tab'";
			echo ">".$lang['srch']."</a>";
			echo "<a href='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=row_create' ";
			if($_GET['action']=="row_create")
				echo "class='tab_pressed'";
			else
				echo "class='tab'";
			echo ">".$lang['insert']."</a>";
			echo "<a href='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=table_export' ";
			if($_GET['action']=="table_export")
				echo "class='tab_pressed'";
			else
				echo "class='tab'";
			echo ">".$lang['export']."</a>";
			echo "<a href='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=table_import' ";
			if($_GET['action']=="table_import")
				echo "class='tab_pressed'";
			else
				echo "class='tab'";
			echo ">".$lang['import']."</a>";
			echo "<a href='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=table_rename' ";
			if($_GET['action']=="table_rename")
				echo "class='tab_pressed'";
			else
				echo "class='tab'";
			echo ">".$lang['rename']."</a>";
			echo "<a href='".PAGE."?action=table_empty&amp;table=".urlencode($_GET['table'])."' ";
			echo "class='tab empty'";
			echo ">".$lang['empty']."</a>";
			echo "<a href='".PAGE."?action=table_drop&amp;table=".urlencode($_GET['table'])."' ";
			echo "class='tab drop'";
			echo ">".$lang['drop']."</a>";
			echo "<div style='clear:both;'></div>";
		}
		else
		{
			echo "<a href='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=row_view&amp;view=1' ";
			if($_GET['action']=="row_view")
				echo "class='tab_pressed'";
			else
				echo "class='tab'";
			echo ">".$lang['browse']."</a>";
			echo "<a href='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=column_view&amp;view=1' ";
			if($_GET['action']=="column_view")
				echo "class='tab_pressed'";
			else
				echo "class='tab'";
			echo ">".$lang['struct']."</a>";
			echo "<a href='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=table_sql&amp;view=1' ";
			if($_GET['action']=="table_sql")
				echo "class='tab_pressed'";
			else
				echo "class='tab'";
			echo ">".$lang['sql']."</a>";
			echo "<a href='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=table_search&amp;view=1' ";
			if($_GET['action']=="table_search")
				echo "class='tab_pressed'";
			else
				echo "class='tab'";
			echo ">".$lang['srch']."</a>";
			echo "<a href='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=table_export&amp;view=1' ";
			if($_GET['action']=="table_export")
				echo "class='tab_pressed'";
			else
				echo "class='tab'";
			echo ">".$lang['export']."</a>";
			echo "<a href='".PAGE."?action=view_drop&amp;table=".urlencode($_GET['table'])."&amp;view=1' ";
			echo "class='tab drop'";
			echo ">".$lang['drop']."</a>";
			echo "<div style='clear:both;'></div>";
		}
	}

	//switch board for the page display
	if(isset($_GET['action']) && !isset($_GET['confirm']))
	{
		echo "<div id='main'>";
		switch($_GET['action'])
		{
			//table actions
			/////////////////////////////////////////////// create table
			case "table_create":
				$query = "SELECT name FROM sqlite_master WHERE type='table' AND name=".$db->quote($_POST['tablename']);
				$results = $db->selectArray($query);
				if(sizeof($results)>0)
					$exists = true;
				else
					$exists = false;
				echo "<h2>".$lang['create_tbl'].": '".htmlencode($_POST['tablename'])."'</h2>";
				if($_POST['tablefields']=="" || intval($_POST['tablefields'])<=0)
					echo $lang['specify_fields'];
				else if($_POST['tablename']=="")
					echo $lang['specify_tbl'];
				else if($exists)
					echo $lang['tbl_exists'];
				else
				{
					$num = intval($_POST['tablefields']);
					$name = $_POST['tablename'];
					echo "<form action='".PAGE."?action=table_create&amp;confirm=1' method='post'>";
					echo "<input type='hidden' name='tablename' value='".htmlencode($name)."'/>";
					echo "<input type='hidden' name='rows' value='".$num."'/>";
					echo "<table border='0' cellpadding='2' cellspacing='1' class='viewTable'>";
					echo "<tr>";
					$headings = array("Field", "Type", "Primary Key");
					if($db->getType() != "SQLiteDatabase") $headings[] = "Autoincrement";
					$headings[] = "Not NULL";
					$headings[] = "Default Value";
					for($k=0; $k<count($headings); $k++)
						echo "<td class='tdheader'>" . $headings[$k] . "</td>";
					echo "</tr>";

					for($i=0; $i<$num; $i++)
					{
						$tdWithClass = "<td class='td" . ($i%2 ? "1" : "2") . "'>";
						echo "<tr>";
						echo $tdWithClass;
						echo "<input type='text' name='".$i."_field' style='width:200px;'/>";
						echo "</td>";
						echo $tdWithClass;
						echo "<select name='".$i."_type' id='i".$i."_type' onchange='toggleAutoincrement(".$i.");'>";
						$types = unserialize(DATATYPES);
						for($z=0; $z<sizeof($types); $z++)
							echo "<option value='".htmlencode($types[$z])."'>".htmlencode($types[$z])."</option>";
						echo "</select>";
						echo "</td>";
						echo $tdWithClass;
						echo "<label><input type='checkbox' name='".$i."_primarykey' id='i".$i."_primarykey' onclick='toggleNull(".$i."); toggleAutoincrement(".$i.");'/> ".$lang['yes']."</label>";
						echo "</td>";
						if($db->getType() != "SQLiteDatabase")
						{
							echo $tdWithClass;
							echo "<label><input type='checkbox' name='".$i."_autoincrement' id='i".$i."_autoincrement'/> ".$lang['yes']."</label>";
							echo "</td>";
						}
						echo $tdWithClass;
						echo "<label><input type='checkbox' name='".$i."_notnull' id='i".$i."_notnull'/> ".$lang['yes']."</label>";
						echo "</td>";
						echo $tdWithClass;
						echo "<input type='text' name='".$i."_defaultvalue' style='width:100px;'/>";
						echo "</td>";
						echo "</tr>";
					}
					echo "<tr>";
					echo "<td class='tdheader' style='text-align:right;' colspan='6'>";
					echo "<input type='submit' value='".$lang['create']."' class='btn'/> ";
					echo "<a href='".PAGE."'>".$lang['cancel']."</a>";
					echo "</td>";
					echo "</tr>";
					echo "</table>";
					echo "</form>";
					if($db->getType() != "SQLiteDatabase") echo "<script type='text/javascript'>window.onload=initAutoincrement;</script>";
				}
				break;
			/////////////////////////////////////////////// perform SQL query on table
			case "table_sql":
				$isSelect = false;
				if(isset($_POST['query']) && $_POST['query']!="")
				{
					$delimiter = $_POST['delimiter'];
					$queryStr = $_POST['queryval'];
					$query = explode_sql($delimiter, $queryStr); //explode the query string into individual queries based on the delimiter

					for($i=0; $i<sizeof($query); $i++) //iterate through the queries exploded by the delimiter
					{
						if(str_replace(" ", "", str_replace("\n", "", str_replace("\r", "", $query[$i])))!="") //make sure this query is not an empty string
						{
							$queryTimer = new MicroTimer();
							if(preg_match('/^\s*(?:select|pragma)\s/i', $query[$i])===1)   // pragma often returns rows just like select
							{
								$isSelect = true;
								$result = $db->selectArray($query[$i], "assoc");
							}
							else
							{
								$isSelect = false;
								$result = $db->query($query[$i]);
							}
							$queryTimer->stop();

							echo "<div class='confirm'>";
							echo "<b>";
							if($result!==false)
							{
								if($isSelect)
								{
									$affected = sizeof($result);
									echo $lang['showing']." ".$affected." ".$lang['rows'].". ";
								}
								else
								{
									$affected = $db->getAffectedRows();
									echo $affected." ".$lang['rows']." ".$lang['affected'].". ";
								}
								printf($lang['query_time'], $queryTimer);
								echo "</b><br/>";
							}
							else
							{
								echo $lang['err'].": ".$db->getError().".</b><br/>";
							}
							echo "<span style='font-size:11px;'>".htmlencode($query[$i])."</span>";
							echo "</div><br/>";
							if($isSelect)
							{
								if(sizeof($result)>0)
								{
									$headers = array_keys($result[0]);

									echo "<table border='0' cellpadding='2' cellspacing='1' class='viewTable'>";
									echo "<tr>";
									for($j=0; $j<sizeof($headers); $j++)
									{
										echo "<td class='tdheader'>";
										echo htmlencode($headers[$j]);
										echo "</td>";
									}
									echo "</tr>";
									for($j=0; $j<sizeof($result); $j++)
									{
										$tdWithClass = "<td class='td".($j%2 ? "1" : "2")."'>";
										echo "<tr>";
										for($z=0; $z<sizeof($headers); $z++)
										{
											echo $tdWithClass;
											echo htmlencode($result[$j][$headers[$z]]);
											echo "</td>";
										}
										echo "</tr>";
									}
									echo "</table><br/><br/>";
								}
							}
						}
					}
				}
				else
				{
					$delimiter = ";";
					$queryStr = "SELECT * FROM ".$db->quote_id($_GET['table'])." WHERE 1";
				}

				echo "<fieldset>";
				echo "<legend><b>".sprintf($lang['run_sql'],htmlencode($db->getName()))."</b></legend>";
				if(!isset($_GET['view']))
					echo "<form action='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=table_sql' method='post'>";
				else
					echo "<form action='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=table_sql&amp;view=1' method='post'>";
				echo "<div style='float:left; width:70%;'>";
				echo "<textarea style='width:97%; height:300px;' name='queryval' id='queryval' cols='50' rows='8'>".htmlencode($queryStr)."</textarea>";
				echo "</div>";
				echo "<div style='float:left; width:28%; padding-left:10px;'>";
				echo $lang['fields']."<br/>";
				echo "<select multiple='multiple' style='width:100%;' id='fieldcontainer'>";
				$query = "PRAGMA table_info(".$db->quote_id($_GET['table']).")";
				$result = $db->selectArray($query);
				for($i=0; $i<sizeof($result); $i++)
				{
					echo "<option value='".htmlencode($result[$i][1])."'>".htmlencode($result[$i][1])."</option>";
				}
				echo "</select>";
				echo "<input type='button' value='&lt;&lt;' onclick='moveFields();' class='btn'/>";
				echo "</div>";
				echo "<div style='clear:both;'></div>";
				echo $lang['delimit']." <input type='text' name='delimiter' value='".htmlencode($delimiter)."' style='width:50px;'/> ";
				echo "<input type='submit' name='query' value='".$lang['go']."' class='btn'/>";
				echo "</form>";
				echo "</fieldset>";
				break;
			/////////////////////////////////////////////// empty table
			case "table_empty":
				echo "<form action='".PAGE."?action=table_empty&amp;confirm=1' method='post'>";
				echo "<input type='hidden' name='tablename' value='".htmlencode($_GET['table'])."'/>";
				echo "<div class='confirm'>";
				echo sprintf($lang['ques_empty'], htmlencode($_GET['table']))."<br/><br/>";
				echo "<input type='submit' value='".$lang['confirm']."' class='btn'/> ";
				echo "<a href='".PAGE."'>".$lang['cancel']."</a>";
				echo "</div>";
				break;
			/////////////////////////////////////////////// drop table
			case "table_drop":
				echo "<form action='".PAGE."?action=table_drop&amp;confirm=1' method='post'>";
				echo "<input type='hidden' name='tablename' value='".htmlencode($_GET['table'])."'/>";
				echo "<div class='confirm'>";
				echo sprintf($lang['ques_drop'], htmlencode($_GET['table']))."<br/><br/>";
				echo "<input type='submit' value='".$lang['confirm']."' class='btn'/> ";
				echo "<a href='".PAGE."'>".$lang['cancel']."</a>";
				echo "</div>";
				break;
			/////////////////////////////////////////////// drop view
			case "view_drop":
				echo "<form action='".PAGE."?action=view_drop&amp;confirm=1' method='post'>";
				echo "<input type='hidden' name='viewname' value='".htmlencode($_GET['table'])."'/>";
				echo "<div class='confirm'>";
				echo sprintf($lang['ques_drop_view'], htmlencode($_GET['table']))."<br/><br/>";
				echo "<input type='submit' value='".$lang['confirm']."' class='btn'/> ";
				echo "<a href='".PAGE."'>".$lang['cancel']."</a>";
				echo "</div>";
				break;
			/////////////////////////////////////////////// export table
			case "table_export":
				echo "<form method='post' action='".PAGE."'>";
				echo "<fieldset style='float:left; width:260px; margin-right:20px;'><legend><b>".$lang['export']."</b></legend>";
				echo "<input type='hidden' value='".htmlencode($_GET['table'])."' name='single_table'/>";
				echo "<label><input type='radio' name='export_type' checked='checked' value='sql' onclick='toggleExports(\"sql\");'/> ".$lang['sql']."</label>";
				echo "<br/><label><input type='radio' name='export_type' value='csv' onclick='toggleExports(\"csv\");'/> ".$lang['csv']."</label>";
				echo "</fieldset>";
				
				echo "<fieldset style='float:left; max-width:350px;' id='exportoptions_sql'><legend><b>".$lang['options']."</b></legend>";
				echo "<label><input type='checkbox' checked='checked' name='structure'/> ".$lang['export_struct']."</label> ".helpLink($lang['help5'])."<br/>";
				echo "<label><input type='checkbox' checked='checked' name='data'/> ".$lang['export_data']."</label> ".helpLink($lang['help6'])."<br/>"; 
				echo "<label><input type='checkbox' name='drop'/> ".$lang['add_drop']."</label> ".helpLink($lang['help7'])."<br/>"; 
				echo "<label><input type='checkbox' checked='checked' name='transaction'/> ".$lang['add_transact']."</label> ".helpLink($lang['help8'])."<br/>";
				echo "<label><input type='checkbox' checked='checked' name='comments'/> ".$lang['comments']."</label> ".helpLink($lang['help9'])."<br/>"; 
				echo "</fieldset>";
				
				echo "<fieldset style='float:left; max-width:350px; display:none;' id='exportoptions_csv'><legend><b>".$lang['options']."</b></legend>";
				echo "<div style='float:left;'>".$lang['fld_terminated']."</div>";
				echo "<input type='text' value=';' name='export_csv_fieldsterminated' style='float:right;'/>";
				echo "<div style='clear:both;'></div>";
				echo "<div style='float:left;'>".$lang['fld_enclosed']."</div>";
				echo "<input type='text' value='\"' name='export_csv_fieldsenclosed' style='float:right;'/>";
				echo "<div style='clear:both;'></div>";
				echo "<div style='float:left;'>".$lang['fld_escaped']."</div>";
				echo "<input type='text' value='\' name='export_csv_fieldsescaped' style='float:right;'/>";
				echo "<div style='clear:both;'></div>";
				echo "<div style='float:left;'>".$lang['rep_null']."</div>";
				echo "<input type='text' value='NULL' name='export_csv_replacenull' style='float:right;'/>";
				echo "<div style='clear:both;'></div>";
				echo "<label><input type='checkbox' name='export_csv_crlf'/> ".$lang['rem_crlf']."</label><br/>";
				echo "<label><input type='checkbox' checked='checked' name='export_csv_fieldnames'/> ".$lang['put_fld']."</label>";
				echo "</fieldset>";
				
				echo "<div style='clear:both;'></div>";
				echo "<br/><br/>";
				echo "<fieldset><legend><b>".$lang['save_as']."</b></legend>";
				$file = pathinfo($db->getPath());
				$name = $file['filename'];
				echo "<input type='text' name='filename' value='".htmlencode($name)."_".htmlencode($_GET['table'])."_".date("Y-m-d").".dump' style='width:400px;'/> <input type='submit' name='export' value='".$lang['export']."' class='btn'/>";
				echo "</fieldset>";
				echo "</form>";
				echo "<div class='confirm' style='margin-top: 2em'>".sprintf($lang['backup_hint'], "<a href='".htmlencode(str_replace(DIRECTORY_SEPARATOR,'/',$currentDB['path']))."' title='".$lang['backup']."'>".$lang["backup_hint_linktext"]."</a>")."</div>";
				break;
			/////////////////////////////////////////////// import table
			case "table_import":
				if(isset($_POST['import']))
				{
					echo "<div class='confirm'>";
					if($importSuccess===true)
						echo $lang['import_suc'];
					else
						echo $importSuccess;
					echo "</div><br/>";
				}
				echo "<form method='post' action='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=table_import' enctype='multipart/form-data'>";
				echo "<fieldset style='float:left; width:260px; margin-right:20px;'><legend><b>".$lang['import_into']." ".htmlencode($_GET['table'])."</b></legend>";
				echo "<label><input type='radio' name='import_type' checked='checked' value='sql' onclick='toggleImports(\"sql\");'/> ".$lang['sql']."</label>";
				echo "<br/><label><input type='radio' name='import_type' value='csv' onclick='toggleImports(\"csv\");'/> ".$lang['csv']."</label>";
				echo "</fieldset>";
				
				echo "<fieldset style='float:left; max-width:350px;' id='importoptions_sql'><legend><b>".$lang['options']."</b></legend>";
				echo $lang['no_opt'];
				echo "</fieldset>";
				
				echo "<fieldset style='float:left; max-width:350px; display:none;' id='importoptions_csv'><legend><b>".$lang['options']."</b></legend>";
				echo "<input type='hidden' value='".htmlencode($_GET['table'])."' name='single_table'/>";
				echo "<div style='float:left;'>".$lang['fld_terminated']."</div>";
				echo "<input type='text' value=';' name='import_csv_fieldsterminated' style='float:right;'/>";
				echo "<div style='clear:both;'>";
				echo "<div style='float:left;'>".$lang['fld_enclosed']."</div>";
				echo "<input type='text' value='\"' name='import_csv_fieldsenclosed' style='float:right;'/>";
				echo "<div style='clear:both;'>";
				echo "<div style='float:left;'>".$lang['fld_escaped']."</div>";
				echo "<input type='text' value='\' name='import_csv_fieldsescaped' style='float:right;'/>";
				echo "<div style='clear:both;'>";
				echo "<div style='float:left;'>".$lang['rep_null']."</div>";
				echo "<input type='text' value='NULL' name='import_csv_replacenull' style='float:right;'/>";
				echo "<div style='clear:both;'>";
				echo "<label><input type='checkbox' checked='checked' name='import_csv_fieldnames'/> ".$lang['fld_names']."</label>";
				echo "</fieldset>";
				
				echo "<div style='clear:both;'></div>";
				echo "<br/><br/>";
				
				echo "<fieldset><legend><b>".$lang['import_f']."</b></legend>";
				echo "<input type='file' value='".$lang['choose_f']."' name='file' style='background-color:transparent; border-style:none;'/> <input type='submit' value='".$lang['import']."' name='import' class='btn'/>";
				echo "</fieldset>";
				break;
			/////////////////////////////////////////////// rename table
			case "table_rename":
				echo "<form action='".PAGE."?action=table_rename&amp;confirm=1' method='post'>";
				echo "<input type='hidden' name='oldname' value='".htmlencode($_GET['table'])."'/>";
				printf($lang['rename_tbl'], htmlencode($_GET['table']));
				echo " <input type='text' name='newname' style='width:200px;'/> <input type='submit' value='".$lang['rename']."' name='rename' class='btn'/>";
				echo "</form>";
				break;
			/////////////////////////////////////////////// search table
			case "table_search":
				$foundVal = array();
				$fieldArr = array();
				if(isset($_GET['done']))
				{
					$table = $_GET['table'];
					$query = "PRAGMA table_info(".$db->quote_id($table).")";
					$result = $db->selectArray($query);
					$j = 0;
					$arr = array();
					for($i=0; $i<sizeof($result); $i++)
					{
						$field = $result[$i][1];
						$field_index = str_replace(" ","_",$field);
						$operator = $_POST[$field_index.":operator"];
						$value = $_POST[$field_index];
						if($value!="" || $operator=="!= ''" || $operator=="= ''")
						{
							if($operator=="= ''" || $operator=="!= ''")
								$arr[$j] = $db->quote_id($field)." ".$operator;
							
							else{
								if($operator == "LIKE%"){ 
									$operator = "LIKE";
									if(!preg_match('/(^%)|(%$)/', $value)) $value = '%'.$value.'%';
								}
								$fieldArr[] = $field;
								$foundVal[] = $value;
								$arr[$j] = $db->quote_id($field)." ".$operator." ".$db->quote($value);
							}
							$j++;
						}
					}
					$query = "SELECT * FROM ".$db->quote_id($table);
					$whereTo = '';
					if(sizeof($arr)>0)
					{
						$whereTo .= " WHERE ".$arr[0];
						for($i=1; $i<sizeof($arr); $i++)
						{
							$whereTo .= " AND ".$arr[$i];
						}
					}
					$query .= $whereTo;
					$queryTimer = new MicroTimer();
					$result = $db->selectArray($query,"assoc");
					$queryTimer->stop();

					echo "<div class='confirm'>";
					echo "<b>";
					if($result!==false)
					{
						$affected = sizeof($result);
						echo $lang['showing']." ".$affected." ".$lang['rows'].". ";
						printf($lang['query_time'], $queryTimer);
						echo "</b><br/>";
					}
					else
					{
						echo $lang['err'].": ".$db->getError().".</b><br/>".$lang['bug_report'].' '.PROJECT_BUGTRACKER_LINK.'<br/>';
					}
					echo "<span style='font-size:11px;'>".htmlencode($query)."</span>";
					echo "</div><br/>";

					if(sizeof($result)>0)
					{
						$headers = array_keys($result[0]);

						echo "<table border='0' cellpadding='2' cellspacing='1' class='viewTable'>";
						echo "<tr>";
						echo "<td>&nbsp;</td><td>&nbsp;</td>"; 
						for($j=0; $j<sizeof($headers); $j++)
						{
							echo "<td class='tdheader'>";
							echo htmlencode($headers[$j]);
							echo "</td>";
						}
						echo "</tr>";

						$pkid = getRowId($table, $whereTo);

						for($j=0; $j<sizeof($result); $j++)
						{
							$pk = $pkid[$j][0];
							$tdWithClass = "<td class='td".($j%2 ? "1" : "2")."'>";
							$cVal = 0;
							echo "<tr>";
							echo $tdWithClass."<a href='".PAGE."?table=".urlencode($table)."&amp;action=row_editordelete&amp;pk=".urlencode($pk)."&amp;type=edit' title='".$lang['edit']."' class='edit'><span>".$lang['edit']."</span></a></td>"; 
							echo $tdWithClass."<a href='".PAGE."?table=".urlencode($table)."&amp;action=row_editordelete&amp;pk=".urlencode($pk)."&amp;type=delete' title='".$lang['del']."' class='delete'><span>".$lang['del']."</span></a></td>";
							for($z=0; $z<sizeof($headers); $z++)
							{
								echo $tdWithClass;
								$fldResult = $result[$j][$headers[$z]];
								if(!empty($foundVal) and in_array($headers[$z], $fieldArr)){
									$foundVal = str_replace('%', '', $foundVal);
									$fldResult = str_ireplace($foundVal[$cVal], '[fnd]'.$foundVal[$cVal].'[/fnd]', $fldResult);
									$cVal++;
								}
								echo str_replace(array('[fnd]', '[/fnd]'), array('<u class="found">', '</u>'), htmlencode($fldResult));
								echo "</td>";
							}
							echo "</tr>";
						}
						echo "</table><br/><br/>";
					}
					
					if(!isset($_GET['view']))
						echo "<a href='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=table_search'>".$lang['srch_again']."</a>";
					else
						echo "<a href='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=table_search&amp;view=1'>".$lang['srch_again']."</a>";
				}
				else
				{
					$query = "PRAGMA table_info(".$db->quote_id($_GET['table']).")";
					$result = $db->selectArray($query);
					
					if(!isset($_GET['view']))
						echo "<form action='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=table_search&amp;done=1' method='post'>";
					else
						echo "<form action='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=table_search&amp;view=1&amp;done=1' method='post'>";
						
					echo "<table border='0' cellpadding='2' cellspacing='1' class='viewTable'>";
					echo "<tr>";
					echo "<td class='tdheader'>".$lang['fld']."</td>";
					echo "<td class='tdheader'>".$lang['type']."</td>";
					echo "<td class='tdheader'>".$lang['operator']."</td>";
					echo "<td class='tdheader'>".$lang['val']."</td>";
					echo "</tr>";

					for($i=0; $i<sizeof($result); $i++)
					{
					  $field = $result[$i][1];
					  $type = $result[$i][2];
					  $tdWithClass = "<td class='td".($i%2 ? "1" : "2")."'>";
					  $tdWithClassLeft = "<td class='td".($i%2 ? "1" : "2")."' style='text-align:left;'>";
					  echo "<tr>";
					  echo $tdWithClassLeft;
					  echo $field;
					  echo "</td>";
					  echo $tdWithClassLeft;
					  echo $type;
					  echo "</td>";
					  echo $tdWithClassLeft;
					  echo "<select name='".htmlencode($field).":operator' onchange='checkLike(\"".htmlencode($field)."_search\", this.options[this.selectedIndex].value); '>";
					  echo "<option value='='>=</option>";
					  if($type=="INTEGER" || $type=="REAL")
					  {
						  echo "<option value='&gt;'>&gt;</option>";
						  echo "<option value='&gt;='>&gt;=</option>";
						  echo "<option value='&lt;'>&lt;</option>";
						  echo "<option value='&lt;='>&lt;=</option>";
					  }
					  else if($type=="TEXT" || $type=="BLOB")
					  {
						  echo "<option value='= '''>= ''</option>";
						  echo "<option value='!= '''>!= ''</option>";
					  }
					  echo "<option value='!='>!=</option>";
					  if($type=="TEXT" || $type=="BLOB")
						  echo "<option value='LIKE' selected='selected'>LIKE</option>";
					  else
						  echo "<option value='LIKE'>LIKE</option>";
					  echo "<option value='LIKE%'>LIKE %...%</option>";
					  echo "<option value='NOT LIKE'>NOT LIKE</option>";
					  echo "</select>";
					  echo "</td>";
					  echo $tdWithClassLeft;
					  if($type=="INTEGER" || $type=="REAL" || $type=="NULL")
						  echo "<input type='text' id='".htmlencode($field)."_search' name='".htmlencode($field)."'/>";
					  else
						  echo "<textarea id='".htmlencode($field)."_search' name='".htmlencode($field)."' rows='1' cols='60'></textarea>";
					  echo "</td>";
					  echo "</tr>";
					}
					echo "<tr>";
					echo "<td class='tdheader' style='text-align:right;' colspan='4'>";
					echo "<input type='submit' value='".$lang['srch']."' class='btn'/>";
					echo "</td>";
					echo "</tr>";
					echo "</table>";
					echo "</form>";
				}
				break;
			//row actions
			/////////////////////////////////////////////// view row
			case "row_view":
				$table = $_GET['table'];
				$is_view = isset($_GET['view']) ? '&amp;view=1' : '';

				if(!isset($_POST['startRow']))
					$_POST['startRow'] = 0;

				if(isset($_POST['numRows']))
					$_SESSION[COOKIENAME.'numRows'] = $_POST['numRows'];

				if(!isset($_SESSION[COOKIENAME.'numRows']))
					$_SESSION[COOKIENAME.'numRows'] = $rowsNum;
				
				if(isset($_SESSION[COOKIENAME.'currentTable']) && $_SESSION[COOKIENAME.'currentTable']!=$table)
				{
					unset($_SESSION[COOKIENAME.'sortRows']);
					unset($_SESSION[COOKIENAME.'orderRows']);	
				}
				if(isset($_POST['viewtype']))
				{
					$_SESSION[COOKIENAME.'viewtype'] = $_POST['viewtype'];	
				}
				
				$rowCount = $db->numRows($table);
				$lastPage = intval($rowCount / $_SESSION[COOKIENAME.'numRows']);
				$remainder = intval($rowCount % $_SESSION[COOKIENAME.'numRows']);
				if($remainder==0)
					$remainder = $_SESSION[COOKIENAME.'numRows'];
				
				echo "<div style=''>";
				//previous button
				if($_POST['startRow']>0)
				{
					echo "<div style='float:left;'>";
					echo "<form action='".PAGE."?action=row_view&amp;table=".urlencode($table).$is_view."' method='post'>";
					echo "<input type='hidden' name='startRow' value='0'/>";
					echo "<input type='hidden' name='numRows' value='".$_SESSION[COOKIENAME.'numRows']."'/> ";
					echo "<input type='submit' value='&larr;&larr;' name='previous' class='btn'/> ";
					echo "</form>";
					echo "</div>";
					echo "<div style='float:left; overflow:hidden; margin-right:20px;'>";
					echo "<form action='".PAGE."?action=row_view&amp;table=".urlencode($table).$is_view."' method='post'>";
					echo "<input type='hidden' name='startRow' value='".intval($_POST['startRow']-$_SESSION[COOKIENAME.'numRows'])."'/>";
					echo "<input type='hidden' name='numRows' value='".$_SESSION[COOKIENAME.'numRows']."'/> ";
					echo "<input type='submit' value='&larr;' name='previous_full' class='btn'/> ";
					echo "</form>";
					echo "</div>";
				}
				
				//show certain number buttons
				echo "<div style='float:left;'>";
				echo "<form action='".PAGE."?action=row_view&amp;table=".urlencode($table).$is_view."' method='post'>";
				echo "<input type='submit' value='".$lang['show']." : ' name='show' class='btn'/> ";
				echo "<input type='text' name='numRows' style='width:50px;' value='".$_SESSION[COOKIENAME.'numRows']."'/> ";
				echo $lang['rows_records'];

				if(intval($_POST['startRow']+$_SESSION[COOKIENAME.'numRows']) < $rowCount)
					echo "<input type='text' name='startRow' style='width:90px;' value='".intval($_POST['startRow']+$_SESSION[COOKIENAME.'numRows'])."'/>";
				else
					echo "<input type='text' name='startRow' style='width:90px;' value='0'/> ";
				echo $lang['as_a'];
				echo " <select name='viewtype'>";
				if(!isset($_SESSION[COOKIENAME.'viewtype']) || $_SESSION[COOKIENAME.'viewtype']=="table")
				{
					echo "<option value='table' selected='selected'>".$lang['tbl']."</option>";
					echo "<option value='chart'>".$lang['chart']."</option>";
				}
				else
				{
					echo "<option value='table'>".$lang['tbl']."</option>";
					echo "<option value='chart' selected='selected'>".$lang['chart']."</option>";
				}
				echo "</select>";
				echo "</form>";
				echo "</div>";
				
				//next button
				if(intval($_POST['startRow']+$_SESSION[COOKIENAME.'numRows'])<$rowCount)
				{
					echo "<div style='float:left; margin-left:20px; '>";
					echo "<form action='".PAGE."?action=row_view&amp;table=".urlencode($table).$is_view."' method='post'>";
					echo "<input type='hidden' name='startRow' value='".intval($_POST['startRow']+$_SESSION[COOKIENAME.'numRows'])."'/>";
					echo "<input type='hidden' name='numRows' value='".$_SESSION[COOKIENAME.'numRows']."'/> ";
					echo "<input type='submit' value='&rarr;' name='next' class='btn'/> ";
					echo "</form>";
					echo "</div>";
					echo "<div style='float:left; '>";
					echo "<form action='".PAGE."?action=row_view&amp;table=".urlencode($table).$is_view."' method='post'>";
					echo "<input type='hidden' name='startRow' value='".intval($rowCount-$remainder)."'/>";
					echo "<input type='hidden' name='numRows' value='".$_SESSION[COOKIENAME.'numRows']."'/> ";
					echo "<input type='submit' value='&rarr;&rarr;' name='next_full' class='btn'/> ";
					echo "</form>";
					echo "</div>";
				}
				echo "<div style='clear:both;'></div>";
				echo "</div>";
				
				if(!isset($_GET['sort']))
					$_GET['sort'] = NULL;
				if(!isset($_GET['order']))
					$_GET['order'] = NULL;

				$numRows = $_SESSION[COOKIENAME.'numRows'];
				$startRow = $_POST['startRow'];
				if(isset($_GET['sort']))
				{
					$_SESSION[COOKIENAME.'sortRows'] = $_GET['sort'];
					$_SESSION[COOKIENAME.'currentTable'] = $table;
				}
				if(isset($_GET['order']))
				{
					$_SESSION[COOKIENAME.'orderRows'] = $_GET['order'];
					$_SESSION[COOKIENAME.'currentTable'] = $table;
				}
				$_SESSION[COOKIENAME.'numRows'] = $numRows;
				$query = "SELECT *, ROWID FROM ".$db->quote_id($table);
				$queryDisp = "SELECT * FROM ".$db->quote_id($table);
				$queryAdd = "";
				if(isset($_SESSION[COOKIENAME.'sortRows']))
					$queryAdd .= " ORDER BY ".$db->quote_id($_SESSION[COOKIENAME.'sortRows']);
				if(isset($_SESSION[COOKIENAME.'orderRows']))
					$queryAdd .= " ".$_SESSION[COOKIENAME.'orderRows'];
				$queryAdd .= " LIMIT ".$startRow.", ".$numRows;
				$query .= $queryAdd;
				$queryDisp .= $queryAdd;
				$queryTimer = new MicroTimer();
				$arr = $db->selectArray($query);
				$queryTimer->stop();

				if(sizeof($arr)>0)
				{
					echo "<br/><div class='confirm'>";
					echo "<b>".$lang['showing_rows']." ".$startRow." - ".($startRow + sizeof($arr)-1).", ".$lang['total'].": ".$rowCount." ";
					printf($lang['query_time'], $queryTimer);
					echo "</b><br/>";
					echo "<span style='font-size:11px;'>".htmlencode($queryDisp)."</span>";
					echo "</div><br/>";
					
					if(isset($_GET['view']))
					{
						echo sprintf($lang['readonly_tbl'], htmlencode($_GET['table']))." <a href='http://en.wikipedia.org/wiki/View_(database)' target='_blank'>http://en.wikipedia.org/wiki/View_(database)</a>"; 
						echo "<br/><br/>";	
					}
					
					$query = "PRAGMA table_info(".$db->quote_id($table).")";
					$result = $db->selectArray($query);
					$rowidColumn = sizeof($result);
					
					if(!isset($_SESSION[COOKIENAME.'viewtype']) || $_SESSION[COOKIENAME.'viewtype']=="table")
					{
						echo "<form action='".PAGE."?action=row_editordelete&amp;table=".urlencode($table).$is_view."' method='post' name='checkForm'>";
						echo "<table border='0' cellpadding='2' cellspacing='1' class='viewTable'>";
						echo "<tr>";
						if(!isset($_GET['view']))
							echo "<td colspan='3'></td>";
	
						for($i=0; $i<sizeof($result); $i++)
						{
							echo "<td class='tdheader'>";
							if(!isset($_GET['view']))
								echo "<a href='".PAGE."?action=row_view&amp;table=".urlencode($table)."&amp;sort=".urlencode($result[$i]['name']);
							else
								echo "<a href='".PAGE."?action=row_view&amp;table=".urlencode($table)."&amp;view=1&amp;sort=".urlencode($result[$i]['name']);
							if(isset($_SESSION[COOKIENAME.'sortRows']))
								$orderTag = ($_SESSION[COOKIENAME.'sortRows']==$result[$i]['name'] && $_SESSION[COOKIENAME.'orderRows']=="ASC") ? "DESC" : "ASC";
							else
								$orderTag = "ASC";
							echo "&amp;order=".$orderTag;
							echo "'>".$result[$i]['name']."</a>";
							if(isset($_SESSION[COOKIENAME.'sortRows']) && $_SESSION[COOKIENAME.'sortRows']==$result[$i]['name'])
								echo (($_SESSION[COOKIENAME.'orderRows']=="ASC") ? " <b>&uarr;</b>" : " <b>&darr;</b>");
							echo "</td>";
						}
						echo "</tr>";
	
						for($i=0; $i<sizeof($arr); $i++)
						{
							// -g-> $pk will always be the last column in each row of the array because we are doing a "SELECT *, ROWID FROM ..."
							$pk = $arr[$i][$rowidColumn];
							$tdWithClass = "<td class='td".($i%2 ? "1" : "2")."'>";
							$tdWithClassLeft = "<td class='td".($i%2 ? "1" : "2")."' style='text-align:left;'>";
							echo "<tr>";
							if(!isset($_GET['view']))
							{
								echo $tdWithClass;
								echo "<input type='checkbox' name='check[]' value='".htmlencode($pk)."' id='check_".htmlencode($i)."'/>";
								echo "</td>";
								echo $tdWithClass;
								// -g-> Here, we need to put the ROWID in as the link for both the edit and delete.
								echo "<a href='".PAGE."?table=".urlencode($table)."&amp;action=row_editordelete&amp;pk=".urlencode($pk)."&amp;type=edit' title='".$lang['edit']."' class='edit'><span>".$lang['edit']."</span></a>";
								echo "</td>";
								echo $tdWithClass;
								echo "<a href='".PAGE."?table=".urlencode($table)."&amp;action=row_editordelete&amp;pk=".urlencode($pk)."&amp;type=delete' title='".$lang['del']."' class='delete'><span>".$lang['del']."</span></a>";
								echo "</td>";
							}
							for($j=0; $j<sizeof($result); $j++)
							{
								if(strtolower($result[$j]['type'])=="integer" || strtolower($result[$j]['type'])=="float" || strtolower($result[$j]['type'])=="real")
									echo $tdWithClass;
								else
									echo $tdWithClassLeft;
								// -g-> although the inputs do not interpret HTML on the way "in", when we print the contents of the database the interpretation cannot be avoided.
								// di - i don't understand how SQLite returns null values. I played around with the conditional here and couldn't get empty strings to differeniate from actual null values...
								if($arr[$i][$j]===NULL)
									echo "<i class='null'>NULL</i>";
								else
									echo subString(htmlencode($arr[$i][$j]));
								echo "</td>";
							}
							echo "</tr>";
						}
						echo "</table>";
						if(!isset($_GET['view']))
						{
							echo "<a onclick='checkAll()'>".$lang['chk_all']."</a> / <a onclick='uncheckAll()'>".$lang['unchk_all']."</a> <i>".$lang['with_sel'].":</i> ";
							echo "<select name='type'>";
							echo "<option value='edit'>".$lang['edit']."</option>";
							echo "<option value='delete'>".$lang['del']."</option>";
							echo "</select> ";
							echo "<input type='submit' value='".$lang['go']."' name='massGo' class='btn'/>";
						}
						echo "</form>";
					}
					else
					{
						if(!isset($_SESSION[COOKIENAME.$_GET['table'].'chartlabels']))
						{
							// No label-column set. Try to pick a text-column as label-column.
							for($i=0; $i<sizeof($result); $i++)
							{
								$col_type = strtolower($result[$i]['type']);
								if(strpos($col_type, 'text')!==false || strpos($col_type, 'char')!==false || strpos($col_type, 'clob')!==false)
								{
									$_SESSION[COOKIENAME.$_GET['table'].'chartlabels'] = $i;
									break;
								}
							}
						}
						if(!isset($_SESSION[COOKIENAME.'chartlabels']))
							// no text column found, use the first column
							$_SESSION[COOKIENAME.'chartlabels'] = 0;
							
						if(!isset($_SESSION[COOKIENAME.$_GET['table'].'chartvalues']))
						{
							// No value-column set. Pick the first numeric column if possible.
							// If not possible, pick the first column that is not the label-column.
							
							$potential_value_column = null;
							for($i=0; $i<sizeof($result); $i++)
							{
								if($potential_value_column===null && $i != $_SESSION[COOKIENAME.$_GET['table'].'chartlabels'])
									// the first column (of any type) that is not the label-column
									$potential_value_column = $i;
								// check if the col is numeric
								$col_type = strtolower($result[$i]['type']);  
								if(strpos($col_type, 'int')!==false || strpos($col_type, 'real')!==false || strpos($col_type, 'floa')!==false || strpos($col_type, 'doub')!==false)
								{
									// this is defined as a numeric column, so prefer this as a value column over $potential_value_column
									$_SESSION[COOKIENAME.$_GET['table'].'chartvalues'] = $i;
									break;
								}
							}
							if(!isset($_SESSION[COOKIENAME.$_GET['table'].'chartvalues']))
							{
								// we did not find a numeric column
								if($potential_value_column!==null)
									// use the $potential_value_column, i.e. the second column which is not the label-column
									$_SESSION[COOKIENAME.$_GET['table'].'chartvalues'] = $potential_value_column;
								else
									// it's hopeless, there is only 1 column
									$_SESSION[COOKIENAME.$_GET['table'].'chartvalues'] = 0;  
							}
						}
						
						if(!isset($_SESSION[COOKIENAME.'charttype']))
							$_SESSION[COOKIENAME.'charttype'] = 'bar';
							
						if(isset($_POST['chartsettings']))
						{
							$_SESSION[COOKIENAME.'charttype'] = $_POST['charttype'];	
							$_SESSION[COOKIENAME.$_GET['table'].'chartlabels'] = $_POST['chartlabels'];
							$_SESSION[COOKIENAME.$_GET['table'].'chartvalues'] = $_POST['chartvalues'];
						}
						//begin chart view
						?>
						<script type='text/javascript' src='https://www.google.com/jsapi'></script>
						<script type='text/javascript'>
						google.load('visualization', '1.0', {'packages':['corechart']});
						google.setOnLoadCallback(drawChart);
						function drawChart()
						{
							var data = new google.visualization.DataTable();
							data.addColumn('string', '<?php echo $result[$_SESSION[COOKIENAME.$_GET['table'].'chartlabels']]['name']; ?>');
							data.addColumn('number', '<?php echo $result[$_SESSION[COOKIENAME.$_GET['table'].'chartvalues']]['name']; ?>');
							data.addRows([
							<?php
							for($i=0; $i<sizeof($arr); $i++)
							{
								$label = str_replace("'", "", htmlencode($arr[$i][$_SESSION[COOKIENAME.$_GET['table'].'chartlabels']]));
								$value = htmlencode($arr[$i][$_SESSION[COOKIENAME.$_GET['table'].'chartvalues']]);
								
								if($value==NULL || $value=="")
									$value = 0;
									
								echo "['".$label."', ".$value."]";
								if($i<sizeof($arr)-1)
									echo ",";
							}
							$height = (sizeof($arr)+1) * 30;
							if($height>1000)
								$height = 1000;
							else if($height<300)
								$height = 300;
							if($_SESSION[COOKIENAME.'charttype']=="pie")
								$height = 800;
							?>
							]);
							var chartWidth = document.getElementById("main_column").offsetWidth - document.getElementById("chartsettingsbox").offsetWidth - 100;
							if(chartWidth>1000)
								chartWidth = 1000;
								
							var options = 
							{
								'width':chartWidth,
								'height':<?php echo $height; ?>,
								'title':'<?php echo $result[$_SESSION[COOKIENAME.$_GET['table'].'chartlabels']]['name']." vs ".$result[$_SESSION[COOKIENAME.$_GET['table'].'chartvalues']]['name']; ?>'
							};
							<?php
							if($_SESSION[COOKIENAME.'charttype']=="bar")
								echo "var chart = new google.visualization.BarChart(document.getElementById('chart_div'));";
							else if($_SESSION[COOKIENAME.'charttype']=="pie")
								echo "var chart = new google.visualization.PieChart(document.getElementById('chart_div'));";
							else
								echo "var chart = new google.visualization.LineChart(document.getElementById('chart_div'));";
							?>
							chart.draw(data, options);
						}
						</script>
						<div id="chart_div" style="float:left;"><?php echo $lang['no_chart']; ?></div>
						<?php
						echo "<fieldset style='float:right; text-align:center;' id='chartsettingsbox'><legend><b>Chart Settings</b></legend>";
						echo "<form action='".PAGE."?action=row_view&amp;table=".urlencode($_GET['table']).$is_view."' method='post'>";
						echo $lang['chart_type'].": <select name='charttype'>";
						echo "<option value='bar'";
						if($_SESSION[COOKIENAME.'charttype']=="bar")
							echo " selected='selected'";
						echo ">".$lang['chart_bar']."</option>";
						echo "<option value='pie'";
						if($_SESSION[COOKIENAME.'charttype']=="pie")
							echo " selected='selected'";
						echo ">".$lang['chart_pie']."</option>";
						echo "<option value='line'";
						if($_SESSION[COOKIENAME.'charttype']=="line")
							echo " selected='selected'";
						echo ">".$lang['chart_line']."</option>";
						echo "</select>";
						echo "<br/><br/>";
						echo $lang['lbl'].": <select name='chartlabels'>";
						for($i=0; $i<sizeof($result); $i++)
						{
							if(isset($_SESSION[COOKIENAME.$_GET['table'].'chartlabels']) && $_SESSION[COOKIENAME.$_GET['table'].'chartlabels']==$i)
								echo "<option value='".$i."' selected='selected'>".htmlencode($result[$i]['name'])."</option>";
							else
								echo "<option value='".$i."'>".htmlencode($result[$i]['name'])."</option>";
						}
						echo "</select>";
						echo "<br/><br/>";
						echo $lang['val'].": <select name='chartvalues'>";
						for($i=0; $i<sizeof($result); $i++)
						{
							if(isset($_SESSION[COOKIENAME.$_GET['table'].'chartvalues']) && $_SESSION[COOKIENAME.$_GET['table'].'chartvalues']==$i)
								echo "<option value='".$i."' selected='selected'>".htmlencode($result[$i]['name'])."</option>";
							else
								echo "<option value='".$i."'>".htmlencode($result[$i]['name'])."</option>";
						}
						echo "</select>";
						echo "<br/><br/>";
						echo "<input type='submit' name='chartsettings' value='".$lang['update']."' class='btn'/>";
						echo "</form>";
						echo "</fieldset>";
						echo "<div style='clear:both;'></div>";
						//end chart view
					}
				}
				else if($rowCount>0)//no rows - do nothing
				{
					echo "<br/><br/>".$lang['no_rows'];
				}
				elseif(!isset($_GET['view']))
				{
					echo "<br/><br/>".$lang['empty_tbl']." <a href='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=row_create'>".$lang['click']."</a> ".$lang['insert_rows'];
				}

				break;
			/////////////////////////////////////////////// create row
			case "row_create":
				$fieldStr = "";
				echo "<form action='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=row_create' method='post'>";
				echo $lang['restart_insert'];
				echo " <select name='num'>";
				for($i=1; $i<=40; $i++)
				{
					if(isset($_POST['num']) && $_POST['num']==$i)
						echo "<option value='".$i."' selected='selected'>".$i."</option>";
					else
						echo "<option value='".$i."'>".$i."</option>";
				}
				echo "</select> ";
				echo $lang['rows'];
				echo " <input type='submit' value='".$lang['go']."' class='btn'/>";
				echo "</form>";
				echo "<br/>";
				$query = "PRAGMA table_info(".$db->quote_id($_GET['table']).")";
				$result = $db->selectArray($query);
				echo "<form action='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=row_create&amp;confirm=1' method='post'>";
				if(isset($_POST['num']))
					$num = $_POST['num'];
				else
					$num = 1;
				echo "<input type='hidden' name='numRows' value='".$num."'/>";
				for($j=0; $j<$num; $j++)
				{
					if($j>0)
						echo "<label><input type='checkbox' value='ignore' name='".$j.":ignore' id='row_".$j."_ignore' checked='checked'/> ".$lang['ignore']."</label><br/>";
					echo "<table border='0' cellpadding='2' cellspacing='1' class='viewTable'>";
					echo "<tr>";
					echo "<td class='tdheader'>".$lang['fld']."</td>";
					echo "<td class='tdheader'>".$lang['type']."</td>";
					echo "<td class='tdheader'>".$lang['func']."</td>";
					echo "<td class='tdheader'>Null</td>";
					echo "<td class='tdheader'>".$lang['val']."</td>";
					echo "</tr>";

					for($i=0; $i<sizeof($result); $i++)
					{
						$field = $result[$i]['name'];
						$field_html = htmlencode($field);
						if($j==0)
							$fieldStr .= ":".$field;
						$type = strtolower($result[$i]['type']);
						$scalarField = $type=="integer" || $type=="real" || $type=="null";
						$tdWithClass = "<td class='td".($i%2 ? "1" : "2")."'>";
						$tdWithClassLeft = "<td class='td".($i%2 ? "1" : "2")."' style='text-align:left;'>";
						echo "<tr>";
						echo $tdWithClassLeft;
						echo $field_html;
						echo "</td>";
						echo $tdWithClassLeft;
						echo $type;
						echo "</td>";
						echo $tdWithClassLeft;
						echo "<select name='function_".$j."_".$field_html."' onchange='notNull(\"row_".$j."_field_".$i."_null\");'>";
						echo "<option value=''>&nbsp;</option>";
						$functions = array_merge(unserialize(FUNCTIONS), $db->getUserFunctions());
						for($z=0; $z<sizeof($functions); $z++)
						{
							echo "<option value='".htmlencode($functions[$z])."'>".htmlencode($functions[$z])."</option>";
						}
						echo "</select>";
						echo "</td>";
						//we need to have a column dedicated to nulls -di
						echo $tdWithClassLeft;
						if($result[$i]['notnull']==0)
						{
							if($result[$i]['dflt_value']===NULL)
								echo "<input type='checkbox' name='".$j.":".$field_html."_null' id='row_".$j."_field_".$i."_null' checked='checked' onclick='disableText(this, \"row_".$j."_field_".$i."_value\");'/>";
							else
								echo "<input type='checkbox' name='".$j.":".$field_html."_null' id='row_".$j."_field_".$i."_null' onclick='disableText(this, \"row_".$j."_field_".$i."_value\");'/>";
						}
						echo "</td>";
						echo $tdWithClassLeft;
						$type = strtolower($type);
						if($scalarField)
							echo "<input type='text' id='row_".$j."_field_".$i."_value' name='".$j.":".$field_html."' value='".htmlencode(deQuoteSQL($result[$i]['dflt_value']))."' onblur='changeIgnore(this, \"row_".$j."_ignore\");' onclick='notNull(\"row_".$j."_field_".$i."_null\");'/>";
						else
							echo "<textarea id='row_".$j."_field_".$i."_value' name='".$j.":".$field_html."' rows='5' cols='60' onclick='notNull(\"row_".$j."_field_".$i."_null\");' onblur='changeIgnore(this, \"row_".$j."_ignore\");'>".htmlencode(deQuoteSQL($result[$i]['dflt_value']))."</textarea>";
					echo "</td>";
					echo "</tr>";
					}
					echo "<tr>";
					echo "<td class='tdheader' style='text-align:right;' colspan='5'>";
					echo "<input type='submit' value='".$lang['insert']."' class='btn'/>";
					echo "</td>";
					echo "</tr>";
					echo "</table><br/>";
				}
				$fieldStr = substr($fieldStr, 1);
				echo "<input type='hidden' name='fields' value='".htmlencode($fieldStr)."'/>";
				echo "</form>";
				break;
			/////////////////////////////////////////////// edit or delete row
			case "row_editordelete":
				if(isset($_POST['check']))
					$pks = $_POST['check'];
				else if(isset($_GET['pk']))
					$pks = array($_GET['pk']);
				else $pks[0] = "";
				$str = $pks[0];
				$pkVal = $pks[0];
				for($i=1; $i<sizeof($pks); $i++)
				{
					$str .= ", ".$pks[$i];
					$pkVal .= ":".$pks[$i];
				}
				if($str=="") //nothing was selected so show an error
				{
					echo "<div class='confirm'>";
					echo $lang['err'].": ".$lang['no_sel'];
					echo "</div>";
					echo "<br/><br/><a href='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=row_view'>".$lang['return']."</a>";
				}
				else
				{
					if((isset($_POST['type']) && $_POST['type']=="edit") || (isset($_GET['type']) && $_GET['type']=="edit")) //edit
					{
						echo "<form action='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=row_edit&amp;confirm=1&amp;pk=".urlencode($pkVal)."' method='post'>";
						$query = "PRAGMA table_info(".$db->quote_id($_GET['table']).")";
						$result = $db->selectArray($query);

						//build the POST array of fields
						$fieldStr = $result[0][1];
						for($j=1; $j<sizeof($result); $j++)
							$fieldStr .= ":".$result[$j][1];

						echo "<input type='hidden' name='fieldArray' value='".htmlencode($fieldStr)."'/>";

						for($j=0; $j<sizeof($pks); $j++)
						{
							if(!is_numeric($pks[$j])) continue;
							$query = "SELECT * FROM ".$db->quote_id($_GET['table'])." WHERE ROWID = ".$pks[$j];
							$result1 = $db->select($query);

							echo "<table border='0' cellpadding='2' cellspacing='1' class='viewTable'>";
							echo "<tr>";
							echo "<td class='tdheader'>".$lang['fld']."</td>";
							echo "<td class='tdheader'>".$lang['type']."</td>";
							echo "<td class='tdheader'>".$lang['func']."</td>";
							echo "<td class='tdheader'>Null</td>";
							echo "<td class='tdheader'>".$lang['val']."</td>";
							echo "</tr>";

							for($i=0; $i<sizeof($result); $i++)
							{
								$field = $result[$i][1];
								$type = $result[$i][2];
								$value = $result1[$i];
								$tdWithClass = "<td class='td".($i%2 ? "1" : "2")."'>";
								$tdWithClassLeft = "<td class='td".($i%2 ? "1" : "2")."' style='text-align:left;'>";
								echo "<tr>";
								echo $tdWithClass;
								echo $field;
								echo "</td>";
								echo $tdWithClass;
								echo $type;
								echo "</td>";
								echo $tdWithClassLeft;
								echo "<select name='function_".htmlencode($pks[$j])."_".htmlencode($field)."' onchange='notNull(\"".htmlencode($pks[$j]).":".htmlencode($field)."_null\");'>";
								echo "<option value=''></option>";
								$functions = array_merge(unserialize(FUNCTIONS), $db->getUserFunctions());
								for($z=0; $z<sizeof($functions); $z++)
								{
									echo "<option value='".htmlencode($functions[$z])."'>".htmlencode($functions[$z])."</option>";
								}
								echo "</select>";
								echo "</td>";
								echo $tdWithClassLeft;
								if($result[$i][3]==0)
								{
									if($value===NULL)
										echo "<input type='checkbox' name='".htmlencode($pks[$j]).":".htmlencode($field)."_null' id='".htmlencode($pks[$j]).":".htmlencode($field)."_null' checked='checked'/>";
									else
										echo "<input type='checkbox' name='".htmlencode($pks[$j]).":".htmlencode($field)."_null' id='".htmlencode($pks[$j]).":".htmlencode($field)."_null'/>";
								}
								echo "</td>";
								echo $tdWithClassLeft;
								if($type=="INTEGER" || $type=="REAL" || $type=="NULL")
									echo "<input type='text' name='".htmlencode($pks[$j]).":".htmlencode($field)."' value='".htmlencode($value)."' onblur='changeIgnore(this, \"".$j."\", \"".htmlencode($pks[$j]).":".htmlencode($field)."_null\")' />";
								else
									echo "<textarea name='".htmlencode($pks[$j]).":".htmlencode($field)."' rows='1' cols='60' class='".htmlencode($field)."_textarea' onblur='changeIgnore(this, \"".$j."\", \"".htmlencode($pks[$j]).":".htmlencode($field)."_null\")'>".htmlencode($value)."</textarea>";
								echo "</td>";
								echo "</tr>";
							}
							echo "<tr>";
							echo "<td class='tdheader' style='text-align:right;' colspan='5'>";
							echo "<input type='submit' name='new_row' value='".$lang['new_insert']."' class='btn'/> ";
							echo "<input type='submit' value='".$lang['save_ch']."' class='btn'/> ";
							echo "<a href='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=row_view'>".$lang['cancel']."</a>";
							echo "</td>";
							echo "</tr>";
							echo "</table>";
							echo "<br/>";
						}
						echo "</form>";
					}
					else //delete
					{
						echo "<form action='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=row_delete&amp;confirm=1&amp;pk=".urlencode($pkVal)."' method='post'>";
						echo "<div class='confirm'>";
						printf($lang['ques_del_rows'], htmlencode($str), htmlencode($_GET['table']));
						echo "<br/><br/>";
						echo "<input type='submit' value='".$lang['confirm']."' class='btn'/> ";
						echo "<a href='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=row_view'>".$lang['cancel']."</a>";
						echo "</div>";
					}
				}
				break;
			//column actions
			/////////////////////////////////////////////// view column
			case "column_view":
				$query = "PRAGMA table_info(".$db->quote_id($_GET['table']).")";
				$result = $db->selectArray($query);

				echo "<form action='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=column_delete' method='post' name='checkForm'>";
				echo "<table border='0' cellpadding='2' cellspacing='1' class='viewTable'>";
				echo "<tr>";
				if(!isset($_GET['view']))
					echo "<td colspan='3'></td>";
				echo "<td class='tdheader'>".$lang['col']." #</td>";
				echo "<td class='tdheader'>".$lang['fld']."</td>";
				echo "<td class='tdheader'>".$lang['type']."</td>";
				echo "<td class='tdheader'>Not Null</td>";
				echo "<td class='tdheader'>".$lang['def_val']."</td>";
				echo "<td class='tdheader'>".$lang['prim_key']."</td>";
				echo "</tr>";

				for($i=0; $i<sizeof($result); $i++)
				{
					$colVal = $result[$i][0];
					$fieldVal = $result[$i][1];
					$typeVal = $result[$i][2];
					$notnullVal = $result[$i][3];
					$defaultVal = $result[$i][4];
					$primarykeyVal = $result[$i][5];

					if(intval($notnullVal)!=0)
						$notnullVal = "yes";
					else
						$notnullVal = "no";
					if(intval($primarykeyVal)!=0)
						$primarykeyVal = "yes";
					else
						$primarykeyVal = "no";

					$tdWithClass = "<td class='td".($i%2 ? "1" : "2")."'>";
					$tdWithClassLeft = "<td class='td".($i%2 ? "1" : "2")."' style='text-align:left;'>";
					echo "<tr>";
					if(!isset($_GET['view']))
					{
						echo $tdWithClass;
						echo "<input type='checkbox' name='check[]' value='".htmlencode($fieldVal)."' id='check_".$i."'/>";
						echo "</td>";
						echo $tdWithClass;
						echo "<a href='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=column_edit&amp;pk=".urlencode($fieldVal)."' title='".$lang['edit']."' class='edit'><span>".$lang['edit']."</span></a>";
						echo "</td>";
						echo $tdWithClass;
						echo "<a href='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=column_delete&amp;pk=".urlencode($fieldVal)."' title='".$lang['del']."' class='delete'><span>".$lang['del']."</span></a>";
						echo "</td>";
					}
					echo $tdWithClass;
					echo htmlencode($colVal);
					echo "</td>";
					echo $tdWithClassLeft;
					echo htmlencode($fieldVal);
					echo "</td>";
					echo $tdWithClassLeft;
					echo htmlencode($typeVal);
					echo "</td>";
					echo $tdWithClassLeft;
					echo htmlencode($notnullVal);
					echo "</td>";
					echo $tdWithClassLeft;
					if($defaultVal==="NULL") echo "<i class='null'>NULL</i>";
					else echo htmlencode($defaultVal);
					echo "</td>";
					echo $tdWithClassLeft;
					echo htmlencode($primarykeyVal);
					echo "</td>";
					echo "</tr>";
				}

				echo "</table>";
				if(!isset($_GET['view']))
				{
					echo "<a onclick='checkAll()'>".$lang['chk_all']."</a> / <a onclick='uncheckAll()'>".$lang['unchk_all']."</a> <i>".$lang['with_sel'].":</i> ";
					echo "<select name='massType'>";
					//echo "<option value='edit'>".$lang['edit']."</option>";
					echo "<option value='delete'>".$lang['del']."</option>";
					echo "</select> ";
					echo "<input type='hidden' name='structureDel' value='true'/>";
					echo "<input type='submit' value='".$lang['go']."' name='massGo' class='btn'/>";
				}
				echo "</form>";
				if(!isset($_GET['view']))
				{
					echo "<br/>";
					echo "<form action='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=column_create' method='post'>";
					echo "<input type='hidden' name='tablename' value='".htmlencode($_GET['table'])."'/>";
					echo $lang['add']." <input type='text' name='tablefields' style='width:30px;' value='1'/> ".$lang['tbl_end']." <input type='submit' value='".$lang['go']."' name='addfields' class='btn'/>";
					echo "</form>";
				}
				
				$query = "SELECT sql FROM sqlite_master WHERE name=".$db->quote($_GET['table']);
				$master = $db->selectArray($query);
				
				echo "<br/>";
				if(!isset($_GET['view']))
					$type = "table";
				else
					$type = "view";
				echo "<br/>";
				echo "<div class='confirm'>";
				echo "<b>".$lang['query_used_'.$type]."</b><br/>";
				echo "<span style='font-size:11px;'>".htmlencode($master[0]['sql'])."</span>";
				echo "</div>";
				echo "<br/>";
				if(!isset($_GET['view']))
				{
					echo "<br/><hr/><br/>";
					//$query = "SELECT * FROM sqlite_master WHERE type='index' AND tbl_name='".$_GET['table']."'";
					$query = "PRAGMA index_list(".$db->quote_id($_GET['table']).")";
					$result = $db->selectArray($query);
					if(sizeof($result)>0)
					{
						echo "<h2>".$lang['indexes'].":</h2>";
						echo "<table border='0' cellpadding='2' cellspacing='1' class='viewTable'>";
						echo "<tr>";
						echo "<td colspan='1'>";
						echo "</td>";
						echo "<td class='tdheader'>".$lang['name']."</td>";
						echo "<td class='tdheader'>".$lang['unique']."</td>";
						echo "<td class='tdheader'>".$lang['seq_no']."</td>";
						echo "<td class='tdheader'>".$lang['col']." #</td>";
						echo "<td class='tdheader'>".$lang['fld']."</td>";
						echo "</tr>";
						for($i=0; $i<sizeof($result); $i++)
						{
							if($result[$i]['unique']==0)
								$unique = "no";
							else
								$unique = "yes";
	
							$query = "PRAGMA index_info(".$db->quote_id($result[$i]['name']).")";
							$info = $db->selectArray($query);
							$span = sizeof($info);
	
							$tdWithClass = "<td class='td".($i%2 ? "1" : "2")."'>";
							$tdWithClassLeft = "<td class='td".($i%2 ? "1" : "2")."' style='text-align:left;'>";
							$tdWithClassSpan = "<td class='td".($i%2 ? "1" : "2")."' rowspan='".$span."'>";
							$tdWithClassLeftSpan = "<td class='td".($i%2 ? "1" : "2")."' style='text-align:left;' rowspan='".$span."'>";
							echo "<tr>";
							echo $tdWithClassSpan;
							echo "<a href='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=index_delete&amp;pk=".urlencode($result[$i]['name'])."' title='".$lang['del']."' class='delete'><span>".$lang['del']."</span></a>";
							echo "</td>";
							echo $tdWithClassLeftSpan;
							echo $result[$i]['name'];
							echo "</td>";
							echo $tdWithClassLeftSpan;
							echo $unique;
							echo "</td>";
							for($j=0; $j<$span; $j++)
							{
								if($j!=0)
									echo "<tr>";
								echo $tdWithClassLeft;
								echo htmlencode($info[$j]['seqno']);
								echo "</td>";
								echo $tdWithClassLeft;
								echo htmlencode($info[$j]['cid']);
								echo "</td>";
								echo $tdWithClassLeft;
								echo htmlencode($info[$j]['name']);
								echo "</td>";
								echo "</tr>";
							}
						}
						echo "</table><br/><br/>";
					}
					
					$query = "SELECT * FROM sqlite_master WHERE type='trigger' AND tbl_name=".$db->quote($_GET['table'])." ORDER BY name";
					$result = $db->selectArray($query);
					//print_r($result);
					if(sizeof($result)>0)
					{
						echo "<h2>".$lang['triggers'].":</h2>";
						echo "<table border='0' cellpadding='2' cellspacing='1' class='viewTable'>";
						echo "<tr>";
						echo "<td colspan='1'>";
						echo "</td>";
						echo "<td class='tdheader'>".$lang['name']."</td>";
						echo "<td class='tdheader'>".$lang['sql']."</td>";
						echo "</tr>";
						for($i=0; $i<sizeof($result); $i++)
						{
							$tdWithClass = "<td class='td".($i%2 ? "1" : "2")."'>";
							echo "<tr>";
							echo $tdWithClass;
							echo "<a href='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=trigger_delete&amp;pk=".urlencode($result[$i]['name'])."' title='".$lang['del']."' class='delete'><span>".$lang['del']."</span></a>";
							echo "</td>";
							echo $tdWithClass;
							echo htmlencode($result[$i]['name']);
							echo "</td>";
							echo $tdWithClass;
							echo htmlencode($result[$i]['sql']);
							echo "</td>";
						}
						echo "</table><br/><br/>";
					}
					
					echo "<form action='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=index_create' method='post'>";
					echo "<input type='hidden' name='tablename' value='".htmlencode($_GET['table'])."'/>";
					echo "<br/><div class='tdheader'>";
					echo $lang['create_index2']." <input type='text' name='numcolumns' style='width:30px;' value='1'/> ".$lang['cols']." <input type='submit' value='".$lang['go']."' name='addindex' class='btn'/>";
					echo "</div>";
					echo "</form>";
					
					echo "<form action='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=trigger_create' method='post'>";
					echo "<input type='hidden' name='tablename' value='".htmlencode($_GET['table'])."'/>";
					echo "<br/><div class='tdheader'>";
					echo $lang['create_trigger2']." <input type='submit' value='".$lang['go']."' name='addindex' class='btn'/>";
					echo "</div>";
					echo "</form>";
				}
				break;
			/////////////////////////////////////////////// create column
			case "column_create":
				echo "<h2>".sprintf($lang['new_fld'],htmlencode($_POST['tablename']))."</h2>";
				if($_POST['tablefields']=="" || intval($_POST['tablefields'])<=0)
					echo $lang['specify_fields'];
				else if($_POST['tablename']=="")
					echo $lang['specify_tbl'];
				else
				{
					$num = intval($_POST['tablefields']);
					$name = $_POST['tablename'];
					echo "<form action='".PAGE."?table=".urlencode($_POST['tablename'])."&amp;action=column_create&amp;confirm=1' method='post'>";
					echo "<input type='hidden' name='tablename' value='".htmlencode($name)."'/>";
					echo "<input type='hidden' name='rows' value='".$num."'/>";
					echo "<table border='0' cellpadding='2' cellspacing='1' class='viewTable'>";
					echo "<tr>";
					$headings = array($lang["fld"], $lang["type"], $lang["prim_key"]);    
					if($db->getType() != "SQLiteDatabase") $headings[] = $lang["autoincrement"];
					$headings[] = $lang["not_null"];
					$headings[] = $lang["def_val"];
					
					for($k=0; $k<count($headings); $k++)
						echo "<td class='tdheader'>" . $headings[$k] . "</td>";
					echo "</tr>";

					for($i=0; $i<$num; $i++)
					{
						$tdWithClass = "<td class='td" . ($i%2 ? "1" : "2") . "'>";
						echo "<tr>";
						echo $tdWithClass;
						echo "<input type='text' name='".$i."_field' style='width:200px;'/>";
						echo "</td>";
						echo $tdWithClass;
						echo "<select name='".$i."_type' id='i".$i."_type' onchange='toggleAutoincrement(".$i.");'>";
						$types = unserialize(DATATYPES);
						for($z=0; $z<sizeof($types); $z++)
							echo "<option value='".htmlencode($types[$z])."'>".htmlencode($types[$z])."</option>";
						echo "</select>";
						echo "</td>";
						echo $tdWithClass;
						echo "<label><input type='checkbox' name='".$i."_primarykey'/> ".$lang['yes']."</label>";
						echo "</td>";
						if($db->getType() != "SQLiteDatabase")
						{
							echo $tdWithClass;
							echo "<label><input type='checkbox' name='".$i."_autoincrement' id='i".$i."_autoincrement'/> ".$lang['yes']."</label>";
							echo "</td>";
						}
						echo $tdWithClass;
						echo "<label><input type='checkbox' name='".$i."_notnull'/> ".$lang['yes']."</label>";
						echo "</td>";
						echo $tdWithClass;
						echo "<input type='text' name='".$i."_defaultvalue' style='width:100px;'/>";
						echo "</td>";
						echo "</tr>";
					}
					echo "<tr>";
					echo "<td class='tdheader' style='text-align:right;' colspan='6'>";
					echo "<input type='submit' value='".$lang['add_flds']."' class='btn'/> ";
					echo "<a href='".PAGE."?table=".urlencode($_POST['tablename'])."&amp;action=column_view'>".$lang['cancel']."</a>";
					echo "</td>";
					echo "</tr>";
					echo "</table>";
					echo "</form>";
				}
				break;
			/////////////////////////////////////////////// delete column
			case "column_delete":
				if(isset($_POST['check']))
					$pks = $_POST['check'];
				elseif(isset($_GET['pk']))
					$pks = array($_GET['pk']);
				else $pks = array();
				
				if(sizeof($pks)==0) //nothing was selected so show an error
				{
					echo "<div class='confirm'>";
					echo $lang['err'].": ".$lang['no_sel'];
					echo "</div>";
					echo "<br/><br/><a href='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=column_view'>".$lang['return']."</a>";
				}
				else
				{
					$str = $pks[0];
					$pkVal = $pks[0];
					for($i=1; $i<sizeof($pks); $i++)
					{
						$str .= ", ".$pks[$i];
						$pkVal .= ":".$pks[$i];
					}
					echo "<form action='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=column_delete&amp;confirm=1&amp;pk=".urlencode($pkVal)."' method='post'>";
					echo "<div class='confirm'>";
					printf($lang['ques_del_col'], htmlencode($str), htmlencode($_GET['table']));
					echo "<br/><br/>";
					echo "<input type='submit' value='".$lang['confirm']."' class='btn'/> ";
					echo "<a href='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=column_view'>".$lang['cancel']."</a>";
					echo "</div>";
				}
				break;
			/////////////////////////////////////////////// edit column
			case "column_edit":
				echo "<h2>".sprintf($lang['edit_col'], htmlencode($_GET['pk']))." ".$lang['on_tbl']." '".htmlencode($_GET['table'])."'</h2>";
				echo $lang['sqlite_limit']."<br/><br/>";
				if(!isset($_GET['pk']))
					echo $lang['specify_col'];
				else if(!isset($_GET['table']) || $_GET['table']=="")
					echo $lang['specify_tbl'];
				else
				{
					$query = "PRAGMA table_info(".$db->quote_id($_GET['table']).")";
					$result = $db->selectArray($query);

					for($i=0; $i<sizeof($result); $i++)
					{
						if($result[$i][1]==$_GET['pk'])
						{
							$colVal = $result[$i][0];
							$fieldVal = $result[$i][1];
							$typeVal = $result[$i][2];
							$notnullVal = $result[$i][3];
							$defaultVal = $result[$i][4];
							$primarykeyVal = $result[$i][5];
							break;
						}
					}
					
					$name = $_GET['table'];
					echo "<form action='".PAGE."?table=".urlencode($name)."&amp;action=column_edit&amp;confirm=1' method='post'>";
					echo "<input type='hidden' name='tablename' value='".htmlencode($name)."'/>";
					echo "<input type='hidden' name='oldvalue' value='".htmlencode($_GET['pk'])."'/>";
					echo "<table border='0' cellpadding='2' cellspacing='1' class='viewTable'>";
					echo "<tr>";
					//$headings = array("Field", "Type", "Primary Key", "Autoincrement", "Not NULL", "Default Value");
					$headings = array($lang["fld"], $lang["type"]);
					for($k=0; $k<count($headings); $k++)
						echo "<td class='tdheader'>".$headings[$k]."</td>";
					echo "</tr>";
				
					$i = 0;
					$tdWithClass = "<td class='td" . ($i%2 ? "1" : "2") . "'>";
					echo "<tr>";
					echo $tdWithClass;
					echo "<input type='text' name='".$i."_field' style='width:200px;' value='".htmlencode($fieldVal)."'/>";
					echo "</td>";
					echo $tdWithClass;
					echo "<select name='".$i."_type' id='i".$i."_type' onchange='toggleAutoincrement(".$i.");'>";
					$types = unserialize(DATATYPES);
					for($z=0; $z<sizeof($types); $z++)
					{
						if($types[$z]==$typeVal)
							echo "<option value='".htmlencode($types[$z])."' selected='selected'>".htmlencode($types[$z])."</option>";
						else
							echo "<option value='".htmlencode($types[$z])."'>".htmlencode($types[$z])."</option>";
					}
					echo "</select>";
					echo "</td>";
					/*
					echo $tdWithClass;
					if($primarykeyVal)
						echo "<input type='checkbox' name='".$i."_primarykey' checked='checked'/> Yes";
					else
						echo "<input type='checkbox' name='".$i."_primarykey'/> Yes";
					echo "</td>";
					echo $tdWithClass;
					if(1==2)
						echo "<input type='checkbox' name='".$i."_autoincrement' id='".$i."_autoincrement' checked='checked'/> Yes";
					else
						echo "<input type='checkbox' name='".$i."_autoincrement' id='".$i."_autoincrement'/> Yes";
					echo "</td>";
					echo $tdWithClass;
					if($notnullVal)
						echo "<input type='checkbox' name='".$i."_notnull' checked='checked'/> Yes";
					else
						echo "<input type='checkbox' name='".$i."_notnull'/> Yes";
					echo "</td>";
					echo $tdWithClass;
					echo "<input type='text' name='".$i."_defaultvalue' value='".$defaultVal."' style='width:100px;'/>";
					echo "</td>";
					*/
					echo "</tr>";

					echo "<tr>";
					echo "<td class='tdheader' style='text-align:right;' colspan='6'>";
					echo "<input type='submit' value='".$lang['save_ch']."' class='btn'/> ";
					echo "<a href='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=column_view'>".$lang['cancel']."</a>";
					echo "</td>";
					echo "</tr>";
					echo "</table>";
					echo "</form>";
				}
				break;
			/////////////////////////////////////////////// delete index
			case "index_delete":
				echo "<form action='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=index_delete&amp;pk=".urlencode($_GET['pk'])."&amp;confirm=1' method='post'>";
				echo "<div class='confirm'>";
				echo sprintf($lang['ques_del_index'], htmlencode($_GET['pk']))."<br/><br/>";
				echo "<input type='submit' value='".$lang['confirm']."' class='btn'/> ";
				echo "<a href='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=column_view'>".$lang['cancel']."</a>";
				echo "</div>";
				echo "</form>";
				break;
			/////////////////////////////////////////////// delete trigger
			case "trigger_delete":
				echo "<form action='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=trigger_delete&amp;pk=".urlencode($_GET['pk'])."&amp;confirm=1' method='post'>";
				echo "<div class='confirm'>";
				echo sprintf($lang['ques_del_trigger'], htmlencode($_GET['pk']))."<br/><br/>";
				echo "<input type='submit' value='".$lang['confirm']."' class='btn'/> ";
				echo "<a href='".PAGE."?table=".urlencode($_GET['table'])."&amp;action=column_view'>".$lang['cancel']."</a>";
				echo "</div>";
				echo "</form>";
				break;
			/////////////////////////////////////////////// create trigger
			case "trigger_create":
				echo "<h2>".$lang['create_trigger']." '".htmlencode($_POST['tablename'])."'</h2>";
				if($_POST['tablename']=="")
					echo $lang['specify_tbl'];
				else
				{
					echo "<form action='".PAGE."?table=".urlencode($_POST['tablename'])."&amp;action=trigger_create&amp;confirm=1' method='post'>";
					echo $lang['trigger_name'].": <input type='text' name='trigger_name'/><br/><br/>";
					echo "<fieldset><legend>".$lang['db_event']."</legend>";
					echo $lang['before']."/".$lang['after'].": ";
					echo "<select name='beforeafter'>";
					echo "<option value=''></option>";
					echo "<option value='BEFORE'>".$lang['before']."</option>"; 
					echo "<option value='AFTER'>".$lang['after']."</option>"; 
					echo "<option value='INSTEAD OF'>".$lang['instead']."</option>"; 
					echo "</select>";
					echo "<br/><br/>";
					echo $lang['event'].": ";
					echo "<select name='event'>";
					echo "<option value='DELETE'>".$lang['del']."</option>";
					echo "<option value='INSERT'>".$lang['insert']."</option>";
					echo "<option value='UPDATE'>".$lang['update']."</option>";
					echo "</select>";
					echo "</fieldset><br/><br/>";
					echo "<fieldset><legend>".$lang['trigger_act']."</legend>";
					echo "<label><input type='checkbox' name='foreachrow'/> ".$lang['each_row']."</label><br/><br/>";
					echo $lang['when_exp'].":<br/>";
					echo "<textarea name='whenexpression' style='width:500px; height:100px;' rows='8' cols='50'></textarea>";
					echo "<br/><br/>";
					echo $lang['trigger_step'].":<br/>";
					echo "<textarea name='triggersteps' style='width:500px; height:100px;' rows='8' cols='50'></textarea>";
					echo "</fieldset><br/><br/>";
					echo "<input type='submit' value='".$lang['create_trigger2']."' class='btn'/> ";
					echo "<a href='".PAGE."?table=".urlencode($_POST['tablename'])."&amp;action=column_view'>".$lang['cancel']."</a>";
					echo "</form>";
				}
				break;
			/////////////////////////////////////////////// create index
			case "index_create":
				echo "<h2>".$lang['create_index']." '".htmlencode($_POST['tablename'])."'</h2>";
				if($_POST['numcolumns']=="" || intval($_POST['numcolumns'])<=0)
					echo $lang['specify_fields'];
				else if($_POST['tablename']=="")
					echo $lang['specify_tbl'];
				else
				{
					echo "<form action='".PAGE."?table=".urlencode($_POST['tablename'])."&amp;action=index_create&amp;confirm=1' method='post'>";
					$num = intval($_POST['numcolumns']);
					$query = "PRAGMA table_info(".$db->quote_id($_POST['tablename']).")";

					$result = $db->selectArray($query);
					echo "<fieldset><legend>".$lang['define_index']."</legend>";
					echo $lang['index_name'].": <input type='text' name='name'/><br/>";
					echo $lang['dup_val'].": ";
					echo "<select name='duplicate'>";
					echo "<option value='yes'>".$lang['allow']."</option>";
					echo "<option value='no'>".$lang['not_allow']."</option>";
					echo "</select><br/>";
					echo "</fieldset>";
					echo "<br/>";
					echo "<fieldset><legend>".$lang['define_in_col']."</legend>";
					for($i=0; $i<$num; $i++)
					{
						echo "<select name='".$i."_field'>";
						echo "<option value=''>--".$lang['ignore']."--</option>";
						for($j=0; $j<sizeof($result); $j++)
							echo "<option value='".htmlencode($result[$j][1])."'>".htmlencode($result[$j][1])."</option>";
						echo "</select> ";
						echo "<select name='".$i."_order'>";
						echo "<option value=''></option>";
						echo "<option value=' ASC'>".$lang['asc']."</option>";
						echo "<option value=' DESC'>".$lang['desc']."</option>";
						echo "</select><br/>";
					}
					echo "</fieldset>";
					echo "<br/><br/>";
					echo "<input type='hidden' name='num' value='".$num."'/>";
					echo "<input type='submit' value='".$lang['create_index1']."' class='btn'/> ";
					echo "<a href='".PAGE."?table=".urlencode($_POST['tablename'])."&amp;action=column_view'>".$lang['cancel']."</a>";
					echo "</form>";
				}
				break;
		}
		echo "</div>";
	}
	
	$view = "structure";
		
	if(!isset($_GET['table']) && !isset($_GET['confirm']) && (!isset($_GET['action']) || (isset($_GET['action']) && $_GET['action']!="table_create"))) //the absence of these fields means we are viewing the database homepage
	{
		if(isset($_GET['view']))
			$view = $_GET['view'];
		else
			$view = "structure";

		echo "<a href='".PAGE."?view=structure' ";
		if($view=="structure")
			echo "class='tab_pressed'";
		else
			echo "class='tab'";
		echo ">".$lang['struct']."</a>";
		echo "<a href='".PAGE."?view=sql' ";
		if($view=="sql")
			echo "class='tab_pressed'";
		else
			echo "class='tab'";
		echo ">".$lang['sql']."</a>";
		echo "<a href='".PAGE."?view=export' ";
		if($view=="export")
			echo "class='tab_pressed'";
		else
			echo "class='tab'";
		echo ">".$lang['export']."</a>";
		echo "<a href='".PAGE."?view=import' ";
		if($view=="import")
			echo "class='tab_pressed'";
		else
			echo "class='tab'";
		echo ">".$lang['import']."</a>";
		echo "<a href='".PAGE."?view=vacuum' ";
		if($view=="vacuum")
			echo "class='tab_pressed'";
		else
			echo "class='tab'";
		echo ">".$lang['vac']."</a>";
		if($directory!==false && is_writable($directory))
		{
			echo "<a href='".PAGE."?view=rename' ";
			if($view=="rename")
				echo "class='tab_pressed'";
			else
				echo "class='tab'";
			echo ">".$lang['db_rename']."</a>";
			
			echo "<a href='".PAGE."?view=delete' title='".$lang['db_del']."' ";
			if($view=="delete")
				echo "class='tab_pressed delete_db'";
			else
				echo "class='tab delete_db'";
			echo "><span>".$lang['db_del']."</span></a>";
		}
		echo "<div style='clear:both;'></div>";
		echo "<div id='main'>";

		if($view=="structure") //database structure - view of all the tables
		{
			$query = "SELECT sqlite_version() AS sqlite_version";
			$queryVersion = $db->select($query);
			$realVersion = $queryVersion['sqlite_version'];
			
			if(isset($dbexists))
			{
				echo "<div class='confirm' style='margin:10px 20px;'>";
				echo $lang['err'].': '.sprintf($lang['db_exists'], htmlencode($dbname));
				echo "</div><br/>";
			}
			
			if($db->isWritable() && !$db->isDirWritable())
			{
				echo "<div class='confirm' style='margin:10px 20px;'>";
				echo $lang['attention'].': '.$lang['directory_not_writable'];
				echo "</div><br/>";
			}
			
			if(isset($extension_not_allowed))
			{
				echo "<div class='confirm' style='margin:10px 20px;'>";
				echo $lang['extension_not_allowed'].': ';
				foreach($allowed_extensions as $ext_i => $extension)
					echo htmlencode($extension). ($ext_i==count($allowed_extensions)-1?'':', ');
				echo '<br />'.$lang['add_allowed_extension'];
				echo "</div><br/>";
			}

			if ($auth->isPasswordDefault())
			{
				echo "<div class='confirm' style='margin:20px;'>";
				echo sprintf($lang['warn_passwd'],(is_readable('phpliteadmin.config.php')?'phpliteadmin.config.php':PAGE))."<br />".$lang['warn0'];
				echo "</div>";
			}
			
			echo "<b>".$lang['db_name']."</b>: ".htmlencode($db->getName())."<br/>";
			echo "<b>".$lang['db_path']."</b>: ".htmlencode($db->getPath())."<br/>";
			echo "<b>".$lang['db_size']."</b>: ".$db->getSize()." KB<br/>";
			echo "<b>".$lang['db_mod']."</b>: ".$db->getDate()."<br/>";
			echo "<b>".$lang['sqlite_v']."</b>: ".$realVersion."<br/>";
			echo "<b>".$lang['sqlite_ext']."</b> ".helpLink($lang['help1']).": ".$db->getType()."<br/>"; 
			echo "<b>".$lang['php_v']."</b>: ".phpversion()."<br/><br/>";
			
			if(isset($_GET['sort']) && ($_GET['sort']=='type' || $_GET['sort']=='name'))
				$_SESSION[COOKIENAME.'sortTables'] = $_GET['sort'];
			if(isset($_GET['order']) && ($_GET['order']=='ASC' || $_GET['order']=='DESC'))
				$_SESSION[COOKIENAME.'orderTables'] = $_GET['order'];
					
			$query = "SELECT type, name FROM sqlite_master WHERE (type='table' OR type='view') AND name!='' AND name NOT LIKE 'sqlite_%'";
			$queryAdd = "";
			if(isset($_SESSION[COOKIENAME.'sortTables']))
				$queryAdd .= " ORDER BY ".$db->quote_id($_SESSION[COOKIENAME.'sortTables']);
			else
				$queryAdd .= " ORDER BY \"name\"";
			if(isset($_SESSION[COOKIENAME.'orderTables']))
				$queryAdd .= " ".$_SESSION[COOKIENAME.'orderTables'];
			$query .= $queryAdd;
			$result = $db->selectArray($query);

			if(sizeof($result)==0)
				echo $lang['no_tbl']."<br/><br/>";
			else
			{
				echo "<table border='0' cellpadding='2' cellspacing='1' class='viewTable'>";
				echo "<tr>";
				
				echo "<td class='tdheader'>";
				echo "<a href='".PAGE."?sort=type";
				if(isset($_SESSION[COOKIENAME.'sortTables']))
					$orderTag = ($_SESSION[COOKIENAME.'sortTables']=="type" && $_SESSION[COOKIENAME.'orderTables']=="ASC") ? "DESC" : "ASC";
				else
					$orderTag = "ASC";
				echo "&amp;order=".$orderTag;
				echo "'>".$lang['type']."</a> ".helpLink($lang['help3']); 
				if(isset($_SESSION[COOKIENAME.'sortTables']) && $_SESSION[COOKIENAME.'sortTables']=="type")
					echo (($_SESSION[COOKIENAME.'orderTables']=="ASC") ? " <b>&uarr;</b>" : " <b>&darr;</b>");
				echo "</td>";
				
				echo "<td class='tdheader'>";
				echo "<a href='".PAGE."?sort=name";
				if(isset($_SESSION[COOKIENAME.'sortTables']))
					$orderTag = ($_SESSION[COOKIENAME.'sortTables']=="name" && $_SESSION[COOKIENAME.'orderTables']=="ASC") ? "DESC" : "ASC";
				else
					$orderTag = "ASC";
				echo "&amp;order=".$orderTag;
				echo "'>".$lang['name']."</a>";
				if(isset($_SESSION[COOKIENAME.'sortTables']) && $_SESSION[COOKIENAME.'sortTables']=="name")
					echo (($_SESSION[COOKIENAME.'orderTables']=="ASC") ? " <b>&uarr;</b>" : " <b>&darr;</b>");
				echo "</td>";
				
				echo "<td class='tdheader' colspan='10'>".$lang['act']."</td>";
				echo "<td class='tdheader'>".$lang['rec']."</td>";
				echo "</tr>";
				
				$totalRecords = 0;
				$skippedTables = false;
				for($i=0; $i<sizeof($result); $i++)
				{
					$records = $db->numRows($result[$i]['name'], true);
					if($records == '?')
						$skippedTables = true;
					else
						$totalRecords += $records;
					$tdWithClass = "<td class='td".($i%2 ? "1" : "2")."'>";
					$tdWithClassLeft = "<td class='td".($i%2 ? "1" : "2")."' style='text-align:left;'>";
					
					if($result[$i]['type']=="table")
					{
						echo "<tr>";
						echo $tdWithClassLeft;
						echo $lang['tbl'];
						echo "</td>";
						echo $tdWithClassLeft;
						echo "<a href='".PAGE."?table=".urlencode($result[$i]['name'])."&amp;action=row_view'>".htmlencode($result[$i]['name'])."</a>";
						echo "</td>";
						echo $tdWithClass;
						echo "<a href='".PAGE."?table=".urlencode($result[$i]['name'])."&amp;action=row_view'>".$lang['browse']."</a>";
						echo "</td>";
						echo $tdWithClass;
						echo "<a href='".PAGE."?table=".urlencode($result[$i]['name'])."&amp;action=column_view'>".$lang['struct']."</a>";
						echo "</td>";
						echo $tdWithClass;
						echo "<a href='".PAGE."?table=".urlencode($result[$i]['name'])."&amp;action=table_sql'>".$lang['sql']."</a>";
						echo "</td>";
						echo $tdWithClass;
						echo "<a href='".PAGE."?table=".urlencode($result[$i]['name'])."&amp;action=table_search'>".$lang['srch']."</a>";
						echo "</td>";
						echo $tdWithClass;
						echo "<a href='".PAGE."?table=".urlencode($result[$i]['name'])."&amp;action=row_create'>".$lang['insert']."</a>";
						echo "</td>";
						echo $tdWithClass;
						echo "<a href='".PAGE."?table=".urlencode($result[$i]['name'])."&amp;action=table_export'>".$lang['export']."</a>";
						echo "</td>";
						echo $tdWithClass;
						echo "<a href='".PAGE."?table=".urlencode($result[$i]['name'])."&amp;action=table_import'>".$lang['import']."</a>";
						echo "</td>";
						echo $tdWithClass;
						echo "<a href='".PAGE."?table=".urlencode($result[$i]['name'])."&amp;action=table_rename'>".$lang['rename']."</a>";
						echo "</td>";
						echo $tdWithClass;
						echo "<a href='".PAGE."?table=".urlencode($result[$i]['name'])."&amp;action=table_empty' class='empty'>".$lang['empty']."</a>";
						echo "</td>";
						echo $tdWithClass;
						echo "<a href='".PAGE."?table=".urlencode($result[$i]['name'])."&amp;action=table_drop' class='drop'>".$lang['drop']."</a>";
						echo "</td>";
						echo $tdWithClass;
						echo $records;
						echo "</td>";
						echo "</tr>";
					}
					else
					{
						echo "<tr>";
						echo $tdWithClassLeft;
						echo "View";
						echo "</td>";
						echo $tdWithClassLeft;
						echo "<a href='".PAGE."?table=".urlencode($result[$i]['name'])."&amp;action=row_view&amp;view=1'>".htmlencode($result[$i]['name'])."</a>";
						echo "</td>";
						echo $tdWithClass;
						echo "<a href='".PAGE."?table=".urlencode($result[$i]['name'])."&amp;action=row_view&amp;view=1'>".$lang['browse']."</a>";
						echo "</td>";
						echo $tdWithClass;
						echo "<a href='".PAGE."?table=".urlencode($result[$i]['name'])."&amp;action=column_view&amp;view=1'>".$lang['struct']."</a>";
						echo "</td>";
						echo $tdWithClass;
						echo "<a href='".PAGE."?table=".urlencode($result[$i]['name'])."&amp;action=table_sql&amp;view=1'>".$lang['sql']."</a>";
						echo "</td>";
						echo $tdWithClass;
						echo "<a href='".PAGE."?table=".urlencode($result[$i]['name'])."&amp;action=table_search&amp;view=1'>".$lang['srch']."</a>";
						echo "</td>";
						echo $tdWithClass;
						echo "";
						echo "</td>";
						echo $tdWithClass;
						echo "<a href='".PAGE."?table=".urlencode($result[$i]['name'])."&amp;action=table_export&amp;view=1'>".$lang['export']."</a>";
						echo "</td>";
						echo $tdWithClass;
						echo "";
						echo "</td>";
						echo $tdWithClass;
						echo "";
						echo "</td>";
						echo $tdWithClass;
						echo "";
						echo "</td>";
						echo $tdWithClass;
						echo "<a href='".PAGE."?table=".urlencode($result[$i]['name'])."&amp;action=view_drop&amp;view=1' class='drop'>".$lang['drop']."</a>";
						echo "</td>";
						echo $tdWithClass;
						echo $records;
						echo "</td>";
						echo "</tr>";
					}
				}
				echo "<tr>";
				echo "<td class='tdheader' colspan='12'>".sizeof($result)." total</td>";
				echo "<td class='tdheader' colspan='1' style='text-align:right;'>".$totalRecords.($skippedTables?' + ?':'')."</td>";
				echo "</tr>";
				echo "</table>";
				echo "<br/>";
			}
			echo "<fieldset>";
			echo "<legend><b>".$lang['create_tbl_db']." '".htmlencode($db->getName())."'</b></legend>";
			echo "<form action='".PAGE."?action=table_create' method='post'>";
			echo $lang['name'].": <input type='text' name='tablename' style='width:200px;'/> ";
			echo $lang['fld_num'].": <input type='text' name='tablefields' style='width:90px;'/> ";
			echo "<input type='submit' name='createtable' value='".$lang['go']."' class='btn'/>";
			echo "</form>";
			echo "</fieldset>";
			echo "<br/>";
			echo "<fieldset>";
			echo "<legend><b>".$lang['create_view']." '".htmlencode($db->getName())."'</b></legend>";
			echo "<form action='".PAGE."?action=view_create&amp;confirm=1' method='post'>";
			echo $lang['name'].": <input type='text' name='viewname' style='width:200px;'/> ";
			echo $lang['sel_state']." ".helpLink($lang['help4']).": <input type='text' name='select' style='width:400px;'/> "; 
			echo "<input type='submit' name='createtable' value='".$lang['go']."' class='btn'/>";
			echo "</form>";
			echo "</fieldset>";
		}
		else if($view=="sql") //database SQL editor
		{
			$isSelect = false;
			if(isset($_POST['query']) && $_POST['query']!="")
			{
				$delimiter = $_POST['delimiter'];
				$queryStr = $_POST['queryval'];
				$query = explode_sql($delimiter, $queryStr); //explode the query string into individual queries based on the delimiter

				for($i=0; $i<sizeof($query); $i++) //iterate through the queries exploded by the delimiter
				{
					if(str_replace(" ", "", str_replace("\n", "", str_replace("\r", "", $query[$i])))!="") //make sure this query is not an empty string
					{
						$queryTimer = new MicroTimer();
						if(preg_match('/^\s*(?:select|pragma)\s/i', $query[$i])===1)   // pragma often returns rows just like select
						{
							$isSelect = true;
							$result = $db->selectArray($query[$i], "assoc");
						}
						else
						{
							$isSelect = false;
							$result = $db->query($query[$i]);
						}
						$queryTimer->stop();

						echo "<div class='confirm'>";
						echo "<b>";
						// 22 August 2011: gkf fixed bugs 46, 51 and 52.
						if($result)
						{
							if($isSelect)
							{
								$affected = sizeof($result);
								printf($lang['show_rows'], $affected);
							}
							else
							{
								$affected = $db->getAffectedRows();
								echo $affected." ".$lang['rows_aff']." ";
							}
							printf($lang['query_time'], $queryTimer);
							echo "</b><br/>";
						}
						else
						{
							echo $lang['err'].": ".$db->getError()."</b><br/>";
						}
						echo "<span style='font-size:11px;'>".htmlencode($query[$i])."</span>";
						echo "</div><br/>";
						if($isSelect)
						{
							if(sizeof($result)>0)
							{
								$headers = array_keys($result[0]);

								echo "<table border='0' cellpadding='2' cellspacing='1' class='viewTable'>";
								echo "<tr>";
								for($j=0; $j<sizeof($headers); $j++)
								{
									echo "<td class='tdheader'>";
									echo htmlencode($headers[$j]);
									echo "</td>";
								}
								echo "</tr>";
								for($j=0; $j<sizeof($result); $j++)
								{
									$tdWithClass = "<td class='td".($j%2 ? "1" : "2")."'>";
									echo "<tr>";
									for($z=0; $z<sizeof($headers); $z++)
									{
										echo $tdWithClass;
										echo htmlencode($result[$j][$headers[$z]]);
										echo "</td>";
									}
									echo "</tr>";
								}
								echo "</table><br/><br/>";
							}
						}
					}
				}
			}
			else
			{
				$delimiter = ";";
				$queryStr = "";
			}

			echo "<fieldset>";
			echo "<legend><b>".sprintf($lang['run_sql'],htmlencode($db->getName()))."</b></legend>";
			echo "<form action='".PAGE."?view=sql' method='post'>";
			echo "<textarea style='width:100%; height:300px;' name='queryval' cols='50' rows='8'>".htmlencode($queryStr)."</textarea>";
			echo $lang['delimit']." <input type='text' name='delimiter' value='".htmlencode($delimiter)."' style='width:50px;'/> ";
			echo "<input type='submit' name='query' value='".$lang['go']."' class='btn'/>";
			echo "</form>";
			echo "</fieldset>";
		}
		else if($view=="vacuum")
		{
			if(isset($_POST['vacuum']))
			{
				$query = "VACUUM";
				$db->query($query);
				echo "<div class='confirm'>";
				printf($lang['db_vac'], htmlencode($db->getName()));
				echo "</div><br/>";
			}
			echo "<form method='post' action='".PAGE."?view=vacuum'>";
			printf($lang['vac_desc'],htmlencode($db->getName()));
			echo "<br/><br/>";
			echo "<input type='submit' value='".$lang['vac']."' name='vacuum' class='btn'/>";
			echo "</form>";
		}
		else if($view=="export")
		{
			echo "<form method='post' action='".PAGE."?view=export'>";
			echo "<fieldset style='float:left; width:260px; margin-right:20px;'><legend><b>".$lang['export']."</b></legend>";
			echo "<select multiple='multiple' size='10' style='width:240px;' name='tables[]'>";
			$query = "SELECT name FROM sqlite_master WHERE type='table' OR type='view' ORDER BY name";
			$result = $db->selectArray($query);
			for($i=0; $i<sizeof($result); $i++)
			{
				if(substr($result[$i]['name'], 0, 7)!="sqlite_" && $result[$i]['name']!="")
					echo "<option value='".htmlencode($result[$i]['name'])."' selected='selected'>".htmlencode($result[$i]['name'])."</option>";
			}
			echo "</select>";
			echo "<br/><br/>";
			echo "<label><input type='radio' name='export_type' checked='checked' value='sql' onclick='toggleExports(\"sql\");'/> ".$lang['sql']."</label>";
			echo "<br/><label><input type='radio' name='export_type' value='csv' onclick='toggleExports(\"csv\");'/> ".$lang['csv']."</label>";
			echo "</fieldset>";
			
			echo "<fieldset style='float:left; max-width:350px;' id='exportoptions_sql'><legend><b>".$lang['options']."</b></legend>";
			echo "<label><input type='checkbox' checked='checked' name='structure'/> ".$lang['export_struct']."</label> ".helpLink($lang['help5'])."<br/>"; 
			echo "<label><input type='checkbox' checked='checked' name='data'/> Export with data</label> ".helpLink($lang['help6'])."<br/>";
			echo "<label><input type='checkbox' name='drop'/> ".$lang['add_drop']."</label> ".helpLink($lang['help7'])."<br/>"; 
			echo "<label><input type='checkbox' checked='checked' name='transaction'/> ".$lang['add_transact']."</label> ".helpLink($lang['help8'])."<br/>";
			echo "<label><input type='checkbox' checked='checked' name='comments'/> ".$lang['comments']."</label> ".helpLink($lang['help9'])."<br/>"; 
			echo "</fieldset>";
			
			echo "<fieldset style='float:left; max-width:350px; display:none;' id='exportoptions_csv'><legend><b>".$lang['options']."</b></legend>";
			echo "<div style='float:left;'>".$lang['fld_terminated']."</div>";
			echo "<input type='text' value=';' name='export_csv_fieldsterminated' style='float:right;'/>";
			echo "<div style='clear:both;'>";
			echo "<div style='float:left;'>".$lang['fld_enclosed']."</div>";
			echo "<input type='text' value='\"' name='export_csv_fieldsenclosed' style='float:right;'/>";
			echo "<div style='clear:both;'>";
			echo "<div style='float:left;'>".$lang['fld_escaped']."</div>";
			echo "<input type='text' value='\' name='export_csv_fieldsescaped' style='float:right;'/>";
			echo "<div style='clear:both;'>";
			echo "<div style='float:left;'>".$lang['rep_null']."</div>";
			echo "<input type='text' value='NULL' name='export_csv_replacenull' style='float:right;'/>";
			echo "<div style='clear:both;'>";
			echo "<label><input type='checkbox' name='export_csv_crlf'/> ".$lang['rem_crlf']."</label><br/>";
			echo "<label><input type='checkbox' checked='checked' name='export_csv_fieldnames'/> ".$lang['put_fld']."</label>";
			echo "</fieldset>";
			
			echo "<div style='clear:both;'></div>";
			echo "<br/><br/>";
			echo "<fieldset><legend><b>".$lang['save_as']."</b></legend>";
			$file = pathinfo($db->getPath());
			$name = $file['filename'];
			echo "<input type='text' name='filename' value='".htmlencode($name)."_".date("Y-m-d").".dump' style='width:400px;'/> <input type='submit' name='export' value='".$lang['export']."' class='btn'/>";
			echo "</fieldset>";
			echo "</form>";
		}
		else if($view=="import")
		{
			if(isset($_POST['import']))
			{
				echo "<div class='confirm'>";
				if($importSuccess===true)
					echo $lang['import_suc'];
				else
					echo $importSuccess;
				echo "</div><br/>";
			}
			
			echo "<form method='post' action='".PAGE."?view=import' enctype='multipart/form-data'>";
			echo "<fieldset style='float:left; width:260px; margin-right:20px;'><legend><b>".$lang['import']."</b></legend>";
			echo "<label><input type='radio' name='import_type' checked='checked' value='sql' onclick='toggleImports(\"sql\");'/> ".$lang['sql']."</label>";
			echo "<br/><label><input type='radio' name='import_type' value='csv' onclick='toggleImports(\"csv\");'/> ".$lang['csv']."</label>";
			echo "</fieldset>";
			
			echo "<fieldset style='float:left; max-width:350px;' id='importoptions_sql'><legend><b>".$lang['options']."</b></legend>";
			echo $lang['no_opt'];
			echo "</fieldset>";
			
			echo "<fieldset style='float:left; max-width:350px; display:none;' id='importoptions_csv'><legend><b>".$lang['options']."</b></legend>";
			echo "<div style='float:left;'>".$lang['csv_tbl']."</div>";
			echo "<select name='single_table' style='float:right;'>";
			$query = "SELECT name FROM sqlite_master WHERE type='table' OR type='view' ORDER BY name";
			$result = $db->selectArray($query);
			for($i=0; $i<sizeof($result); $i++)
			{
				if(substr($result[$i]['name'], 0, 7)!="sqlite_" && $result[$i]['name']!="")
					echo "<option value='".htmlencode($result[$i]['name'])."'>".htmlencode($result[$i]['name'])."</option>";
			}
			echo "</select>";
			echo "<div style='clear:both;'>";
			echo "<div style='float:left;'>".$lang['fld_terminated']."</div>";
			echo "<input type='text' value=';' name='import_csv_fieldsterminated' style='float:right;'/>";
			echo "<div style='clear:both;'>";
			echo "<div style='float:left;'>".$lang['fld_enclosed']."</div>";
			echo "<input type='text' value='\"' name='import_csv_fieldsenclosed' style='float:right;'/>";
			echo "<div style='clear:both;'>";
			echo "<div style='float:left;'>".$lang['fld_escaped']."</div>";
			echo "<input type='text' value='\' name='import_csv_fieldsescaped' style='float:right;'/>";
			echo "<div style='clear:both;'>";
			echo "<div style='float:left;'>".$lang['null_represent']."</div>";
			echo "<input type='text' value='NULL' name='import_csv_replacenull' style='float:right;'/>";
			echo "<div style='clear:both;'>";
			echo "<label><input type='checkbox' checked='checked' name='import_csv_fieldnames'/> ".$lang['fld_names']."</label>";
			echo "</fieldset>";
			
			echo "<div style='clear:both;'></div>";
			echo "<br/><br/>";
			
			echo "<fieldset><legend><b>".$lang['import_f']."</b></legend>";
			echo "<input type='file' value='".$lang['choose_f']."' name='file' style='background-color:transparent; border-style:none;'/> <input type='submit' value='".$lang['import']."' name='import' class='btn'/>";
			echo "</fieldset>";
		}
		else if($view=="rename")
		{
			if(isset($extension_not_allowed))
			{
				echo "<div class='confirm'>";
				echo $lang['extension_not_allowed'].': ';
				foreach($allowed_extensions as $ext_i => $extension)
					echo htmlencode($extension). ($ext_i==count($allowed_extensions)-1?'':', ');
				echo '<br />'.$lang['add_allowed_extension'];
				echo "</div><br/>";
			}
			if(isset($dbexists))
			{
				echo "<div class='confirm'>";
				if($oldpath==$newpath)
					echo $lang['err'].": ".$lang['warn_dumbass'];
				else{
					echo $lang['err'].": "; 
					printf($lang['db_exists'], htmlencode($newpath));
				}
				echo "</div><br/>";
			}
			if(isset($justrenamed))
			{
				echo "<div class='confirm'>";
				printf($lang['db_renamed'], htmlencode($oldpath));
				echo " '".htmlencode($newpath)."'.";
				echo "</div><br/>";
			}
			echo "<form action='".PAGE."?view=rename&amp;database_rename=1' method='post'>";
			echo "<input type='hidden' name='oldname' value='".htmlencode($db->getPath())."'/>";
			echo $lang['db_rename']." '".htmlencode($db->getPath())."' ".$lang['to']." <input type='text' name='newname' style='width:200px;' value='".htmlencode($db->getPath())."'/> <input type='submit' value='".$lang['rename']."' name='rename' class='btn'/>";
			echo "</form>";	
		}
		else if($view=="delete")
		{
			echo "<form action='".PAGE."?database_delete=1' method='post'>";
			echo "<div class='confirm'>";
			echo sprintf($lang['ques_del_db'],htmlencode($db->getPath()))."<br/><br/>";
			echo "<input name='database_delete' value='".htmlencode($db->getPath())."' type='hidden'/>";
			echo "<input type='submit' value='".$lang['confirm']."' class='btn'/> ";
			echo "<a href='".PAGE."'>".$lang['cancel']."</a>";
			echo "</div>";
			echo "</form>";	
		}

		echo "</div>";
	}

	echo "<br/>";
	echo "<span style='font-size:11px;'>".$lang['powered']." <a href='".PROJECT_URL."' target='_blank' style='font-size:11px;'>".PROJECT."</a> | ";
	printf($lang['page_gen'], $pageTimer);
	echo "</span>";
	echo "</td></tr></table>";
	$db->close(); //close the database
}
echo "</body>";
echo "</html>";


/*	class MicroTimer (issue #146)
	wraps calls to microtime(), calculating the elapsed time and rounding output
*/

class MicroTimer {

	private $startTime, $stopTime;

	// creates and starts a timer
	function __construct()
	{
		$this->startTime = microtime(true);
	}

	// stops a timer
	public function stop()
	{
		$this->stopTime = microtime(true);
	}

	// returns the number of seconds from the timer's creation, or elapsed
	// between creation and call to ->stop()
	public function elapsed()
	{
		if ($this->stopTime)
			return round($this->stopTime - $this->startTime, 4);

		return round(microtime(true) - $this->startTime, 4);
	}

	// called when using a MicroTimer object as a string
	public function __toString()
	{
		return (string) $this->elapsed();
	}

}


/*	class Resources (issue #157)
	outputs secondary files, such as css and javascript
	data is stored gzipped (gzencode) and encoded (base64_encode)
*/

class Resources {

	private static $_resources = array(
		'css' => array(
			'mime' => 'text/css',
			'data' => 'body{margin:0;padding:0;font-family:Arial,Helvetica,sans-serif;font-size:14px;color:#000;background-color:#e0ebf6;overflow:auto;}.body_tbl td{padding:9px 2px 9px 9px;}.left_td{width:100px;}a{color:#03F;text-decoration:none;cursor:pointer;}a:hover{color:#06F;}hr{height:1px;border:0;color:#bbb;background-color:#bbb;width:100%;}h1{margin:0;padding:5px;font-size:24px;background-color:#f3cece;text-align:center;color:#000;border-top-left-radius:5px;border-top-right-radius:5px;-moz-border-radius-topleft:5px;-moz-border-radius-topright:5px;}#headerlinks{text-align:center;margin-bottom:10px;padding:5px;border-color:#03F;border-width:1px;border-style:solid;border-left-style:none;border-right-style:none;font-size:12px;background-color:#e0ebf6;font-weight:bold;}h1 #version{color:#000;font-size:16px;}h1 #logo{color:#000;}h2{margin:0;padding:0;font-size:14px;margin-bottom:20px;}input,select,textarea{font-family:Arial,Helvetica,sans-serif;background-color:#eaeaea;color:#03F;border-color:#03F;border-style:solid;border-width:1px;margin:5px;border-radius:5px;-moz-border-radius:5px;padding:3px;}input.btn{cursor:pointer;}input.btn:hover{background-color:#ccc;}fieldset{padding:15px;border-color:#03F;border-width:1px;border-style:solid;border-radius:5px;-moz-border-radius:5px;background-color:#f9f9f9;}#container{padding:10px;}#leftNav{min-width:250px;padding:0;border-color:#03F;border-width:1px;border-style:solid;background-color:#FFF;padding-bottom:15px;border-radius:5px;-moz-border-radius:5px;}.viewTable tr td{padding:1px;}#loginBox{width:500px;margin-left:auto;margin-right:auto;margin-top:50px;border-color:#03F;border-width:1px;border-style:solid;background-color:#FFF;border-radius:5px;-moz-border-radius:5px;}#main{border-color:#03F;border-width:1px;border-style:solid;padding:15px;background-color:#FFF;border-bottom-left-radius:5px;border-bottom-right-radius:5px;border-top-right-radius:5px;-moz-border-radius-bottomleft:5px;-moz-border-radius-bottomright:5px;-moz-border-radius-topright:5px;}.td1{background-color:#f9e3e3;text-align:right;font-size:12px;padding-left:10px;padding-right:10px;}.td2{background-color:#f3cece;text-align:right;font-size:12px;padding-left:10px;padding-right:10px;}.tdheader{border-color:#03F;border-width:1px;border-style:solid;font-weight:bold;font-size:12px;padding-left:10px;padding-right:10px;background-color:#e0ebf6;border-radius:5px;-moz-border-radius:5px;}.confirm{border-color:#03F;border-width:1px;border-style:dashed;padding:15px;background-color:#e0ebf6;}.tab{display:block;padding:5px;padding-right:8px;padding-left:8px;border-color:#03F;border-width:1px;border-style:solid;margin-right:5px;float:left;border-bottom-style:none;position:relative;top:1px;padding-bottom:4px;background-color:#eaeaea;border-top-left-radius:5px;border-top-right-radius:5px;-moz-border-radius-topleft:5px;-moz-border-radius-topright:5px;}.tab_pressed{display:block;padding:5px;padding-right:8px;padding-left:8px;border-color:#03F;border-width:1px;border-style:solid;margin-right:5px;float:left;border-bottom-style:none;position:relative;top:1px;background-color:#FFF;cursor:default;border-top-left-radius:5px;border-top-right-radius:5px;-moz-border-radius-topleft:5px;-moz-border-radius-topright:5px;}.helpq{font-size:11px;font-weight:normal;}#help_container{padding:0;font-size:12px;margin-left:auto;margin-right:auto;background-color:#fff;}.help_outer{background-color:#FFF;padding:0;height:300px;position:relative;}.help_list{padding:10px;height:auto;}.headd{font-size:14px;font-weight:bold;display:block;padding:10px;background-color:#e0ebf6;border-color:#03F;border-width:1px;border-style:solid;border-left-style:none;border-right-style:none;}.help_inner{padding:10px;}.help_top{display:block;position:absolute;right:10px;bottom:10px;}.warning,.delete,.empty,.drop,.delete_db{color:red;}.sidebar_table{font-size:11px;}.active_table,.active_db{text-decoration:underline;}.null{color:#888;}.found{background:#FF0;text-decoration:none;}',
		),
		'javascript' => array(
			'mime' => 'text/javascript',
			'data' => 'function initAutoincrement(){var a=0;while(document.getElementById("i"+a+"_autoincrement")!=undefined){document.getElementById("i"+a+"_autoincrement").disabled=true;a++}}function toggleAutoincrement(b){var c=document.getElementById("i"+b+"_type");var d=document.getElementById("i"+b+"_primarykey");var a=document.getElementById("i"+b+"_autoincrement");if(!a){return false}if(c.value=="INTEGER"&&d.checked){a.disabled=false}else{a.disabled=true;a.checked=false}}function toggleNull(a){var b=document.getElementById("i"+a+"_primarykey");var c=document.getElementById("i"+a+"_notnull");if(b.checked){c.disabled=true;c.checked=true}else{c.disabled=false}}function checkAll(b){var a=0;while(document.getElementById("check_"+a)!=undefined){document.getElementById("check_"+a).checked=true;a++}}function uncheckAll(b){var a=0;while(document.getElementById("check_"+a)!=undefined){document.getElementById("check_"+a).checked=false;a++}}function changeIgnore(b,c,a){if(b.value!=""){if(document.getElementById(c)!=undefined){document.getElementById(c).checked=false}if(document.getElementById(a)!=undefined){document.getElementById(a).checked=false}}}function moveFields(){var a=document.getElementById("fieldcontainer");var c=new Array();for(var b=0;b<a.options.length;b++){if(a.options[b].selected){c.push(a.options[b].value)}}for(var b=0;b<c.length;b++){insertAtCaret("queryval",\'"\'+c[b].replace(/"/g,\'""\')+\'"\')}}function insertAtCaret(g,h){var f=document.getElementById(g);var a=f.scrollTop;var c=0;var i=((f.selectionStart||f.selectionStart=="0")?"ff":(document.selection?"ie":false));if(i=="ie"){f.focus();var e=document.selection.createRange();e.moveStart("character",-f.value.length);c=e.text.length}else{if(i=="ff"){c=f.selectionStart}}var b=(f.value).substring(0,c);var d=(f.value).substring(c,f.value.length);f.value=b+h+d;c=c+h.length;if(i=="ie"){f.focus();var e=document.selection.createRange();e.moveStart("character",-f.value.length);e.moveStart("character",c);e.moveEnd("character",0);e.select()}else{if(i=="ff"){f.selectionStart=c;f.selectionEnd=c;f.focus()}}f.scrollTop=a}function notNull(a){document.getElementById(a).checked=false}function disableText(a,b){if(a.checked){document.getElementById(b).value="";document.getElementById(b).disabled=true}else{document.getElementById(b).disabled=false}}function toggleExports(a){document.getElementById("exportoptions_sql").style.display="none";document.getElementById("exportoptions_csv").style.display="none";document.getElementById("exportoptions_"+a).style.display="block"}function toggleImports(a){document.getElementById("importoptions_sql").style.display="none";document.getElementById("importoptions_csv").style.display="none";document.getElementById("importoptions_"+a).style.display="block"}function openHelp(a){PopupCenter("?help=1#"+a,"Help Section")}var helpsec=false;function PopupCenter(a,b){helpsec=window.open(a,b,"toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=400,height=300")}function checkLike(b,a){if(a=="LIKE%"){var c=document.getElementById(b);c.value="%"+c.value+"%"}};',
		),
		'favicon' => array(
			'mime' => 'image/x-icon',
			'data' => 'AAABAAEAEBAAAAEAIAAoBAAAFgAAACgAAAAQAAAAIAAAAAEAIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADwoKZQAAABMAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABEMDJMAAAAdAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAASDg7BAAAASAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAETDw9CCQkJ1QUFBb4AAABjAAAAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADgsLVgAAAO8YExP/AAAA7QAAALEAAAARAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABQNDUsAAADJGBMT/xgTE/8AAAD/AAAAuAAAAA8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAZERE8DQoKwhgTE/8QDQ2sGBMT/xgTE/8AAAA/AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAwICHkAAAD/EQwMzQAAAMIAAAD/AAAA7gAAAGEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAOCwtWAAAA8RgTE/8IBQW1AAAA/wAAAP8AAADlAAAAHQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA0KCsEAAAD/EQ8PzAAAAMkAAAD/AAAA/wAAAHoAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABDAAAA/xgTE/8TDw/FAAAA8gAAAP8AAADqAAAAJgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgAAALUAAAD/GBMT/wAAALkAAAD/AAAA/wAAAIkAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAfAAAA4wAAAP8GBgbFAAAA2QAAAP8AAADGAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAF4AAAD5AAAA/RgTE/8AAAD/AAAA0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAQQAAAOIAAAD/AAAA/wAAAHYAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAjAAAArgAAAG4AAAAAAAAAAAAAAAAAAAAA',
			'base64' => true,
		),
	);

	// override the internal resource with an external file
	public static function useExternal($resource, $filename)
	{
		if (isset(self::$_resources[$resource]) && is_readable($filename)) {
			self::$_resources[$resource]['file'] = $filename;
		}
	}

	// outputs the specified resource, if defined in this class.
	// the main script should do no further output after calling this function.
	public static function output($resource)
	{
		if (isset(self::$_resources[$resource])) {
			$res =& self::$_resources[$resource];

			// use last-modified time as etag; etag must be quoted
			$etag = '"' . filemtime(isset($res['file']) ? $res['file'] : PAGE) . '"';

			// check headers for matching etag; if etag hasn't changed, use the cached version
			if (isset($_SERVER['HTTP_IF_NONE_MATCH']) && $_SERVER['HTTP_IF_NONE_MATCH'] == $etag) {
				header('HTTP/1.0 304 Not Modified');
				return;
			}

			header('Etag: ' . $etag);

			// cache file for at most 30 days
			header('Cache-control: max-age=2592000');

			// output resource
			header('Content-type: ' . $res['mime']);

			if (isset($res['file'])) {
				readfile($res['file']);
			} elseif (isset($res['base64'])) {
				echo base64_decode($res['data']);
			} else {
				echo $res['data'];
			}
		}
	}

}

# - eof -
