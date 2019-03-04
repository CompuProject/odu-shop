<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

	$arResult['PREVIEW_TEXT'] = $arResult['PREVIEW_TEXT'] ? $arResult['PREVIEW_TEXT'] : $arResult['DETAIL_TEXT'];
		
	if ($arResult['PREVIEW_PICTURE']['ID'])
	{
		$arSmallPicture = CFile::ResizeImageGet($arResult['PREVIEW_PICTURE']['ID'], array('width'=>280, 'height'=>280), BX_RESIZE_IMAGE_EXACT, true); 
		$arResult['PICTURE_SRC'] = $arSmallPicture['src'];	
		$arResult['PICTURE_WIDTH'] = $arSmallPicture['width'];
		$arResult['PICTURE_HEIGHT'] = $arSmallPicture['height'];
	}

?>