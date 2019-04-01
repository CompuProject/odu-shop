<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/cp_lib/Helpers/CP_GetGlobalParam.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/cp_lib/Helpers/CP_CatalogHelper.php";

AddEventHandler("iblock", "OnAfterIBlockElementAdd", ["CP_NonCatalogElementUpdater", "init"]);

class CP_NonCatalogElementUpdater
{
    private static $activnost = [
        "Да" => "Y",
        "Нет" => "N",
    ];

    public static function init (&$arFields)
    {
        $activity_key = key ($arFields["PROPERTY_VALUES"]["95"]);
        if (CP_CatalogHelper::getEnumPropertyCodeFromId($arFields["PROPERTY_VALUES"]["95"][$activity_key]["VALUE"]) == 'Да') {
            $arFields["ACTIVE"] = static::$activnost[CP_CatalogHelper::getEnumPropertyCodeFromId($arFields["PROPERTY_VALUES"]["95"][$activity_key]["VALUE"])];
        } else {
            $arFields["ACTIVE"] = "N";
        }
        $parent_catalog_key = key($arFields["PROPERTY_VALUES"]["96"]);
        $catalog_id = CP_CatalogHelper::convertCatalogXMLIdtoID(CP_CatalogHelper::getEnumPropertyValueFromId($arFields["PROPERTY_VALUES"]["96"][$parent_catalog_key]["VALUE"]));
        if ($catalog_id != '1102' && $catalog_id != '1103') {
            $bs = new CIBlockSection();
            $bs->Update($catalog_id, Array("ACTIVE"=>"Y"));
            $section_key = key($arFields["IBLOCK_SECTION"]);
            $arFields["IBLOCK_SECTION"][$section_key] = $catalog_id;
        }
    }

    public static function getLog ($elementId, $elementName, $res) {
        $text = $elementId. " | ".$elementName." | ".$res;
        AddMessage2Log($text);
    }
}