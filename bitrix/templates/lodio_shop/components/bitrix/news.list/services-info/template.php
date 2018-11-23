<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

?><div id="k2ModuleBox150" class="k2ItemsBlock services"><?
    ?><ul><?
        foreach($arResult['ITEMS'] as $arItem)
		{
			?><li><?
				?><div class="catItemImageBlock"><?
					?><span class="catItemImage image-wrapper"><?
						?><a class="moduleItemImage" href="<?=$arItem['DETAIL_PAGE_URL']?>" title="<?echo GetMessage("T_LODIO_MORE")?>"><?
							?><img src="<?=$arItem['PICTURE_SRC'];?>" width="<?=$arItem['PICTURE_WIDTH'];?>" height="<?=$arItem['PICTURE_HEIGHT'];?>" alt="<?=$arItem['NAME']?>" style="visibility: visible; opacity: 1;"><?
						?></a><?
					?></span><?
				?></div><?
				?><div class="moduleItemIntrotext"><?
					?><h4><a class="moduleItemTitle" href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME'];?></a></h4><?
					?><p class="b-custom-text"><?=TruncateText($arItem['PREVIEW_TEXT'], 110);?></p><?
				?></div><?
				?><div class="clr"></div><?
			?></li><?
		}
    ?></ul><?
?></div><?