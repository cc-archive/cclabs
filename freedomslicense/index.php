<?php 
/**
 * Creative Commons has made the contents of this file
 * available under a CC-GNU-GPL license:
 *
 * http://creativecommons.org/licenses/GPL/2.0/
 *
 * A copy of the full license can be found as part of this
 * distribution in the file COPYING.
 *
 * You may use this software in accordance with the
 * terms of that license. You agree that you are solely 
 * responsible for your use of this software and you
 * represent and warrant to Creative Commons that your use
 * of this software will comply with the CC-GNU-GPL.
 *
 * $Id: $
 *
 * Copyright 2006, Creative Commons, www.creativecommons.org.
 *
 */
    define('CC_LIB', '../cclib');
    require_once( CC_LIB . '/php/cc-lib.php' );

    $pagetitle = "Freedoms License Generator";
    $include = "flg-five.css";
    $head_extra = '<script type="text/javascript" language="javascript" src="' .
    CC_LIB_JS . '/prototype.js"></script>
    <script type="text/javascript" language="javascript" src="' . CC_LIB_JS . 
    '/cc-tooltip.js"></script>
    <script type="text/javascript" language="javascript" src="' . CC_LIB_JS . 
    '/cc-jurisdictions.js"></script>
    <script type="text/javascript" language="javascript" src="' . CC_LIB_JS . 
    '/cc-license.js"></script>
    <script type="text/javascript" language="javascript" src="' . CC_LIB_JS . 
    '/cc-lib-freedoms.js"></script>
    <script type="text/javascript" language="javascript">
    <!--
    var freedoms;
    function init_freedoms ()
    {
        freedoms = new CCLibFreedoms(); // in cc-lib-freedoms.js
        // the next two are in cc-license.js
        init(); 
        modify(this);
            
        init_tip();

    }
    // -->
    </script>
<!--[if lt IE 7]><link rel="stylesheet" type="text/css" media="screen" href="flg-five-ie.css" /><![endif]-->';
    $onload = "init_freedoms();";

    include_once "../_header.php"; 

    require_once CC_LIB_PHP . '/cc-license-jurisdictions.php';

?>

<script language="javascript" type="text/javascript">

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

    function no_license_selection () {
        $('flg-result').style.display = 'none';
    }

    function some_license_selection () {
        $('flg-result').style.display = 'block';
    }
    

</script>
 

<div id="flg-sidebar">
  <h2>Freedoms License Generator</h2>
  <p>
  Creative Commons licenses mark creative work with the freedoms the  
  author wants it to carry. This license engine helps make those  
  freedoms, and limits, clear. Begin by selecting which freedoms you  
  want to enable &mdash; either Share, or Remix, or both &mdash; by clicking on  
  the green puzzle pieces. Then select which conditions, if any, you'd  
  like to impose &mdash; either NonCommercial, or ShareAlike, or both. Not  
  all combinations are possible, but as you experiment with the  
  selections, you can see the different licenses that result.
  </p>
  <p><small>This project requires <em>Javascript</em>. License buttons are not final, and not for use outside of this application.<br/><br/>This demo will currently <strong>not</strong> work with Internet Explorer 6.</small></p>
</div>

<div id="flg-container">
  <h4 class="freedoms">Freedoms</h4>
<div id="flg-ui">
  <div id="flg-left">
    <div id="flg-connect-share" class="flg-pipe-on"><a href="javascript:freedoms.redo('share'); set_share(freedoms._share); ">&nbsp;</a></div>
    <div id="flg-connect-nc" class="flg-pipe-middle"><a href="javascript:freedoms.redo('nc')">&nbsp;</a></div>
  </div>

  <div id="flg-right">
    <div id="flg-connect-remix" class="flg-pipe-on"><a href="javascript:freedoms.redo('remix'); set_remix(freedoms._remix);">&nbsp;</a></div>
    <div id="flg-connect-sa" class="flg-pipe-middle"><a href="javascript:freedoms.redo('sa')">&nbsp;</a></div>
  </div>
  <div id="flg-mid">
    <div id="flg-result">BY</div>
  </div>
  <br clear="all"/>
</div>
<h4 class="conditions">Conditions</h4>
</div>

<hr class="spacer" />

<div id="content">
<div id="get_the_code">

<?php 
    // print_jurisdictions_box($jurisdiction);
?>
                    <div id="jurisdiction_box">
                    <?php $jurisdiction_tooltip = '<p><strong>' . _('Jurisdiction') . '</strong> ' .
                                        _('If you desire a license governed by the Copyright Law of a specific jurisdiction, please select the appropriate jurisdiction.') . '</p>' ?>
                    <p><strong <?= get_tooltip_js($jurisdiction_tooltip) ?>><?= _('Jurisdiction of your license') ;?></strong> <?= print_more_info($jurisdiction_tooltip) ?> </p>
                    <script language="javascript" type="text/javascript">

                    // hardwiring the jurisdiction passed in, right into
                    // js
                    var jurisdiction_code = "<?= ( $jurisdiction ? $jurisdiction : '') ?>";
                    print_jurisdictions_option( jurisdiction_code );
                    </script>
                    </div>
<br />
<h4>More Information About Your Work (Optional)</h4>
<?php
    include CC_LIB_PHP . '/cc-license-more-info.php';
?>
<br />
<h4>Get the Code</h4>
<?php
    include CC_LIB_PHP . '/cc-license-result.php';

?>
</div>

  <h2><a name="feedback"></a>Feedback</h2>
    <div class="blurb">
      <p>What do you think of this license chooser concept? How can it be improved? How does it compare to our <a href="http://creativecommons.org/license/">current license chooser</a> or other experimental concepts here at CC Labs?</p>
      <p>We want your feedback on CC Labs projects.  Send an email to <a href="mailto:labs@creativecommons.org">labs@creativecommons.org</a>, join and post to our <a href="http://lists.ibiblio.org/mailman/listinfo/cc-devel">developer mailing list</a>, or edit the <a href="http://wiki.creativecommons.org/Labs">CC Labs wiki</a>.</p>
    </div>

   <div id="tip_cloak" style="position:absolute; visibility:hidden; z-index:100">hidden tip</div> 

</div>


<? include_once "../_footer.php"; ?>
