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
/*
    Temporarily inactive functionality
*/
        Object.defineProperty( this, 'enlargeModal',
        {
            get( ) {
                return [
                    "Profile"
                    ,"Administrative/Users/Add"
                    ,"Administrative/Users/Edit"
                    ,"Administrative/Groups/Add"
                    ,"Administrative/Groups/View"
                    ,"Administrative/Groups/Edit"
                    ,"Administrative/Huntgroups/Add"
                    ,"Administrative/Huntgroups/View"
                    ,"Administrative/Huntgroups/Edit"
                    ,"Company/Company/Add"
                    ,"Company/Company/Edit"
                    ,"Company/Company/View"
                    ,"Company/Site/Add"
                    ,"Company/Site/Edit"
                    ,"Company/Site/View"
                    ,"Accesses/Access/Add"
                    ,"Accesses/Access/Edit"
                    ,"Accesses/Access/View"
                    ,"Hardware/Laptop/Add"
                    ,"Hardware/Laptop/Edit"
                    ,"Hardware/Laptop/View"
                    ,"Hardware/Computer/Add"
                    ,"Hardware/Computer/Edit"
                    ,"Hardware/Computer/View"
                    ,"Hardware/Printer/Add"
                    ,"Hardware/Printer/Edit"
                    ,"Hardware/Printer/View"
                    ,"Hardware/Networking/Add"
                    ,"Hardware/Networking/Edit"
                    ,"Hardware/Networking/View"
                    ,"Hardware/Server/Add"
                    ,"Hardware/Server/Edit"
                    ,"Hardware/Server/View"
                    ,"Hardware/Security/Add"
                    ,"Hardware/Security/Edit"
                    ,"Hardware/Security/View"
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
                    ,["admHuntgroupsAdd", "x=Administrative&y=Huntgroups&z=Add&Save=", "button", [], "modalDialog"]
                    ,["admHuntgroupsEdit", "x=Administrative&y=Huntgroups&z=Edit&Save=", "button", [], "modalDialog"]
                    ,["admMemsEdit", "x=Administrative&y=Users&z=Edit&Save=", "button", [], "modalDialog"]
                    ,["usrAccessAdd", "x=Accesses&y=Access&z=Add&Save=", "button", [], "modalDialog"]
                    ,["usrAccessEdit", "x=Accesses&y=Access&z=Edit&Save=", "button", [], "modalDialog"]
                    ,["usrCmpCmpAdd", "x=Company&y=Company&z=Add&Save=", "button", [], "modalDialog"]
                    ,["usrCmpCmpEdit", "x=Company&y=Company&z=Edit&Save=", "button", [], "modalDialog"]
                    ,["usrCmpSiteAdd", "x=Company&y=Site&z=Add&Save=", "button", [], "modalDialog"]
                    ,["usrCmpSiteEdit", "x=Company&y=Site&z=Edit&Save=", "button", [], "modalDialog"]
                    ,["usrHardwLaptopAdd", "x=Hardware&y=Laptop&z=Add&Save=", "button", [], "modalDialog"]
                    ,["usrHardwLaptopEdit", "x=Hardware&y=Laptop&z=Edit&Save=", "button", [], "modalDialog"]
                    ,["usrHardwComputerAdd", "x=Hardware&y=Computer&z=Add&Save=", "button", [], "modalDialog"]
                    ,["usrHardwComputerEdit", "x=Hardware&y=Computer&z=Edit&Save=", "button", [], "modalDialog"]
                    ,["usrHardwPrinterAdd", "x=Hardware&y=Printer&z=Add&Save=", "button", [], "modalDialog"]
                    ,["usrHardwPrinterEdit", "x=Hardware&y=Printer&z=Edit&Save=", "button", [], "modalDialog"]
                    ,["usrHardwNetworkingAdd", "x=Hardware&y=Networking&z=Add&Save=", "button", [], "modalDialog"]
                    ,["usrHardwNetworkingEdit", "x=Hardware&y=Networking&z=Edit&Save=", "button", [], "modalDialog"]
                    ,["usrHardwSecurityAdd", "x=Hardware&y=Security&z=Add&Save=", "button", [], "modalDialog"]
                    ,["usrHardwSecurityEdit", "x=Hardware&y=Security&z=Edit&Save=", "button", [], "modalDialog"]
                    ,["usrHardwServerAdd", "x=Hardware&y=Server&z=Add&Save=", "button", [], "modalDialog"]
                    ,["usrHardwServerEdit", "x=Hardware&y=Server&z=Edit&Save=", "button", [], "modalDialog"]
                ];
            }
        } );

        Object.defineProperty( this, 'tableSearching',
        {
            get( ) {
                return[
                    "tableAdminUsers"
                    ,"tableAdminHungroups"
                    ,"tableAdminMembership"
                    ,"tableHomeUsers"
                    ,"tableCompanyCompany"
                    ,"tableCompanySite"
                    ,"tableHardwareHardware"
                    ,"tableHardwareLaptop"
                    ,"tableHardwareNetworking"
                    ,"tableHardwareComputer"
                    ,"tableHardwarePrinter"
                    ,"tableHardwareServer"
                    ,"tableHardwareSecurity"
                    ,"tableAccessAccess"
                ];
            }
        });
    }
};
