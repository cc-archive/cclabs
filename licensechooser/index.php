<?php
    $pagetitle  = 'CC License Chooser';
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
			<h2>Choose a License</h2>
            <p>With a Creative Commons license, <strong>you keep your copyright</strong> but allow people to <a href="http://creativecommons.org/learn/licenses/fullrights">copy and distribute your work</a> provided they <a href="http://creativecommons.org/characteristic/by?lang=en" onclick="window.open('http://creativecommons.org/characteristic/by?lang=en', 'characteristic_help', 'width=375,height=300,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=yes,menubar=no,status=yes');return false;">give you credit</a> -- and only on the conditions you specify here. For those new to Creative Commons licensing, we've prepared <a href="http://creativecommons.org/about/think">a list of things to think about</a>. If you want to offer your work with no conditions, choose the <a href="http://creativecommons.org/publicdomain-2">public domain</a>.</p>
			</div>
			
			<div id="lic-menu" class="block">
				<h3>Choose the options below for your personalized Creative Commons license.</h3>
				<form>
					<p>
						<em><span id="by">by</span><span id="nc">-nc</span><span id="nd">-nd</span><span id="sa" style="display:none;">-sa</span></em><br/>
					
					<input type="checkbox" onChange="modify(this)" name="com" value="" id="com" />
					<label for="com"><strong>Allow commercial uses of your work?</strong></label><br />
					<input type="checkbox" onChange="modify(this)" name="mod" value="" id="mod" />
					<label for="mod"><strong>Allow modifications of your work?</strong></label><br />
					<input type="checkbox" name="share" onChange="modify(this)" value="" id="share" disabled />
					<label for="share" id="share-label" class="inactive"><strong>Require other people to share their changes?</strong></label><br />
					</p>
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
					
					<p><input type="button" name="submit" value="Create!" id="submit" onClick="testSub();"/></p>
					
					<!-- <p id="lic-result">
						Now paste the following code into your <em>Who I'd Like To Meet</em> box. It may look scary and confusing, but don't worry, it's full of useful information that keeps your creativity free!<br/> -->
                       <p id="lic-result">Paste the following code into your web page's html.<br />
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
