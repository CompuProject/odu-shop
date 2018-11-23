<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if (!empty($arResult))
{
	?><ul><?
		foreach($arResult['ITEMS'] as $arItem)
		{
		?><li class="even"><?
			?><div class="catItemImageBlock image-wrapper__div"><?
				?><span class="catItemImage image-wrapper"><?
					?><a class="moduleItemImage" href="<?=$arItem['DETAIL_PAGE_URL']?>" title="&quot;<?=$arItem['NAME'];?>&quot;"><?
						if ($arItem['PICTURE_SRC'])
						{
							?><img src="<?=$arItem['PICTURE_SRC'];?>" width="<?=$arItem['PICTURE_WIDTH'];?>" height="<?=$arItem['PICTURE_HEIGHT'];?>" alt="<?=$arItem['NAME'];?>"/><?							
						}
					?></a><?
				?></span><?
			?></div><?
			?><div class="moduleItemIntrotext"><?
				?><h4><a class="moduleItemTitle" href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME'];?></a></h4><?
				if ($arItem['PROPERTIES']['POSITION']['VALUE'])
				{
					?><h6><?=$arItem['PROPERTIES']['POSITION']['VALUE'];?></h6><?					
				}
				if ($arItem['PREVIEW_TEXT'])
				{
					?><p class="b-custom-text"><?=TruncateText($arItem['PREVIEW_TEXT'], 370);?></p><?
				}
				if ($arItem['PROPERTIES']['PHONE']['VALUE'])
				{
					?><p><?echo GetMessage("T_LODIO_PHONE")?><?=$arItem['PROPERTIES']['PHONE']['VALUE'];?></p><?
				}
				if ($arItem['PROPERTIES']['EMAIL']['VALUE'])
				{
					?><p><?echo GetMessage("T_LODIO_EMAIL")?><a href="mailto:<?=$arItem['PROPERTIES']['EMAIL']['VALUE'];?>"><?=$arItem['PROPERTIES']['EMAIL']['VALUE'];?></a></p>		<?										
				}
			?></div><?
			?><div class="clr"></div><?
		?></li><?
		}
	?></ul><?
}?>