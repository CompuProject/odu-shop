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
        if (CP_CatalogHelper::getEnumPropertyCodeFromId($arFields["PROPERTY_VALUES"]["95"][$activity_key]["VALUE"]) == 'Да') {
            $arFields["ACTIVE"] = static::$activnost[CP_CatalogHelper::getEnumPropertyCodeFromId($arFields["PROPERTY_VALUES"]["95"][$activity_key]["VALUE"])];
        } else {
            $arFields["ACTIVE"] = "N";
        }
        $catalog_id = CP_CatalogHelper::convertCatalogXMLIdtoID(CP_CatalogHelper::getEnumPropertyValueFromId($arFields["PROPERTY_VALUES"]["96"][$parent_catalog_key]["VALUE"]));
        if ($catalog_id != '1102' && $catalog_id != '1103') {
//            $bs = new CIBlockSection();
//            $bs->Update($catalog_id, Array("ACTIVE"=>"Y"));
            $section_key = key($arFields["IBLOCK_SECTION"]);
            $arFields["IBLOCK_SECTION"][$section_key] = $catalog_id;
            $arFields["IBLOCK_SECTION_ID"] = $catalog_id;
//            AddMessage2Log($arFields);
        }
    }
}