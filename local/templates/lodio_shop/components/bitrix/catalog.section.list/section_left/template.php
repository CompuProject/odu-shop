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
	$previewDepthLevel = '';
	?><div class="catalog__filter-title"><?echo GetMessage("T_LODIO_CATALOG_CATEGORY")?></div><?
	?><div class="filter-box-left"><?
		?><ul><?
		foreach ($arResult['SECTIONS'] as $key => $arSection)
		{
			switch($arSection['DEPTH_LEVEL'])
			{
				case '1':
					if ($previewDepthLevel == '1')
					{
						?></li><?					
					}
					if ($previewDepthLevel == '2')
					{
								?></li><?
							?></ul><?
						?></li><?
					}
					if ($previewDepthLevel == '3')
					{
										?></li><?
									?></ul><?
								?></li><?
							?></ul><?
						?></li><?						
					}
					break;
				case '2':
					if ($previewDepthLevel == '1')
					{
						?><ul style="display:none;"><?
					}
					if ($previewDepthLevel == '2')
					{
						?></li><?						
					}
					if ($previewDepthLevel == '3')
					{
								?></li><?
							?></ul><?
						?></li><?					
					}
					break;
				case '3':
					if ($previewDepthLevel == '2')
					{
						?><ul style="display:none;"><?						
					}
					if ($previewDepthLevel == '3')
					{
						?></li><?					
					}
					break;
			}
			?><li><?
			if ($arSection['DEPTH_LEVEL'] == 1)
			{
				?><span><?
			}
			if ($arResult['SECTIONS'][$key+1] && $arSection['DEPTH_LEVEL'] < $arResult['SECTIONS'][$key+1]['DEPTH_LEVEL'])
			{
				?><span class="open-menu-list">+</span><?
			}
			?><a href="<?=$arSection['SECTION_PAGE_URL']?>" class="filter-box-left__item<?if ($arSection['ID'] == $arParams['CURRENT_ID']):?> c-selected<?endif?>"><?=$arSection['NAME']?> (<?=$arSection['ELEMENT_CNT']?>)</a><?	
			if ($arSection['DEPTH_LEVEL'] == 1)
			{
				?></span><?
			}			
			$previewDepthLevel = $arSection['DEPTH_LEVEL'];
		}
		switch($previewDepthLevel)
		{
			case '2':
					?></li><?
				?></ul><?				
				break;
			case '3':
							?></li><?
						?></ul><?
					?></li><?
				?></ul><?
				break;
		}
			?></li><?
		?></ul><?
	?></div><?
	?>
	<script>
		$(document).ready(function(){
			$('.open-menu-list').click(function(){
				$(this).toggleClass('open-menu-list__open');
				if ($(this).hasClass('open-menu-list__open'))
				{
					$(this).text('-');
				}
				else
				{
					$(this).text('+');
				}
				$(this).closest('li').children('ul').toggle();
				return false;
			})
			
			$('.filter-box-left__item.c-selected').parents('ul').each(function(){
				$(this).css('display', 'block');
				$(this).siblings('.open-menu-list').addClass('open-menu-list__open');
				$(this).siblings('.open-menu-list').text('-');
			})
			
			$('.filter-box-left__item.c-selected').siblings('span').click();
			
		})
	</script>
	<?
}
