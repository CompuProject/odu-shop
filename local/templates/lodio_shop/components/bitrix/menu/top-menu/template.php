<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if (!empty($arResult))
{
	?><nav class="nav"><?
		?><ul class="nav__list"><?
			foreach($arResult as $arItem)
			{
				?><li class="nav__item"><a href="<?=$arItem["LINK"]?>" class="nav__link"><?=$arItem["TEXT"]?></a></li><?				
			}
		?></ul><?
	?></nav><?	
}