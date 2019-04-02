<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/cp_lib/Helpers/CP_CatalogHelper.php";

AddEventHandler("sale", "OnOrderNewSendEmail", ["CP_OnOrderNewSendEmail", "init"]);

class CP_OnOrderNewSendEmail
{
    public static function init ($orderID, &$eventName, &$arFields)
    {
        if(CModule::IncludeModule("sale") && CModule::IncludeModule("iblock"))
        {
            $strOrderList = "";
            $dbBasketItems = CSaleBasket::GetList(
                array("NAME" => "ASC"),
                array("ORDER_ID" => $orderID),
                false,
                false,
                array("PRODUCT_ID", "ID", "NAME", "QUANTITY", "PRICE", "CURRENCY")
            );
            $counter = '0';
            while ($arProps = $dbBasketItems->Fetch())
            {
                $arrayRes[$counter]["PRODUCT_CODE"] = CP_CatalogHelper::getPropertyValue($arProps["PRODUCT_ID"],"CML2_ARTICLE");
                $arrayRes[$counter]["PRODUCT_ID"] = $arProps["PRODUCT_ID"];
                $arrayRes[$counter]["NAME"] = $arProps["NAME"];
                $arrayRes[$counter]["QUANTITY"] = $arProps["QUANTITY"];
                $arrayRes[$counter]["PRICE"] = $arProps["PRICE"];
                $arrayRes[$counter]["SUMM"] = $arProps["QUANTITY"] * $arProps["PRICE"];
                $counter++;
            }
            $strOrderList .= '<table class="orderTable">';
            $strOrderList .= '<tr>';
            $strOrderList .= '<th>Код товара</th>';
            $strOrderList .= '<th>Наименование</th>';
            $strOrderList .= '<th>Количество</th>';
            $strOrderList .= '<th>Цена</th>';
            $strOrderList .= '<th>Сумма</th>';
            $strOrderList .= '</tr>';
            foreach ($arrayRes as $item) {
                $strOrderList .= '<tr><td>'.$item["PRODUCT_CODE"].'</td><td>'.$item["NAME"].'</td><td>'.$item["QUANTITY"].'</td><td>'.substr($item["PRICE"],0,-2).'</td><td>'.(float)$item["SUMM"].'</td></tr>';
            }
            $strOrderList .= "</table>";
            $arFields["ORDER_TABLE_ITEMS"] = $strOrderList;
        }
    }
}