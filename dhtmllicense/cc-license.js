// <![CDATA[
	var by;
	var nc;
	var nd;
	var sa;
	var was;
    var jurisdiction_name       = '';
    var jurisdiction_generic    = false;
    var jurisdiction_version    = '';
	
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
        } else if ( obj.id == 'using_webpage' ) 
        {
            $('myspace_style').style.display = 'none';
            $('myspace_position').style.display = 'none';
        } 
        
        // TODO: The following is not working in internet explorer on wine

        // THIS fixes the generic being the default selection...
        var current_jurisdiction = '';
        
        if ( $F('jurisdiction') )
            current_jurisdiction = $F('jurisdiction');
        else
            current_jurisdiction = 'generic';


        jurisdiction_name = jurisdictions_array[current_jurisdiction]['name'];
        jurisdiction_generic = 
            jurisdictions_array[current_jurisdiction]['generic'];
        jurisdiction_version = 
            jurisdictions_array[current_jurisdiction]['version'];
        if ( ! jurisdiction_version )
            jurisdiction_version = license_version;

        if ( $F('pos_float') == 'floating' && $F('using_myspace') )
            warning_text = 
                '<p class="alert">Check the bottom of your browser.</p>';

        update();
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
                          jurisdiction_version + "/" ;
        if ( $F('jurisdiction') && ! jurisdiction_generic )
            license_url += $F('jurisdiction') + "/" ;

        return( license_url );
    }

    /**
     * Builds the nicely formatted attribution of a work
     */
    function build_license_text (license_url, license_name)
    {
        // document.write(jurisdiction_name);
        var license_text = '';


        var work_title = '';
        var work_by    = '';

        if ( $F('info_title') )
            work_title = '<span id="work_title" property="dc:title">' + $F('info_title') +
                         '</span>';
        else
            work_title = 'This work';

        if ( $F('info_attribute_to_name') && $F('info_attribute_to_url') )
            work_by = '<a rel="cc:attributionURL" property="cc:attributionName" href="' + $F('info_attribute_to_url') + '">' + $F('info_attribute_to_name') + '</a>' ;
        else if ( $F('info_attribute_to_name') )
            work_by = '<span property="cc:attributionName">' + 
            $F('info_attribute_to_name') + 
            '</span>';

        if ( work_by )
            work_by = ' by ' + work_by;

        if ( $F('info_source_work_url') )
            license_text += '<span rel="dc:source" href="' + 
                $F('info_source_work_url') + '"/>';

        if ( $F('info_more_permissions_url') )
            license_text += 
                'Permissions beyond the scope of this license may be available at <a rel="cc:morePermissions" href="' + $F('info_more_permissions_url') + 
                '">' + $F('info_more_permissions_url') + '</a>.' + "\n";

        if ( jurisdiction_name && ! jurisdiction_generic )
            license_text = work_title + work_by + ' is licensed under a <a rel="license" href="' + license_url + '">Creative Commons ' + license_name + ' ' + jurisdiction_version + ' ' + ( jurisdiction_name ? jurisdiction_name : $F('jurisdiction').toUpperCase() ) + ' License</a>.' + ' ' + license_text;
        else 
            license_text = work_title + work_by + ' is licensed under a <a rel="license" href="' + license_url + '">Creative Commons ' + license_name + ' ' + jurisdiction_version + ' License</a>.' + ' ' + license_text;

        return( license_text );
    }
	
    function build_license_image (license)
    {
            return 'http://i.creativecommons.org/l/' + license + "/" + jurisdiction_version + "/" + ( jurisdiction_generic  ? '' : $F('jurisdiction') + "/" ) + '88x31.png';
    }

	/**
	 * Checks what options the user has set and spits out license code based on the values
     * There are several global variables which need to be set to get this
     * update to work right.
	 */
	function update() {
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
