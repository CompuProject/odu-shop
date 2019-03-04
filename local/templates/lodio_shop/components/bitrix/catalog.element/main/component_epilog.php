<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
	echo $arResult['TEMPLATE_DATA'];
	global $arSeeAlosoFilter;
	if ($arResult['PROPERTIES']['SEE_ALSO']['VALUE'])
	{
		$arSeeAlosoFilter = Array(
			'ID' => $arResult['PROPERTIES']['SEE_ALSO']['VALUE']
		);
	}
	else
	{
		$arSeeAlosoFilter = Array(
			'!ID' => $arResult['ID'],
			'SECTION_ID' => $arResult['IBLOCK_SECTION_ID']
		);		
	}
	?><section class="recommend container"><?
		?><div class="row"><?
			?><h2 class="subtitle decor-title popular__title"><span><?echo GetMessage("LODIO_ELEMENT_SEE_ALSO_1")?> <?echo GetMessage("LODIO_ELEMENT_SEE_ALSO_2")?></span></h2><?
			$APPLICATION->IncludeComponent("bitrix:catalog.section","main-catalog",
			Array(
				"ACTION_VARIABLE" => "action",
				"ADD_PICT_PROP" => "MORE_PHOTO",
				"ADD_PROPERTIES_TO_BASKET" => "Y",
				"ADD_SECTIONS_CHAIN" => "Y",
				"ADD_TO_BASKET_ACTION" => "ADD",
				"AJAX_MODE" => "N",
				"BACKGROUND_IMAGE" => "-",
				"BASKET_URL" => "/personal/basket.php",
				"BROWSER_TITLE" => "-",
				"CACHE_FILTER" => "Y",
				"CACHE_GROUPS" => "Y",
				"CACHE_TIME" => "36000000",
				"CACHE_TYPE" => "A",
				"CONVERT_CURRENCY" => "Y",
				"CURRENCY_ID" => "RUB",
				"DETAIL_URL" => "",
				"DISABLE_INIT_JS_IN_COMPONENT" => "Y",
				"DISPLAY_BOTTOM_PAGER" => "N",
				"DISPLAY_COMPARE" => "N",
				"DISPLAY_TOP_PAGER" => "N",
				"ELEMENT_SORT_FIELD" => "sort",
				"ELEMENT_SORT_FIELD2" => "sort",
				"ELEMENT_SORT_ORDER" => "asc",
				"ELEMENT_SORT_ORDER2" => "asc",
				"FILE_404" => "",
				"FILTER_NAME" => "arSeeAlosoFilter",
				"HIDE_NOT_AVAILABLE" => "Y",
				"IBLOCK_ID" => $arParams['IBLOCK_ID'],
				"IBLOCK_TYPE" => $arParams['IBLOCK_TYPE'],
				"INCLUDE_SUBSECTIONS" => "Y",
				"LABEL_PROP" => "",
				"LINE_ELEMENT_COUNT" => "4",
				"MESSAGE_404" => "",
				"META_DESCRIPTION" => "",
				"META_KEYWORDS" => "",
				"OFFERS_CART_PROPERTIES" => array(),
				"OFFERS_FIELD_CODE" => array("",""),
				"OFFERS_LIMIT" => "0",
				"OFFERS_PROPERTY_CODE" => array("CML2_LINK",""),
				"OFFERS_SORT_FIELD" => "sort",
				"OFFERS_SORT_FIELD2" => "active_from",
				"OFFERS_SORT_ORDER" => "asc",
				"OFFERS_SORT_ORDER2" => "desc",
				"OFFER_ADD_PICT_PROP" => "FILE",
				"OFFER_TREE_PROPS" => array("-"),
				"PAGER_BASE_LINK" => "",
				"PAGER_BASE_LINK_ENABLE" => "Y",
				"PAGER_DESC_NUMBERING" => "Y",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_PARAMS_NAME" => "arrPager",
				"PAGER_SHOW_ALL" => "Y",
				"PAGER_SHOW_ALWAYS" => "Y",
				"PAGER_TEMPLATE" => "",
				"PAGE_ELEMENT_COUNT" => "4",
				"PARTIAL_PRODUCT_PROPERTIES" => "N",
				"PRICE_CODE" => array('BASE'),
				"PRICE_VAT_INCLUDE" => "Y",
				"PRODUCT_DISPLAY_MODE" => "Y",
				"PRODUCT_ID_VARIABLE" => "id",
				"PRODUCT_PROPERTIES" => array('*'),
				"PRODUCT_PROPS_VARIABLE" => "prop",
				"PRODUCT_QUANTITY_VARIABLE" => "quantity",
				"PRODUCT_SUBSCRIPTION" => "N",
				"PROPERTY_CODE" => array("*"),
				"QUICK_VIEW_PROPERTIES" => Array('BRAND', 'COUNTRY', 'COMPOSITION'),
				"SECTION_CODE" => "",
				"SECTION_ID" => '',
				"SECTION_ID_VARIABLE" => "SECTION_ID",
				"SECTION_URL" => "",
				"SECTION_USER_FIELDS" => array("",""),
				"SEF_MODE" => "N",
				"SET_BROWSER_TITLE" => "N",
				"SET_LAST_MODIFIED" => "N",
				"SET_META_DESCRIPTION" => "N",
				"SET_META_KEYWORDS" => "N",
				"SET_STATUS_404" => "N",
				"SET_TITLE" => "N",
				"SHOW_404" => "N",
				"SHOW_ALL_WO_SECTION" => "Y",
				"SHOW_CLOSE_POPUP" => "Y",
				"SHOW_DISCOUNT_PERCENT" => "N",
				"SHOW_OLD_PRICE" => "N",
				"SHOW_PRICE_COUNT" => "1",
				"TEMPLATE_THEME" => "blue",
				"USE_MAIN_ELEMENT_SECTION" => "Y",
				"USE_PRICE_COUNT" => "N",
				"USE_PRODUCT_QUANTITY" => "Y"
			)
		);
		?></div><?
	?></section><?

