<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/cp_lib/Helpers/CP_GetGlobalParam.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/cp_lib/Helpers/CP_CatalogHelper.php";

AddEventHandler("iblock", "OnBeforeIBlockElementAdd", ["CP_ActivateElementUpdater", "init"]);
AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", ["CP_ActivateElementUpdater", "init"]);

class CP_ActivateElementUpdater
{
    private static $activnost = [
        "Да" => "Y",
        "Нет" => "N",
    ];

    public static function init(&$arFields)
    {
        if ($arFields["IBLOCK_ID"] != CP_CatalogHelper::getShopIblockId()) {
            return;
        }
        $activity_key = key ($arFields["PROPERTY_VALUES"]["95"]);
        $parent_catalog_key = key($arFields["PROPERTY_VALUES"]["96"]);
        if ($arFields["PROPERTY_VALUES"]["95"][$activity_key]["VALUE"] == 'Да') {
            $arFields["ACTIVE"] = static::$activnost[$arFields["PROPERTY_VALUES"]["95"][$activity_key]["VALUE"]];
        } else {
            $arFields["ACTIVE"] = "N";
        }
        if (!empty($arFields["IBLOCK_SECTION"])) {
            $section_key = key($arFields["IBLOCK_SECTION"]);
            $arFields["IBLOCK_SECTION"][$section_key] = CP_CatalogHelper::convertCatalogXMLIdtoID(CP_CatalogHelper::getEnumPropertyValueFromId($arFields["PROPERTY_VALUES"]["96"][$parent_catalog_key]["VALUE"]));
        }
    }
}