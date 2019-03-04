<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
if (!empty($arResult))
{
	$catalogName = $arResult['NAME'] ? $arResult['NAME'] : GetMessage("T_LODIO_CATALOG_NAME");
	if ($arParams['CATALOG_TEMPLATE'] == 'Y'):
	$this->SetViewTarget('section_name');
		echo $catalogName;
	$this->EndViewTarget();
	?><div class="catalog__items cd-items cd-container b-items"><?	
	else:
	?><div class="popular__items cd-items cd-container b-items"><?
	endif;
		foreach($arResult['ITEMS'] as $arItem)
		{
			if ($arParams['CATALOG_TEMPLATE'] == 'Y'):
			?><div class="item col-md-3 col-sm-4 col-xs-6 cd-item" id="product-<?=$arItem['ID']?>"><?
			else:
			?><div class="item col-md-3 col-sm-4 col-xs-6 cd-item" id="product-<?=$arItem['ID']?>"><?
			endif;
				?><div class="item-wrapper"><?
					?><a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="item__img-link"><?
						?><img src="<?=$arItem['PICTURE_SRC']?>" alt="<?=$arItem['NAME'];?>" class="item__img item__pic"><?
						foreach ($arItem['GALLERY'] as $imageUrl)
						{
							?><img src="<?=$imageUrl?>" alt="<?=$arItem['NAME'];?>" class="qw-image" style="display:none;"><?
						}
					?></a><?
					?><div class="item_inner-wrapper"><?
						?><span class="item__sect"><?=$arResult['SECTIONS'][$arItem['IBLOCK_SECTION_ID']]?></span><?
						?><a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="item__title"><?=$arItem['NAME'];?></a><?
						$priceString = '<div class="item__price">';
						if ($arItem['MIN_PRICE'] > $arItem['MIN_DISCOUNT_PRICE'])
						{
							$priceString .= '<span class="item__price-old">' . $arItem['MIN_PRICE'] . '</span>';
						}				
						$priceString .= '<span class="item__price-cur">' . $arItem['MIN_DISCOUNT_PRICE_PRINT'] . '</span>';
						$priceString .= '</div>';
						
						$promoMargin = 5;
						foreach ($arItem['PROMO'] as $key => $promo)
						{	
							if ($key != 0) $promoMargin = $promoMargin + 27;
							?><div class="<?=strtolower($promo)?>-label" style="left: <?=$promoMargin?>px;"><span><?echo GetMessage("T_LODIO_" . $promo)?></span></div><?	
						}
						
						echo $priceString;
					?></div><?
					?><div class="item-hidden"><?
						$propString = '';
						foreach ($arParams['QUICK_VIEW_PROPERTIES'] as $propCode)
						{
							if ($arItem['PROPERTIES'][$propCode]['VALUE'])
							{
								$propString .= '<span>' . $arItem['PROPERTIES'][$propCode]['NAME'] . '</span>: ' . $arItem['PROPERTIES'][$propCode]['VALUE'] . '<br>';
							}
						}
						?><a href="#1" 
							data-name="<?=$arItem['NAME'];?>" 
							data-description="<?=htmlspecialchars($arItem['PREVIEW_TEXT']);?>" <?//fix ?>
							data-properties="<?=$propString?>" 
							data-price='<?=$priceString?>' 
							data-url="<?=$arItem['DETAIL_PAGE_URL']?>" 
							class="cd-trigger"><?echo GetMessage("T_LODIO_QUICK_VIEW")?></a><?
					?></div><?
				?></div><?
			?></div><?
		}
	?><div class="cd-quick-view"><?
		?><div class="cd-slider-wrapper"><?
			?><ul class="cd-slider"><?
			?></ul><?
			?><ul class="cd-slider-navigation"><?
				?><li><a href="#0" class="cd-next"><?echo GetMessage("T_LODIO_BEFORE")?></a></li><?
				?><li><a href="#0" class="cd-prev"><?echo GetMessage("T_LODIO_AFTER")?></a></li><?
			?></ul><?
		?></div><?
		?><div class="cd-item-info"><?
			?><h2><?echo GetMessage("T_LODIO_PRODUCT_NAME")?></h2><?
			?><p class="qw-description"></p><?
			?><p class="qw-properties"></p><?
			?><p class="qw-price"></p><?
			?><a class="qw-price-url" href=""><?echo GetMessage("T_LODIO_SHOW_MORE")?></a><?
		?></div><?
		?><a href="#0" class="cd-close"><?echo GetMessage("T_LODIO_CLOSE")?></a><?
	?></div><?				
	if ($arParams["DISPLAY_BOTTOM_PAGER"])
	{
		?><? echo $arResult["NAV_STRING"]; ?><?		
	}
	
	if ($arResult['DESCRIPTION'])
	{
		?><div class="catalog-section-description"><?=$arResult['DESCRIPTION']?></div><?
	}
	
	?></div><?
}	