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
        if ($arFields["PROPERTY_VALUES"]["95"][$activity_key]["VALUE"] != '') {
            $arFields["ACTIVE"] = static::$activnost[$arFields["PROPERTY_VALUES"]["95"][$activity_key]["VALUE"]];
        }
        $parent_catalog_key = key($arFields["PROPERTY_VALUES"]["96"]);
        $iBlockSectionId['0'] = CP_CatalogHelper::convertCatalogXMLIdtoID(CP_CatalogHelper::getEnumPropertyValueFromId($arFields["PROPERTY_VALUES"]["96"][$parent_catalog_key]["VALUE"]));
        $res = CIBlockElement::SetElementSection($arFields["ID"], $iBlockSectionId, TRUE);
    }

    public static function getLog ($elementId, $elementName, $res) {
        $text = $elementId. " | ".$elementName." | ".$res;
        AddMessage2Log($text);
    }
}