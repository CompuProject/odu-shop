<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

		?><h1 class="title decor-title"><span><?=GetMessage("T_LODIO_OUR")?></span><span><?=GetMessage("T_LODIO_BLOG")?></span></h1><?
		?><section class="filter-box blog__filter"><a href="#" data-filter="all" class="filter filter__item active"><?=GetMessage("T_LODIO_ALLCATEGORIES")?></a><a href="#" data-filter=".category-1" class="filter filter__item"><?=GetMessage("T_LODIO_SORT_CAT_1")?></a><a href="#" data-filter=".category-2" class="filter filter__item"><?=GetMessage("T_LODIO_SORT_CAT_2")?></a><a href="#" data-filter=".category-3" class="filter filter__item"><?=GetMessage("T_LODIO_SORT_CAT_3")?></a><a href="#" data-filter=".category-4" class="filter filter__item"><?=GetMessage("T_LODIO_SORT_CAT_4")?></a><a href="#" data-filter=".category-5" class="filter filter__item"><?=GetMessage("T_LODIO_SORT_CAT_5")?></a></section><?
		?><div id="mix-container" class="row"><?
			foreach($arResult['ITEMS'] as $arItem)
			{
				?><div class="mix category-<?=$arItem['PROPERTIES']['ALOHA_BLOG_CATEGORY']['VALUE_SORT']?> col-md-4 col-sm-6 blog__item"><?
					?><span class="blog__date"><?echo date('d.m.Y', strtotime($arItem['DATE_CREATE']));?></span><?
					?><a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="blog__pic"><img src="<?=$arItem['PICTURE_SRC'];?>" alt="aloha"></a><?
					?><a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="blog__title"><?=$arItem['NAME'];?></a><?
					?><p class="blog__description"><?=TruncateText($arItem['PREVIEW_TEXT'], 240);?></p><?					
				?></div><?
			}			
		?></div><?		