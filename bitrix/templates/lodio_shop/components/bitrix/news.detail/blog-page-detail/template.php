<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if(!empty($arResult['ID']))
{
	?><div class="container product"><?
		?><div class="row"><?
			?><div class="col-md-6"><?
				?><div class="product__slider"><?
					?><img src="<?=$arResult['PICTURE_SRC'];?>" alt="aloha"><?
				?></div><?
			?></div><?
			?><div class="col-md-6 product__main"><?
				?><div class="blognews product__info"><?
					?><span class="product__manufacturer"><?=$arResult['PREVIEW_TEXT']?></span><?
					?><h1 class="title decor-title"><?=$arResult['NAME'];?></h1><?
					?><p class="product__text"><?=$arResult['DETAIL_TEXT'];?></p><?
				?></div><?
			?></div><?
		?></div><?
	?></div><?	
}?>