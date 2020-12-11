const iAjaxEvnts = (iAjaxEvnts = Object) => class extends iAjaxEvnts
{
    constructor()
    {
        super();
    }

/*
 * Sets DataTables, jQuery used
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
                    if(! $.fn.dataTable.isDataTable( this )) {
                        $('[data-toggle="tooltip"]').tooltip();
                        if( $.inArray($(this).attr('id'), _self.tableSearching ) >= 0 ) {
                            $('#'+$(this).attr('id')+' thead tr:eq(0) th').each( function (i)
                            {
                                var title = $(this).text();
                                if(
                                    title !== ""
                                    && ! $(this).hasClass('never')
                                ) {
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
                                }
                            } );
                            var table = $( this ).DataTable(
                            {
                                "columnDefs":[{"targets": 'no-sort', "orderable": false}],
                                "columnDefs":[{"targets": 'never',"orderable": false, "order": [], "visible": false}],
                                "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "Mind"]],
                                "order": [[ 0, "asc" ]],
                                "fixedHeader": true,
                                "order": [],
                                "language": {
                                    "url": "plug-ins/datatable.lang.hungarian.json"
                                }
                            });
                        } else {
                            $( this ).DataTable(
                            {
                                "order": [[ 0, "asc" ]],
                                "columnDefs":[{"targets": 'no-sort', "orderable": false}],
                                "columnDefs":[{"targets": 'never',"orderable": false, "order": [], "visible": false}],
                                "lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "Mind"]],
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
                    if (tempLocation.length > 1) {
                        let canonicLocation = 'x=' + tempLocation[0] + '&y=' + tempLocation[1] + ((tempLocation[2] !== undefined)? '&z=' + tempLocation[2] : '');
                        if (dataPost !== '') {
                            if (
                                tempLocation[2] !== undefined
                                && _self.notModalActions.indexOf(loc) >= 0
                            ) {
                                _self.initElmnt(canonicLocation + '&dp=' + dataPost, "body");
                            } else {
                                _self.initElmnt(canonicLocation + '&dp=' + dataPost, "modalDialog");
                            }
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
 * Dynamic workaround
 * Only works with
 * - hidden
 * - text
 * - select
 * types of inputs
 *
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
                let tempSrcLmnt = _self.findSource(e.target, 'input');
                if (tempSrcLmnt === undefined || tempSrcLmnt === false) {
                    tempSrcLmnt = _self.findSource(e.target, 'button');
                }
                let srcLmnt = (tempSrcLmnt !== undefined)?((tempSrcLmnt !== false)? tempSrcLmnt: null):null;

                e.preventDefault();
                if (srcLmnt.hasAttribute('id')) {
                    for (let i = 0; i < _self.arrayObject.length; i++) {
                        if (srcLmnt.getAttribute('id').startsWith(_self.arrayObject[i][0]+"-"+_self.arrayObject[i][2])) {
                            let returnString = _self.arrayObject[i][1];
                            _self.enlargenModal(((returnString.split("&"))[0].split("="))[1]);
                            let innerArray = document.querySelectorAll('[id^="'+ _self.arrayObject[i][0] + '-"]');
                            if (innerArray.length > 0) {
                                for (let k = 0; k < innerArray.length; k++) {
                                    let innerArrayObjectName = (innerArray[k].id.split("-"))[1];
                                    if (! innerArrayObjectName.includes("pWord")) {
                                        returnString = returnString.concat("&" + innerArrayObjectName + "=" + innerArray[k].value);
                                    } else {
                                        returnString = returnString.concat("&" + innerArrayObjectName + "=" + _self.MD5(innerArray[k].value));
                                    }
                                }
                            } else if (srcLmnt.hasAttribute('data-id')) {
                                if (_self.arrayObject[i][5]) {
                                    returnString = returnString.concat("&" + _self.arrayObject[i][5] + "=" + srcLmnt.getAttribute('data-id'));
                                }
                            }
                            if (_self.arrayObject[i][4]) {
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


};
