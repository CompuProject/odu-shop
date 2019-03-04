<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if (!empty($arResult))
{
    $footerHeader = '<div class="footer_column_block"><div class="footer__contacts-box"><div class="footer_header">Каталог</div></div>';
	$alreadyDevide = false;
	echo $footerHeader;
	?><ul class="footer__list footer__nav-item"><?
	foreach($arResult as $arItem)
	{
		if(!$arItem['PARAMS']['FROM_IBLOCK'] && !$alreadyDevide)
		{
			?></ul></div><?
            $footerHeader = '<div class="footer_column_block"><div class="footer_header">Страницы сайта</div>';
            echo $footerHeader;
			?><ul class="footer__list footer__nav-item"><?
			$alreadyDevide = true;
		}
		?><li class="footer__list-item"><a href="<?=$arItem["LINK"]?>" class="footer__list-link"><?=$arItem["TEXT"]?></a></li><?
	}
	?></ul></div><?
}