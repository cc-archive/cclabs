<?php 
    /* RemixShare License Generator */
    /* Creative Commons, 2006 */

    $pagetitle = "Freedoms License Generator - r5";
    $include = "flg-five.css";
    $head_extra = '<script type="text/javascript" language="javascript" src="prototype.js"></script>
    <script type="text/javascript" language="javascript" src="../dhtmlengine/tooltip.js"></script>
    <script type="text/javascript" language="javascript" src="../dhtmlengine/cc-license.js"></script>
<!--[if lt IE 7]><link rel="stylesheet" type="text/css" media="screen" href="flg-five-ie.css" /><![endif]-->';
    $onload = "initFreedoms(); init(); modify(this);";

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
function results() {
  if (!share) {
    if (!remix) {
      Element.update ("flg-result", "");
      return;
    } else {
      display('sampling', '1.0', 'Sampling 1.0', 'Remix');
    }
  } else {
    if (!remix) {
      if (nc_cond) {
        display('by-nc-nd', '2.5', 'Attribution-NonCommercial-NoDerivs 2.5', 'Share:NC:ND');
      } else {
        display('by-nd', '2.5', 'Attribution-NoDerivs 2.5', 'Share:ND');
      }
    } else {
      if (nc_cond) {
        if (sa_cond) {
          display('by-nc-sa', '2.5', 'Attribution-NonCommercial-ShareAlike 2.5', 'Remix&Share:NC:SA');
        } else {
          display('by-nc', '2.5', 'Attribution-NonCommercial 2.5', 'Remix&Share:NC');
        }
      } else if (sa_cond) {
          display('by-sa', '2.5', 'Attribution-ShareAlike 2.5', 'Remix&Share:SA');
      } else {
          display('by', '2.5', 'Attribution 2.5', 'Remix&Share');
      }
    }
  }
}
function display(code, version, name, aka) {
  name = "&nbsp;";
  Element.update ("flg-result", "<img src='http://i.creativecommons.org/l/"+code+"/"+version+"/88x31.png'/><br/>"+name+"<br/><small>AKA</small><br/>"+aka+
  '<br /><i><a href="#result">Get the Code!</a></i>'); 
  update();
  /* update(code, version, name, aka); */
}
</script>


<div id="content">
  <h2>Freedoms License Generator</h2>
  <p>
    With a Creative Commons license, <strong>you keep your copyright</strong> but allow people to <a href="http://creativecommons.org/learn/licenses/fullrights">copy and distribute your work</a> provided they <span class="question" onmouseover="doTooltipHTML(event,'&lt;p&gt;&lt;img src=&quot;http://creativecommons.org/icon/by/standard.gif&quot; alt=&quot;by&quot; class=&quot;icon&quot; /&gt;&lt;strong&gt;Attribution&lt;/strong&gt; You must attribute the work in the manner specified by the author or licensor.&lt;/p&gt;');" onmouseout="hideTip()">give you credit</span> &mdash; and only on the conditions you specify here. For those new to Creative Commons licensing, we've prepared <a href="http://creativecommons.org/about/think">a list of things to think about</a>.
  </p>
  <p><small>This project requires <em>Javascript</em>. License buttons are not final, and not for use outside of this application.<br/>This demo will currently <strong>not</strong> work with Internet Explorer 6.</small></p>

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

<?php 
    print_jurisdictions_box();
    include '../dhtmllicense/cc-license-result.php' 

?>

</div>

<? include_once "../_footer.php"; ?>