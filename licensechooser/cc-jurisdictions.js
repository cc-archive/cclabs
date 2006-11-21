// <![CDATA[
    var jurisdictions_array = {
               'generic' : { 'name' : _('Generic'),
                        'url'  : 'http://creativecommons.org',
                        'generic' : true },
               'ar' : { 'name' : _('Argentina'),
                        'url'  : 'http://creativecommons.org/worldwide/ar/'},
               'au' : { 'name' : _('Australia'),
                        'url'  : 'http://www.creativecommons.org.au' },
               'at' : { 'name' : _('Austria'),
                        'url'  : 'http://www.creativecommons.at'},
               'be' : { 'name' : _('Belgium'),
                        'url'  :'http://creativecommons.org/worldwide/be/'},
               'br' : { 'name' : _('Brazil'),
                        'url'  : 'http://creativecommons.org/worldwide/br/'},
               'bg' : { 'name' : _('Bulgaria'),
                        'url'  : 'http://creativecommons.org/worldwide/bg/'},
               'ca' : { 'name' : _('Canada'),
                        'url'  : 'http://creativecommons.ca'},
               'cl' : { 'name' : _('Chile'),
                        'url'  : 'http://creativecommons.cl'},
               'cn' : { 'name' : _('Mainland China'),
                        'url'  : 'http://cn.creativecommons.org'},
               'co' : { 'name' : _('Colombia'),
                        'url'  : 'http://creativecommons.org/worldwide/co/'},
               'hr' : { 'name' : _('Croatia'),
                        'url'  : 'http://creativecommons.org/worldwide/hr/'},
               'hu' : { 'name' : _('Hungary'),
                        'url'  :'http://creativecommons.org/worldwide/hu/'},
               'dk' : { 'name' : _('Denmark'),
                        'url'  : 'http://creativecommons.org/worldwide/dk/'},
               'fi' : { 'name' : _('Finland'),
                        'url'  : 'http://creativecommons.fi'},
               'fr' : { 'name' : _('France'),
                        'url'  : 'http://fr.creativecommons.org'},
               'de' : { 'name' : _('Germany'),
                        'url'  : 'http://de.creativecommons.org'},
               'il' : { 'name' : _('Israel'),
                        'url'  : 'http://creativecommons.org.il'},
               'it' : { 'name' : _('Italy'),
                        'url'  : 'http://www.creativecommons.it'},
               'jp' : { 'name' : _('Japan'),
                        'url'  : 'http://www.creativecommons.jp'},
               'kr' : { 'name' : _('Korea'),
                        'url'  : 'http://www.creativecommons.or.kr/'},
               'my' : { 'name' : _('Malaysia'),
                        'url'  : 'http://creativecommons.org/worldwide/my/'},
               'mt' : { 'name' : _('Malta'),
                        'url'  : 'http://creativecommons.org/worldwide/mt/'},
               'mx' : { 'name' : _('Mexico'),
                        'url'  : 'http://creativecommons.org.mx'},
               'nl' : { 'name' : _('Netherlands'),
                        'url'  : 'http://www.creativecommons.nl'},
               'pe' : { 'name' : _('Peru'),
                        'url'  : 'http://pe.creativecommons.org'},
               'pl' : { 'name' : _('Poland'),
                        'url'  : 'http://creativecommons.pl'},
               'si' : { 'name' : _('Slovenia'),
                        'url'  : 'http://creativecommons.si'},
               'za' : { 'name' : _('South Africa'),
                        'url'  : 'http://za.creativecommons.org'},
               'es' : { 'name' : _('Spain'),
                        'url'  : 'http://es.creativecommons.org/'},
               'se' : { 'name' : _('Sweden'),
                        'url'  : 'http://creativecommons.org/worldwide/se/'},
               'tw' : { 'name' : _('Taiwan'),
                        'url'  : 'http://www.creativecommons.org.tw'},
               'uk' : { 'name' : _('UK: England &amp; Wales'),
                        'url'  : 'http://www.creativecommons.org.uk'},
               'scotland' :
                      { 'name' : _('UK: Scotland'),
                        'url'  : 'http://www.creativecommons.org.uk'},
               };

    /**
     * A cheap hack for getting out javascript gettext.
     */
    function _ (str)
    {
        return str;
    }

    function print_jurisdictions ()
    {
        for (var j in jurisdictions_array)
            document.write(j);
    } 

    function print_jurisdictions_option ()
    {
        for (var j in jurisdictions_array)
           document.write("<option value=\"" + j + "\">" + 
                          jurisdictions_array[j]['name'] + "</option>\n");
    }
// ]]>
