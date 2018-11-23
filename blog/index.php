<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Наш блог");

?><div class="content-wrap"><?
	?><div class="container blog"><?
		$APPLICATION->IncludeComponent("bitrix:news.list","blog-page",
					Array(
						"SORT_BY1" => "SORT",
						"SORT_ORDER1" => "ASC",
						"AJAX_MODE" => "N",
						"IBLOCK_TYPE" => "aloha_lodio_content",
						"IBLOCK_ID" => "aloha_lodio_blog",
						"PROPERTY_CODE" => Array("*"),
						"SET_TITLE" => "N",
						"SET_BROWSER_TITLE" => "N",
						"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
						"ADD_SECTIONS_CHAIN" => "N",
						"SET_STATUS_404" => "N",
						"SHOW_404" => "N",
						"NEWS_COUNT" => "70",
						"CACHE_TYPE" => "A",
						"CACHE_TIME" => "3600000",
						"CACHE_FILTER" => "N",
						"CACHE_GROUPS" => "N",
						"DISPLAY_TOP_PAGER" => "N",
						"DISPLAY_BOTTOM_PAGER" => "N",
						"FIELD_CODE" => Array("NAME","PREVIEW_TEXT","PREVIEW_PICTURE","DETAIL_TEXT","DETAIL_PICTURE","DATE_CREATE")										
						)
					);
	?></div><?
?></div><?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>