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
		
        if ( $("mod") && $("com") ) {
		    $("mod").checked = true;
		    $("com").checked = true;
        }

		// no_share();
        if ( $("share") ) {
            $("share").disabled = false;
            share_label_orig_class = $('share-label').className;
            share_label_orig_color = $('share-label').style.color;
        }
		
		was = false;
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

        if ( $F('pos_float') && $F('using_myspace') && 
             $F('pos_float') == 'floating' )
            warning_text = 
                '<p class="alert">Check the bottom of your browser.</p>';

        update();
	}

    function build_jurisdictions ()
    {
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
     * Builds an array of our license options from global variables...scary!
     */
	function get_license_array () 
    {
        var license_array = Array;
        /* 
        license_array['code']     = '';
        license_array['version']  = '';
        license_array['full_name']     = ''; // 'name' is reserved
        license_array['text']     = '';
        */

        build_jurisdictions();

        /* BY */
		if ((!nd) && (!nc) && (!sa)) {
		    license_array['code'] = "by"; 
            license_array['full_name'] = "Attribution"; 
        }
		
        /* BY-SA */
		else if ((!nd) && (!nc) && ( sa)) {
		    license_array['code'] = "by-sa"; 
            license_array['full_name'] = "Attribution-ShareAlike";
        }
		
        /* BY-ND */
		else if (( nd) && (!nc) && (!sa)) {
		    license_array['code'] = "by-nd"; 
            license_array['full_name'] = "Attribution-NoDerivatives"; 
        }
		
        /* BY-NC */
		else if ((!nd) && ( nc) && (!sa)) {
		    license_array['code'] = "by-nc"; 
            license_array['full_name'] = "Attribution-NonCommercial";
        }
		
        /* BY-NC-SA */
		else if ((!nd) && ( nc) && ( sa)) {
	        license_array['code'] = "by-nc-sa"; 
            license_array['full_name'] = "Attribution-NonCommercial-ShareAlike"; 
        }
		
        /* BY-NC-ND */
		else if (( nd) && ( nc) && (!sa)) {
		    license_array['code'] = "by-nc-nd"; 
            license_array['full_name'] = "Attribution-NonCommercial-NoDerivatives"; 
        }


        return license_array;
    }

    /**
     * This inserts html into an html element with the given insertion_id. 
     */
    function insert_html (output, insertion_id)
    {
        $(insertion_id).innerHTML = output;
        return true;
    }

    /**
     * This builds our custom html license code using various refactored 
     * functions for handling all the nastiness...
     */
    function build_license_html ()
    {
        var license_array = get_license_array();
        var license_url  = build_license_url(license_array['code']);
        var license_text = build_license_text(license_url, 
                                              license_array['full_name']);

        // warning_text is a global variable.
		var output = '<a rel="license" href="' + license_url + '"><img alt="Creative Commons License" border="0" src="' + build_license_image(license_array['code']) + '" class="cc-button"/></a><div class="cc-info">' + license_text + '</div>';

        if ( $F('using_myspace') )
        {
		    output = '<style type="text/css">body { padding-bottom: 50px;} div.cc-bar { width:100%; height: 40px; ' + position() + ' bottom: 0px; left: 0px; background:url(http://mirrors.creativecommons.org/myspace/'+ style() +') repeat-x; } img.cc-button { float: left; border:0; margin: 5px 0 0 15px; } div.cc-info { float: right; padding: 0.3%; width: 400px; margin: auto; vertical-align: middle; font-size: 90%;} </style> <div class="cc-bar">' + output + '</div>';
        }
        insert_html( warning_text + output, 'license_example');
        return output;
	}

	/**
	 * Checks what options the user has set and spits out license code based on the values
     * There are several global variables which need to be set to get this
     * update to work right.
	 */
    function update ()
    {
        // our insert_html function also does some modifications on 
        var output = build_license_html();
        if ( $('result') )
		    $('result').value = "<!--Creative Commons License-->\n" + output;
    }

// ]]>
