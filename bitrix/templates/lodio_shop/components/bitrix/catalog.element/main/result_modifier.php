<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

$previewPictureId = $arResult['DETAIL_PICTURE']['ID'] ? $arResult['DETAIL_PICTURE']['ID'] : $arResult['PREVIEW_PICTURE']['ID'];

if ($previewPictureId)
{
	$arSmallPicture = CFile::ResizeImageGet($previewPictureId, array('width'=>565, 'height'=>565), BX_RESIZE_IMAGE_EXACT, true); 
	$arThumbPicture = CFile::ResizeImageGet($previewPictureId, array('width'=>100, 'height'=>100), BX_RESIZE_IMAGE_EXACT, true); 
	$arResult['GALLERY'][] = $arSmallPicture['src'];
	$arResult['GALLERY_THUMB'][] = Array(
		'IMG' => $arSmallPicture['src'],
		'THUMB' => $arThumbPicture['src']
	);
}
foreach ($arResult['PROPERTIES']['IMAGES']['VALUE'] as $imgId)
{
	$arSmallPicture = CFile::ResizeImageGet($imgId, array('width'=>565, 'height'=>565), BX_RESIZE_IMAGE_EXACT, true);
	$arThumbPicture = CFile::ResizeImageGet($imgId, array('width'=>100, 'height'=>100), BX_RESIZE_IMAGE_EXACT, true); 
	$arResult['GALLERY'][] = $arSmallPicture['src'];
	$arResult['GALLERY_THUMB'][] = Array(
		'IMG' => $arSmallPicture['src'],
		'THUMB' => $arThumbPicture['src']
	);
}
if (!$arResult['GALLERY'])
{
	$arResult['GALLERY'][] = SITE_TEMPLATE_PATH."/images/no-photo-453-335.png";
	$arResult['GALLERY_THUMB'][] = Array(
		'IMG' => SITE_TEMPLATE_PATH."/images/no-photo-453-335.png",
		'THUMB' => SITE_TEMPLATE_PATH."/images/no-photo-453-335.png"
	);
}

// get offers
$minDiscountPricePrint = '';
$minDiscountPrice = '';
$minPrice = '';
$arResult['OFFERS_COLOR'] = Array();
$arResult['OFFERS_SIZES'] = Array();
$arResult['OFFERS_SIZES_BY_COLOR'] = Array();
$arResult['PRICES_BY_OFFER'] = Array();

if ($arResult['OFFERS'])
{
	foreach ($arResult['OFFERS'] as $offerKey => $arOffer)
	{
		if (!$arOffer['CAN_BUY'])
		{
			unset($arResult['OFFERS'][$offerKey]);
			continue;
		}
		
		if ($arOffer['PROPERTIES']['COLOR']['VALUE'] && !in_array($arOffer['PROPERTIES']['COLOR']['VALUE'], $arResult['OFFERS_COLOR']))
		{
			$arResult['OFFERS_COLOR'][] = $arOffer['PROPERTIES']['COLOR']['VALUE'];
		}
		if ($arOffer['PROPERTIES']['SIZE']['VALUE'] && !in_array($arOffer['PROPERTIES']['SIZE']['VALUE'], $arResult['OFFERS_SIZES']))
		{
			$arResult['OFFERS_SIZES'][] = $arOffer['PROPERTIES']['SIZE']['VALUE'];
		}
		
		if ($arOffer['PROPERTIES']['COLOR']['VALUE'] && $arOffer['PROPERTIES']['SIZE']['VALUE'] && !in_array($arOffer['PROPERTIES']['SIZE']['VALUE'], $arResult['OFFERS_SIZES_BY_COLOR'][$arOffer['PROPERTIES']['COLOR']['VALUE']]))
		{
			$arResult['OFFERS_SIZES_BY_COLOR'][$arOffer['PROPERTIES']['COLOR']['VALUE']][] = $arOffer['PROPERTIES']['SIZE']['VALUE'];
		}
		
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
				$arResult['DIFF_PRICE'] = true;
				$minDiscountPricePrint = $offerDiscountPricePrint;
				$minDiscountPrice = $offerDiscountPrice;
				$minPrice = $offerPrice;
			}
		}
		
		$arResult['PRICES_BY_OFFER'][$arOffer['ID']] = Array(
			'PRICE' => $offerPrice,
			'DISCOUNT' => $offerDiscountPricePrint
		);
	}
}
else
{
	foreach ($arResult['PRICES'] as $arPrice)
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

$arResult['MIN_DISCOUNT_PRICE_PRINT'] = $minDiscountPricePrint;
$arResult['MIN_DISCOUNT_PRICE'] = $minDiscountPrice;
$arResult['MIN_PRICE'] = $minPrice;

//get preview & next element

$dbElements = CIBlockElement::GetList(Array('ID' => 'DESC'), Array(
		'IBLOCK_ID' => $arParams['IBLOCK_ID'],
		'SECTION_ID' => $arResult['IBLOCK_SECTION_ID'],
		'ACTIVE' => 'Y',
		'SECTION_GLOBAL_ACTIVE' => 'Y'
	),
	false, 
	Array('nPageSize' => 1, 'nElementID' => $arResult['ID']),
	Array('ID', 'NAME', 'DETAIL_PAGE_URL')
);
$arResult['PREVIEW_NEXT'] = Array();
$peview = true;
while ($arElement = $dbElements->GetNext())
{
	if ($arElement['ID'] == $arResult['ID']) $peview = false;
	if ($arElement['ID'] != $arResult['ID'])
	{
		if ($peview)
		{
			$arResult['PREVIEW_NEXT']['NEXT'] = $arElement['DETAIL_PAGE_URL'];
		}
		else
		{
			$arResult['PREVIEW_NEXT']['PREVIEW'] = $arElement['DETAIL_PAGE_URL'];
		}
	}
}

//get section info
if ($arResult['IBLOCK_SECTION_ID'])
{
	$dbSection = CIBlockSection::GetByID($arResult['IBLOCK_SECTION_ID']);
	$arResult['SECTION_DATA'] = $dbSection->GetNext();
}

$cp = $this->__component;
if (is_object($cp))
{
    // добавим в arResult компонента два поля - MY_TITLE и IS_OBJECT
    $cp->arResult['TEMPLATE_DATA'] = '';
    $cp->SetResultCacheKeys(array('TEMPLATE_DATA'));

}