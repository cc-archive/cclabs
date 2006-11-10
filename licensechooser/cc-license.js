// <![CDATA[
	var by;
	var nc;
	var nd;
	var sa;
	var was;
    var using;
    var jurisdiction;
    var jurisdiction_name = '';
    var format;
	
    var license_root_url = 'http://creativecommons.org/licenses';
    var license_version  = '2.5';

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

        // document.write( $("using") );
        $("using").checked = true; //  = "using_webpage";

		no_share();
		
		was = false;
        
        testSub();
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

        if (obj.id == "using")
        {
            using = obj.value;
            if ( 'myspace' == using )
                $('myspace_style').style.display = 'block';
            else
                $('myspace_style').style.display = 'none';
        }

        if (obj.id == "jurisdiction")
        {
            // document.write( obj.value );
            jurisdiction = obj.value;
            // TODO: The following is not working in internet explorer on wine
            jurisdiction_name = jurisdictions_array[jurisdiction]['name'];
        }

        if (obj.id == "format")
        {
            format = obj.value;
            // document.write( format);
        }

        testSub();
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
		
		meta = '<rdf:RDF xmlns="http://web.resource.org/cc/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"><Work rdf:about=""><license rdf:resource="http://creativecommons.org/licenses/'+l+'/'+ver+'/" />';

        if ( format )
            meta += '<dc:type rdf:resource="http://purl.org/dc/dcmitype/' + format + '" />';

        meta += '</Work><License rdf:about="http://creativecommons.org/licenses/'+l+'/'+ver+'/">';
		
		
		meta += '<requires rdf:resource="http://web.resource.org/cc/Attribution" />';
		meta += '<permits rdf:resource="http://web.resource.org/cc/Reproduction" />';
		meta += '<permits rdf:resource="http://web.resource.org/cc/Distribution" />';
		
		if (!nd) meta += '<permits rdf:resource="http://web.resource.org/cc/DerivativeWorks" />';
		 	    
		if (sa) meta += '<requires rdf:resource="http://web.resource.org/cc/ShareAlike" />';
		if (nc) meta += '<prohibits rdf:resource="http://web.resource.org/cc/CommercialUse" />';
		
		meta += '<requires rdf:resource="http://web.resource.org/cc/Notice" />';
		
		meta += '</License></rdf:RDF>';
		return meta;
	}

    function comment_out (str)
    {
        return ("<!-- " + str + "-->");
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

    function build_license_url (license)
    {
        var license_url = license_root_url + "/" + license + "/" + 
                          license_version + "/" ;
        if ( jurisdiction )
            license_url += jurisdiction + "/" ;

        return( license_url );
    }

    function build_license_text (license_url, license_name)
    {
        var license_text = '';
        if ( jurisdiction_name )
            license_text = 'This work is licensed under a <a rel="license" href="' + license_url + '">Creative Commons ' + license_name + ' ' + license_version + ' ' + jurisdiction_name + ' License</a>.';
        else if ( jurisdiction )
            license_text = 'This work is licensed under a <a rel="license" href="' + license_url + '">Creative Commons ' + license_name + ' ' + license_version + ' ' + jurisdiction.toUpperCase() + ' License</a>.';
        else 
            license_text = 'This work is licensed under a <a rel="license" href="' + license_url + '">Creative Commons ' + license_name + ' ' + license_version + ' License</a>.';
        return( license_text );
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

        license_url = build_license_url(license[0]);

        var license_text = build_license_text(license_url, license[1]);

		    cc = '<a rel="license" href="' + license_url + '"><img alt="Creative Commons License" border="0" src="http://creativecommons.org/images/public/somerights20.png" class="cc-button"/></a><div class="cc-info">' + license_text + '</div>';

		/* banner wrapper */
        if ( 'myspace' == using )
		    cc = '<style type="text/css">body { padding-bottom: 50px;} div.cc-bar { width:100%; height: 50px; ' + position() + ' bottom: 0px; left: 0px; background:url(http://mirrors.creativecommons.org/myspace/'+ style() +') repeat-x; } img.cc-button { float: left; border:0; margin: 5px 0 0 15px; } div.cc-info { float: right; margin: 1%; width: 300px; } </style> <div class="cc-bar">' + cc + comment_out( buildRDF() ) + '</div>';
        else
            cc += comment_out( buildRDF() ) + "</div>";

        cc = "<!--Creative Commons License-->" + cc;

		/* ** */
        // new Insertion.Top('license_example', cc);
        $('license_example').innerHTML = cc;
		
		$('result').value = cc;
        $('result').focus = true;
	}
// ]]>
