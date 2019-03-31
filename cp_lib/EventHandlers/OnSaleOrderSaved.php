<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/cp_lib/Helpers/CP_GetGlobalParam.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/cp_lib/Helpers/CP_CatalogHelper.php";

use Bitrix\Main;

Main\EventManager::getInstance()->addEventHandler(
    'sale',
    'OnSaleOrderSaved',
    'init'
);

function init(Main\Event $event)
{
    $order = $event->getParameter("ENTITY");
    if ($order->getField("STATUS_ID") == "N") {
        $basket = $order->getBasket();
        $basketString = array_values($basket->getListOfFormatText());
        $basketItems = $basket->getBasketItems();
        foreach ($basketItems as $key=>$item) {
            $itemId = CCatalogSku::GetProductInfo($item->getProductId());
            $resultAr["ITEMS"][$item->getProductId()]["PRODUCT_ID"] = $itemId["ID"];
            $resultAr["ITEMS"][$item->getProductId()]["PRODUCT_NAME"] = $basketString[$key];
        }

        if (!empty($resultAr)) {
            foreach ($resultAr["ITEMS"] as $key=>$element) {
                $db_props = CIBlockElement::GetProperty(CP_CatalogHelper::getShopIblockId(), $element["PRODUCT_ID"], array("sort" => "asc"), Array("CODE"=>"CML2_ARTICLE"));
                $propArray = $db_props->Fetch();
                $resultAr["ITEMS"][$key]["PRODUCT_CODE"] = $propArray["VALUE"];
                $db_props = CIBlockElement::GetProperty(CP_CatalogHelper::getShopIblockId(), $element["PRODUCT_ID"], array("sort" => "asc"), Array("CODE"=>"BRAND"));
                $propArray = $db_props->Fetch();
                $resultAr["ITEMS"][$key]["PRODUCT_BRAND"] = $propArray["VALUE_ENUM"];
            }
        }
        $resultAr["ORDER_ID"] = $order->getId();
        /*Формирование и отправка письма на почту*/
        $to = 'moda-ryazan@yandex.ru';
        $headers = "MIME-Version: 1.0 \r\n";
        $headers .= "Content-type:text/html; charset=UTF-8 \r\n";
        $headers .= "From: ".mb_encode_mimeheader('Одежда для успеха')." <info@shop.odu62.ru.ru> \r\n";
        $headers .= "Reply-To: info@shop.odu62.ru.ru \r\n";
        $headers .= 'X-Mailer: PHP/' . phpversion();

        $subject = 'Новый заказ на сайте "Одежда для успеха"';
        $message = '<html>';
        $message .= '<head>';
        $message .= '<style>';
        $message .= 'table{border-collapse: collapse;}';
        $message .= 'td, th{border: 1px solid black;}';
        $message .= '</style>';
        $message .= '</head>';
        $message .= '<body>';
        $message .= '<p>На сайте "Одежда для успеха" был совершен новый заказ №'.$resultAr["ORDER_ID"].'</p>';
        $message .= '<b>Состав заказа</b>';
        $message .= '<table>';
        $message .= '<tr>';
        $message .= '<th>ID товара в битриксе</th>';
        $message .= '<th>Код товара 1С</th>';
        $message .= '<th>Название/характеристики</th>';
        $message .= '<th>Бренд</th>';
        $message .= '</tr>';
        foreach ($resultAr["ITEMS"] as $item) {
            $message .= '<tr>';
            $message .= '<td>'.$item["PRODUCT_ID"].'</td>';
            $message .= '<td>'.$item["PRODUCT_CODE"].'</td>';
            $message .= '<td>'.$item["PRODUCT_NAME"].'</td>';
            $message .= '<td>'.$item["PRODUCT_BRAND"].'</td>';
            $message .= '</tr>';
        }
        $message .= '<p>Подробности на <a href="http://shop.odu62.ru/bitrix/admin/sale_order_view.php?ID='.$resultAr["ORDER_ID"].'&lang=ru&filter=Y&set_filter=Y">сайте</a></p>';
        $message .= '</table>';
        $message .= '</body>';
        $message .= '</html>';
        mail($to, $subject, $message, $headers);
    }
    //    AddMessage2Log($order->getField("STATUS_ID"));
}
