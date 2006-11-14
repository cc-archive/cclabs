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
      <a href="/"><img src="/images/cc-labs.png" border="0" alt="ccLabs"/></a>
      <p class="blurb"><a href="http://creativecommons.org">Creative Commons</a>
      </p>
    </div>
    
    <div id="innertube">
     
