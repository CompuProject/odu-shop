<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if ($arResult['PREVIEW_PICTURE']['ID'])
{
	$arSmallPicture = CFile::ResizeImageGet($arResult['PREVIEW_PICTURE']['ID'], array('width'=>565, 'height'=>565), BX_RESIZE_IMAGE_EXACT, true); 
	$arResult['PICTURE_SRC'] = $arSmallPicture['src'];	
	$arResult['PICTURE_WIDTH'] = $arSmallPicture['width'];
	$arResult['PICTURE_HEIGHT'] = $arSmallPicture['height'];
}

?>