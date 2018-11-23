<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
if (CModule::IncludeModule("sale") && CModule::IncludeModule("catalog") && $_REQUEST['ID'] && $_REQUEST['COUNT'])
{
	$arParams = Array();
	$cartElementId = Add2BasketByProductID($_REQUEST['ID'], $_REQUEST['COUNT']);
	if(!$cartElementId)
	{
		global $USER;
		$arPrice = CCatalogProduct::GetOptimalPrice($_REQUEST['ID'], $_REQUEST['COUNT'], $USER->GetUserGroupArray());
		if ($arPrice)
		{
			CModule::IncludeModule("iblock");
			$dbElement = CIBlockElement::GetByID($_REQUEST['ID']);
			$arElement = $dbElement->Fetch();
			if ($arElement)
			{
				$arOrderFields = array(
					"PRODUCT_ID" => $_REQUEST['ID'],
					"PRODUCT_PRICE_ID" => $arPrice['PRICE']['CATALOG_GROUP_ID'],
					"PRICE" => $arPrice['DISCOUNT_PRICE'],
					"CURRENCY" => $arPrice['PRICE']['CURRENCY'],
					"QUANTITY" => $_REQUEST['COUNT'],
					"LID" => LANG,
					"DELAY" => "N",
					"NAME" => $arElement['NAME']
				);
				$cartElementId = CSaleBasket::Add($arOrderFields);
			}
		}
	}
	if ($cartElementId != false) echo 'ok';
}
echo 'false';