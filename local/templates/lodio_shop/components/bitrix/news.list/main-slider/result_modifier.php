<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach($arResult['ITEMS'] as &$arItemP)
{
	if ($arItemP['PREVIEW_PICTURE']['ID'])
	{
		$arSmallPicture = CFile::ResizeImageGet($arItemP['PREVIEW_PICTURE']['ID'], array('width'=>1400, 'height'=>633), BX_RESIZE_IMAGE_EXACT, true);
		$arItemP['PICTURE_SRC'] = $arSmallPicture['src'];
	}
}