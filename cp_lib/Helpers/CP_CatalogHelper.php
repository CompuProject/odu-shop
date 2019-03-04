<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/cp_lib/Helpers/CP_GetGlobalParam.php";
class CP_CatalogHelper
{
    private static $HIGHLOAD_CATALOG_ID = null;

    /**
     * Вернет id инфоблока каталога
     * @return string|null
     */
    public static function getShopIblockId() {
        if(!isset(self::$HIGHLOAD_CATALOG_ID)) {
            self::$HIGHLOAD_CATALOG_ID = CP_GetGlobalParam::getParams("products_catalog_ID");
        }
        return self::$HIGHLOAD_CATALOG_ID;
    }
}