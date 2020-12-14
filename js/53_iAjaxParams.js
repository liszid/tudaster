const iAjaxParams = (iAjaxParams = Object) => class extends iAjaxParams
{
    constructor()
    {
        super();

        Object.defineProperty( this, 'tagA',
        {
            get( ) {
                return document.getElementsByTagName("a");
            }
        } );

        Object.defineProperty( this, 'stringInnerContent',
        {
            get( ) {
                return this._stringInnerContent;
            },
            set(arg) {
                this._stringInnerContent = arg;
            }
        } );

        Object.defineProperty( this, 'errorSite',
        {
            get( ) {
                return "404.html";
            }
        } );

        Object.defineProperty( this, 'ajaxFile',
        {
            get( ) {
                return location.protocol + '//' + location.host+"/__noLoad/ajax.php";
            }
        });

        Object.defineProperty( this, 'ajaxInterval',
        {
            get( ) {
                return this._ajaxInterval;
            },
            set(arg) {
                this._ajaxInterval = arg;
            }
        });

        Object.defineProperty( this, 'enlargeModal',
        {
            get( ) {
                return [
                    "Profile"
                    ,"Administrative/Users/Add"
                    ,"Administrative/Groups/Add"
                    ,"Administrative/Groups/Edit"
                    ,"Administrative/Membership/Edit"
                    ,"Company/Company/Add"
                    ,"Company/Company/Edit"
                    ,"Company/Company/View"
                    ,"Company/Site/Add"
                    ,"Company/Site/Edit"
                    ,"Company/Site/View"
                    ,"Hardware/Laptop/Add"
                    ,"Hardware/Laptop/Edit"
                    ,"Hardware/Laptop/View"
                    ,"Hardware/PC/Add"
                    ,"Hardware/PC/Edit"
                    ,"Hardware/PC/View"
                    ,"Hardware/Printer/Add"
                    ,"Hardware/Printer/Edit"
                    ,"Hardware/Printer/View"
                    ,"Hardware/Networking/Add"
                    ,"Hardware/Networking/Edit"
                    ,"Hardware/Networking/View"
                    ,"Hardware/Hardware/View"
                ];
            }
        } );

        Object.defineProperty( this, 'notModalActions',
        {
            get( ) {
                return [
                    "Company/Company/Filter"
                ];
            }
        } );

        Object.defineProperty( this, 'modalPagesForGet',
        {
            get( ) {
                return [
                    "Login"
                    ,"Logout"
                    ,"Profile"
                ];
            }
        } );

        Object.defineProperty( this, 'modalDialogElement',
        {
            get( ) {
                return document.getElementById("modalDialog");
            }
        } );

        Object.defineProperty( this, 'arrayObject',
        {
            get( ) {
                return [
//              "id starts w/", "post", "event id", ["array of items needed to send"], "send into", "special id"
                    ["usrLogin", "x=Login&Login=", "button", [], "modalDialog"]
                    ,["usrEdit", "x=Profile&Save=", "button", [], "modalDialog"]
                    ,["usrEdit", "x=Profile", "cancel", [], "modalDialog"]
                    ,["admUsrsAdd", "x=Administrative&y=Users&z=Add&Save=", "button", [], "modalDialog"]
                    ,["admGrpsAdd", "x=Administrative&y=Groups&z=Add&Save=", "button", [], "modalDialog"]
                    ,["admGrpsEdit", "x=Administrative&y=Groups&z=Edit&Save=", "button", [], "modalDialog"]
                    ,["admMemsEdit", "x=Administrative&y=Membership&z=Edit&Save=", "button", [], "modalDialog"]
                    ,["usrCmpCmpAdd", "x=Company&y=Company&z=Add&Save=", "button", [], "modalDialog"]
                    ,["usrCmpCmpEdit", "x=Company&y=Company&z=Edit&Save=", "button", [], "modalDialog"]
                    ,["usrCmpSiteAdd", "x=Company&y=Site&z=Add&Save=", "button", [], "modalDialog"]
                    ,["usrCmpSiteEdit", "x=Company&y=Site&z=Edit&Save=", "button", [], "modalDialog"]
                    ,["usrHardwLaptopAdd", "x=Hardware&y=Laptop&z=Add&Save=", "button", [], "modalDialog"]
                    ,["usrHardwLaptopEdit", "x=Hardware&y=Laptop&z=Edit&Save=", "button", [], "modalDialog"]
                    ,["usrHardwPCAdd", "x=Hardware&y=PC&z=Add&Save=", "button", [], "modalDialog"]
                    ,["usrHardwPCEdit", "x=Hardware&y=PC&z=Edit&Save=", "button", [], "modalDialog"]
                    ,["usrHardwPrinterAdd", "x=Hardware&y=Printer&z=Add&Save=", "button", [], "modalDialog"]
                    ,["usrHardwPrinterEdit", "x=Hardware&y=Printer&z=Edit&Save=", "button", [], "modalDialog"]
                    ,["usrHardwNetworkingAdd", "x=Hardware&y=Networking&z=Add&Save=", "button", [], "modalDialog"]
                    ,["usrHardwNetworkingEdit", "x=Hardware&y=Networking&z=Edit&Save=", "button", [], "modalDialog"]
                ];
            }
        } );

        Object.defineProperty( this, 'tableSearching',
        {
            get( ) {
                return[
                    "tableAdminUsers"
                    ,"tableAdminMembership"
                    ,"tableHomeUsers"
                    ,"tableCompanyCompany"
                    ,"tableCompanySite"
                    ,"tableHardwareHardware"
                    ,"tableHardwareLaptop"
                    ,"tableHardwareNetworking"
                    ,"tableHardwarePC"
                    ,"tableHardwarePrinter"
                ];
            }
        });
    }
};
