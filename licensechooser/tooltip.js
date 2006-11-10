<!--

/*
Image w/ description tooltip- By Dynamic Web Coding (www.dyn-web.com)
Copyright 2002 by Sharon Paine
Visit http://www.dynamicdrive.com for this script

--

Modified by Alex Roberts for Creative Commons, 2006

*/

/* IMPORTANT: Put script after tooltip div or 
	 put tooltip div just before </BODY>. */

var dom = (document.getElementById) ? true : false;
var ns5 = ((navigator.userAgent.indexOf("Gecko")>-1) && dom) ? true: false;
var ie5 = ((navigator.userAgent.indexOf("MSIE")>-1) && dom) ? true : false;
var nodyn = (!ns5 && !ns4 && !ie4 && !ie5) ? true : false;

// avoid error of passing event object in older browsers
if (nodyn) { event = "nope" }

///////////////////////  CUSTOMIZE HERE   ////////////////////
// settings for tooltip 
// Do you want tip to move when mouse moves over link?
var tipFollowMouse= false;	
// Be sure to set tipWidth wide enough for widest image
var tipWidth= 175;
var offX= 20;	// how far from mouse to show tip
var offY= 10; 

// tooltip content goes here (image, description, optional bgColor, optional textcolor)
//var messages = new Array();
// multi-dimensional arrays containing: 
// image and text for tooltip
// optional: bgColor and color to be sent to tooltip
//messages[0] = new Array('red_balloon.gif','Here is a red balloon on a white background',"#FFFFFF");
//messages[1] = new Array('duck2.gif','Here is a duck on a light blue background.',"#DDECFF");
//messages[2] = new Array('test.gif','Test description','black','white');

////////////////////  END OF CUSTOMIZATION AREA  ///////////////////

// preload images that are to appear in tooltip
// from arrays above
/*if (document.images) {
	var theImgs = new Array();
	for (var i = 0; i < messages.length; i++) {
  	theImgs[i] = new Image();
		theImgs[i].src = messages[i][0];
  }
}*/

////////////////////////////////////////////////////////////
//  initTip	- initialization for tooltip.
//		Global variables for tooltip. 
//		Set styles for all but ns4. 
//		Set up mousemove capture if tipFollowMouse set true.
////////////////////////////////////////////////////////////
var tooltip, tipcss;
function initTip() {
	if (nodyn) return;
	tooltip = $('tipDiv');
	tipcss = tooltip.style;
	
	/*if (ie4||ie5||ns5) {	// ns4 would lose all this on rewrites
		tipcss.width = tipWidth+"px";
		tipcss.fontFamily = tipFontFamily;
		tipcss.fontSize = tipFontSize;
		tipcss.color = tipFontColor;
		tipcss.backgroundColor = tipBgColor;
		tipcss.borderColor = tipBorderColor;
		tipcss.borderWidth = tipBorderWidth+"px";
		tipcss.padding = tipPadding+"px";
		tipcss.borderStyle = tipBorderStyle; 
	}*/	

	if (tooltip && tipFollowMouse) {
		document.onmousemove = trackMouse;
	}
}

//window.onload = initTip;

/////////////////////////////////////////////////
//  doTooltip function
//			Assembles content for tooltip and writes 
//			it to tipDiv
/////////////////////////////////////////////////
var t1,t2;	// for setTimeouts
var tipOn = false;	// check if over tooltip link
function doTooltip(evt, img) {
	if (!tooltip) return;
	if (t1) clearTimeout(t1);	if (t2) clearTimeout(t2);
	tipOn = true;
	
	// set colors if included in messages array
	//if (messages[num][2])	var curBgColor = messages[num][2];
	//else curBgColor = tipBgColor;
	//if (messages[num][3])	var curFontColor = messages[num][3];
	//else curFontColor = tipFontColor
	var tip = '<div class="tipimage"><img src="' + img + '" border="0"/></div>';
	//var tip = 'hell oworld!';
	tooltip.innerHTML = tip;

	if (!tipFollowMouse) positionTip(evt);
	else t1 = setTimeout("tipcss.visibility='visible'", 100);
}

var mouseX, mouseY;
function trackMouse(evt) {
	mouseX = (ns5)? evt.pageX: window.event.clientX + document.body.scrollLeft;
	mouseY = (ns5)? evt.pageY: window.event.clientY + document.body.scrollTop;
	if (tipOn) positionTip(evt);
}

/////////////////////////////////////////////////////////////
//  positionTip function
//		If tipFollowMouse set false, so trackMouse function
//		not being used, get position of mouseover event.
//		Calculations use mouseover event position, 
//		offset amounts and tooltip width to position
//		tooltip within window.
/////////////////////////////////////////////////////////////
function positionTip(evt) {
	if (!tipFollowMouse) {
		mouseX = (ns5)? evt.pageX : window.event.clientX + document.body.scrollLeft;
		mouseY = (ns5)? evt.pageY : window.event.clientY + document.body.scrollTop;
	}
	// tooltip width and height
	var tpWd = (ie5)? tooltip.clientWidth : tooltip.offsetWidth;
	var tpHt = (ie5)? tooltip.clientHeight : tooltip.offsetHeight;
	// document area in view (subtract scrollbar width for ns)
	var winWd = (ns5)? window.innerWidth - 20 + window.pageXOffset : document.body.clientWidth + document.body.scrollLeft;
	var winHt = (ns5)? window.innerHeight - 20 + window.pageYOffset : document.body.clientHeight + document.body.scrollTop;
	// check mouse position against tip and window dimensions
	// and position the tooltip 
	if ((mouseX + offX + tpWd) > winWd) 
		tipcss.left = mouseX - (tpWd + offX) + "px";
	else tipcss.left = mouseX + offX + "px";
	if ((mouseY + offY + tpHt) > winHt) 
		tipcss.top = winHt - (tpHt + offY) + "px";
	else tipcss.top = mouseY + offY + "px";
	if (!tipFollowMouse) t1 = setTimeout("tipcss.visibility='visible'", 100);
}

function hideTip() {
	if (!tooltip) return;
	t2 = setTimeout("tipcss.visibility='hidden'", 100);
	tipOn = false;
}

//-->
