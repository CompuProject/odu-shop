<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
foreach($arResult['ITEMS'] as &$arItemP)
{	
	$arItemP['PREVIEW_TEXT'] = $arItemP['PREVIEW_TEXT'] ? $arItemP['PREVIEW_TEXT'] : $arItemP['DETAIL_TEXT'];	
}
?>