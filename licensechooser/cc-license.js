// <![CDATA[
	var by;
	var nc;
	var nd;
	var sa;
	var was;
    var jurisdiction_name       = '';
    var jurisdiction_generic    = false;
	
    var license_root_url        = 'http://creativecommons.org/licenses';
    var license_version         = '2.5';

    var warning_text            = '';

    var share_label_orig_class  = '';
    var share_label_orig_color  = '';

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
        share_label_orig_class = $('share-label').className;
        share_label_orig_color = $('share-label').style.color;
		
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
	}
	
	/**
	 * Main logic
	 * Checks what the user pressed, sets licensing options based on it.
	 */
	function modify(obj) {
        warning_text = '';

		if (obj.id == "mod") {
			if (obj.checked) {
				$('share').disabled = false;
                $('share-label').className = share_label_orig_class;
                $('share-label').style.color = share_label_orig_color;
                
				if (was){
					 $('share').checked = true;
					 sa = true;
				}
				
				nd = false;
			} else {
                $('share-label').style.color = 'gray'
				
				/* remember if the user wanted to share */
				$('share').checked ? was = true : was = false;

				no_share();
			
				nd = true;
			}
		}
		
		if (obj.id == "com") {
			obj.checked ? nc = false : nc = true;
		}
		
		if (obj.id == "share") {
			obj.checked ? sa = true : sa = false;
		}

        if (obj.id == "using_myspace")
        {
            $('myspace_style').style.display = 'block';
            $('myspace_position').style.display = 'block';
            // $('more_info_toggle').style.display = 'none';
            // $('more_info').style.display = 'none';
        } else if ( obj.id == 'using_webpage' ) 
        {
            $('myspace_style').style.display = 'none';
            $('myspace_position').style.display = 'none';
            // $('more_info_toggle').style.display = 'none';
            // $('more_info').style.display = 'none';
        } /* else if ( obj.id == 'using_rdf' ) 
        {
            $('more_info_toggle').style.display = 'block';
            $('myspace_style').style.display = 'none';
            $('myspace_position').style.display = 'none';
        } */

            // document.write( obj.value );
        // TODO: The following is not working in internet explorer on wine
        jurisdiction_name = jurisdictions_array[$F('jurisdiction')]['name'];
        jurisdiction_generic = 
            jurisdictions_array[$F('jurisdiction')]['generic'];

        if ( $F('pos_float') == 'floating' && $F('using_myspace') )
            warning_text = 
                '<p class="alert">Check the bottom of your browser.</p>';

        /* if ( $F('using_rdf') )
            warning_text = 
                '<p class="alert">RDF does not provide the graphical license. It is shown here as a visual example of the license selected.</p>';
        */
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

        if ( $F('info_title') )
            meta += '<dc:title>' + $F('info_title') + '</dc:title>' + "\n";

        if ( $F('info_copyright_year') )
            meta += '<dc:date>' + $F('info_copyright_year') + '</dc:date>' + 
                    "\n";

        if ( $F('info_description') )
            meta += '<dc:description>' + $F('info_description') + 
                    '</dc:description>' + "\n";

        if ( $F('info_creators_name') )
            meta += '<dc:creator><Agent><dc:title>' + $F('info_creators_name') 
                    + '</dc:title></Agent></dc:creator>' + "\n";

        if ( $F('info_copyright_holders_name') )
            meta += '<dc:rights><Agent><dc:title>' + 
                    $F('info_copyright_holders_name')
                    + '</dc:title></Agent></dc:rights>' + "\n";

        if ( $F('info_source_work_url') )
            meta += '<dc:source rdf:resource="' + $F('info_source_work_url') + 
                    '">' + "\n";

        if ( $F('info_format') )
            meta += '<dc:type rdf:resource="http://purl.org/dc/dcmitype/' + 
                    $F('info_format') + '" />';

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
        if ( $F('jurisdiction') && ! jurisdiction_generic )
            license_url += $F('jurisdiction') + "/" ;

        return( license_url );
    }

    function build_license_text (license_url, license_name)
    {
        // document.write(jurisdiction_name);
        var license_text = '';
        if ( jurisdiction_name && ! jurisdiction_generic )
            license_text = 'This work is licensed under a <a rel="license" href="' + license_url + '">Creative Commons ' + license_name + ' ' + license_version + ' ' + ( jurisdiction_name ? jurisdiction_name : $F('jurisdiction').toUpperCase() ) + ' License</a>.';
        else 
            license_text = 'This work is licensed under a <a rel="license" href="' + license_url + '">Creative Commons ' + license_name + ' ' + license_version + ' License</a>.';
        return( license_text );
    }
	
    function build_license_image (license)
    {
        if ( $F('button_style_version3') )
            return 'http://i.creativecommons.org/l/' + license + "/" + license_version + "/" + $F('jurisdiction') + "/" + '88x31.png';
        else
            return 'http://creativecommons.org/images/public/somerights20.png';
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
        
		cc = '<a rel="license" href="' + license_url + '"><img alt="Creative Commons License" border="0" src="' + build_license_image(license[0]) + '" class="cc-button"/></a><div class="cc-info">' + license_text + '</div>';

        if ( $F('using_webpage') )
        {
            $('license_example').innerHTML = warning_text + cc;
        }
        else if ( $F('using_myspace') )
        {
		    cc = '<style type="text/css">body { padding-bottom: 50px;} div.cc-bar { width:100%; height: 40px; ' + position() + ' bottom: 0px; left: 0px; background:url(http://mirrors.creativecommons.org/myspace/'+ style() +') repeat-x; } img.cc-button { float: left; border:0; margin: 5px 0 0 15px; } div.cc-info { float: right; padding: 0.3%; width: 400px; margin: auto; vertical-align: middle; font-size: 90%;} </style> <div class="cc-bar">' + cc + '</div>';
            $('license_example').innerHTML = warning_text + cc;
        }
        else if ( $F('using_rdf') )
        {
            $('license_example').innerHTML = warning_text + cc;
            cc = buildRDF();
        }
		
		$('result').value = "<!--Creative Commons License-->\n" + cc;
	}
// ]]>
