const iAjax = (iAjax = Object) => class extends iAjax
{
    constructor()
    {
        super();
    }

/*
 * Sets the inner HTML of ajax call
 * @param xhttp object
 * @param id string
 * @author Liszi Dániel
 * @since 2020.11.10
 * @update 2020.11.23
 */
    setInnerHTML(xhttp, id = "body")
    {
        var temp, z = document.getElementById(id);
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            window.stringInnerContent = xhttp.responseText;
            document.getElementById(id).innerHTML = window.stringInnerContent;
            $('.navbar-collapse').collapse('hide');
	    this.evntCKEditor();
            this.evntDataTable();
            this.evntForm(z.getElementsByTagName('input'));
            this.evntForm(z.getElementsByTagName('button'));
            this.evntHrefs(z.getElementsByTagName('a'));
        }
        if (xhttp.status == 404) {
            xhttp.open("GET", window.errorSite, true);
            xhttp.send();
        }
    }

/*
 * Initiates Ajax query
 * @param param string
 * @param id string
 * @param type string
 * @return bool
 * @author Liszi Dániel
 * @since 2020.11.10
 * @update 2020.11.23
 */
    ajaxCall(param, id, type){
        var xhttp = new XMLHttpRequest(), _self = this;
        xhttp.onreadystatechange = function()
        {
             _self.setInnerHTML(this, id);
        };
        if ( type == "GET") {
            xhttp.open(type, _self.ajaxFile + "?" + param, true);
            xhttp.send();
        } else {
            xhttp.open(type, _self.ajaxFile, true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(param);
        }
        return false;
    }

/*
 * Ajax call goes through this
 * @param param string
 * @param id string
 * @param type string
 * @author Liszi Dániel
 * @since 2020.11.10
 */
    initElmnt(param = "x=Home", id = "body", type = "POST")
    {
        var _self = this;
        _self.ajaxCall(param, id, type);
//  Set modal to be shown
        if (id === 'modalDialog') {
            $('#modalBox').modal({ show: true});
        }
    }

/*
 * Loads content from either canonical or get format
 * @author Liszi Dániel
 * @since 2020.11.10
 */
    loadContent()
    {
        var urlParams = new URLSearchParams(window.location.search);

        var urlCanonical = window.location.pathname;
        urlCanonical = urlCanonical.split("/");
        urlCanonical.shift();

        if (urlCanonical[0] !== null && urlCanonical[0] !== "" && urlCanonical[0] !== undefined) {
            let canonical = "a="+urlCanonical[0];

            if(urlCanonical[1] !== null && urlCanonical[1] !== "" && urlCanonical[1] !== undefined) {
                canonical += "&b="+urlCanonical[1];
            }

            if(urlCanonical[2] !== null && urlCanonical[2] !== "" && urlCanonical[2] !== undefined) {
                canonical += "&c="+urlCanonical[2];
            }

            this.initElmnt(canonical);
        } else {
            this.initElmnt("d=Home");
        }
    }
};
