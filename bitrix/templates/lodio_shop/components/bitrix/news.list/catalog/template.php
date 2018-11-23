<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>

<?if (!empty($arResult)):?>
	<?//Постраничная навигация сверху?>
	<?if($arParams["DISPLAY_TOP_PAGER"]):?>
		<div class="k2Pagination num pagenav" style="">
			<?$buttonsNavigation = $arResult['NAV_STRING'];?>
			<?$buttonsNavigation =str_replace("|", " ", "$buttonsNavigation");?>				
			<?$buttonsNavigation =str_replace("<b>", "<li class=\"num\"><span class=\"pagenav\">", "$buttonsNavigation");?>		
			<?$buttonsNavigation =str_replace("</b>", "</span></li>", "$buttonsNavigation");?>
			<?$buttonsNavigation =str_replace("<a href=", "<li class=\"num\"><a class=\"pagenav\" href=", "$buttonsNavigation");?>
			<?$buttonsNavigation =str_replace("</a>", "</a></li>", "$buttonsNavigation");?>
			<?$buttonsNavigation =str_replace("font class=\"text\"", "font class=\"pagenav\"", "$buttonsNavigation");?>
			<?$buttonsNavigation =str_replace("<font", "<div", "$buttonsNavigation");?>
			<?$buttonsNavigation =str_replace("/font", "/div", "$buttonsNavigation");?>		
			<?$buttonsNavigation =str_replace("След.&nbsp; &nbsp;Конец", "<li class=\"pagination-start firstItem\"><span class=\"pagenav\">След.</span></li>
												<li class=\"pagination-prev\"><span class=\"pagenav\">Конец</span></li>", "$buttonsNavigation");?>
			<?$buttonsNavigation =str_replace("Начало&nbsp; &nbsp;Пред.&nbsp;", "<li class=\"pagination-start firstItem\"><span class=\"pagenav\">В начало</span></li>
												<li class=\"pagination-prev\"><span class=\"pagenav\">Пред.</span></li>", "$buttonsNavigation");?>				
			<?$findBrBegin   = '<br />';
			$startPositionBr = strpos($buttonsNavigation, $findBrBegin);?>		
			<?$lengthIrrelevant=$startPositionBr-16;?>
			<?$buttonsNavigation =substr_replace("$buttonsNavigation", "",22,$lengthIrrelevant);?>			
			<ul>
				<?=$buttonsNavigation;?>
			</ul>
			<div class="clr"></div>
		</div>
	<?endif;?>

	<?foreach($arResult['ITEMS'] as $arItem):?>
	<div class="itemContainer all lorem ipsum labore isotope-item" style="width: 100%; position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px);" data-title="Craseleifendconsectetur" data-create="1324184400">
		
		<div class="catItemView groupLeading port">
			
			<div class="catItemImageBlock">
				<span class="catItemImage image-wrapper">
					<a class="touch" href="<?=$arItem['PREVIEW_PICTURE']['SRC'];?>" title="Увеличить">
						<img src="<?=$arItem['PREVIEW_PICTURE']['SRC'];?>" width="460" height="331" alt="Увеличить" style="visibility: visible; opacity: 1;height:331px;">
						<span class="zoomIcon"></span>
						<strong></strong>
					</a>
				</span>
				<div class="clr"></div>
			</div>
			<div class="item_container">          
				<div class="catItemHeader">
					<h5 class="catItemTitle">
						<?=$arItem['NAME'];?>				
					</h5>
					<span class="catItemDateCreated">
					<?=$arItem['PROPERTIES']['DATE']['VALUE'];?></span>
					<div class="catItemHitsBlock">
						<span><?echo GetMessage("T_LODIO_VIEWS")?>:</span>
						<span class="catItemHits">
						<b><?=$arItem['SHOW_COUNTER'];?></b>
						</span>
					</div>	
				</div>
				<div class="catItemBody">
					<div class="catItemIntroText">
						<p><?=TruncateText($arItem['PREVIEW_TEXT'], 310);?></p>                    
						<div class="catItemReadMore">
							<a class="k2ReadMore" href="<?=$arItem['DETAIL_PAGE_URL']?>">
							<?echo GetMessage("T_LODIO_MORE")?>
							</a>
						</div>
					</div>
					<div class="clr"></div>
					<div class="clr"></div>
				</div>
				<div class="catItemLinks">
					<div class="clr"></div>
				</div>
				<div class="clr"></div>
				<div class="clr"></div>
				<div class="clr"></div>
			</div>
			<div class="clr"></div>
			
		</div>
		<div class="clr"></div>		
	</div>
	<?endforeach;?>


	<?//Постраничная навигация снизу?>
	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
		<div class="k2Pagination num pagenav" style="">
			<?$buttonsNavigation = $arResult['NAV_STRING'];?>
			<?$buttonsNavigation =str_replace("|", " ", "$buttonsNavigation");?>				
			<?$buttonsNavigation =str_replace("<b>", "<li class=\"num\"><span class=\"pagenav\">", "$buttonsNavigation");?>		
			<?$buttonsNavigation =str_replace("</b>", "</span></li>", "$buttonsNavigation");?>
			<?$buttonsNavigation =str_replace("<a href=", "<li class=\"num\"><a class=\"pagenav\" href=", "$buttonsNavigation");?>
			<?$buttonsNavigation =str_replace("</a>", "</a></li>", "$buttonsNavigation");?>
			<?$buttonsNavigation =str_replace("font class=\"text\"", "font class=\"pagenav\"", "$buttonsNavigation");?>
			<?$buttonsNavigation =str_replace("<font", "<div", "$buttonsNavigation");?>
			<?$buttonsNavigation =str_replace("/font", "/div", "$buttonsNavigation");?>		
			<?$buttonsNavigation =str_replace("След.&nbsp; &nbsp;Конец", "<li class=\"pagination-start firstItem\"><span class=\"pagenav\">След.</span></li>
												<li class=\"pagination-prev\"><span class=\"pagenav\">Конец</span></li>", "$buttonsNavigation");?>
			<?$buttonsNavigation =str_replace("Начало&nbsp; &nbsp;Пред.&nbsp;", "<li class=\"pagination-start firstItem\"><span class=\"pagenav\">В начало</span></li>
												<li class=\"pagination-prev\"><span class=\"pagenav\">Пред.</span></li>", "$buttonsNavigation");?>				
			<?$findBrBegin   = '<br />';
			$startPositionBr = strpos($buttonsNavigation, $findBrBegin);?>		
			<?$lengthIrrelevant=$startPositionBr-16;?>
			<?$buttonsNavigation =substr_replace("$buttonsNavigation", "",22,$lengthIrrelevant);?>			
			<ul>
				<?=$buttonsNavigation;?>
			</ul>
			<div class="clr"></div>
		</div>
	<?endif;?>

	<?
		$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&" : "");
		$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");

		if($arResult["NavPageCount"] > 1){?>
			<div id="pageNavigation">
				<? if($arResult["NavPageNomer"]> 1): ?>
								<a class="pageNavigationLink" style="float: right;margin-right:0" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><?echo GetMessage("T_LODIO_NEXT")?> 10</a>
				<? endif; ?>

				<? if($arResult["NavPageCount"] > $arResult["NavPageNomer"]): ?>
								<a class="pageNavigationLink" style="float: left;margin-right:0" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><?echo GetMessage("T_LODIO_PREV")?> 10</a>
				<? endif;?>
								<div style="clear: both;"></div>
			</div>
			<?}
	?>
<?endif?>