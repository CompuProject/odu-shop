<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
if (!empty($arResult))
{
	?><nav class="nav"><?
		?><ul class="nav__list"><?
			foreach($arResult['TREE_ITEMS'] as $key1 => $arItems2)
			{
				?><li class="nav__item"><?
					?><a href="<?=$arResult[$key1]["LINK"]?>" class="nav__link"><?=$arResult[$key1]["TEXT"]?></a><?
					if (count($arItems2) > 0)
					{
						?><div class="nav__submenu"><?
							?><div class="nav__submenu-inner container"><?
								?><ul><?
								foreach ($arItems2 as $key2 => $arItems3)
								{
									?><li><?
										?><a href="<?=$arResult[$key2]["LINK"]?>" class="nav__link"><?=$arResult[$key2]["TEXT"]?></a><?
									?></li><?
								}		
								?></ul><?
							?></div><?
						?></div><?						
					}
				?></li><?
			}
		?></ul><?
	?></nav><?	
}