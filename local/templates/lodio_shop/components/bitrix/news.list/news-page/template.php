<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

		?><h1 class="title decor-title"><span><?=GetMessage("T_LODIO_OUR")?></span><span><?=GetMessage("T_LODIO_NEWS")?></span></h1><?
		?><div id="mix-container" class="row"><?
			foreach($arResult['ITEMS'] as $arItem)
			{
				?><div class="mix col-md-4 col-sm-6 blog__item"><?
					?><span class="blog__date"><?echo date('d.m.Y', strtotime($arItem['DATE_CREATE']));?></span><?
					?><a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="blog__pic"><img src="<?=$arItem['PICTURE_SRC'];?>" alt="aloha"></a><?
					?><a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="blog__title"><?=$arItem['NAME'];?></a><?
					?><p class="blog__description"><?=TruncateText($arItem['PREVIEW_TEXT'], 240);?></p><?					
				?></div><?
			}			
		?></div><?		