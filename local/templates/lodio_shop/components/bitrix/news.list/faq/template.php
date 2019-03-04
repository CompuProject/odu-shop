<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if ($arResult['ITEMS'])
{
	?><div id="itemListLeading" class="b_question"><?
		foreach($arResult['ITEMS'] as $arItem)
		{
			?><div class="K2ItemsRow K2Row-0"><?
				?><div class="itemContainer itemContainerLast" style="width:100.0%;"><?
					?><div class="catItemView groupLeading faqs"><?
						?><div class="catItemHeader"><?
							?><h3 class="catItemTitle"><?=$arItem['NAME'];?></h3><?
						?></div><?
						?><div class="catItemBody"><?
							?><div class="catItemIntroText b-custom-text"><?=$arItem['PREVIEW_TEXT'];?></div><?
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