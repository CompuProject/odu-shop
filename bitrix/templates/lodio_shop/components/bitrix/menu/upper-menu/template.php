<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if (!empty($arResult))
{
	?><ul class="upper-menu"><?
		foreach($arResult as $arItem)
		{
			?><li class="upper-menu__item"><a class="upper-menu__link" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li><?				
		}
	?></ul><?	
}