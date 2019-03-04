<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if (!empty($arResult))
{
	?><div id="itemListLeading"><?
		foreach($arResult['ITEMS'] as $arItem)
		{
			?><div class="K2ItemsRow K2Row-0"><?
				?><div class="itemContainer itemContainerLast" style="width:100.0%;"><?
					?><div class="catItemView groupLeading testimonials"><?
						?><div class="catItemBody"><?
							?><div class="catItemIntroText"><?
								?><p class="b-custom-text"><?=$arItem['PREVIEW_TEXT'];?></p><?
							?></div><?
							?><div class="clr"></div><?
							?><div class="catItemExtraFields"><?
								?><ul><?
									?><li class="author firstItem"><?
										?><b class="catItemExtraFieldsValue"><?=$arItem['NAME'];?></b><?
									?></li><?
								?></ul><?
							?></div><?
						?></div><?
					?></div><?
				?></div><?
			?></div><?		
		}	
	?></div><?	
	if($arParams["DISPLAY_BOTTOM_PAGER"])
	{
		echo $arResult["NAV_STRING"];
	}	
}