<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if(!empty($arResult['ID']))
{
	?><div class="cont"><?
		?><div id="rt-utility"><?
			?><div class="rt-container"><?
				?><div class="clear"></div><?
			?></div><?
		?></div><?
		?><div id="rt-main" class="mb8-sa4"><?
			?><div class="rt-container"><?
				?><div class="rt-containerInner"><?
					?><div class="rt-grid-12"><?
						?><div class="rt-block"><?
							?><div id="rt-mainbody"><?
								?><div class="component-content"><?                     
									?><span id="startOfPageId69"></span><?
									?><div id="k2Container" class="itemView blog"><?
										?><div class="componentheading blog"><?
											?><h1><?=$arResult['NAME'];?></h1><?
										?></div><?
										?><div class="itemImageBlock project-detail_gallery<?/*if (count ($arResult['SLIDER']) > 4):?> project-detail_gallery-395<?endif*/?>"><?
											if ($arResult['SLIDER'])
											{
												?><div class="b-product__slider"><?
													?><ul class="slider slider-for"><?
														foreach ($arResult['SLIDER'] as $arSlide)
														{
															?><li><?
																?><a class="touch" href="<?=$arSlide['ORIGINAL'];?>"><?
																	?><img src="<?=$arSlide['BIG'];?>" alt="<?=$arResult['NAME']?>" width="<?=$arResult['PICTURE_WIDTH']?>" height="<?=$arResult['PICTURE_HEIGHT']?>"><?
																?></a><?
															?></li><?
														}
													?></ul><?
													?><ul class="slider slider-nav"><?
														foreach ($arResult['SLIDER'] as $arSlide)
														{
															?><li><img src="<?=$arSlide['SMALL'];?>" alt="<?=$arResult['NAME']?>"></li><?
														}
													?></ul><?								
												?></div><?
											}
											?><div class="clr"></div><?
										?></div><?					
										?><div class="itemBody"><?
											$noProps = true;
											foreach ($arResult['PROPERTIES'] as $arProperty)
											{
												if (!in_array($arProperty['CODE'], Array('DATE', 'IMAGES')) && $arProperty['PROPERTY_TYPE'] == 'S')
												{
													if ($noProps)
													{
														?><div class="itemProperties"><?								
																?><ul class="b_element-props"><?														
													}
													if (is_array($arProperty['VALUE']))
													{
														$resultValue = implode(', ', $arProperty['VALUE']);
														$arProperty['VALUE'] = $resultValue;
													}
													?><li class="b_element-props__item"><span class="b_element-props__item-name"><?=$arProperty['NAME']?>:</span><span class="b_element-props__item-value"><?=$arProperty['VALUE']?></span></li><?
													$noProps = false;
												}											
											}	
											if (!$noProps)
											{
														?></ul><?
												?></div><?
											}											
											?><div class="itemIntroText"><?								
												?><p class="b-custom-text"><?=$arResult['PREVIEW_TEXT']?></p><?
											?></div><?
											?><div class="itemFullText"><?
												?><p class="b-custom-text"><?=$arResult['DETAIL_TEXT'];?></p><?
											?></div><?
										?></div><?				
									?></div><?
								?></div><?
							?></div><?
						?></div><?
					?></div><?
					?><div class="clear"></div><?
				?></div><?
			?></div><?
		?></div><?
	?></div><?	
}