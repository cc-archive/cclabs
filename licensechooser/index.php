<?php
    function print_more_info ($url, $window_name = 'characteristic_help')
    {
        $onclick = " onclick=\"window.open('$url', '$window_name', 'width=375,height=300,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=yes,menubar=no,status=yes');return false;\"";
        echo "<em><a href=\"$url\"$onclick>" . _('more info') . "</a>\n" . 
             "<a href=\"$url\"$onclick><img src=\"icon_popup.gif\" /></a></em>\n";
    }

    $pagetitle  = _('CC License Chooser');
    $include    = 'style.css';
    $head_extra = 
	'<script type="text/javascript" language="javascript" src="prototype.js"></script>
	<script type="text/javascript" language="javascript" src="tooltip.js"></script>
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
			<h2><?= _('Choose a License'); ?></h2>
            <p>
            <?= sprintf(_('With a Creative Commons license, <strong>you keep your copyright</strong> but allow people to %scopy and distribute your work%s provided they %sgive you credit%s &mdash; and only on the conditions you specify here.'), '<a href="http://creativecommons.org/learn/licenses/fullrights">', '</a>', '<a href="http://creativecommons.org/characteristic/by?lang=en" onclick="window.open(\'http://creativecommons.org/characteristic/by?lang=en\', \'characteristic_help\', \'width=375,height=300,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=yes,menubar=no,status=yes\');return false;">', '</a>') . sprintf(_("For those new to Creative Commons licensing, we've prepared %sa list of things to think about%s."), '<a href="http://creativecommons.org/about/think">', '</a>') . sprintf(_('If you want to offer your work with no conditions, choose the %spublic domain%s'), '<a href="http://creativecommons.org/publicdomain-2">', '</a>') ?>
            </p>
			</div>
			
			<div id="lic-menu" class="block">
				<h3><?= _('Choose the options below for your personalized Creative Commons license.'); ?></h3>
				<form>
                    <div id="required">
					<p>
					<input type="checkbox" onChange="modify(this)" name="com" value="" id="com" />
					<label for="com"><strong><?= _('Allow commercial uses of your work?'); ?></strong></label> 
                    <?= print_more_info('http://a2.creativecommons.org/characteristic/nc?lang=en'); ?>
                    <br />
					<input type="checkbox" onChange="modify(this)" name="mod" value="" id="mod" />
					<label for="mod"><strong><?= _('Allow modifications of your work?'); ?></strong></label>
                    <?= print_more_info('http://a2.creativecommons.org/characteristic/nd?lang=en'); ?>
                    <br />
					<input type="checkbox" name="share" onChange="modify(this)" value="" id="share" disabled />
					<label for="share" id="share-label" class="inactive"><strong><?= _('Require other people to share their changes?'); ?></strong></label>
                    <?= print_more_info('http://a2.creativecommons.org/characteristic/sa?lang=en'); ?>
                    <br />
					</p>
                    </div>

                    <div id="optional">
                    <p><strong><?= _('Where are you going to apply this license?') ;?></strong></p>
					<p>
                    <input type="radio" onChange="modify(this)" name="used" value="" id="use_webpage" />
					<label for="used_webpage"><?= _('Webpage'); ?></label> 
					<input type="radio" onChange="modify(this)" name="used" value="" id="used_myspace" />
					<label for="use_myspace"><?= _('Myspace'); ?></label><br />
                    </p>

                    <p><strong><?= _('Jurisdiction of your license') ;?></strong> <?= print_more_info('http://a2.creativecommons.org/license/jurisdiction-popup?lang=en'); ?> </p>
                    
                    <select>
                    <option><?= _('Generic') ?></option>
                    </select>

                    <p><strong><?= _('Tell us the format of your work') . ':' ;?></strong></p>

                    <select>
                    <option><?= _('Other') ?></option>
                    </select>

                    <h4><a href="#"><?= _('Click to include more information about your work') ;?></a></h4>

                    </div>

                    <h4><?= _('Currently Selected License'); ?></h4>
                    <div id="license_selected">
						<em><span id="by">by</span><span id="nc">-nc</span><span id="nd">-nd</span><span id="sa" style="display:none;">-sa</span></em><br/>

                    </div>

					<!-- MySpace centric style module. You know, for the kids. 
					<p> 
						<strong>Style</strong><br />
						<label><input type="radio" name="style" value="silver" id="style_silver" checked /> Silver&nbsp;</label>
						<label><input type="radio" name="style" value="red" id="style_red" /> Red&nbsp;</label>
						<label><input type="radio" name="style" value="green" id="style_green" /> Green&nbsp;</label>
						<label><input type="radio" name="style" value="blue" id="style_blue" /> Blue&nbsp;</label>
						<label><input type="radio" name="style" value="black" id="style_black" /> Black&nbsp;</label>
						<label><input type="radio" name="style" value="none" id="style_black" /> None&nbsp;</label>
					</p> -->
					<!-- Show thumbnail of position on mouseover? 
					<p>
						<strong>Position</strong><br /> 
						<label onmouseover="doTooltip(event,'floating.png');" onmouseout="hideTip()"><input type="radio" name="pos" value="floating" id="pos_float" checked /> Floating&nbsp;</label>
						<label onmouseover="doTooltip(event,'profile.png')" onmouseout="hideTip()"><input type="radio" name="pos" value="fixed" id="pos_fixed" /> Profile&nbsp;</label>
					</p> -->
					
					<p><input type="button" name="submit" value="<?= _('Create Code!'); ?>" id="submit" onClick="testSub();"/></p>
					
					<!-- <p id="lic-result">
						Now paste the following code into your <em>Who I'd Like To Meet</em> box. It may look scary and confusing, but don't worry, it's full of useful information that keeps your creativity free!<br/> -->
                       <p id="lic-result"><?= _("Paste the following code into your web page's html."); ?><br />
						<textarea name="result" id="result" rows="8" cols="60">	</textarea>
					</p>
				</form>
				
			</div>
		</div>
		<!--<div id="foot">
			<small>2006-06-14 / 2006-07-10</small>
		</div> -->
	</div>
	<!-- <div id="tipDiv" style="position:absolute; visibility:hidden; z-index:100">hi!</div> -->

<?php
    include_once '../_footer.php';
?>
