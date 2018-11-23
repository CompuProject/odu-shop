<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arParams
 * @var array $arResult
 * @var SaleOrderAjax $component
 */

$component = $this->__component;
$component::scaleImages($arResult['JS_DATA'], $arParams['SERVICES_IMAGES_SCALING']);

$arResult['ORDER_PROP']['ALL'] = array_merge($arResult['ORDER_PROP']['USER_PROPS_N'], $arResult['ORDER_PROP']['USER_PROPS_Y']);

$arSorts = Array();
foreach ($arResult['ORDER_PROP']['ALL'] as $key => $arField) {
	$arSorts[$key] = $arField['SORT'];
}

asort($arSorts);
$arTmpFields = Array();
foreach ($arSorts as $key => $sort)
{
	$arTmpFields[$key] = $arResult['ORDER_PROP']['ALL'][$key];
}

$arResult['ORDER_PROP']['ALL'] = $arTmpFields;

echo '<pre>';
print_r($arResult['DELIVERY']);
echo '</pre>';

echo '<pre>';
print_r($arResult['PAY_SYSTEM']);
echo '</pre>';