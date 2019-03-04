<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

if ($arResult['SECTIONS'])
{
	?><section class="filter-box"><?
		foreach ($arResult['SECTIONS'] as $arSection)
		{
			?><a href="<?=$arSection['SECTION_PAGE_URL']?>" class="filter__item<?/*?> active<?*/?>"><?=$arSection['NAME']?></a><?		
		}
	?></section><?
}
