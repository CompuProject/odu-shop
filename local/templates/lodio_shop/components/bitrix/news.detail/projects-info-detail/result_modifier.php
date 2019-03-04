<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
	
	$arSlider = Array();
	$arResult['PICTURE_WIDTH'] = '';
	$arResult['PICTURE_HEIGHT'] = '';
	if ($arResult['PREVIEW_PICTURE']['ID'])
	{
		$arSmallPicture = CFile::ResizeImageGet($arResult['PREVIEW_PICTURE']['ID'], array('width'=>340, 'height'=>300), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
		$arResult['PICTURE_SRC'] = $arSmallPicture['src'];	
		$arResult['PICTURE_WIDTH'] = $arSmallPicture['width'];
		$arResult['PICTURE_HEIGHT'] = $arSmallPicture['height'];
		
		$arTmb = CFile::ResizeImageGet($arResult['PREVIEW_PICTURE']['ID'], array('width'=>100, 'height'=>100), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
		$arSlider[] = Array(
			'BIG' => $arSmallPicture['src'],
			'SMALL' => $arTmb['src'],
			'ORIGINAL' => $arResult['PREVIEW_PICTURE']['SRC']
		);
	}
	//340
	if ($arResult['PROPERTIES']['IMAGES']['VALUE'])
	{
		foreach ($arResult['PROPERTIES']['IMAGES']['VALUE'] as $imageId)
		{
			$arSmallPicture = CFile::ResizeImageGet($imageId, array('width'=>340, 'height'=>300), BX_RESIZE_IMAGE_PROPORTIONAL, true);
			if (!$arResult['PICTURE_WIDTH'] && !$arResult['PICTURE_HEIGHT'])
			{
				$arResult['PICTURE_WIDTH'] = $arSmallPicture['width'];
				$arResult['PICTURE_HEIGHT'] = $arSmallPicture['height'];				
			}
			$arTmb = CFile::ResizeImageGet($imageId, array('width'=>100, 'height'=>100), BX_RESIZE_IMAGE_PROPORTIONAL, true);
			$arSlider[] = Array(
				'BIG' => $arSmallPicture['src'],
				'SMALL' => $arTmb['src'],
				'ORIGINAL' => CFile::GetPath($imageId)
			);
		}
	}
	$arResult['SLIDER'] = $arSlider;
?>