<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;

$this->setFrameMode(true);
//$this->addExternalCss("/bitrix/css/main/bootstrap.css");

if (!isset($arParams['FILTER_VIEW_MODE']) || (string)$arParams['FILTER_VIEW_MODE'] == '')
	$arParams['FILTER_VIEW_MODE'] = 'VERTICAL';
$arParams['USE_FILTER'] = (isset($arParams['USE_FILTER']) && $arParams['USE_FILTER'] == 'Y' ? 'Y' : 'N');

$isVerticalFilter = ('Y' == $arParams['USE_FILTER'] && $arParams["FILTER_VIEW_MODE"] == "VERTICAL");
$isSidebar = ($arParams["SIDEBAR_SECTION_SHOW"] == "Y" && isset($arParams["SIDEBAR_PATH"]) && !empty($arParams["SIDEBAR_PATH"]));
$isFilter = ($arParams['USE_FILTER'] == 'Y');

if ($isFilter)
{
	$arFilter = array(
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"ACTIVE" => "Y",
		"GLOBAL_ACTIVE" => "Y",
	);
	if (0 < intval($arResult["VARIABLES"]["SECTION_ID"]))
		$arFilter["ID"] = $arResult["VARIABLES"]["SECTION_ID"];
	elseif ('' != $arResult["VARIABLES"]["SECTION_CODE"])
		$arFilter["=CODE"] = $arResult["VARIABLES"]["SECTION_CODE"];

	$obCache = new CPHPCache();
	if ($obCache->InitCache(36000, serialize($arFilter), "/iblock/catalog"))
	{
		$arCurSection = $obCache->GetVars();
	}
	elseif ($obCache->StartDataCache())
	{
		$arCurSection = array();
		if (Loader::includeModule("iblock"))
		{
			$dbRes = CIBlockSection::GetList(array(), $arFilter, false, array("ID", 'DEPTH_LEVEL', 'IBLOCK_SECTION_ID'));

			if(defined("BX_COMP_MANAGED_CACHE"))
			{
				global $CACHE_MANAGER;
				$CACHE_MANAGER->StartTagCache("/iblock/catalog");

				if ($arCurSection = $dbRes->Fetch())
					$CACHE_MANAGER->RegisterTag("iblock_id_".$arParams["IBLOCK_ID"]);

				$CACHE_MANAGER->EndTagCache();
			}
			else
			{
				if(!$arCurSection = $dbRes->Fetch())
					$arCurSection = array();
			}
		}
		$obCache->EndDataCache($arCurSection);
	}
	if (!isset($arCurSection))
		$arCurSection = array();
}

	$GLOBALS[$arParams["FILTER_NAME"]] = $GLOBALS[$arParams["FILTER_NAME"]] ? $GLOBALS[$arParams["FILTER_NAME"]] : Array();

	$specialName = '';
	if ($_REQUEST['new'] == 'Да')
	{
		$specialName = GetMessage("LODIO_CATALOG_NEW");
		$GLOBALS[$arParams["FILTER_NAME"]]['PROPERTY_NEW_VALUE'] = 'Да';
	}
	if ($_REQUEST['hit'] == 'Да')
	{
		$specialName = GetMessage("LODIO_CATALOG_HIT");
		$GLOBALS[$arParams["FILTER_NAME"]]['PROPERTY_HIT_VALUE'] = 'Да';
	}
	if ($_REQUEST['sale'] == 'Да')
	{
		$specialName = GetMessage("LODIO_CATALOG_SALE");
		$GLOBALS[$arParams["FILTER_NAME"]]['PROPERTY_SALE_VALUE'] = 'Да';
	}

	if ($_REQUEST['brand'] == 'GerryWebber') {
        $specialName = GetMessage("LODIO_CATALOG_BRAND");
        $GLOBALS[$arParams["FILTER_NAME"]]['PROPERTY_BRAND_VALUE'] = 'Gerry Weber';
    }

?><div class="content-wrap"><?
	?><h1 class="title title--cat"><?if ($specialName):?><?=$specialName?><?else:?><?$APPLICATION->ShowViewContent('section_name');?><?endif?></h1><?
	if (!$arResult["VARIABLES"]["SECTION_ID"] && !$arResult["VARIABLES"]["SECTION_ID"])
	{
		$arParams["SECTION_TOP_DEPTH"] = 1;
	}

	if (!$specialName)
	{
		$APPLICATION->IncludeComponent(
			"bitrix:catalog.section.list",
			"section",
			array(
				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
				"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
				"CACHE_TYPE" => $arParams["CACHE_TYPE"],
				"CACHE_TIME" => $arParams["CACHE_TIME"],
				"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
				"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
				"TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
				"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
				"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
				"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
				"HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
				"ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : '')
			),
			$component,
			array("HIDE_ICONS" => "Y")
		);
	}

	?><section class="catalog container"><?
        if (!empty($arResult["VARIABLES"])) {
            ?><section class="catalog__filter"><?
            if (!$specialName)
            {
                $APPLICATION->IncludeComponent(
                    "bitrix:catalog.section.list",
                    "section_left",
                    array(
                        'CURRENT_ID' => $arCurSection['ID'],
                        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                        "SECTION_ID" => '',
                        "SECTION_CODE" => '',
                        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                        "CACHE_TIME" => $arParams["CACHE_TIME"],
                        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                        "COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
                        "TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
                        "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
                        "VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
                        "SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
                        "HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
                        "ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : '')
                    ),
                    $component,
                    array("HIDE_ICONS" => "Y")
                );
            }
            ?><a class="visible-xs-block catalog-toggle-filter" href="#"><i class="fa fa-filter"></i> <?echo GetMessage("LODIO_CATALOG_FILTER")?></a><?
            ?><div class="visible-sm-block visible-md-block visible-lg-block filter-mobile-wrapper"><?
            $APPLICATION->IncludeComponent(
                "bitrix:catalog.smart.filter",
                "visual_vertical",
                array(
                    "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                    "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                    "SECTION_ID" => $arCurSection['ID'],
                    "FILTER_NAME" => $arParams["FILTER_NAME"],
                    "PRICE_CODE" => $arParams["PRICE_CODE"],
                    "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                    "CACHE_TIME" => $arParams["CACHE_TIME"],
                    "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                    "SAVE_IN_SESSION" => "N",
                    "POPUP_POSITION" => "right",
                    "FILTER_VIEW_MODE" => 'vertical',//$arParams["FILTER_VIEW_MODE"],
                    "XML_EXPORT" => "Y",
                    "SECTION_TITLE" => "NAME",
                    "SECTION_DESCRIPTION" => "DESCRIPTION",
                    'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
                    "TEMPLATE_THEME" => $arParams["TEMPLATE_THEME"],
                    'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
                    'CURRENCY_ID' => $arParams['CURRENCY_ID'],
                    "SEF_MODE" => $arParams["SEF_MODE"],
                    "SEF_RULE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["smart_filter"],
                    "SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],
                    "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
                    "INSTANT_RELOAD" => $arParams["INSTANT_RELOAD"],
                ),
                $component,
                array('HIDE_ICONS' => 'Y')
            );

            ?></section><?

            $arSortData = Array(
                'POPULAR' => Array(
                    'DIRECTION' => $_REQUEST['sort-by'] == 'POPULAR' && $_REQUEST['sort-order'] == 'DESC' ? 'ASC' : 'DESC',
                    'ARROW' => $_REQUEST['sort-by'] == 'POPULAR' && $_REQUEST['sort-order'] == 'ASC' ? 'down' : 'up',
                    'FIELD' => 'shows',
                ),
                'NAME' => Array(
                    'DIRECTION' => $_REQUEST['sort-by'] == 'NAME' && $_REQUEST['sort-order'] == 'ASC' ? 'DESC' : 'ASC',
                    'ARROW' => $_REQUEST['sort-by'] == 'NAME' && $_REQUEST['sort-order'] == 'ASC' ? 'down' : 'up',
                    'FIELD' => 'name',
                ),
                'PRICE' => Array(
                    'DIRECTION' => $_REQUEST['sort-by'] == 'PRICE' && $_REQUEST['sort-order'] == 'ASC' ? 'DESC' : 'ASC',
                    'ARROW' => $_REQUEST['sort-by'] == 'PRICE' && $_REQUEST['sort-order'] == 'ASC' ? 'down' : 'up',
                    'FIELD' => 'property_MINIMUM_PRICE',
                ),
            )

            ?><ul class="catalog-sort"><?
            ?><li><?echo GetMessage("LODIO_CATALOG_SPECIAL")?>:</li><?
            ?><li><a class="catalogHit <?if($_REQUEST['hit'] == 'Да'):?>active<?endif?>" href="<?=$APPLICATION->GetCurPageParam("hit=Да")?>">Хиты продаж</a></li><?
            ?><li><a class="catalogNew <?if($_REQUEST['new'] == 'Да'):?>active<?endif?>" href="<?=$APPLICATION->GetCurPageParam("new=Да")?>">Новинки</a></li><?
            ?><li><a class="catalogSale <?if($_REQUEST['sale'] == 'Да'):?>active<?endif?>" href="<?=$APPLICATION->GetCurPageParam("sale=Да")?>">Скидки</a></li><?
            ?><li class="separator">|</li><?
            ?><li><?echo GetMessage("LODIO_CATALOG_SORT")?>:</li><?
            ?><li><a <?if ($_REQUEST['sort-by'] == 'POPULAR' || !$_REQUEST['sort-by']):?>class="sort-active" <?endif?>href="<?=$APPLICATION->GetCurPageParam("sort-by=POPULAR&sort-order=".$arSortData['POPULAR']['DIRECTION'], array("sort-by", "sort-order"))?>"><?echo GetMessage("LODIO_CATALOG_SORT_POPULAR")?> <i class="fa fa-angle-<?=$arSortData['POPULAR']['ARROW']?>"></i></a></li><?
            ?><li><a <?if ($_REQUEST['sort-by'] == 'NAME'):?>class="sort-active" <?endif?>href="<?=$APPLICATION->GetCurPageParam("sort-by=NAME&sort-order=".$arSortData['NAME']['DIRECTION'], array("sort-by", "sort-order"))?>"><?echo GetMessage("LODIO_CATALOG_SORT_NAME")?> <i class="fa fa-angle-<?=$arSortData['NAME']['ARROW']?>"></i></a></li><?
            ?><li><a <?if ($_REQUEST['sort-by'] == 'PRICE'):?>class="sort-active" <?endif?>href="<?=$APPLICATION->GetCurPageParam("sort-by=PRICE&sort-order=".$arSortData['PRICE']['DIRECTION'], array("sort-by", "sort-order"))?>"><?echo GetMessage("LODIO_CATALOG_SORT_PRICE")?> <i class="fa fa-angle-<?=$arSortData['PRICE']['ARROW']?>"></i></a></li><?
            ?><li><a class="clearCatalogSpecial" href="<?
            if($_REQUEST['hit'] == 'Да' || $_REQUEST['new'] == 'Да' || $_REQUEST['sale'] == 'Да' || $_REQUEST['sort-by'] == 'POPULAR' || $_REQUEST['sort-by'] == 'NAME' || $_REQUEST['sort-by'] == 'PRICE'){
                echo $_SERVER["REDIRECT_URL"];
            } else{
                echo $_SERVER["REQUEST_URI"];
            }
            ?>">Очистить</a></li><?
            ?></ul><?

            if ($_REQUEST['sort-by'] && $_REQUEST['sort-order'])
            {
                $arParams["ELEMENT_SORT_FIELD2"] = $arSortData[$_REQUEST['sort-by']]['FIELD'];
                $arParams["ELEMENT_SORT_ORDER2"] = $_REQUEST['sort-order'];
            }
        }

		$intSectionID = $APPLICATION->IncludeComponent(
			"bitrix:catalog.section",
			"main-catalog",
			array(
				"CATALOG_TEMPLATE" => "Y",

				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
				"ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
				"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
				"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
				"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
				"META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
				"META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
				"BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
				"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
				"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
				"BASKET_URL" => $arParams["BASKET_URL"],
				"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
				"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
				"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
				"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
				"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
				"FILTER_NAME" => $arParams["FILTER_NAME"],
				"CACHE_TYPE" => $arParams["CACHE_TYPE"],
				"CACHE_TIME" => $arParams["CACHE_TIME"],
				"CACHE_FILTER" => $arParams["CACHE_FILTER"],
				"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
				"SET_TITLE" => $arParams["SET_TITLE"],
				"MESSAGE_404" => $arParams["MESSAGE_404"],
				"SET_STATUS_404" => $arParams["SET_STATUS_404"],
				"SHOW_404" => $arParams["SHOW_404"],
				"FILE_404" => $arParams["FILE_404"],
				"DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
				"PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
				"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
				"PRICE_CODE" => $arParams["PRICE_CODE"],
				"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
				"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],

				"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
				"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
				"ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
				"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
				"PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],

				"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
				"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
				"PAGER_TITLE" => $arParams["PAGER_TITLE"],
				"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
				"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
				"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
				"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
				"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
				"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
				"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
				"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],

				"OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
				"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
				"OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"],
				"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
				"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
				"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
				"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
				"OFFERS_LIMIT" => $arParams["LIST_OFFERS_LIMIT"],

				"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
				"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
				"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],

				"SHOW_ALL_WO_SECTION" => "Y",

				"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
				"USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
				'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
				'CURRENCY_ID' => $arParams['CURRENCY_ID'],
				'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],

				'LABEL_PROP' => $arParams['LABEL_PROP'],
				'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
				'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],

				"QUICK_VIEW_PROPERTIES" => $arParams['QUICK_VIEW_PROPERTIES'],

				'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
				'OFFER_TREE_PROPS' => $arParams['OFFER_TREE_PROPS'],
				'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
				'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
				'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
				'MESS_BTN_BUY' => $arParams['MESS_BTN_BUY'],
				'MESS_BTN_ADD_TO_BASKET' => $arParams['MESS_BTN_ADD_TO_BASKET'],
				'MESS_BTN_SUBSCRIBE' => $arParams['MESS_BTN_SUBSCRIBE'],
				'MESS_BTN_DETAIL' => $arParams['MESS_BTN_DETAIL'],
				'MESS_NOT_AVAILABLE' => $arParams['MESS_NOT_AVAILABLE'],

				'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
				"ADD_SECTIONS_CHAIN" => "N",
				'ADD_TO_BASKET_ACTION' => $basketAction,
				'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
				'COMPARE_PATH' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['compare'],
				'BACKGROUND_IMAGE' => (isset($arParams['SECTION_BACKGROUND_IMAGE']) ? $arParams['SECTION_BACKGROUND_IMAGE'] : ''),
				'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT']) ? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : '')
			),
			$component
		);

		//GetMessage('LODIO_CATALOG_SALE');
		if ($specialName)
		{
			$APPLICATION->SetTitle($specialName);
			$APPLICATION->SetPageProperty("title", $specialName);
		}
	?></section><?
?></div><?
?>
