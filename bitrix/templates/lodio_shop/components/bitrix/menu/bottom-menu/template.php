<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if (!empty($arResult))
{
	$alreadyDevide = false;
	?><ul class="footer__list footer__nav-item"><?
	foreach($arResult as $arItem)
	{
		if(!$arItem['PARAMS']['FROM_IBLOCK'] && !$alreadyDevide)
		{
			?></ul><?
			?><ul class="footer__list footer__nav-item"><?
			$alreadyDevide = true;
		}
		?><li class="footer__list-item"><a href="<?=$arItem["LINK"]?>" class="footer__list-link"><?=$arItem["TEXT"]?></a></li><?
	}
	?></ul><?
}