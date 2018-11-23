<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arResult['TREE_ITEMS'] = Array();
$currentDepth1Id = '';
$currentDepth2Id = '';
foreach ($arResult as $key => $arItem)
{
	switch($arItem['DEPTH_LEVEL'])
	{
		case '1':
			$arResult['TREE_ITEMS'][$key] = Array();
			$currentDepth1Id = $key;
			$currentDepth2Id = '';
			break;
		case '2':
			$arResult['TREE_ITEMS'][$currentDepth1Id][$key] = Array();
			$currentDepth2Id = $key;
			break;
		case '3':
			$arResult['TREE_ITEMS'][$currentDepth1Id][$currentDepth2Id][$key] = Array();
			break;
	}
}