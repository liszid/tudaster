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
                    ,["usrEdit", "x=Profile&y=Edit&Save=", "button", [], "modalDialog"]
                    ,["usrPassword", "x=Profile&y=Password&Save=", "button", [], "modalDialog"]
                    ,["usrEdit", "x=Profile", "cancel", [], "modalDialog"]
                    ,["admUsrsAdd", "x=Administrative&y=Users&z=Add&Save=", "button", [], "modalDialog"]
                    ,["admGrpsAdd", "x=Administrative&y=Groups&z=Add&Save=", "button", [], "modalDialog"]
                    ,["admGrpsEdit", "x=Administrative&y=Groups&z=Edit&Save=", "button", [], "modalDialog"]
                    ,["admHuntgroupsAdd", "x=Administrative&y=Huntgroups&z=Add&Save=", "button", [], "modalDialog"]
                    ,["admHuntgroupsEdit", "x=Administrative&y=Huntgroups&z=Edit&Save=", "button", [], "modalDialog"]
                    ,["admMemsEdit", "x=Administrative&y=Users&z=Edit&Save=", "button", [], "modalDialog"]
                    ,["usrKnowledgeKnowledgeAdd", "x=Knowledge&y=Knowledge&z=Add&Save=", "button", [], "modalDialog"]
                    ,["usrKnowledgeKnowledgeEdit", "x=Knowledge&y=Knowledge&z=Edit&Save=", "button", [], "modalDialog"]
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
                    ,["usrHardwServerAdd", "x=Hardware&y=Server&z=Add&Save=", "button", [], "modalDialog"]
                    ,["usrHardwServerEdit", "x=Hardware&y=Server&z=Edit&Save=", "button", [], "modalDialog"]
                    ,["usrHardwRouterAdd", "x=Hardware&y=Router&z=Add&Save=", "button", [], "modalDialog"]
                    ,["usrHardwRouterEdit", "x=Hardware&y=Router&z=Edit&Save=", "button", [], "modalDialog"]
                    ,["usrHardwSwitchAdd", "x=Hardware&y=Switch&z=Add&Save=", "button", [], "modalDialog"]
                    ,["usrHardwSwitchEdit", "x=Hardware&y=Switch&z=Edit&Save=", "button", [], "modalDialog"]
                    ,["usrHardwAccessPointAdd", "x=Hardware&y=Access_Point&z=Add&Save=", "button", [], "modalDialog"]
                    ,["usrHardwAccessPointEdit", "x=Hardware&y=Access_Point&z=Edit&Save=", "button", [], "modalDialog"]
                    ,["usrHardwTelephonyAdd", "x=Hardware&y=Telephony&z=Add&Save=", "button", [], "modalDialog"]
                    ,["usrHardwTelephonyEdit", "x=Hardware&y=Telephony&z=Edit&Save=", "button", [], "modalDialog"]
                    ,["usrHardwCCTVAdd", "x=Hardware&y=CCTV&z=Add&Save=", "button", [], "modalDialog"]
                    ,["usrHardwCCTVEdit", "x=Hardware&y=CCTV&z=Edit&Save=", "button", [], "modalDialog"]
                    ,["usrHardwAlarmAdd", "x=Hardware&y=Alarm&z=Add&Save=", "button", [], "modalDialog"]
                    ,["usrHardwAlarmEdit", "x=Hardware&y=Alarm&z=Edit&Save=", "button", [], "modalDialog"]
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
                    ,"tableHardwareRouter"
                    ,"tableHardwareComputer"
                    ,"tableHardwarePrinter"
                    ,"tableHardwareServer"
                    ,"tableHardwareSecurity"
                    ,"tableHardwareSwitch"
                    ,"tableHardwareAccessPoint"
                    ,"tableHardwareTelephony"
                    ,"tableHardwareCCTV"
                    ,"tableHardwareAlarm"
                    ,"tableKnowledgeKnowledge"
                    ,"tableAccessAccess"
                ];
            }
        });

        Object.defineProperty( this, 'tableNonSearching',
        {
            get( ) {
                return[
                    "tableAdminLogs"
                    ,"tableAdminCompanySiteType"
                    ,"tableAdminKnowledgeType"
                    ,"tableAdminHuntgroups"
                    ,"tableAdminGroups"
                ];
            }
        });
    }
};
