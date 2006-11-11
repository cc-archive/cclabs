<?php
    // This is used here because IE doesn't like javascript array written
    // in...
    // TODO: Replace this PHP array with javascript array...right now, they
    //       are being mirrored!!!! BAD!!!!
    // 
    $jurisdictions = 
        Array( 'generic' => Array( 'name' => 'Generic',
                              'url'  => 'http://creativecommons.org',
                              'generic' => true ),
               'ar' => Array( 'name' => 'Argentina',
                              'url'  => 'http://creativecommons.org/worldwide/ar/'),
               'au' => Array( 'name' => 'Australia',
                              'url'  => 'http://www.creativecommons.org.au' ),
               'at' => Array( 'name' => 'Austria',
                              'url'  => 'http://www.creativecommons.at'),
               'be' => Array( 'name' => 'Belgium',
                              'url'  => 'http://creativecommons.org/worldwide/be/'),
               'br' => Array( 'name' => 'Brazil',
                              'url'  => 'http://creativecommons.org/worldwide/br/'),
               'bg' => Array( 'name' => 'Bulgaria',
                              'url'  => 'http://creativecommons.org/worldwide/bg/'),
               'ca' => Array( 'name' => 'Canada',
                              'url'  => 'http://creativecommons.ca'),
               'cl' => Array( 'name' => 'Chile',
                              'url'  => 'http://creativecommons.cl'),
               'cn' => Array( 'name' => 'Mainland China',
                              'url'  => 'http://cn.creativecommons.org'),
               'co' => Array( 'name' => 'Colombia',
                              'url'  => 'http://creativecommons.org/worldwide/co/'),
               'hr' => Array( 'name' => 'Croatia',
                              'url'  => 'http://creativecommons.org/worldwide/hr/'),
               'hu' => Array( 'name' => 'Hungary',
                              'http://creativecommons.org/worldwide/hu/'),
               'dk' => Array( 'name' => 'Denmark',
                              'url'  => 'http://creativecommons.org/worldwide/dk/'),
               'fi' => Array( 'name' => 'Finland',
                              'url'  => 'http://creativecommons.fi'),
               'fr' => Array( 'name' => 'France',
                              'url'  => 'http://fr.creativecommons.org'),
               'de' => Array( 'name' => 'Germany',
                              'url'  => 'http://de.creativecommons.org'),
               'il' => Array( 'name' => 'Israel',
                              'url'  => 'http://creativecommons.org.il'),
               'it' => Array( 'name' => 'Italy',
                              'url'  => 'http://www.creativecommons.it'),
               'jp' => Array( 'name' => 'Japan',
                              'url'  => 'http://www.creativecommons.jp'),
               'kr' => Array( 'name' => 'Korea',
                              'url'  => 'http://www.creativecommons.or.kr/'),
               'my' => Array( 'name' => 'Malaysia',
                              'url'  => 'http://creativecommons.org/worldwide/my/'),
               'mt' => Array( 'name' => 'Malta',
                              'url'  => 'http://creativecommons.org/worldwide/mt/'),
               'mx' => Array( 'name' => 'Mexico',
                              'url'  => 'http://creativecommons.org.mx'),
               'nl' => Array( 'name' => 'Netherlands',
                              'url'  => 'http://www.creativecommons.nl'),
               'pe' => Array( 'name' => 'Peru',
                              'url'  => 'http://pe.creativecommons.org'),
               'pl' => Array( 'name' => 'Poland',
                              'url'  => 'http://creativecommons.pl'),
               'si' => Array( 'name' => 'Slovenia',
                              'url'  => 'http://creativecommons.si'),
               'za' => Array( 'name' => 'South Africa',
                              'url'  => 'http://za.creativecommons.org'),
               'es' => Array( 'name' => 'Spain',
                              'url'  => 'http://es.creativecommons.org/'),
               'se' => Array( 'name' => 'Sweden',
                              'url'  => 'http://creativecommons.org/worldwide/se/'),
               'tw' => Array( 'name' => 'Taiwan',
                              'url'  => 'http://www.creativecommons.org.tw'),
               'uk' => Array( 'name' => 'UK: England & Wales',
                              'url'  => 'http://www.creativecommons.org.uk'),
               'scotland' =>
                       Array( 'name' => 'UK: Scotland',
                              'url'  => 'http://www.creativecommons.org.uk')
               );



    function print_more_info ($msg, $url = '', $use_ajax = true, 
                              $window_name = 'characteristic_help')
    {
        if ( !empty( $url ) )
            $onclick = " onclick=\"window.open('$url', '$window_name', 'width=375,height=300,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=yes,menubar=no,status=yes');return false;\"";

        if ( $use_ajax )
        {
            if ( !empty($url) )
                echo '<a href="' . $url . '">';
                
            echo "<img src=\"icon_popup.gif\" onmouseover=\"doTooltipHTML(event,'" . addslashes($msg) . "');\" onmouseout=\"hideTip()\" $onclick/>\n";
            
            if ( !empty($url) )
                echo '</a>';
        }
        else 
        {
            echo "<em><a href=\"$url\"$onclick>" . _('more info') . "</a>\n" . 
                 "<a href=\"$url\"$onclick><img src=\"icon_popup.gif\" /></a></em>\n";
        }
    }

    $pagetitle  = _('CC License Chooser');
    $include    = 'style.css';
    $head_extra = 
    '<script type="text/javascript" language="javascript" src="prototype.js"></script>
    <script type="text/javascript" language="javascript" src="tooltip.js"></script>
    <script type="text/javascript" language="javascript" src="cc-jurisdictions.js"></script>
    <script type="text/javascript" language="javascript" src="cc-license.js"></script>
    <script type="text/javascript" language="javascript" charset="utf-8">
    // <![CDATA[
        function pageInit() {
            init();
            initTip();
        }
    // ]]>
    </script>';
    $onload = 'pageInit()';
    include_once '../_header.php';
?>
    <div id="content">
        <div id="main">
            <div class="block">
            <h2><?= _('Choose License'); ?></h2>
            <p>
            <?= sprintf(_('With a Creative Commons license, <strong>you keep your copyright</strong> but allow people to %scopy and distribute your work%s provided they %sgive you credit%s &mdash; and only on the conditions you specify here.'), 
            '<a href="http://creativecommons.org/learn/licenses/fullrights">', 
            '</a>', 
            '<a href="http://creativecommons.org/characteristic/by?lang=en" onclick="window.open(\'http://creativecommons.org/characteristic/by?lang=en\', \'characteristic_help\', \'width=375,height=300,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=yes,menubar=no,status=yes\');return false;">', 
            '</a>') . 
            sprintf(_("For those new to Creative Commons licensing, we've prepared %sa list of things to think about%s."), 
            '<a href="http://creativecommons.org/about/think">', '</a>') . 
            sprintf(_('If you want to offer your work with no conditions, choose the %spublic domain%s'), 
            '<a href="http://creativecommons.org/publicdomain-2">', '</a>') ?>
            </p>
            </div>
            
            <div id="lic-menu" class="block">
                <h3><?= _('Choose the options below for your personalized Creative Commons license.'); ?></h3>
                <form>
                    <div id="required">
                    <p>
                    <input type="checkbox" onChange="modify(this)" name="com" value="" id="com" />
                    <label for="com"><strong><?= _('Allow commercial uses of your work?'); ?></strong></label> 
                    <?= print_more_info('<p><img src=\'http://creativecommons.org/icon/nc/standard.gif\' alt=\'nc\' class=\'icon\' /><strong>' . _('Noncommercial') . '</strong> ' . _('The licensor permits others to copy, distribute, display, and perform the work. In return, licensees may not use the work for commercial purposes &mdash; unless they get the permission of the licensor.') . '</p>',
                    'http://a2.creativecommons.org/characteristic/nc?lang=en'); ?>
                    <br />
                    <input type="checkbox" onChange="modify(this)" name="mod" value="" id="mod" />
                    <label for="mod"><strong><?= _('Allow modifications of your work?'); ?></strong></label>
                    <?= print_more_info('<p><img src=\'http://creativecommons.org/icon/nd/standard.gif\' alt=\'nd\' class=\'icon\' /><strong>' . _('No Derivative Works') . 
                    '</strong> ' . _('The licensor permits others to copy, distribute, display and perform only unaltered copies of the work &mdash; not derivative works based on it.') . '</p>', 
                    'http://a2.creativecommons.org/characteristic/nc?lang=en' ); ?>
                    <br />
                    <input type="checkbox" name="share" onChange="modify(this)" value="" id="share" disabled />
                    <label for="share" id="share-label" class="inactive"><strong><?= _('Require other people to share their changes?'); ?></strong></label>
                    <?= print_more_info('<p><img src=\'http://creativecommons.org/icon/sa/standard.gif\' alt=\'sa\' class=\'icon\' /><strong>' . 
                    _('Share Alike') . '</strong> ' . _('The licensor permits others to distribute derivative works only under a license identical to the one that governs the work of the licensor.') . '</p>', 
                    'http://a2.creativecommons.org/characteristic/sa?lang=en'); ?>
                    <br />
                    </p>
                    </div>

                    <h4><?= _('Currently Selected License'); ?> : <em><span id="by">by</span><span id="nc" style="display: none">-nc</span><span id="nd" style="display:none">-nd</span><span id="sa" style="display:none;">-sa</span></em></h4>
                    <p class="note"><a href="#result">Get the Code</a></p>
                    <div id="license_selected">
                        <div id="license_example"></div>
                    </div>

                    <div id="optional">

                    <p><strong><?= _('Jurisdiction of your license') ;?></strong> <?= print_more_info('<p><strong>' . _('Jurisdiction') . '</strong> ' . 
                    _('If you desire a license governed by the Copyright Law of a specific jurisdiction, please select the appropriate jurisdiction.') . '</p>',
                    'http://a2.creativecommons.org/license/jurisdiction-popup?lang=en'); ?> </p>
                    
                    <select name="jurisdiction" id="jurisdiction" onChange="modify(this)">
                    <?php
                        foreach ( $jurisdictions as $jkey => $jarray )
                        {
                            echo "<option value=\"$jkey\">" . 
                                 $jarray['name'] . "</option>\n";
                        }
                    ?>
                    <!-- <script>print_jurisdictions_option();</script> -->
                    </select>

                    <p><strong><?= _('Tell us the format of your work') . ':' ;?></strong></p>

                    <select name="format" id="format" onChange="modify(this)">
                    <option value=""><?= _('Other') ?></option>
                    <option value="Sound"><?= _('Audio') ?></option>
                    <option value="MovingImage"><?= _('Video') ?></option>
                    <option value="StillImage"><?= _('Image') ?></option>
                    <option value="Text"><?= _('Text') ?></option>
                    <option value="InteractiveResource"><?= _('Interactive') ?>
                    </option>
                    </select>

                    <p><strong><?= _('Where are you going to apply this license?') ;?></strong></p>
                    <p>
                    <input type="radio" onChange="modify(this)" name="using" value="webpage" id="using" checked="checked" />
                    <label for="using"><?= _('Webpage'); ?></label> 
                    <input type="radio" onChange="modify(this)" name="using" value="myspace" id="using" />
                    <label for="using"><?= _('Myspace'); ?></label><br />
                    </p>
                    <!-- <h4><a href="#"><?= _('Click to include more information about your work') ;?></a></h4> -->

                    <!-- MySpace centric style module. You know, for the kids. -->
                    <div id="myspace_style" style="display: none"> 
                    <p><strong><?= _('Style') ?></strong></p>
                        <label><input type="radio" name="style" value="silver" id="style_silver" checked="checked" onChange="modify(this)" /> <?= _('Silver') ?>&nbsp;</label>
                        <label><input type="radio" name="style" value="red" id="style_red" onChange="modify(this)" /> <?= _('Red') ?>&nbsp;</label>
                        <label><input type="radio" name="style" value="green" id="style_green" onChange="modify(this)" /> <?= _('Green') ?>&nbsp;</label>
                        <label><input type="radio" name="style" value="blue" id="style_blue" onChange="modify(this)" /> <?= _('Blue') ?>&nbsp;</label>
                        <label><input type="radio" name="style" value="black" id="style_black" onChange="modify(this)" /> <?= _('Black') ?>&nbsp;</label>
                        <label><input type="radio" name="style" value="white" id="style_white" onChange="modify(this)" /> <?= _('White') ?>&nbsp;</label>
                        <label><input type="radio" name="style" value="none" id="style_none" onChange="modify(this)" /> <?= _('None') ?>&nbsp;</label>
                    </div>

                    <!-- Show thumbnail of position on mouseover? -->
                    <div id="myspace_position" style="display: none">
                    <p><strong><?= _('Position') ?></strong></p>
                        <label onmouseover="doTooltip(event,'floating.png');" onmouseout="hideTip()"><input type="radio" name="pos" value="floating" id="pos_float" onChange="modify(this)" /> <?= _('Floating') ?>&nbsp;</label>
                        <label onmouseover="doTooltip(event,'profile.png')" onmouseout="hideTip()"><input type="radio" name="pos" value="fixed" id="pos_fixed" checked="checked" onChange="modify(this)" /> <?= _('Profile') ?>&nbsp;</label>
                    </div>

                    </div>


                    
                    <!-- <p><input type="button" name="submit" value="<?= _('Create Code!'); ?>" id="submit" onClick="testSub();"/></p> -->
                    
                    <!-- <p id="lic-result">
                        <?= _("Now paste the following code into your <em>Who I'd Like To Meet</em> box. It may look scary and confusing, but don't worry, it's full of useful information that keeps your creativity free!") ?> -->
                       <p id="lic-result"><?= _("Paste the following code into your web page's html."); ?></p>
                        <textarea name="result" id="result" rows="8" cols="60" onfocus="this.select();"></textarea>
                </form>
                
            </div>
        </div>
        <!--<div id="foot">
            <small>2006-06-14 / 2006-07-10</small>
        </div> -->
    </div>
    <div id="tipDiv" style="position:absolute; visibility:hidden; z-index:100">hi!</div> 

<?php
    include_once '../_footer.php';
?>
