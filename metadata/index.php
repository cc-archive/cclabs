<?php 
    $pagetitle = "Metadata Lab";
    include_once "../_header.php"; 

?>

<div id="content">
<h2>Metadata Lab</h2>

<p>Using the experimental license choosers at <a href="/">CC Labs</a> you can provide some optional information about your work, including a URL to be used for attribution and a URL where rights beyond the scope of the public Creative Commons license may be obtained.</p>

<p>If you provide any optional information it will be included in the license notice HTML generated for your site. The optional information will also be annotated so that a computer may discern, e.g., the URL you want used for attribution purposes.</p>

<h3 id="demo">Demo</h3>

<table width="70%" border="1" cellpadding="10" align="center"><tr><td align="center"><small>
<span xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#">
<a rel="license" href="http://a3.creativecommons.org/licenses/by/2.5/"><img alt="Creative Commons License" border="0" src="http://i.creativecommons.org/l/by/2.5/88x31.png" class="cc-button"/></a><div><span id="work_title" property="dc:title">Metadata Lab Demo</span> by <a rel="cc:attributionURL" property="cc:attributionName" href="http://labs.creativecommons.org">CC Labs</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/2.5/">Creative Commons Attribution 2.5 License</a>. Permissions beyond the scope of this public license may be available at <a rel="cc:morePermissions" href="http://labs.creativecommons.org/metadata/demo-beyond">labs.creativecommons.org</a>.
</span>
</small></td></tr></table>

<p>The HTML rendered in the box above includes metadata.  Click on the license button and the license deed will update itself to display metadata scraped from this page after a few moments.</p>

<p>You can see the metadata revealed without leaving this page by clicking 
<a href="javascript:__RDFA_BASE='http://www.w3.org/2001/sw/BestPractices/HTML/rdfa-bookmarklet/';(function(){if(document.getElementById('rdfa_highlight_bm ')){alert('only once!');}else{s=document.createElement('script');s.type='text/javascript';s.id='rdfa_highlight_bm';s.src='http://www.w3.org/2001/sw/BestPractices/HTML/rdfa-bookmarklet/2006-10-08/highlight-metadata.js';document.getElementsByTagName('head')[0].appendChild(s);}})();">this RDFa bookmarklet link</a> (right click to bookmark the link and use on other pages).</p>

<h3 id="backgroound">Background</h3>

<p>Note that the bookmarklet above reveals that text and links intended for human use are annotated directly.  This is a big improvement over our use of RDF/XML embedded in HTML comments for extra metadata, which is hard for both humans and computers to see and understand.</p>

<p>Colocation of metadata and viewable content is accomplished above with <a href="http://wiki.creativecommons.org/RDFa">RDFa</a>, which uses attributes to annotate HTML elements.</p>

<p>There are some obstacles to RDFa adoption (it uses attributes that do not validate in current versions of [X]HTML) and <a href="http://wiki.creativecommons.org/Microformats">microformats</a> have lots of momentum, so we're also exploring a microformat or microformats for work information and other annotations that complement CC licensing.</p>

<p>See <a href="http://mirrors.creativecommons.org/google-20061026/">this presentation</a> for a discussion of some of the issues with various metadata options, especially starting at <a href="http://mirrors.creativecommons.org/google-20061026/#(22)">slide 22</a>.</p>

<h3 id="future">Contribute</h3>

<p>Send feedback directly to <a href="mailto:labs@creativecommons.org">labs@creativecommons.org</a>, join and post to the <a href="">cc-metadata</a> mailing list, or add to the <a href="http://wiki.creativecommons.org/Metadata_lab">metadata lab wiki</a>.</p>

</div>
