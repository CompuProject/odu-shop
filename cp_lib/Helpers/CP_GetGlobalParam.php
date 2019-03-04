<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/cp_lib/Helpers/CP_CatalogHelper.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/cp_lib/Helpers/CP_GetHighloadEntityDataClass.php";

class CP_GetGlobalParam
{
    /**
     * Возвращает глобальные значения из HL-блока GlobalParams по входным ключам
     * @param $paramCode - array или string
     * @return array или string в зависимости от @param
     */
    public static function getParams($paramCode)
    {
        $val = "";
        $rezult = array();
        try {
            $entity_data_class = CP_GetHighloadEntityDataClass::getByHLName("MainSystemSettings");
            $rsData = $entity_data_class::getList(array(
                "select" => array("UF_PARAM","UF_VALUE"),
                "order" => array("UF_PARAM" => "ASC"),
                "filter" => array("UF_PARAM" => $paramCode)
            ));
            while ($arData = $rsData->Fetch()) {
                $rezult[$arData["UF_PARAM"]]=$val=$arData["UF_VALUE"];
            }
            if(count($rezult) > 1 ) {
                return $rezult;
            } else {
                return $val;
            }
        } catch (Exception $e) {
            return $html = 'Выброшено исключение: ' . $e->getMessage() . "<br>";
        }
    }
}