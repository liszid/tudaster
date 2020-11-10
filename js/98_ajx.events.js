const iAjaxEvnts = (iAjaxEvnts = Object) => class extends iAjaxEvnts
{
    constructor()
    {
        super();
        Object.defineProperty( this, 'enlargeModal',
        {
            get( )
            {
                return [
                    "Profile",
                    "Administrative/Users/Add",
                    "Administrative/Groups/Add",
                    "Administrative/Groups/Edit",
                    "Administrative/Membership/Edit"
                ];
            }
        } );
        Object.defineProperty( this, 'modalPagesForGet',
        {
            get( )
            {
                return ["Login", "Logout", "Profile"];
            }
        } );
        Object.defineProperty( this, 'modalDialogElement',
        {
            get( )
            {
                return document.getElementById("modalDialog");
            }
        } );
        Object.defineProperty( this, 'arrayObject',
        {
            get( )
            {
                return [
//              "id starts w/", "post", "event id", ["array of items needed to send"], "send into", "special id"
                    ["usrLogin", "x=Login&Login=", "button", ["nameUser", "pWord"], "modalDialog"],
                    ["usrEdit", "x=Profile&Save=", "button", ["nameFirst", "nameLast", "thumbnail", "contSite", "contPhone", "userId"], "modalDialog"],
                    ["usrEdit", "x=Profile", "cancel", [], "modalDialog"],
                    ["admUsrsAdd", "x=Administrative&y=Users&z=Add&Save=", "button", ["nameUser","contEmail"], "modalDialog"],
                    ["admGrpsAdd", "x=Administrative&y=Groups&z=Add&Save=", "button", ["groupName","groupDesc"], "modalDialog"],
                    ["admGrpsEdit", "x=Administrative&y=Groups&z=Edit&Save=", "button", ["mngGroups","mngUsers","mngMembers","mngTools","canUsers","canCompany","canKnowledge","canUsername","canPassword","canHardware","canSoftware","canEdit","canLogin","groupId"], "modalDialog"],
                    ["admMemsEdit", "x=Administrative&y=Membership&z=Edit&Save=", "button", ["groupMemberId","groupId"], "modalDialog"]
                ];
            }
        } );
        Object.defineProperty( this, 'tableSearching',
        {
            get( )
            {
                return["tableAdminUsers", "tableAdminMembership", "tableHomeUsers"];
            }
        });
    }

/*
 * Sets DataTables
 * @author Liszi Dániel
 * @since 2020.11.10
 */
    evntDataTable()
    {
        let _self = this;
        if ($('table').length !== 0) {
            $('table').each(
                function()
                {
                    if(! $.fn.dataTable.isDataTable( 'table' )) {
                        $('[data-toggle="tooltip"]').tooltip();

                        if($(this).attr('id') === 'bkMarks') {
                            $( this ).DataTable();
                        } else if($.inArray($(this).attr('id'), _self.tableSearching ) >= 0) {
                            $('#'+$(this).attr('id')+' thead tr:eq(0) th').each( function (i)
                            {
                                var title = $(this).text();
                                $(this).html( '<center><input type="text" placeholder="'+title+'" /></center>' );
                                $( 'input', this).attr('size', $( 'input', this).attr('placeholder').length);
                                $( 'input', this ).on( 'keyup change', function ()
                                {
                                    if ( table.column(i).search() !== this.value ) {
                                        table
                                        .column(i)
                                        .search( this.value )
                                        .draw();
                                    }
                                } );
                            } );
                            var table = $(this).DataTable(
                            {
                                "columnDefs":[{"targets": 'no-sort', "orderable": false, "visible": true}],
                                "fixedHeader": true,
                                "order": [],
                                "language": {
                                    "url": "plug-ins/datatable.lang.hungarian.json"
                                }
                            } );
                        } else {
                            $( this ).DataTable(
                            {
                                "order": [[ 0, "asc" ]],
                                "paging": false,
                                "searching": false,
                                "language": {
                                    "url": "plug-ins/datatable.lang.hungarian.json"
                                }
                            });
                        }
                    }
                }
            );
        }
    }

/*
 * Finds the original element recursively
 * @param srcTag object
 * @param srcTagName string
 * @return on success object, on fail false
 * @author Liszi Dániel
 * @since 2020.11.10
 */
    findSource(srcTag, srcTagName)
    {
        if (srcTag.tagName.toLowerCase() !== 'body') {
            if (srcTag.tagName.toLowerCase() === srcTagName) {
                return srcTag;
            } else {
                return this.findSource(srcTag.parentElement, srcTagName);
            }
        } else {
            return false;
        }
    }

/*
 * Sets A::HREF events on all A tags
 * @param srcTag object
 * @author Liszi Dániel
 * @since 2020.11.10
 */
    evntHrefs(srcTag = this.tagA)
    {
        let _self = this;
        if (srcTag.length > 0) {
            var addEvent = (e) =>
            {
                let tempSrcLmnt = _self.findSource(e.target, 'a');
                let srcLmnt = (tempSrcLmnt !== undefined)?((tempSrcLmnt !== false)? tempSrcLmnt: null):null;
                let loc = (srcLmnt !== null && srcLmnt.getAttribute('data-link') !== null) ? srcLmnt.getAttribute('data-link') : null;
                if (loc !== null && srcLmnt !== null) {
                    e.preventDefault();
                    _self.enlargenModal(loc);
                    let tempLocation = loc.split("/");
                    let dataPost = (srcLmnt.getAttribute('data-post') !== null)? srcLmnt.getAttribute('data-post'):'';
/*
 * Bootstrap Navbar collapse on mobile view
 *
                    $('a').on('click', function()
                    {
                        $('.navbar-collapse').collapse('hide');
                    });
 */
                    if (tempLocation.length > 1) {
                        let canonicLocation = 'x=' + tempLocation[0] + '&y=' + tempLocation[1] + ((tempLocation[2] !== undefined)? '&z=' + tempLocation[2] : '');
                        if (dataPost !== '') {
                            _self.initElmnt(canonicLocation + '&dp=' + dataPost, "modalDialog");
                        } else {
                            _self.initElmnt(canonicLocation);
                        }
                        history.pushState( loc,'', '/' + loc);
                    } else {
                        if(srcLmnt.hasAttribute('data-target')) {
                            if (dataPost !== '') {
                                _self.initElmnt('x=' + loc + '&dp='+ dataPost, 'modalDialog');
                            } else {
                                _self.initElmnt('x=' + loc, 'modalDialog');
                            }

                        } else {
                            _self.initElmnt('x=' + loc);
                            history.pushState( loc,'', '/' + loc);
                        }
                    }
                }
            };
            for(var hrefIndex in srcTag) {
                if(isFinite(hrefIndex)) {
                    srcTag[hrefIndex].addEventListener('click', addEvent);
                }
            }
        }
    }

/*
 * Sets events on Form elements
 * @param tag object
 * @author Liszi Dániel
 * @since 2020.11.10
 */
    evntForm (tag)
    {
        let _self = this;
        if (tag.length > 0) {
            var addEvent = (e) =>
            {
                let lmnt = (
                    (e.target.tagName.toLowerCase() === 'button')
                        ? e.target
                        :(
                            (e.target.parentElement.tagName.toLowerCase() === 'button')
                                ? e.target.parentElement
                                :(
                                    (e.target.tagName.toLowerCase() === 'input')
                                        ?e.target
                                        :(
                                            (e.target.parentElement.tagName.toLowerCase() === 'input')
                                                ?e.target.parentElement
                                                : null
                                        )
                                )
                        )
                );
                e.preventDefault();
                if (lmnt.hasAttribute('id')) {
                    for (let i = 0; i < _self.arrayObject.length; i++) {
                        if (lmnt.getAttribute('id').startsWith(_self.arrayObject[i][0]+"-"+_self.arrayObject[i][2])) {
                            let returnString = _self.arrayObject[i][1];
                            _self.enlargenModal(((returnString.split("&"))[0].split("="))[1]);
                            if (_self.arrayObject[i][3].length > 0) {
                                for (let k = 0; k < _self.arrayObject[i][3].length; k++) {
                                    if (! _self.arrayObject[i][3][k].includes("pWord")) {
                                        if (! Array.isArray(_self.arrayObject[i][3][k])) {
                                            returnString = returnString.concat("&" + _self.arrayObject[i][3][k] + "=" + document.getElementById(_self.arrayObject[i][0] + "-" + _self.arrayObject[i][3][k]).value);
                                        } else {
                                            let innerArray = document.querySelectorAll('[id^="'+ _self.arrayObject[i][0] + "-" + _self.arrayObject[i][3][k][0]+'"]');
                                            returnString = returnString.concat("&" + _self.arrayObject[i][3][k] + "=");
                                            for (let l = 0; l < innerArray.length; l++) {
                                                if (innerArray[l].checked) {
                                                    returnString = returnString.concat( innerArray[l].value + ",");
                                                }
                                            }
                                        }
                                    } else {
                                        returnString = returnString.concat("&" + _self.arrayObject[i][3][k] + "=" + _self.MD5(document.getElementById(_self.arrayObject[i][0] + "-" + _self.arrayObject[i][3][k]).value));
                                    }
                                }
                            } else if (lmnt.hasAttribute('data-id')) {
                                if (_self.arrayObject[i][5]) {
                                    returnString = returnString.concat("&" + _self.arrayObject[i][5] + "=" + lmnt.getAttribute('data-id'));
                                }
                            } if (_self.arrayObject[i][4]) {
                                _self.initElmnt(returnString, _self.arrayObject[i][4]);
                            } else {
                                _self.initElmnt(returnString);
                            }
                        }
                    }
                }
            };
            for (var hrefIndex in tag) {
                if(isFinite(hrefIndex)) {
                    switch(tag[hrefIndex].tagName.toLowerCase()) {
                        case 'button':
                            tag[hrefIndex].addEventListener('click', addEvent);
                            break;
                        case 'input':
                            tag[hrefIndex].addEventListener('keyup', addEvent);
                            break;
                    }
                }
            }
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
        let param = "";

        if (param !== "") {
            if(urlParams.has("p") === true && this.modalPagesForGet.includes(urlParams.get("p"))) {
                this.enlargenModal(urlParams.get("p"));
                this.initElmnt("a=Home");
                this.initElmnt("a="+urlParams.get("p"), "modalDialog");
            } else {
                this.initElmnt(param,"body","GET");
            }
        } else {
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
    }

/*
 * Enlarges specific modals
 * @param lmnt string
 * @author Liszi Dániel
 * @since 2020.11.10
 */
    enlargenModal(lmnt)
    {
        if (this.enlargeModal.indexOf(lmnt) > -1 && ( ! this.checkTag("errormessage") && ! this.checkTag("modalmessage"))) {
            if(! this.modalDialogElement.classList.contains("modal-lg")) {
                this.modalDialogElement.classList.add("modal-lg");
            }
        } else {
            if (this.modalDialogElement.classList.contains("modal-lg")) {
                this.modalDialogElement.classList.remove("modal-lg");
            }
        }
    }

/*
 * Checks if element by tagname exists
 * @param tagname string
 * @return bool
 * @author Liszi Dániel
 * @since 2020.11.10
 */
    checkTag(tagname)
    {
        return (!document.getElementsByTagName(tagname))? true : false;
    }
};
