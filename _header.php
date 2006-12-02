<?php
/**
 * This function grabs the current php page name and path, minus the domain
 * and spits out a simple version appended to the current cc wiki page.
 * This is a cheap hack. Oh, if there is a page name as a parameter, then it
 * prints that. Also, if at the basic root-url, then redirects to the labs
 * wiki page...
 *
 * @param string $page_name The short wikified name for a page.
 */
function print_wiki_page_name ($page_name = '')
{
    $root_url = 'http://wiki.creativecommons.org/';
    if ( empty($page_name ) )
    {
        if ( $_SERVER['PHP_SELF'] == '/index.php' ||
             $_SERVER['PHP_SELF'] == '/' ) {
            echo $root_url . "labs";
            return;
        }
        echo $root_url . 
            preg_replace('/^\/(.+)\/+.*/', '\\1', $_SERVER['PHP_SELF']);
    }
    else
        echo $root_url . $page_name;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <?= (($meta_extra) ? "$meta_extra\n" : ""); ?>

	<title>ccLabs <?= (($pagetitle) ? "- $pagetitle" : ""); ?></title>
	
	<style type="text/css" media="screen">
    @import url(/style.css);
    <?= (($include) ? "@import url($include);\n" : ""); ?>
	</style>

    <?= (($head_extra) ? "$head_extra\n" : "\n"); ?>
	
</head>

<body <?= (($onload) ? "onload=\"$onload\"" : ""); ?>>

  <div id="box">
    <div id="header">
      <a href="/"><img src="/images/cc-labs.png" alt="ccLabs"/></a>
      <p class="support">
      <a href="http://creativecommons.org/support/"><img src="http://creativecommons.org/images/support/2006/spread-3.gif" alt="Support CC 2006" id="supportbutton" /></a> 
      </p>
      <p class="blurb">
      <a href="http://creativecommons.org">Creative Commons</a> 
      </p>
    </div>
    
    <div id="innertube">
     
