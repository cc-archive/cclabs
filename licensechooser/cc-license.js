// <![CDATA[
	var by;
	var nc;
	var nd;
	var sa;
	var was;
    var using;
    var jurisdiction            = '';
    var jurisdiction_name       = '';
    var jurisdiction_generic    = false;
    var dc_title                = '';
    var dc_format               = '';
    var dc_description          = '';
    var dc_source               = '';
    var dc_creator              = '';
    var dc_copyright_holder     = '';
    var dc_date                 = '';
	
    var license_root_url        = 'http://creativecommons.org/licenses';
    var license_version         = '2.5';

    var warning_text            = '';

	/**
	 * Initialise our license codes, and reset the UI
	 */
	function init() {
		/* default: by */
		by = true;
		nc = false;
		nd = false;
		sa = false;
		
		$("mod").checked = true;
		$("com").checked = true;

		// no_share();
        $("share").disabled = false;
		
		was = false;
        
        // sets everything
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
            switch ( using )
            {
                case 'myspace':
                    $('myspace_style').style.display = 'block';
                    $('myspace_position').style.display = 'block';
                    $('more_info_toggle').style.display = 'none';
                    break;

                case 'webpage':
                    $('myspace_style').style.display = 'none';
                    $('more_info_toggle').style.display = 'none';
                    break;

                case 'rdf':
                    $('more_info_toggle').style.display = 'block';
                default:
                    $('myspace_style').style.display = 'none';
                    $('myspace_position').style.display = 'none';
                    warning_text = '';
            }
        }

        if (obj.id == "jurisdiction")
        {
            // document.write( obj.value );
            jurisdiction = obj.value;
            // TODO: The following is not working in internet explorer on wine
            jurisdiction_name = jurisdictions_array[jurisdiction]['name'];
            jurisdiction_generic = jurisdictions_array[jurisdiction]['generic'];
        }


        if (obj.id == 'pos_float')
        {
        /*     if ( obj.value == 'floating' ) */
                warning_text = 
                    '<p class="alert">Check the bottom of your browser.</p>';
        }

        if (obj.id == 'pos_profile')
        {
                warning_text = '';

        }

        if (obj.id == 'info_title')
            dc_title = obj.value;

        if (obj.id == 'info_description')
            dc_description = obj.value;
        
        if (obj.id == 'info_creators_name')
            dc_creator = obj.value;

        if (obj.id == 'info_copyright_holders_name')
            dc_copyright_holder = obj.value;
        
        if (obj.id == 'info_source_work_url')
            dc_source = obj.value;
        
        if (obj.id  == 'info_copyright_year')
            dc_date = obj.value;

        if (obj.id == 'format')
            dc_format = obj.value;

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
		
		meta = '<rdf:RDF xmlns="http://web.resource.org/cc/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">' + "\n" + 
        '<Work rdf:about=""><license rdf:resource="http://creativecommons.org/licenses/'+l+'/'+ver+'/" />';

        if ( dc_title )
            meta += '<dc:title>' + dc_title + '</dc:title>' + "\n";

        if ( dc_date )
            meta += '<dc:date>' + dc_date + '</dc:date>' + "\n";

        if ( dc_description )
            meta += '<dc:description>' + dc_description + '</dc:description>' 
                    + "\n";

        if ( dc_creator )
            meta += '<dc:creator><Agent><dc:title>' + dc_creator + 
                    '</dc:title></Agent></dc:creator>' + "\n";

        if ( dc_copyright_holder )
            meta += '<dc:rights><Agent><dc:title>' + dc_copyright_holder + 
                    '</dc:title></Agent></dc:rights>' + "\n";

        if ( dc_source )
            meta += '<dc:source rdf:resource="' + dc_source + '">' + "\n";

        if ( dc_format )
            meta += '<dc:type rdf:resource="http://purl.org/dc/dcmitype/' + dc_format + '" />';

        meta += '</Work>' + "\n" + '<License rdf:about="http://creativecommons.org/licenses/'+l+'/'+ver+'/">' + "\n";
		
		
		meta += '<requires rdf:resource="http://web.resource.org/cc/Attribution" />' + "\n";
		meta += '<permits rdf:resource="http://web.resource.org/cc/Reproduction" />' + "\n";
		meta += '<permits rdf:resource="http://web.resource.org/cc/Distribution" />' + "\n";
		
		if (!nd) meta += '<permits rdf:resource="http://web.resource.org/cc/DerivativeWorks" />' + "\n";
		 	    
		if (sa) meta += '<requires rdf:resource="http://web.resource.org/cc/ShareAlike" />' + "\n";
		if (nc) meta += '<prohibits rdf:resource="http://web.resource.org/cc/CommercialUse" />' + "\n";
		
		meta += '<requires rdf:resource="http://web.resource.org/cc/Notice" />'
                + "\n";
		
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
        if ( jurisdiction && ! jurisdiction_generic )
            license_url += jurisdiction + "/" ;

        return( license_url );
    }

    function build_license_text (license_url, license_name)
    {
        var license_text = '';
        if ( jurisdiction_name && ! jurisdiction_generic )
            license_text = 'This work is licensed under a <a rel="license" href="' + license_url + '">Creative Commons ' + license_name + ' ' + license_version + ' ' + ( jurisdiction_name ? jurisdiction_name : jurisdiction.toUpperCase() ) + ' License</a>.';
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
		    cc = '<style type="text/css">body { padding-bottom: 50px;} div.cc-bar { width:100%; height: 40px; ' + position() + ' bottom: 0px; left: 0px; background:url(http://mirrors.creativecommons.org/myspace/'+ style() +') repeat-x; } img.cc-button { float: left; border:0; margin: 5px 0 0 15px; } div.cc-info { float: right; padding: 0.3%; width: 400px; margin: auto; vertical-align: middle; font-size: 90%;} </style> <div class="cc-bar">' + cc + '</div>';
        else if ( 'rdf' == using )
            cc = buildRDF();
        else
            cc += "</div>";

        cc = "<!--Creative Commons License-->\n" + cc;

        // new Insertion.Top('license_example', cc);
        $('license_example').innerHTML = warning_text + cc;
		
		$('result').value = cc;
        $('result').focus = true;
	}
// ]]>
