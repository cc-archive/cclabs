// <![CDATA[
	var by;
	var nc;
	var nd;
	var sa;
	var was;
	
	/**
	 * Initialise our license codes, and reset the UI
	 */
	function init() {
		/* default: by-nd-nc */
		by = true;
		nc = true;
		nd = true;
		sa = false;
		
		$("mod").checked = false;
		$("com").checked = false;
		
		no_share();
		
		was = false;
	}
	
	/**
	 * Disable everything related to ShareAlike
	 */
	function no_share() {
		sa = false;
		$("share").disabled = true;
		$("share").checked = false;
		$('share-label').className = "inactive";
		
		Element.hide('sa');
	}
	
	/**
	 * Main logic
	 * Checks what the user pressed, sets licensing options based on it.
	 */
	function modify(obj) {
		if (obj.id == "mod") {
			if (obj.checked) {
				$('share').disabled = false;
				$('share-label').className = "";
				if (was){
					 $('share').checked = true;
					 sa = true;
					 Element.show('sa');
				}
				
				nd = false;
				Element.toggle('nd');
			} else {
				
				/* remember if the user wanted to share */
				$('share').checked ? was = true : was = false;

				no_share();
			
				nd = true;
				Element.toggle('nd');
			}
		}
		
		if (obj.id == "com") {
			Element.toggle('nc');
			obj.checked ? nc = false : nc = true;
		}
		
		if (obj.id == "share") {
			Element.toggle('sa');
			obj.checked ? sa = true : sa = false;
		}
	}
	
	/**
	 * Generates the license RDF code based on selected options
	 */
	function buildRDF() {
		var meta, l, ver;
		
		/* FIXME: This block can be improved */
		if ((!nd) && (!nc) && (!sa))
		/* by */       l = 'by';
		
		if ((!nd) && (!nc) && ( sa))
		/* by-sa */    l = 'by-sa';
		
		if (( nd) && (!nc) && (!sa))
		/* by-nd */    l = 'by-nd';
		
		if ((!nd) && ( nc) && (!sa))
		/* by-nc */    l = 'by-nc';
		
		if ((!nd) && ( nc) && ( sa))
		/* by-nc-sa */ l = 'by-nc-sa';
		
		if (( nd) && ( nc) && (!sa))
		/* by-nc-nd */ l = 'by-nc-nd';
		
		ver = "2.5";
		
		meta = ' <rdf:RDF xmlns="http://web.resource.org/cc/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"><Work rdf:about=""><license rdf:resource="http://creativecommons.org/licenses/'+l+'/'+ver+'/" /></Work><License rdf:about="http://creativecommons.org/licenses/'+l+'/'+ver+'/">';
		
		
		meta += '<requires rdf:resource="http://web.resource.org/cc/Attribution" />';
		meta += '<permits rdf:resource="http://web.resource.org/cc/Reproduction" />';
		meta += '<permits rdf:resource="http://web.resource.org/cc/Distribution" />';
		
		if (!nd) meta += '<permits rdf:resource="http://web.resource.org/cc/DerivativeWorks" />';
		 	    
		if (sa) meta += '<requires rdf:resource="http://web.resource.org/cc/ShareAlike" />';
		if (nc) meta += '<prohibits rdf:resource="http://web.resource.org/cc/CommercialUse" />';
		
		meta += '<requires rdf:resource="http://web.resource.org/cc/Notice" />';
		
		meta += '</License></rdf:RDF> ';
		return meta;
		
	}
	
	
	/**
	 * Retreive the selected style option
	 */
	function style() {
		var styles = document.getElementsByName('style');
	
		for (i = 0; i < styles.length; i++) {
			if (styles[i].checked) {
				return styles[i].value + ".png";
			}
		}
		
		/* we shouldn't reach here... */
		return "error";
	}
	
	function position() {
		var pos = document.getElementsByName('pos');
		
		for (i = 0; i < pos.length; i++) {
			if ((pos[i].value == "floating") && (pos[i].checked)) return "position: fixed;";
		}
		return "margin-top:20px;";
	}
	
	/**
	 * Checks what options the user has set and spits out license code based on the values
	 */
	function testSub() {
		var cc;
		
		var license = Array;
		
		if ((!nd) && (!nc) && (!sa)) {
		/* by */      license[0] = "by"; license[1] = "Attribution"; }
		
		if ((!nd) && (!nc) && ( sa)) {
		/* by-sa */   license[0] = "by-sa"; license[1] = "Attribution-ShareAlike"; }
		
		if (( nd) && (!nc) && (!sa)) {
		/* by-nd */    license[0] = "by-nd"; license[1] = "Attribution-NoDerivatives"; }
		
		if ((!nd) && ( nc) && (!sa)) {
		/* by-nc */    license[0] = "by-nc"; license[1] = "Attribution-NonCommercial"; }
		
		if ((!nd) && ( nc) && ( sa)) {
		/* by-nc-sa */ license[0] = "by-nc-sa"; license[1] = "Attribution-NonCommercial-ShareAlike"; }
		
		if (( nd) && ( nc) && (!sa)) {
		/* by-nc-nd */ license[0] = "by-nc-nd"; license[1] = "Attribution-NonCommercial-NoDerivatives"; }
		
		
		cc = '<div class="cc-info">This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/' + license[0] + '/2.5/">Creative Commons ' + license[1] + ' 2.5 License</a>.</div><a rel="license" href="http://creativecommons.org/licenses/' + license[0] + '/2.5/"><img alt="Creative Commons License" border="0" src="http://creativecommons.org/images/public/somerights20.png" class="cc-button"/></a> ';

		/* banner wrapper */
		cc = '<style type="text/css">body { padding-bottom: 50px;} div.cc-bar { width:100%; height: 40px; ' + position() + ' bottom: 0px; left: 0px; background:url(http://mirrors.creativecommons.org/myspace/'+ style() +') repeat-x; } img.cc-button { border:0; margin: 5px 0 0 15px; } div.cc-info { float: right; margin: 10px 15px 0 0; width: 275px; } </style> <div class="cc-bar">' + cc + buildRDF() + '</div>';
		
		
		/* ** */
		
		$('result').value = cc;
	}
// ]]>
