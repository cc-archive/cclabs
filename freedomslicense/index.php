<?php 
    /* RemixShare License Generator */
    /* Creative Commons, 2006 */

    // The next few lines allow for basic interfacing with standard
    // CC website's handling of jurisdiction for jurisdiction shortname 
    // and for future language support, aka, local language strings...
    $jurisdiction   = $_REQUEST['jurisdiction'];
    $lang           = $_REQUEST['lang'];

    if ( empty($jurisdiction) && !empty($lang) )
        $jurisdiction = $lang;


    $pagetitle = "Freedoms License Generator";
    $include = "flg-five.css";
    $head_extra = '<script type="text/javascript" language="javascript" src="prototype.js"></script>
    <script type="text/javascript" language="javascript" src="../dhtmllicense/tooltip.js"></script>
    <script type="text/javascript" language="javascript" src="../dhtmllicense/cc-jurisdictions.js"></script>
    <script type="text/javascript" language="javascript" src="../dhtmllicense/cc-license.js"></script>
<!--[if lt IE 7]><link rel="stylesheet" type="text/css" media="screen" href="flg-five-ie.css" /><![endif]-->';
    $onload = "initFreedoms(); init(); update()";

    include_once "../_header.php"; 

    require_once '../dhtmllicense/cc-license-jurisdictions.php';

?>

<script lang="javascript">

var share = false;
var remix = false;
var sa_cond = false;
var nc_cond = false;
var sa_on = false;
var nc_on = false;

/* Preload images, FF/NS/IE7 only. */
/* FIXME: IE6 relies on PNG filter loader, so this type of preloading has no effect.
          Setting up the filter on 1x1 div's may acheive same effect. Must test. */
if (document.images) {
  saon = new Image(376, 282);
  saon.src = "5/sa-on.png";
  saoff = new Image(376, 282);
  saoff.src = "5/sa-off.png";
  sadim = new Image(376, 282);
  sadim.src = "5/sa-dim.png";
  
  ncon = new Image(282, 376);
  ncon.src = "5/nc-on.png";
  ncoff = new Image(282, 376);
  ncoff.src = "5/nc-off.png";
  ncdim = new Image(282, 376);
  ncdim.src = "5/nc-dim.png";
  
  shareon  = new Image(282, 376);
  shareon.src = "5/share-on.png";
  sharedim  = new Image(282, 376);
  sharedim.src = "5/share-dim.png";
  
  remixon  = new Image(376, 282);
  remixon.src = "5/remix-on.png";
  remixdim  = new Image(376, 282);
  remixdim.src = "5/remix-dim.png";
  
}



function initFreedoms() {
  share = remix = true;
  
  redo();
}

function redo(mode) {
  
  switch (mode) {
    case "share":
      share = !share;
      break;
    case "remix":
      remix = !remix;
      break;
    case "nc":
      if (nc_on) { nc_cond = !nc_cond; }
      break;
    case "sa":
      if (sa_on) { sa_cond = !sa_cond; }
      break;
    
  }
  
  
  
  if (!share) {
    sa_cond = sa_on = nc_cond = nc_on = false;
    
    Element.classNames ('flg-connect-nc').set ("flg-pipe-off");
    Element.classNames ('flg-connect-sa').set ("flg-pipe-off");
    Element.classNames ('flg-connect-share').set ("flg-pipe-middle");
    
    if (!remix) {
      Element.classNames ('flg-connect-remix').set ("flg-pipe-middle");
    } else {
      Element.classNames ('flg-connect-remix').set ("flg-pipe-on");
    }
    
  } else {
    nc_on = true;
    
    Element.classNames ('flg-connect-share').set ("flg-pipe-on");
    
    if (nc_cond) {
      Element.classNames ('flg-connect-nc').set ("flg-pipe-on");
    } else {
      Element.classNames ('flg-connect-nc').set ("flg-pipe-middle");
    }
    
    if (remix) {
      sa_on = true;
      
      if (sa_cond) {
        Element.classNames ('flg-connect-sa').set ("flg-pipe-on");
      } else {
        Element.classNames ('flg-connect-sa').set ("flg-pipe-middle");
      }
      
      Element.classNames ('flg-connect-remix').set ("flg-pipe-on");
    } else {
      sa_cond = sa_on = false;

      Element.classNames ('flg-connect-sa').set ("flg-pipe-off");
      Element.classNames ('flg-connect-remix').set ("flg-pipe-middle");
    }
  }
    
  results();
}
function no_license_selection() {
    $('flg-result').style.display = 'none';
    $('get_the_code').style.display = 'none';
}
function some_license_selection() {
    $('flg-result').style.display = 'block';
    $('get_the_code').style.display = 'block';
}
function results() {
  some_license_selection(); // This is purely cosmetic.
  if (!share) {
    if (!remix) {
      Element.update ("flg-result", "");
      no_license_selection();
      return;
    } else {
      display('sampling', '1.0', 'Sampling', 'Remix');
    }
  } else {
    if (!remix) {
      if (nc_cond) {
        display('by-nc-nd', '2.5', 'Attribution-NonCommercial-NoDerivs', 'Share:NC:ND');
      } else {
        display('by-nd', '2.5', 'Attribution-NoDerivs', 'Share:ND');
      }
    } else {
      if (nc_cond) {
        if (sa_cond) {
          display('by-nc-sa', '2.5', 'Attribution-NonCommercial-ShareAlike', 'Remix&Share:NC:SA');
        } else {
          display('by-nc', '2.5', 'Attribution-NonCommercial', 'Remix&Share:NC');
        }
      } else if (sa_cond) {
          display('by-sa', '2.5', 'Attribution-ShareAlike', 'Remix&Share:SA');
      } else {
          display('by', '2.5', 'Attribution', 'Remix&Share');
      }
    }
  }
}
function display(code, version, name, aka) {
    update_hack(code, version, name);
    name = "&nbsp;"; // notice this is reset to space!
    Element.update ("flg-result", "<img src='http://i.creativecommons.org/l/"+code+"/"+version+"/88x31.png'/><br/>" +
    '<br /><i><a href="#get_the_code">Get the Code!</a></i>'); 
}
</script>


<div id="flg-sidebar">
  <h2>Freedoms License Generator</h2>
  <p>
    With a Creative Commons license, <strong>you keep your copyright</strong> but allow people to <a href="http://creativecommons.org/learn/licenses/fullrights">copy and distribute your work</a> provided they <span class="question" onmouseover="doTooltipHTML(event,'&lt;p&gt;&lt;img src=&quot;http://creativecommons.org/icon/by/standard.gif&quot; alt=&quot;by&quot; class=&quot;icon&quot; /&gt;&lt;strong&gt;Attribution&lt;/strong&gt; You must attribute the work in the manner specified by the author or licensor.&lt;/p&gt;');" onmouseout="hideTip()">give you credit</span> &mdash; and only on the conditions you specify here. For those new to Creative Commons licensing, we've prepared <a href="http://creativecommons.org/about/think">a list of things to think about</a>.
  </p>
  <p><small>This project requires <em>Javascript</em>. License buttons are not final, and not for use outside of this application.<br/><br/>This demo will currently <strong>not</strong> work with Internet Explorer 6.</small></p>
</div>

<div id="flg-container">
  <h4 class="freedoms">Freedoms</h4>
<div id="flg-ui">
  <div id="flg-left">
    <div id="flg-connect-share" class="flg-pipe-on"><a href="javascript:redo('share')">&nbsp;</a></div>
    <div id="flg-connect-nc" class="flg-pipe-middle"><a href="javascript:redo('nc')">&nbsp;</a></div>
  </div>

  <div id="flg-right">
    <div id="flg-connect-remix" class="flg-pipe-on"><a href="javascript:redo('remix')">&nbsp;</a></div>
    <div id="flg-connect-sa" class="flg-pipe-middle"><a href="javascript:redo('sa')">&nbsp;</a></div>
  </div>
  <div id="flg-mid">
    <div id="flg-result">BY</div>
  </div>
  <br clear="all"/>
</div>
<h4 class="conditions">Conditions</h4>
</div>
  
<div id="content">
<div id="get_the_code">

<?php 
    print_jurisdictions_box($jurisdiction, 'results();');
?>
<br />
<h4>More Information About Your Work (Optional)</h4>
<?php
    include '../dhtmllicense/cc-license-more-info.php';
?>
<br />
<h4>Get the Code</h4>
<?php
    include '../dhtmllicense/cc-license-result.php';

?>
</div>

  <h2><a name="feedback"></a>Feedback</h2>
    <div class="blurb">
      <p>What do you think of this license chooser concept? How can it be improved? How does it compare to our <a href="http://creativecommons.org/license/">current license chooser</a> or other experimental concepts here at CC Labs?</p>
      <p>We want your feedback on CC Labs projects.  Send an email to <a href="mailto:labs@creativecommons.org">labs@creativecommons.org</a>, join and post to our <a href="http://lists.ibiblio.org/mailman/listinfo/cc-devel">developer mailing list</a>, or edit the <a href="http://wiki.creativecommons.org/Labs">CC Labs wiki</a>.</p>
    </div>

</div>


<? include_once "../_footer.php"; ?>
