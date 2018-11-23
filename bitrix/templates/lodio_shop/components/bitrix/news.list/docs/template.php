<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if (!empty($arResult))
{
	?><div class="k2ItemsBlock awards"><?
		?><ul><?
			foreach($arResult['ITEMS'] as $arItem)
			{
			?><li class="even firstItem"><?
				if ($arItem['PICTURE_SRC'])
				{
					?><img src="<?=$arItem['PICTURE_SRC'];?>" width="<?=$arItem['PICTURE_WIDTH'];?>" height="<?=$arItem['PICTURE_HEIGHT'];?>" alt="<?=$arItem['NAME'];?>" /><?						
				}
				?><div class="moduleItemIntrotext"><?
					?><h5><a class="moduleItemTitle" href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME'];?></a></h5><?
					?><p class="b-custom-text"><?=TruncateText($arItem['PREVIEW_TEXT'], 310);?></p><?
				?></div><?
				?><div class="clr"></div><?
			?></li><?
			}
		?></ul><?
	?></div><?
}