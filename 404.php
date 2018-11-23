<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404 Not Found");

	?><div class="container product"><?
		?><div class="blognews row"><?
			?><div class="col-md-6"><?
				?><div class="product__slider"><?
					?><img src="<?=SITE_TEMPLATE_PATH?>/images/404page.png" alt="404 Page not found"><?
				?></div><?
			?></div><?
			?><div class="col-md-6 product__main"><?
				?><div class="blognews product__info"><?
					?><span class="product__manufacturer">Извините, страница не найдена</span><?
					?><h1 class="product__title">404</h1><?
					?><p class="product__text">Страница, которую вы ищете была удалена, переименована, или она временно недоступна.</p><?
				?></div><?
			?></div><?
		?></div><?
	?></div><?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>