<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if (!empty($arResult))
{
	?><div class="k2ItemsBlock compare"><?
		?><ul><?
			foreach($arResult['ITEMS'] as $arItem)
			{
				?><li class="even firstItem"><?
					?><div class="moduleItemIntrotext"><?
						?><div class="catItemImageBlock"><?
							?><span class="catItemImage image-wrapper"><?
								?><a class="moduleItemImage" href="<?=$arItem['DETAIL_PAGE_URL']?>" title="<?=GetMessage('T_LODIO_MORE')?>"><?
								?><img src="<?=$arItem['PICTURE_SRC'];?>" width="<?=$arItem['PICTURE_WIDTH'];?>" height="<?=$arItem['PICTURE_HEIGHT'];?>" alt="<?=$arItem['NAME'];?>" style="visibility: visible; opacity: 1;"><?
								?></a><?
							?></span><?
						?></div><?
						?><h5><a class="moduleItemTitle" href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME'];?></a></h5><?
						?><p class="b-custom-text"><?=TruncateText($arItem['PREVIEW_TEXT'], 110);?></p><?
					?></div><?
					?><div class="clr"></div><?
				?></li><?		
			}
		?></ul><?
	?></div><?
}