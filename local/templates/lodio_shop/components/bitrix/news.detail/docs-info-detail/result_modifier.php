<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
foreach($arResult['ITEMS'] as &$arItemP)
{	
	$arItemP['PREVIEW_TEXT'] = $arItemP['PREVIEW_TEXT'] ? $arItemP['PREVIEW_TEXT'] : $arItemP['DETAIL_TEXT'];
		
	if ($arItemP['PREVIEW_PICTURE']['ID'])
	{
		$arSmallPicture = CFile::ResizeImageGet($arItemP['PREVIEW_PICTURE']['ID'], array('width'=>46, 'height'=>31), BX_RESIZE_IMAGE_EXACT, true); 
		$arItemP['PICTURE_SRC'] = $arSmallPicture['src'];	
		$arItemP['PICTURE_WIDTH'] = $arSmallPicture['width'];
		$arItemP['PICTURE_HEIGHT'] = $arSmallPicture['height'];
	}
	else
	{
		$arItemP['PICTURE_SRC'] = SITE_TEMPLATE_PATH."/images/no-photo-46-31.png";	
		$arItemP['PICTURE_WIDTH'] = '46';
		$arItemP['PICTURE_HEIGHT'] = '31';		
	}
}
?>