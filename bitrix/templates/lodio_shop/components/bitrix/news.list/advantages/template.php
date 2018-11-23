<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if (!empty($arResult))
{
	?><div class="k2ItemsBlock choose_us dropcap"><?
		?><ul><?
			foreach($arResult['ITEMS'] as $key => $arItem)
			{
				?><li class="firstItem"><?
					?><div class="moduleItemIntrotext"><?
						?><span class="dropcap"><?=sprintf("%02d", $key+1)?></span><?
						?><h4><span class="moduleItemTitle"><?=$arItem['NAME'];?></span></h4><?
						?><p class="b-custom-text"><?=$arItem['PREVIEW_TEXT']?></p><?
					?></div><?
				?></li><?				
			}	
		?></ul><?
	?></div><?
}