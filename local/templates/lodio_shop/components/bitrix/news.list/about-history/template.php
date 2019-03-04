<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if (!empty($arResult))
{
	?><div class="itemList b_history"><?
		?><div id="itemListPrimary"><?
			?><div class="K2ItemsRow"><?
				foreach($arResult['ITEMS'] as $arItem)
				{
					?><div class="itemContainer itemContainerLast" style="width:50.0%;"><?
						?><div class="catItemView groupPrimary history"><?
							?><div class="catItemHeader"><?
								?><h3 class="catItemTitle"><?
									?><a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME'];?></a><?
								?></h3><?
							?></div><?
							?><div class="catItemBody"><?
								?><div class="catItemIntroText"><?
									?><p class="b-custom-text"><?=$arItem['PREVIEW_TEXT'];?></p><?
								?></div><?
							?></div><?
						?></div><?
						?><div class="clr"></div><?
					?></div><?			
				}					
			?></div><?
		?></div><?
		?><div class="clr"></div><?
	?></div><?
}