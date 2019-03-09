<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/cp_lib/Helpers/CP_GetGlobalParam.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/cp_lib/Helpers/CP_CatalogHelper.php";

AddEventHandler("iblock", "OnBeforeIBlockSectionUpdate", ["CP_ActivateCatalogUpdater", "init"]);

class CP_ActivateCatalogUpdater
{
    public static function init (&$arFields) {
        if ($arFields["XML_ID"] == "08aed71b-8540-11e8-a478-f81654daadda" || $arFields["XML_ID"] == "08aed71d-8540-11e8-a478-f81654daadda") {
            $arFields["ACTIVE"] = "N";
        }
    }

}