<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Главная");
?>
    <div class="timeToDevelop">В текущий момент сайт находится в разработке</div>
<div class="content-wrap">
	<?$APPLICATION->IncludeComponent(	"bitrix:news.list",	"main-slider",
	Array(
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "3600000",
		"CACHE_TYPE" => "A",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => Array(),
		"IBLOCK_ID" => "aloha_lodio_main_slider",
		"IBLOCK_TYPE" => "aloha_lodio_content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"PROPERTY_CODE" => Array("URL"),
		"SET_BROWSER_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC"
		)
	);?>
	<section class="promo">
		<?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
				"AREA_FILE_SHOW" => "file", 
				"PATH" => SITE_DIR . "include/index_text.php"
			)
		);?>
	</section>
	<section class="index-catalog hidden-xs hidden-sm container">
		<div class="row">
			<?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
					"AREA_FILE_SHOW" => "file", 
					"PATH" => SITE_DIR . "include/index_promo.php"
				)
			);?>	
		</div>
	</section>
	<section class="popular container">
		<div class="row">
			<h2 class="subtitle decor-title popular__title">Популярные Товары</h2>
			<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"main-catalog", 
	array(
		"ACTION_VARIABLE" => "action",
		"ADD_PICT_PROP" => "MORE_PHOTO",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"ADD_TO_BASKET_ACTION" => "ADD",
		"AJAX_MODE" => "N",
		"BACKGROUND_IMAGE" => "-",
		"BASKET_URL" => SITE_DIR."/personal/basket.php",
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
		"FILTER_NAME" => "arrFilter",
		"HIDE_NOT_AVAILABLE" => "Y",
		"IBLOCK_ID" => "4",
		"IBLOCK_TYPE" => "aloha_lodio_catalog",
		"INCLUDE_SUBSECTIONS" => "Y",
		"LABEL_PROP" => "",
		"LINE_ELEMENT_COUNT" => "4",
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"META_DESCRIPTION" => "",
		"META_KEYWORDS" => "",
		"OFFERS_CART_PROPERTIES" => "",
		"OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"OFFERS_LIMIT" => "0",
		"OFFERS_PROPERTY_CODE" => array(
			0 => "CML2_LINK",
			1 => "",
		),
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_FIELD2" => "active_from",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_ORDER2" => "desc",
		"OFFER_ADD_PICT_PROP" => "FILE",
		"OFFER_TREE_PROPS" => array(
			0 => "-",
		),
		"PAGER_BASE_LINK" => "",
		"PAGER_BASE_LINK_ENABLE" => "Y",
		"PAGER_DESC_NUMBERING" => "Y",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_PARAMS_NAME" => "arrPager",
		"PAGER_SHOW_ALL" => "Y",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_TEMPLATE" => "",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "8",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_DISPLAY_MODE" => "Y",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => array(
			0 => "*",
		),
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_SUBSCRIPTION" => "N",
		"PROPERTY_CODE" => array(
			0 => "*",
		),
		"QUICK_VIEW_PROPERTIES" => array(
			0 => "BRAND",
			1 => "COUNTRY",
			2 => "COMPOSITION",
		),
		"SECTION_CODE" => "",
		"SECTION_ID" => "",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
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
		"USE_PRODUCT_QUANTITY" => "Y",
		"COMPONENT_TEMPLATE" => "main-catalog",
		"CUSTOM_FILTER" => "",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPATIBLE_MODE" => "Y"
	),
	false
);?>
		</div>
	</section>
<!--	--><?//$APPLICATION->IncludeComponent("bitrix:news.list","main-news",
//	Array(
//		"ADD_SECTIONS_CHAIN" => "N",
//		"AJAX_MODE" => "N",
//		"CACHE_FILTER" => "N",
//		"CACHE_GROUPS" => "N",
//		"CACHE_TIME" => "3600000",
//		"CACHE_TYPE" => "A",
//		"DISPLAY_BOTTOM_PAGER" => "N",
//		"DISPLAY_TOP_PAGER" => "N",
//		"FIELD_CODE" => Array("NAME","PREVIEW_TEXT","PREVIEW_PICTURE","DETAIL_TEXT","DETAIL_PICTURE","DATE_CREATE"),
//		"IBLOCK_ID" => "aloha_lodio_news",
//		"IBLOCK_TYPE" => "aloha_lodio_content",
//		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
//		"NEWS_COUNT" => "3",
//		"PROPERTY_CODE" => Array("*"),
//		"SET_BROWSER_TITLE" => "N",
//		"SET_STATUS_404" => "N",
//		"SET_TITLE" => "N",
//		"SHOW_404" => "N",
//		"SORT_BY1" => "SORT",
//		"SORT_ORDER1" => "ASC"
//		)
//	);?>
	<?$APPLICATION->IncludeComponent(	"bitrix:subscribe.form",".default",
	Array(
		"ALLOW_ANONYMOUS" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => ".default",
		"PAGE" => SITE_DIR . "personal/subscribe/subscr_edit.php",
		"SHOW_HIDDEN" => "N",
		"USE_PERSONALIZATION" => "Y"
		)
	);?>
</div>
<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>