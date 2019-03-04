<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if (!empty($arResult))
{
	?><ul><?
		foreach($arResult['ITEMS'] as $arItem)
		{
			?><li class="even"><?
				?><div class="moduleItemIntrotext"><?
					?><div class="catItemImageBlock"><?
						?><span class="catItemImage image-wrapper"><?
							?><a class="moduleItemImage" href="<?=$arItem['DETAIL_PAGE_URL']?>" title="<?=$arItem['NAME'];?>"><?
								if ($arItem['PICTURE_SRC'])
								{
									?><img src="<?=$arItem['PICTURE_SRC'];?>" width="<?=$arItem['PICTURE_WIDTH'];?>" height="<?=$arItem['PICTURE_HEIGHT'];?>" alt="<?=$arItem['NAME']?>"/><?									
								}
							?></a><?
						?></span><?
					?></div><?
				?></div><?
				?><div class="clr"></div><?
			?></li><?							
		}
	?></ul><?
}