<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/cp_lib/Helpers/CP_GetGlobalParam.php";

/**
 * Class CP_CatalogHelper - Вспомогательный класс для получения вспомогательных данных и конвертации
 */
class CP_CatalogHelper
{
    private static $HIGHLOAD_CATALOG_ID = null;

    /**
     * Вернет id инфоблока каталога
     * @return string|null
     */
    public static function getShopIblockId()
    {
        if (!isset(self::$HIGHLOAD_CATALOG_ID)) {
            self::$HIGHLOAD_CATALOG_ID = CP_GetGlobalParam::getParams("products_catalog_ID");
        }
        return self::$HIGHLOAD_CATALOG_ID;
    }

    /** Конвертирует внешний код каталога в его идентификатор
     * @param $xml_id - внешний код каталога
     * @return string - Идентификатор каталога
     */
    public static function convertCatalogXMLIdtoID($xml_id)
    {
        $arFilter = Array('IBLOCK_ID' => self::getShopIblockId(), 'XML_ID' => $xml_id);
        $db_list = CIBlockSection::GetList(Array("SORT" => "ASC"), $arFilter, true);
        while ($ar_result = $db_list->GetNext()) {
            $catalogId = $ar_result['ID'];
        }
        return $catalogId;
    }

    /** Возвращает идентификатор товара по его внешнему коду
     * @param $xml_id - внешний код товара
     * @return string - идентификатор товара
     */
    public static function convertProductXmlIdToId ($xml_id) {
        $arSelect = Array("ID");
        $arFilter = Array('IBLOCK_ID' => self::getShopIblockId(), 'XML_ID' => $xml_id);
        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
        while ($ar_result = $res->GetNext()) {
            $productId = $ar_result['ID'];
        }
        return $productId;
    }

    /** Конвертирует внешний код свойства в его идентификатор
     * @param $xml_id - внешний код ствойства
     * @return string - Идентификатор свойства
     */
    public static function convertPropertyXmlIdToId($xml_id) {
        $properties = CIBlockProperty::GetList(array("sort"=>"asc"), Array("ACTIVE"=>"Y", "XML_ID"=>$xml_id, "IBLOCK_ID"=>self::getShopIblockId()));
        while ($prop_fields = $properties->GetNext()) {
            $property_id = $prop_fields['ID'];
        }
        return $property_id;
    }

    /** Функция возвращает идентификатор каталога, беря значение из свойства товара
     * @param $productId - Идентификатор товара на сайте
     * @return string - Идентификатор каталога на сайте
     */
    public static function getCatalogIdFromProductProperties ($productId) {
        $db_props = CIBlockElement::GetProperty(self::getShopIblockId(),$productId, array("sort" => "asc"), array("CODE"=>"KATALOG_SAYTA"));
        while ($ob = $db_props->GetNext())
        {
            $catalogXMLId = $ob['VALUE_XML_ID'];
        }
        return self::convertCatalogXMLIdtoID($catalogXMLId);
    }

    /** Функция по идентификатору  значения множественного свойства возвращает его значение, в данном случае XML ID каталога
     * @param $enumValueId - идентификатор записи
     * @return string - Внешний код каталога из множественного свойства
     */
    public static function getEnumPropertyValueFromId ($enumValueId) {
        $property_enums = CIBlockPropertyEnum::GetList(Array("DEF"=>"DESC", "SORT"=>"ASC"), Array("IBLOCK_ID"=>"4","ID"=>$enumValueId));
        while($enum_fields = $property_enums->GetNext()){
            $propertyValue = $enum_fields["XML_ID"];
        }
        return $propertyValue;
    }

    /** Функция по идентификатору  значения множественного свойства возвращает его значение
     * @return mixed
     */
    public static function getEnumPropertyCodeFromId ($enumValueId) {
        $property_enums = CIBlockPropertyEnum::GetList(Array("DEF"=>"DESC", "SORT"=>"ASC"), Array("IBLOCK_ID"=>"4","ID"=>$enumValueId));
        while($enum_fields = $property_enums->GetNext()){
            $propertyValue = $enum_fields["VALUE"];
        }
        return $propertyValue;
    }

    /** Возвращает false если товар находится в разделе Акссесуары
     * @param $sectionId - идентификатор секции в которой находится товар
     * @return bool
     */
    public static function getParentSectionNotAksessuary ($sectionId) {
        $nav = CIBlockSection::GetNavChain(CP_CatalogHelper::getShopIblockId(), $sectionId, array("CODE"));
        while ($navArray = $nav->Fetch()) {
            $result[] = $navArray["CODE"];
        }
        if ($result[0] == "aksessuary") {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /** Возвращает true если товар находится в разделе Женищнам
     * @param $sectionId - идентификатор секции в которой находится товар
     * @return bool
     */
    public static function getParentSectionJenskoe ($sectionId) {
        $nav = CIBlockSection::GetNavChain(CP_CatalogHelper::getShopIblockId(), $sectionId);
        while ($navArray = $nav->Fetch()) {
            $result[] = $navArray["CODE"];
        }
        if ($result['0'] == "zhenshchinam") {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /** Возвращает true если товар находится в разделе Трикотаж Мужское
     * @param $sectionId
     * @return bool
     */
    public static function getParentSectionTrikitaj ($sectionId) {
        $nav = CIBlockSection::GetNavChain(CP_CatalogHelper::getShopIblockId(), $sectionId);
        while ($navArray = $nav->Fetch()) {
            $result[$navArray["ID"]] = $navArray["XML_ID"];
        }
        if ($result[$sectionId] == "0caa52f0-35ac-11e9-8984-d46e0e1d82ce") {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /** Возвращает true если товар находится в разделе Брюки Мужское
     * @param $sectionId
     * @return bool
     */
    public static function getParentSectionBruki ($sectionId) {
        $nav = CIBlockSection::GetNavChain(CP_CatalogHelper::getShopIblockId(), $sectionId);
        while ($navArray = $nav->Fetch()) {
            $result[$navArray["ID"]] = $navArray["XML_ID"];
        }
        if ($result[$sectionId] == "0caa52ec-35ac-11e9-8984-d46e0e1d82ce") {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /** Проверяет, есть ли хоть один товар со статусом Хит продаж
     * @return bool
     */
    public static function getBoolPopularGoods () {
        $arFilter = Array('IBLOCK_ID' => CP_CatalogHelper::getShopIblockId(), "ACTIVE"=>"Y", 'PROPERTY_HIT'=>"1387");
        $res = CIBlockElement::GetList(Array(), $arFilter, false);
        if ($ar_result = $res->Fetch() == '') {
            return false;
        } else {
            return true;
        }
    }
}