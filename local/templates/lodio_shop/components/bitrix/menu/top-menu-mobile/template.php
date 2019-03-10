<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if (!empty($arResult))
{
	?><ul class="mobile-nav visible-xs"><?
		foreach($arResult as $arItem)
		{	
			if ($arItem['DEPTH_LEVEL'] <= $arParams['MAX_LEVEL'])
			{
			?><li class="mobile-nav__item"><a href="<?=$arItem["LINK"]?>" class="nav__link"><?=$arItem["TEXT"]?></a></li><?	
			}
		}
	?></ul><?
}