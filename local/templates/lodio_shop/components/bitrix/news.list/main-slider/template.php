<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

?><section class="slider"><?
	foreach($arResult['ITEMS'] as $arItem)
	{
		if ($arItem['PICTURE_SRC'])
		{			
			?><div class="slider__item"><?
				?><img src="<?=$arItem['PICTURE_SRC'];?>" alt="aloha" class="slider__img"><?
				?><div class="slider__caption"><?
					if ($arItem['PREVIEW_TEXT'])
					{
						?><span class="slider__text"><?=$arItem['PREVIEW_TEXT'];?></span><?
					}
					if ($arItem['DETAIL_TEXT'])
					{
						?><span class="slider__title"><?=$arItem['DETAIL_TEXT'];?></span><?
					}
					if ($arItem['PROPERTIES']['ALOHA_SLIDER_URL']['VALUE'] && $arItem['PROPERTIES']['ALOHA_SLIDER_TEXT']['VALUE'])
					{
						?><a href="<?=$arItem['PROPERTIES']['ALOHA_SLIDER_URL']['VALUE'];?>" class="btn-black"><?=$arItem['PROPERTIES']['ALOHA_SLIDER_TEXT']['VALUE'];?></a><?
					}
				?></div><?		
			?></div><?			
		}
	}
?></section><?