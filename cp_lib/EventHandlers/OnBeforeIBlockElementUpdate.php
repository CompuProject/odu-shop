<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/cp_lib/Helpers/CP_GetGlobalParam.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/cp_lib/Helpers/CP_CatalogHelper.php";

AddEventHandler("iblock", "OnBeforeIBlockElementAdd", ["CP_ActivateUpdater", "productUpdate"]);
AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", ["CP_ActivateUpdater", "productUpdate"]);
AddEventHandler("iblock", "OnBeforeIBlockSectionUpdate", ["CP_ActivateUpdater", "catalogUpdate"]);

class CP_ActivateUpdater
{
    private static $activnost = [
        "Да" => "Y",
        "Нет" => "N",
    ];

    public static function productUpdate(&$arFields)
    {
        if ($arFields["IBLOCK_ID"] != CP_CatalogHelper::getShopIblockId()) {
            return;
        }
        $activity_key = key ($arFields["PROPERTY_VALUES"]["95"]);
        $parent_catalog_key = key($arFields["PROPERTY_VALUES"]["96"]);
        $arFields["ACTIVE"] = static::$activnost[$arFields["PROPERTY_VALUES"]["95"][$activity_key]["VALUE"]];
        $section_key = key($arFields["IBLOCK_SECTION"]);
        $arFields["IBLOCK_SECTION"][$section_key] = CP_CatalogHelper::convertCatalogXMLIdtoID(CP_CatalogHelper::getEnumPropertyValueFromId($arFields["PROPERTY_VALUES"]["96"][$parent_catalog_key]["VALUE"]));
    }

    public static function catalogUpdate (&$arFields) {
        if ($arFields["XML_ID"] == "08aed71b-8540-11e8-a478-f81654daadda" || $arFields["XML_ID"] == "08aed71d-8540-11e8-a478-f81654daadda") {
            $arFields["ACTIVE"] = "N";
        }
    }
}