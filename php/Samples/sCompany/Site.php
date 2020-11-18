<?php

declare(strict_types=1);

namespace Samples\sCompany;

use PreLoad\{
    Valid,
    Check,
    Log
};

use Samples\{
    sCard,
    sElement,
    sTranslate
};

class Site extends \Samples\sCompany
{
/*
 * Returns Company Site Adding form
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.11.13
 */
    public static function Add(array $array = array()): string
    {
        self::setDCompany_Site();
        if (! isset($array['Save'])) {
            self::setDCompany();
            self::setDCompany_Site_Type();

            $companySelect = array();
            $companySiteType = array();

            foreach(self::$dCompany->Select(array(), 'forCompanySelect') as $i) {
                $companySelect[] = array('id' => $i['companyId'], 'name' => $i['companyName']);
            }

            foreach(self::$dCompany_Site_Type->Select(array(), 'All') as $i) {
                $companySiteType[] = array('id' => $i['companySiteTypeId'], 'name' => $i['companySiteTypeName']);
            }

            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">
                            '.sElement::General(array('origo' => 'usrCmpSiteAdd', 'data' => 'userId', 'desc' => '', 'value' => $_SESSION['User']['userId'], 'type' => 'hidden'), 'Input').'
                            '.sElement::General(array('origo' => 'usrCmpSiteAdd', 'data' => 'companyId', 'desc' => 'Cég', 'value' => '', 'select' => $companySelect, 'type' => 'select'), 'Input').'
                            '.sElement::General(array('origo' => 'usrCmpSiteAdd', 'data' => 'companySiteName', 'desc' => 'Telephely neve', 'value' => '', 'type' => 'text'), 'Input').'
                            '.sElement::General(array('origo' => 'usrCmpSiteAdd', 'data' => 'companySiteDesc', 'desc' => 'Telephely leírása', 'value' => '', 'type' => 'text'), 'Input').'
                            '.sElement::General(array('origo' => 'usrCmpSiteAdd', 'data' => 'companySiteTypeId', 'desc' => 'Telephely típusa', 'value' => '', 'select' => $companySiteType, 'type' => 'select'), 'Input').'
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="usrCmpSiteAdd-button"'.((empty($companySelect))?' disabled' : '').'><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            return
                '<h4>'.(
                    (self::$dCompany_Site->Insert($array))
                        ? sTranslate::ACTION['Success']['content']
                        : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General(array('x' => 'Company', 'y' => 'Site'), 'Spinner');
        }
    }

/*
 * Fires Company Site View
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.11.13
 */
    public static function View(array $array = array()): string
    {
        self::setDCombined();
        $Company_Site = (self::$dCombined->Select(array('companySiteId' => (int)$array['dp']), 'Company_Site_View'))[0];
        $Company_Site_Content =
            sElement::General( array( 'origo' => 'usrCmpSiteView', 'data' => 'companyName', 'desc' => 'Cég neve', 'value' => $Company_Site['companyName'], 'type' => 'text', 'disabled' => true),'Input')
            .sElement::General( array( 'origo' => 'usrCmpSiteView', 'data' => 'companySiteName', 'desc' => 'Név', 'value' => $Company_Site['companySiteName'], 'type' => 'text', 'disabled' => true),'Input')
            .sElement::General( array( 'origo' => 'usrCmpSiteView', 'data' => 'companySiteTypeName', 'desc' => 'Típus', 'value' => $Company_Site['companySiteTypeName'], 'type' => 'text', 'disabled' => true),'Input')
            .sElement::General( array( 'origo' => 'usrCmpSiteView', 'data' => 'companySiteDesc', 'desc' => 'Leírás', 'value' => $Company_Site['companySiteDesc'], 'type' => 'text', 'disabled' => true),'Input')
            .sElement::General( array( 'origo' => 'usrCmpSiteView', 'data' => 'companySiteAddressCity', 'desc' => 'Város', 'value' => $Company_Site['companySiteAddressCity'], 'type' => 'text', 'disabled' => true),'Input')
            .sElement::General( array( 'origo' => 'usrCmpSiteView', 'data' => 'companySiteAddressPostcode', 'desc' => 'Irányítószám', 'value' => $Company_Site['companySiteAddressPostcode'], 'type' => 'text', 'disabled' => true),'Input')
            .sElement::General( array( 'origo' => 'usrCmpSiteView', 'data' => 'companySiteAddressStreet', 'desc' => 'Utca, Házszám', 'value' => $Company_Site['companySiteAddressStreet'], 'type' => 'text', 'disabled' => true),'Input')
            .sElement::General( array( 'origo' => 'usrCmpSiteView', 'data' => 'companySiteEmail', 'desc' => 'E-mail cím', 'value' => $Company_Site['companySiteEmail'], 'type' => 'text', 'disabled' => true),'Input')
            .sElement::General( array( 'origo' => 'usrCmpSiteView', 'data' => 'companySitePhone', 'desc' => 'Telefonszám', 'value' => $Company_Site['companySitePhone'], 'type' => 'text', 'disabled' => true),'Input');
        $Company_Site_Owner_Content =
            sElement::General( array( 'origo' => 'usrCmpSiteView', 'data' => 'companySiteOwnerLastName', 'desc' => 'Vezetéknév', 'value' => $Company_Site['companySiteOwnerLastName'], 'type' => 'text', 'disabled' => true),'Input')
            .sElement::General( array( 'origo' => 'usrCmpSiteView', 'data' => 'companySiteOwnerFirstName', 'desc' => 'Keresztnév', 'value' => $Company_Site['companySiteOwnerFirstName'], 'type' => 'text', 'disabled' => true),'Input')
            .sElement::General( array( 'origo' => 'usrCmpSiteView', 'data' => 'companySiteOwnerEmail', 'desc' => 'E-mail cím', 'value' => $Company_Site['companySiteOwnerEmail'], 'type' => 'text', 'disabled' => true),'Input')
            .sElement::General( array( 'origo' => 'usrCmpSiteView', 'data' => 'companySiteOwnerPhone', 'desc' => 'Telefonszám', 'value' => $Company_Site['companySiteOwnerPhone'], 'type' => 'text', 'disabled' => true),'Input');
        $Company_Site_Sub_Owner_Content =
            sElement::General( array( 'origo' => 'usrCmpSiteView', 'data' => 'companySiteSubOwnerLastName', 'desc' => 'Vezetéknév', 'value' => $Company_Site['companySiteSubOwnerLastName'], 'type' => 'text', 'disabled' => true),'Input')
            .sElement::General( array( 'origo' => 'usrCmpSiteView', 'data' => 'companySiteSubOwnerFirstName', 'desc' => 'Keresztnév', 'value' => $Company_Site['companySiteSubOwnerFirstName'], 'type' => 'text', 'disabled' => true),'Input')
            .sElement::General( array( 'origo' => 'usrCmpSiteView', 'data' => 'companySiteSubOwnerEmail', 'desc' => 'E-mail cím', 'value' => $Company_Site['companySiteSubOwnerEmail'], 'type' => 'text', 'disabled' => true),'Input')
            .sElement::General( array( 'origo' => 'usrCmpSiteView', 'data' => 'companySiteSubOwnerPhone', 'desc' => 'Telefonszám', 'value' => $Company_Site['companySiteSubOwnerPhone'], 'type' => 'text', 'disabled' => true),'Input');

        return '
            <form method="post" class="form-group col-12" autocomplete="on">
                <div class="form-group col p-0">
                    <div class="col-12 row">
                        '.sCard::Collapsible(array('header' => 'Telephely adatok', 'content' => $Company_Site_Content)).'
                        '.sCard::Collapsible(array('header' => 'Telephely vezető adatok', 'content' => $Company_Site_Owner_Content)).'
                        '.sCard::Collapsible(array('header' => 'Telephely vezető helyettes adatok', 'content' => $Company_Site_Sub_Owner_Content)).'
                    </div>
                </div>
            </form>';
    }

/*
 * Fires Company Site Edit
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.11.13
 */
    public static function Edit(array $array = array()): string
    {
        self::setDCompany_Site();
        if (! isset($array['Save'])) {
            self::setDCombined();
            self::setDCompany_Site_Type();

            $companySiteType = array();

            $Company_Site = (self::$dCombined->Select(array('companySiteId' => (int)$array['dp']), 'Company_Site_View'))[0];

            foreach(self::$dCompany_Site_Type->Select(array(), 'All') as $i) {
                $companySiteType[] = array('id' => $i['companySiteTypeId'], 'name' => $i['companySiteTypeName']);
            }

            $Company_Site_Content =
                 sElement::General( array( 'origo' => 'usrCmpSiteEdit', 'data' => 'userId', 'desc' => '', 'value' => $GLOBALS['sessionId'], 'type' => 'hidden'), 'Input')
                .sElement::General( array( 'origo' => 'usrCmpSiteEdit', 'data' => 'companySiteId', 'desc' => '', 'value' => $array['dp'], 'type' => 'hidden'), 'Input')
                .sElement::General( array( 'origo' => 'usrCmpSiteEdit', 'data' => 'companyName', 'desc' => 'Cég neve', 'value' => $Company_Site['companyName'], 'type' => 'text', 'disabled' => true),'Input')
                .sElement::General( array( 'origo' => 'usrCmpSiteEdit', 'data' => 'companySiteName', 'desc' => 'Név', 'value' => $Company_Site['companySiteName'], 'type' => 'text', 'disabled' => true),'Input')
                .sElement::General( array( 'origo' => 'usrCmpSiteEdit', 'data' => 'companySiteTypeId', 'desc' => 'Típus', 'value' => '', 'select' => $companySiteType, 'type' => 'select'), 'Input')
                .sElement::General( array( 'origo' => 'usrCmpSiteEdit', 'data' => 'companySiteDesc', 'desc' => 'Leírás', 'value' => $Company_Site['companySiteDesc'], 'type' => 'text'),'Input')
                .sElement::General( array( 'origo' => 'usrCmpSiteEdit', 'data' => 'companySiteAddressCity', 'desc' => 'Város', 'value' => $Company_Site['companySiteAddressCity'], 'type' => 'text'),'Input')
                .sElement::General( array( 'origo' => 'usrCmpSiteEdit', 'data' => 'companySiteAddressPostcode', 'desc' => 'Irányítószám', 'value' => $Company_Site['companySiteAddressPostcode'], 'type' => 'text'),'Input')
                .sElement::General( array( 'origo' => 'usrCmpSiteEdit', 'data' => 'companySiteAddressStreet', 'desc' => 'Utca, Házszám', 'value' => $Company_Site['companySiteAddressStreet'], 'type' => 'text'),'Input')
                .sElement::General( array( 'origo' => 'usrCmpSiteEdit', 'data' => 'companySiteEmail', 'desc' => 'E-mail cím', 'value' => $Company_Site['companySiteEmail'], 'type' => 'text'),'Input')
                .sElement::General( array( 'origo' => 'usrCmpSiteEdit', 'data' => 'companySitePhone', 'desc' => 'Telefonszám', 'value' => $Company_Site['companySitePhone'], 'type' => 'text'),'Input');
            $Company_Site_Owner_Content =
                 sElement::General( array( 'origo' => 'usrCmpSiteEdit', 'data' => 'companySiteOwnerLastName', 'desc' => 'Vezetéknév', 'value' => $Company_Site['companySiteOwnerLastName'], 'type' => 'text'),'Input')
                .sElement::General( array( 'origo' => 'usrCmpSiteEdit', 'data' => 'companySiteOwnerFirstName', 'desc' => 'Keresztnév', 'value' => $Company_Site['companySiteOwnerFirstName'], 'type' => 'text'),'Input')
                .sElement::General( array( 'origo' => 'usrCmpSiteEdit', 'data' => 'companySiteOwnerEmail', 'desc' => 'E-mail cím', 'value' => $Company_Site['companySiteOwnerEmail'], 'type' => 'text'),'Input')
                .sElement::General( array( 'origo' => 'usrCmpSiteEdit', 'data' => 'companySiteOwnerPhone', 'desc' => 'Telefonszám', 'value' => $Company_Site['companySiteOwnerPhone'], 'type' => 'text'),'Input');
            $Company_Site_Sub_Owner_Content =
                 sElement::General( array( 'origo' => 'usrCmpSiteEdit', 'data' => 'companySiteSubOwnerLastName', 'desc' => 'Vezetéknév', 'value' => $Company_Site['companySiteSubOwnerLastName'], 'type' => 'text'),'Input')
                .sElement::General( array( 'origo' => 'usrCmpSiteEdit', 'data' => 'companySiteSubOwnerFirstName', 'desc' => 'Keresztnév', 'value' => $Company_Site['companySiteSubOwnerFirstName'], 'type' => 'text'),'Input')
                .sElement::General( array( 'origo' => 'usrCmpSiteEdit', 'data' => 'companySiteSubOwnerEmail', 'desc' => 'E-mail cím', 'value' => $Company_Site['companySiteSubOwnerEmail'], 'type' => 'text'),'Input')
                .sElement::General( array( 'origo' => 'usrCmpSiteEdit', 'data' => 'companySiteSubOwnerPhone', 'desc' => 'Telefonszám', 'value' => $Company_Site['companySiteSubOwnerPhone'], 'type' => 'text'),'Input');

            return '
                <form method="post" class="form-group col-12" autocomplete="on">
                    <div class="form-group col p-0">
                        <div class="col-12 row">
                            '.sCard::Collapsible(array('header' => 'Telephely adatok', 'content' => $Company_Site_Content)).'
                            '.sCard::Collapsible(array('header' => 'Telephely vezető adatok', 'content' => $Company_Site_Owner_Content)).'
                            '.sCard::Collapsible(array('header' => 'Telephely vezető helyettes adatok', 'content' => $Company_Site_Sub_Owner_Content)).'
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12 row">
                            <button class="btn btn-lg btn-success col-12 col-md-6 ml-auto" type="submit" id="usrCmpSiteEdit-button"><i class="fa fa-floppy-o"></i> Mentés</button>
                        </div>
                    </div>
                </form>';
        } else {
            return
                '<h4>'.(
                    (
                        self::$dCompany_Site->Update($array)
                    )
                    ? sTranslate::ACTION['Success']['content']
                    : sTranslate::ACTION['Fail']['content']
                ).'</h4>'.sElement::General(array('x' => 'Company', 'y' => 'Site'), 'Spinner');
        }
    }

/*
 * Fires Company Site Delete
 * @param $array array
 * @return string
 * @author Liszi Dániel
 * @since 2020.11.13
 */
    public static function Delete(array $array = array()): string
    {
        self::setDCompany_Site();
        return
            '<h4>'.(
                (
                    self::$dCompany_Site->Delete(
                        array(
                            'companySiteId' => (int)$array['dp']
                        )
                    )
                )
                ? sTranslate::ACTION['Success']['content']
                : sTranslate::ACTION['Fail']['content']
            ).'</h4>'.sElement::General(array('x' => 'Company', 'y' => 'Site'), 'Spinner');
    }

}
