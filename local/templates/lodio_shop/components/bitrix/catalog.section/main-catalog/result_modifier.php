<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/*
echo '<pre style="text-align:left;">';
print_r($arResult);
echo '</pre>';
*/
$arSectionIds = Array();
$arResult['PRICES_BY_OFFER'] = Array();
foreach($arResult['ITEMS'] as &$arItemP)
{	
	if (!in_array($arItemP['IBLOCK_SECTION_ID'], $arSectionIds)) $arSectionIds[] = $arItemP['IBLOCK_SECTION_ID'];

	$minDiscountPricePrint = '';
	$minDiscountPrice = '';
	$minPrice = '';
	
	if ($arItemP['OFFERS'])
	{
		$arItemP['OFFERS_COLOR'] = Array();
		$arItemP['OFFERS_SIZES'] = Array();
		$arItemP['OFFERS_SIZES_BY_COLOR'] = Array();
		
		foreach ($arItemP['OFFERS'] as $arOffer)
		{
			$offerDiscountPricePrint = '';
			$offerDiscountPrice = '';
			$offerPrice = '';
			foreach ($arOffer['PRICES'] as $arPrice)
			{
				if (!$offerDiscountPrice)
				{
					$offerDiscountPricePrint = $arPrice['PRINT_DISCOUNT_VALUE'];
					$offerDiscountPrice = $arPrice['DISCOUNT_VALUE'];
					$offerPrice = $arPrice['VALUE'];
				}
				else
				{
					if ($arPrice['DISCOUNT_VALUE'] < $offerDiscountPrice)
					{
						$offerDiscountPricePrint = $arPrice['PRINT_DISCOUNT_VALUE'];
						$offerDiscountPrice = $arPrice['DISCOUNT_VALUE'];
						$offerPrice = $arPrice['VALUE'];						
					}
				}
			}
			
			if (!$minDiscountPrice)
			{
				$minDiscountPricePrint = $offerDiscountPricePrint;
				$minDiscountPrice = $offerDiscountPrice;
				$minPrice = $offerPrice;				
			}
			else
			{
				if ($offerDiscountPrice < $minDiscountPrice)
				{
					$arItemP['DIFF_PRICE'] = true;
					$minDiscountPricePrint = $offerDiscountPricePrint;
					$minDiscountPrice = $offerDiscountPrice;
					$minPrice = $offerPrice;
				}
			}
			
			if ($arOffer['PROPERTIES']['COLOR']['VALUE'] && !in_array($arOffer['PROPERTIES']['COLOR']['VALUE'], $arItemP['OFFERS_COLOR']))
			{
				$arItemP['OFFERS_COLOR'][] = $arOffer['PROPERTIES']['COLOR']['VALUE'];
			}
			if ($arOffer['PROPERTIES']['SIZE']['VALUE'] && !in_array($arOffer['PROPERTIES']['SIZE']['VALUE'], $arItemP['OFFERS_SIZES']))
			{
				$arItemP['OFFERS_SIZES'][] = $arOffer['PROPERTIES']['SIZE']['VALUE'];
			}
			
			if ($arOffer['PROPERTIES']['COLOR']['VALUE'] && $arOffer['PROPERTIES']['SIZE']['VALUE'] && !in_array($arOffer['PROPERTIES']['SIZE']['VALUE'], $arItemP['OFFERS_SIZES_BY_COLOR'][$arOffer['PROPERTIES']['COLOR']['VALUE']]))
			{
				$arItemP['OFFERS_SIZES_BY_COLOR'][$arOffer['PROPERTIES']['COLOR']['VALUE']][] = $arOffer['PROPERTIES']['SIZE']['VALUE'];
			}
			
			$arResult['PRICES_BY_OFFER'][$arOffer['ID']] = Array(
				'PRICE' => $offerPrice,
				'DISCOUNT' => $offerDiscountPricePrint
			);
		}
		
	}
	else
	{
		foreach ($arItemP['PRICES'] as $arPrice)
		{
			if (!$minDiscountPrice)
			{
				$minDiscountPricePrint = $arPrice['PRINT_DISCOUNT_VALUE'];
				$minDiscountPrice = $arPrice['DISCOUNT_VALUE'];
				$minPrice = $arPrice['VALUE'];
			}
			else
			{
				if ($arPrice['DISCOUNT_VALUE'] < $minDiscountPrice)
				{
					$minDiscountPricePrint = $arPrice['PRINT_DISCOUNT_VALUE'];
					$minDiscountPrice = $arPrice['DISCOUNT_VALUE'];
					$minPrice = $arPrice['VALUE'];						
				}
			}
		}		
	}
	$arItemP['MIN_DISCOUNT_PRICE_PRINT'] = $minDiscountPricePrint;
	$arItemP['MIN_DISCOUNT_PRICE'] = $minDiscountPrice;
	$arItemP['MIN_PRICE'] = $minPrice;
		
	if ($arItemP['PREVIEW_PICTURE']['ID'])
	{
		$arSmallPicture = CFile::ResizeImageGet($arItemP['PREVIEW_PICTURE']['ID'], array('width'=>276, 'height'=>300), BX_RESIZE_IMAGE_EXACT, true); 
		$arItemP['PICTURE_SRC'] = $arSmallPicture['src'];
		$arItemP['PICTURE_WIDTH'] = $arSmallPicture['width'];
		$arItemP['PICTURE_HEIGHT'] = $arSmallPicture['height'];
	}
	else
	{
		$arItemP['PICTURE_SRC'] = SITE_TEMPLATE_PATH."/images/no-photo-268-200.png";
		$arItemP['PICTURE_WIDTH'] = '276';
		$arItemP['PICTURE_HEIGHT'] = '300';
	}
	
	// quick view data
	foreach ($arItemP['PROPERTIES']['IMAGES']['VALUE'] as $imgId)
	{
		$arSmallPicture = CFile::ResizeImageGet($imgId, array('width'=>276, 'height'=>300), BX_RESIZE_IMAGE_EXACT, true);
		$arItemP['GALLERY'][] = $arSmallPicture['src'];
	}
	
	//hit - sale - new
	$arPromo = Array();
	if ($arItemP['PROPERTIES']['HIT']['VALUE'] == 'Y') $arPromo[] = 'HIT';
	if ($arItemP['PROPERTIES']['NEW']['VALUE'] == 'Y') $arPromo[] = 'NEW';
	if ($arItemP['PROPERTIES']['SALE']['VALUE'] == 'Y') $arPromo[] = 'SALE';
	$arItemP['PROMO'] = $arPromo;
}

if ($arSectionIds)
{
	$dbSections = CIBlockSection::GetList(Array(), Array('IBLOCK_ID' => $arParams['IBLOCK_ID'], 'ID' => $arSectionIds), false, Array('ID', 'NAME'));
	while ($arSection = $dbSections->Fetch())
	{
		$arResult['SECTIONS'][$arSection['ID']] = $arSection['NAME'];
	}
}
?>