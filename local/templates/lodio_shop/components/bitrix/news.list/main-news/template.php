<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if (!empty($arResult))
{	?><div class="container"><?
		?><section class="articles row"><?
			?><div class="articles__title decor-title"><?echo GetMessage("T_LODIO_LASTNEWS")?></div><?
			foreach($arResult['ITEMS'] as $arItem)
			{
				?><div class="articles__item col-sm-4"><?
					?><a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="articles__link"><?
						?><img src="<?=$arItem['PICTURE_SRC'];?>" alt="aloha" class="articles__img"><?
						?><div class="articles__caption"><?
							?><p><?=$arItem['NAME'];?></p><?						
							?><span><?echo date('d.m.Y', strtotime($arItem['DATE_CREATE']));?></span><?						
						?></div><?
					?></a><?
				?></div><?
			}			
		?></section><?
	?></div><?
}?>