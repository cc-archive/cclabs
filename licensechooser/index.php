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


    $jurisdiction   = $_REQUEST['jurisdiction'];
    $lang           = $_REQUEST['lang'];

    if ( empty($jurisdiction) && !empty($lang) )
        $jurisdiction = $lang;


    function get_more_info ($msg, $url = '', $use_ajax = true, 
                              $window_name = 'characteristic_help')
    {
        $output = '';

        if ( !empty( $url ) )
            $onclick = " onclick=\"window.open('$url', '$window_name', 'width=375,height=300,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=yes,menubar=no,status=yes');return false;\"";

        if ( $use_ajax )
        {
            if ( !empty($url) )
                $output = '<a href="' . $url . '">';
                
            $output .= "<span class=\"questionbox\" onmouseover=\"doTooltipHTML(event,'" . addslashes($msg) . "');\" onmouseout=\"hideTip()\" $onclick/>?</span>";
            if ( !empty($url) )
                $output .= '</a>';
        }
        else 
        {
            $output .=  
                 "<em><a href=\"$url\"$onclick>" . _('more info') . "</a>\n" . 
                 "<a href=\"$url\"$onclick><img src=\"icon_popup.gif\" /></a></em>\n";
        }
        return $output;
    }

    function print_more_info ($msg, $url = '', $use_ajax = true, 
                              $window_name = 'characteristic_help')
    {
        echo get_more_info($msg, $url, $use_ajax, $window_name);
    }

    function get_tooltip_js ($msg, $url = '')
    {
        $onclick = '';
        if ( !empty($url) )
            $onclick = " onclick=\"window.open('$url', 'tooltip', 'width=375,height=300,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=yes,menubar=no,status=yes');return false;\"";

        return "class=\"question\" onmouseover=\"doTooltipHTML(event,'"
                      . addslashes($msg) . 
                      "');\" onmouseout=\"hideTip()\"$onclick";
    }

    function print_tooltip_js ($msg, $url = '')
    {
        get_tooltip_js($msg, $url);
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
            '<a href="#" ' . get_tooltip_js('<p><img src=\'http://creativecommons.org/icon/by/standard.gif\' alt=\'by\' class=\'icon\' /><strong>' . _('Attribution') . '</strong> ' . _('You must attribute the work in the manner specified by the author or licensor.') . '</p>',  'http://a2.creativecommons.org/characteristic/by?lang=' . $lang) . '>', '</a>' ) . 
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
                    <label for="com"><strong><?= _('Allow commercial uses of your work'); ?></strong></label> 
                    <?= print_more_info('<p><img src=\'http://creativecommons.org/icon/nc/standard.gif\' alt=\'nc\' class=\'icon\' /><strong>' . _('Noncommercial') . '</strong> ' . _('The licensor permits others to copy, distribute, display, and perform the work. In return, licensees may not use the work for commercial purposes &mdash; unless they get the permission of the licensor.') . '</p>',
                    'http://a2.creativecommons.org/characteristic/nc?lang=' . $lang); ?>
                    <br />
                    <input type="checkbox" onChange="modify(this)" name="mod" value="" id="mod" />
                    <label for="mod"><strong><?= _('Allow modifications of your work'); ?></strong></label>
                    <?= print_more_info('<p><img src=\'http://creativecommons.org/icon/nd/standard.gif\' alt=\'nd\' class=\'icon\' /><strong>' . _('No Derivative Works') . 
                    '</strong> ' . _('The licensor permits others to copy, distribute, display and perform only unaltered copies of the work &mdash; not derivative works based on it.') . '</p>', 
                    'http://a2.creativecommons.org/characteristic/nc?lang=' . $lang ); ?>
                    <br />
                    <input type="checkbox" name="share" onChange="modify(this)" value="" id="share" disabled />
                    <label for="share" id="share-label" class="inactive"><strong><?= _('Require other people to share their changes'); ?></strong></label>
                    <?= print_more_info('<p><img src=\'http://creativecommons.org/icon/sa/standard.gif\' alt=\'sa\' class=\'icon\' /><strong>' . 
                    _('Share Alike') . '</strong> ' . _('The licensor permits others to distribute derivative works only under a license identical to the one that governs the work of the licensor.') . '</p>', 
                    'http://a2.creativecommons.org/characteristic/sa?lang=' . $lang); ?>
                    <br />
                    </p>
                    </div>

                    <h4><?= _('Currently Selected License'); ?> : <em><span id="by">by</span><span id="nc" style="display: none">-nc</span><span id="nd" style="display:none">-nd</span><span id="sa" style="display:none;">-sa</span></em></h4>
                    <p class="note"><a href="#result">Get the Code</a></p>
                    <div id="license_selected">
                        <div id="license_example"></div>
                    </div>

                    <p><strong><a href="#optional" id="advanced_toggle" onclick="toggle('optional', 'advanced_toggle');"><?= _('Advanced Options') ?></a></strong> 
                    <div id="optional" style="display:none">

                    <p><strong><?= _('Jurisdiction of your license') ;?></strong> <?= print_more_info('<p><strong>' . _('Jurisdiction') . '</strong> ' . 
                    _('If you desire a license governed by the Copyright Law of a specific jurisdiction, please select the appropriate jurisdiction.') . '</p>',
                    'http://a2.creativecommons.org/license/jurisdiction-popup?lang=' . $lang); ?> </p>
                    
                    <select name="jurisdiction" id="jurisdiction" onChange="modify(this)">
                    <?php
                        foreach ( $jurisdictions as $jkey => $jarray )
                        {
                            $selected = '';
                            if ( $jurisdiction == $jkey )
                                $selected = ' selected="selected"';

                            echo "<option value=\"$jkey\"$selected>" . 
                                 $jarray['name'] . "</option>\n";
                        }
                    ?>
                    <!-- <script>print_jurisdictions_option();</script> -->
                    </select>

                    <p><strong><?= _('Where are you going to apply this license?') ;?></strong></p>
                    <p>
                    <input type="radio" onChange="modify(this)" name="using" value="webpage" id="using_webpage" checked="checked" />
                    <label for="using" <?= print_tooltip_js( _('The generator will make html that is ready to be inserted into an html-based webpage.')) ?>><?= _('Webpage'); ?></label> 
                    <input type="radio" onChange="modify(this)" name="using" value="myspace" id="using_myspace" />
                    <label for="using" <?= print_tooltip_js( _('The generator will make html that may be inserted into the popular social networking site\'s, http://myspace.com, <em>Who I\'d Like To Meet</em> box')) ?>><?= _('Myspace'); ?></label>
                    <input type="radio" onChange="modify(this)" name="using" value="rdf" id="using_rdf" />
                    <label for="using" <?= print_tooltip_js( _('The generator will make Resource Description Framework (RDF) metadata that you may use to describe your content.')) ?>><?= _('RDF'); ?></label>
                    </p>


                    <p><strong><?= _('What type of button would you like?') ;?></strong></p>
                    <p>
                    <input type="radio" onChange="modify(this)" name="button_style" value="version2" id="button_style_version2" checked="checked" />
                    <label for="button_style" <?= print_tooltip_js( _('The old style buttons that are generic for all licenses.')) ?>><?= _('Version 2.0 Generic'); ?></label> 
                    <input type="radio" onChange="modify(this)" name="button_style" value="version3" id="button_style_version3" />
                    <label for="button_style" <?= print_tooltip_js( _('The new more specific version 3.0 license buttons.')) ?>><?= _('Version 3.0 Specific'); ?></label></p>

                    <!-- MySpace centric style module. You know, for the kids. -->
                    <div id="myspace_style" style="display: none"> 
                    <p><strong><?= _('Style') ?></strong></p>
                        <label><input type="radio" name="style" value="silver" id="style_silver" checked="checked" onChange="modify(this)" /> <?= _('Silver') ?>&nbsp;</label>
                        <label><input type="radio" name="style" value="red" id="style_red" onChange="modify(this)" /> <?= _('Red') ?>&nbsp;</label>
                        <label><input type="radio" name="style" value="green" id="style_green" onChange="modify(this)" /> <?= _('Green') ?>&nbsp;</label>
                        <label><input type="radio" name="style" value="blue" id="style_blue" onChange="modify(this)" /> <?= _('Blue') ?>&nbsp;</label>
                        <label><input type="radio" name="style" value="black" id="style_black" onChange="modify(this)" /> <?= _('Black') ?>&nbsp;</label>
                        <!-- <label><input type="radio" name="style" value="white" id="style_white" onChange="modify(this)" /> <?= _('White') ?>&nbsp;</label> -->
                        <label><input type="radio" name="style" value="none" id="style_none" onChange="modify(this)" /> <?= _('None') ?>&nbsp;</label>
                    </div>

                    <!-- Show thumbnail of position on mouseover? -->
                    <div id="myspace_position" style="display: none">
                    <p><strong><?= _('Position') ?></strong></p>
                        <label onmouseover="doTooltip(event,'floating.png');" onmouseout="hideTip()"><input type="radio" name="pos" value="floating" id="pos_float" onChange="modify(this)" /> <?= _('Floating') ?>&nbsp;</label>
                        <label onmouseover="doTooltip(event,'profile.png')" onmouseout="hideTip()"><input type="radio" name="pos" value="fixed" id="pos_fixed" checked="checked" onChange="modify(this)" /> <?= _('Profile') ?>&nbsp;</label>
                    </div>

                    <p><strong><a href="#more_info" id="more_info_toggle" onclick="toggle('more_info', this);" style="display: none"><?= _('More Information About Work Options') ?></a></strong></p>

                    <div id="more_info" style="display: none">

                    <p><?= _('Tell us the format of your work') . ':' ;?></p>

                    <p><select name="info_format" id="info_format" onChange="modify(this)">
                    <option value=""><?= _('Other') ?></option>
                    <option value="Sound"><?= _('Audio') ?></option>
                    <option value="MovingImage"><?= _('Video') ?></option>
                    <option value="StillImage"><?= _('Image') ?></option>
                    <option value="Text"><?= _('Text') ?></option>
                    <option value="InteractiveResource"><?= _('Interactive') ?>
                    </option>
                    </select></p>

                    <table>
                    <tr>
                        <td class="header">
                            <label for="info_title">
                            <?= _('Title of Work') ?></label>
                        </td>
                        <td>
                            <input type="text" name="info_title" id="info_title" onChange="modify(this)" />
                        </td>
                    </tr>
                    <tr>
                        <td class="header">
                            <label for="info_description">
                            <?= _('Description') ?></label>
                        </td>
                        <td>
                            <input type="text" name="info_description" id="info_description" onChange="modify(this)" />
                        </td>
                    </tr>
                    <tr>
                        <td class="header">
                            <label for="info_creators_name">
                            <?= _("Creator's Name") ?></label>
                        </td>
                        <td>
                            <input type="text" name="info_creators_name" id="info_creators_name" onChange="modify(this)" />
                        </td>
                    </tr>
                    <tr>
                        <td class="header">
                            <label for="info_copyright_holders_name">
                            <?= _("Copyright Holder's Name") ?></label>
                        </td>
                        <td>
                            <input type="text" name="info_copyright_holders_name" id="info_copyright_holders_name" onChange="modify(this)" />
                        </td>
                    </tr>
                    <tr>
                        <td class="header">
                            <label for="info_copyright_year">
                            <?= _("Year of Copyright") ?></label>
                        </td>
                        <td>
                            <input type="text" name="info_copyright_year" id="info_copyright_year" onChange="modify(this)" />
                        </td>
                    </tr>
                    <tr>
                        <td class="header">
                            <label for="info_source_work_url">
                            <?= _("Source Work URL") ?></label>
                        </td>
                        <td>
                            <input type="text" name="info_source_work_url" id="info_source_work_url" onChange="modify(this)" />
                        </td>
                    </tr>
                    <!-- <tr>
                        <td class="header">
                            <label for="info_attribute_to_name">
                            <?= _('Attribute to Name') ?></label>
                        </td>
                        <td>
                            <input type="text" name="info_attribute_to_name" value="" id="info_attribute_to_name" onChange="modify(this)" />
                        </td>
                    </tr>
                    <tr>
                        <td class="header">
                            <label for="info_attribute_to_url">
                            <?= _('Attribute to URL') ?></label>
                        </td>
                        <td>
                            <input type="text" name="info_attribute_to_url" value="" id="info_attribute_to_url" onChange="modify(this)" />
                        </td>
                    </tr>
                    <tr>
                        <td class="header">
                            <label for="info_source_work_url">
                            <a href="#" <?= print_tooltip_js(_('A work another is derived from.'), 'http://a2.creativecommons.org/jargon/source_work')?>><?= _('Source Work') ?></a> <?= _('URL') ?></label>
                        </td>
                        <td>
                            <input type="text" name="info_source_work_url" value="" id="info_source_work_url" onChange="modify(this)" />
                        </td>
                    </tr>
                    <tr>
                        <td class="header">
                            <label for="info_more_permissions_url"><?= _('More Permissions URL') ?>&nbsp;</label>
                        </td>
                        <td>
                            <input type="text" name="info_more_permissions_url" value="" id="info_more_permissions_url" onChange="modify(this)" />
                        </td>
                    </tr> -->
                    </table>
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
