<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if (!empty($arResult))
{
	?><div class="itemList b_team"><?
		?><div id="itemListPrimary"><?
			?><div class="K2ItemsRow"><?
				foreach($arResult['ITEMS'] as $arItem)
				{
					?><div class="itemContainer" style="width:33.3%;"><?
						?><div class="catItemView groupPrimary team"><?
							?><div class="catItemImageBlock"><?
								?><span class="catItemImage image-wrapper"><?
									?><a href="<?=$arItem['DETAIL_PAGE_URL']?>" title="<?=$arItem['NAME'];?>"><?
										?><img src="<?=$arItem['PICTURE_SRC'];?>" width="<?=$arItem['PICTURE_WIDTH'];?>" height="<?=$arItem['PICTURE_HEIGHT'];?>" alt="<?=$arItem['NAME'];?>" style="visibility: visible; opacity: 1;"><?
									?></a>	<?
								?></span><?
								?><div class="clr"></div><?
							?></div><?
							?><div class="catItemHeader"><?
								?><h3 class="catItemTitle"><?
									?><a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME'];?></a><?
								?></h3><?
							?></div><?
							?><div class="catItemBody"><?
								?><div class="catItemIntroText"><?
									?><p class="b-custom-text"><?=TruncateText($arItem['PREVIEW_TEXT'], 310);?></p><?
								?></div><?
								?><div class="clr"></div><?
							?></div><?
							?><div class="clr"></div><?				
						?></div><?
						?><div class="clr"></div><?
					?></div><?				
				}	
				?><div class="clr"></div><?
			?></div><?			
		?></div><?
		?><div class="clr"></div><?
	?></div><?
	if($arParams["DISPLAY_BOTTOM_PAGER"])
	{
		echo $arResult["NAV_STRING"];
	}
}