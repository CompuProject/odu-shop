<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
include_once $_SERVER["DOCUMENT_ROOT"] . "/cp_lib/Helpers/CP_CatalogHelper.php";
$this->setFrameMode(true);
ob_start();
?>
<?if (CP_CatalogHelper::getParentSectionNotAksessuary($arResult["IBLOCK_SECTION_ID"])):?>
    <div class="sizeBlockBtn">Таблица размеров</div>
    <div class="sizeBlockWrapper">
        <? $APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
                "AREA_FILE_SHOW" => "file",
                "PATH" => SITE_DIR . "include/size_panel.php"
            )
        ); ?>
    </div>
<?endif;?>
<div class="container product"><?
	?><div class="row"><?
		?><div class="col-md-6"><?
			?><div class="product__slider-thumbs-wrap"><?
				?><div class="product__slider-thumbs"><?
					foreach($arResult['GALLERY_THUMB'] as $pictureSrc)
					{
						?><div class="product__slider-item"><?
							?><img src="<?=$pictureSrc['THUMB']?>" alt="<?=$arResult['NAME']?>"><?
						?></div><?
					}
				?></div><?			
			?></div><?
			?><div class="product__slider-wrap"><?
				?><div class="product__slider"><?
					foreach($arResult['GALLERY_THUMB'] as $pictureSrc)
					{
						?><div class="product__slider-item"><?
							?><img src="<?=$pictureSrc['IMG']?>" alt="<?=$arResult['NAME']?>"><?
						?></div><?
					}
				?></div><?
			?></div><?
		?></div>
            <div class="col-md-6 product__main">
              <div class="product__pager">
				<?if ($arResult['SECTION_DATA']):?>
                <div class="product__pager-back"><span><?echo GetMessage("LODIO_ELEMENT_BACK")?>:<a href="<?=$arResult['SECTION_DATA']['SECTION_PAGE_URL']?>" class="product__pager-link"><?=$arResult['SECTION_DATA']['NAME']?></a></span></div>
                <?endif?>
				<div class="product__pager-pages">
					<?if ($arResult['PREVIEW_NEXT']['PREVIEW']):?><a href="<?=$arResult['PREVIEW_NEXT']['PREVIEW']?>"><?else:?><span class="product__pager-nolink"><?endif?><?echo GetMessage("LODIO_ELEMENT_PREV")?></a><?if ($arResult['PREVIEW_NEXT']['PREVIEW']):?></a><?else:?></span><?endif?>
					<? echo '<span class="link-divider">/</span>'?>
					<?if ($arResult['PREVIEW_NEXT']['NEXT']):?><a href="<?=$arResult['PREVIEW_NEXT']['NEXT']?>"><?else:?><span class="product__pager-nolink"><?endif?><?echo GetMessage("LODIO_ELEMENT_NEXT")?></a><?if ($arResult['PREVIEW_NEXT']['NEXT']):?></a><?else:?></span><?endif?>
				</div>
              </div>
              <div class="product__info">
				<?if ($arResult['PROPERTIES']['BRAND']['VALUE']):?>
					<span class="product__manufacturer"><?=$arResult['PROPERTIES']['BRAND']['VALUE']?></span>
				<?endif?>
                <h1 class="product__title"><?=$arResult['NAME']?></h1>
				<p class="product__poperties">
					<?foreach ($arResult['PROPERTIES'] as $arProperty):?>
						<?
							if ($arProperty['VALUE'] && in_array($arProperty['CODE'], $arParams['PROPERTY_CODE']))
							{
								$value = $arProperty['VALUE'];
								if (is_array($arProperty['VALUE'])) $value = implode(', ', $arProperty['VALUE']);	
								?><span><?=$arProperty['NAME']?>:</span><?=$value?><br><?
							}
						?>
					<?endforeach?>
				</p>
                  <div class="size__table"><a href="/size_table/">Таблица размеров</a></div>
                <?/*?><p class="product__text"><?=$arResult['DETAIL_TEXT']?></p><?*/?>
              </div>
			  <?if ($arResult['OFFERS']):?>
				  <div class="product__select-box">
					<?
					if ($arResult['OFFERS_COLOR'])
					{
					?>
					<div class="product__select product__select--color">
					  <select id="color-select" data-id="<?=$arResult['ID']?>">
						<option data-display="<?echo GetMessage("LODIO_ELEMENT_COLOR")?>" value="color"><?echo GetMessage("LODIO_ELEMENT_COLOR")?></option>
						<?foreach ($arResult['OFFERS_COLOR'] as $colorName):?>
							<option value="<?=$colorName?>"><?=$colorName?></option>
						<?endforeach;?>
					  </select>
					</div>	
					<?
					}
					if ($arResult['OFFERS_SIZES'])
					{					
					?>
					<div class="product__select product__select--size">
					  <select id="size-select" data-id="<?=$arResult['ID']?>" <?if ($arResult['OFFERS_COLOR']):?> disabled<?endif?>>
						<option data-display="<?echo GetMessage("LODIO_ELEMENT_SIZE")?>" value="size"><?echo GetMessage("LODIO_ELEMENT_SIZE")?></option>
						<?foreach ($arResult['OFFERS_SIZES'] as $sizeName):?>
							<option value="<?=$sizeName?>"><?=$sizeName?></option>
						<?endforeach;?>
					  </select>
					</div>
					<?
					}
					?>
				  </div>			  
			  <?endif?>
				<div class="product__buy-box">
					<?if ($arResult['CAN_BUY'] || ($arResult['OFFERS'])):?>
						<?
						$priceString = '<span class="product__price">' . $arResult['MIN_DISCOUNT_PRICE_PRINT'] . '</span>';
						if ($arResult['MIN_PRICE'] > $arResult['MIN_DISCOUNT_PRICE'])
						{
							$priceString .= '<span class="product__old-price">' . $arResult['MIN_PRICE'] . '</span>';
						}				
						
						echo $priceString;
						?>
						<input type="text" value="1" placeholder="1" class="input product__input" id="count-in-cart">
						<button href="#" class="product__btn btn" id="add-in-cart" data-id="<?=$arResult['ID']?>" data-is-offers="<?if ($arResult['OFFERS']):?>Y<?endif?>"><?echo GetMessage("LODIO_ELEMENT_BUY")?></button>
					<?else:?>
						<div class="product__none-in-stock"><?echo GetMessage("LODIO_ELEMENT_NULL")?></div>
					<?endif?>
				</div>
			 </div>
            </div>
			<div class="col-md-12">
				<div class="product__text"><?=$arResult['DETAIL_TEXT']?></div>
			<?/*?>
			<!-- Nav tabs -->
			<?$propsExist = false;?>
			<?foreach ($arResult['PROPERTIES'] as $arProperty):?>
				<?
					if ($arProperty['VALUE'] && in_array($arProperty['CODE'], $arParams['PROPERTY_CODE']))
					{
						$propsExist = true;
					}
				?>
			<?endforeach?>
			<ul class="nav nav-tabs" role="tablist">
				<?if ($arResult['DETAIL_TEXT']):?>
					<li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab"><?echo GetMessage("LODIO_ELEMENT_TAB_1")?></a></li>
				<?endif?>
				<?if ($propsExist):?>
				<li role="presentation"><a href="#properties" aria-controls="properties" role="tab" data-toggle="tab"><?echo GetMessage("LODIO_ELEMENT_TAB_2")?></a></li>
				<?endif?>
				<?if ($arParams['USE_COMMENTS'] === 'Y'):?>
				<li role="presentation"><a href="#comments" aria-controls="comments" role="tab" data-toggle="tab"><?echo GetMessage("LODIO_ELEMENT_TAB_3")?></a></li>
				<?endif?>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<?if ($arResult['DETAIL_TEXT']):?>
				<div role="tabpanel" class="tab-pane active" id="description">
					<div class="product__text"><?=$arResult['DETAIL_TEXT']?></div>
				</div>
				<?endif?>
				<?if ($propsExist):?>
				<div role="tabpanel" class="tab-pane" id="properties">
					<ul class="product__poperties">
						<?foreach ($arResult['PROPERTIES'] as $arProperty):?>
							<?
								if ($arProperty['VALUE'] && in_array($arProperty['CODE'], $arParams['PROPERTY_CODE']))
								{
									$value = $arProperty['VALUE'];
									if (is_array($arProperty['VALUE'])) $value = implode(', ', $arProperty['VALUE']);	
									?><li><span class="product-prop-name"><?=$arProperty['NAME']?></span><span class="product-prop-value"><?=$value?></span></li><?
								}
							?>
						<?endforeach?>
					</ul>
				</div>
				<?endif?>
				<?if ($arParams['USE_COMMENTS'] === 'Y'):?>
				<div role="tabpanel" class="tab-pane" id="comments">
					#FEEDS#
				</div>
				<?endif?>
			</div>
			<?*/?>
          </div>
        </div>
		<script>
			$(document).ready(function(){
				var sizeByColor = {
					<?foreach ($arResult['OFFERS_COLOR'] as $colorName):?>
						<?$counter = 0;?>
						'<?=$colorName?>' : {<?foreach ($arResult['OFFERS_SIZES_BY_COLOR'][$colorName] as $sizeName){?>'<?=$counter?>':'<?=$sizeName?>', <?$counter++;}?>'<?=$counter?>':'null'},
					<?endforeach;?>
				};
				var offers = {
					<?foreach ($arResult['OFFERS'] as $arOffer):?>
						<?$counter = 0;?>
							'<?=$arOffer['PROPERTIES']['COLOR']['VALUE']?>-<?=$arOffer['PROPERTIES']['SIZE']['VALUE']?>' : '<?=$arOffer['ID']?>',
						<?$counter++;?>
					<?endforeach;?>
				}
				
				var priceByOffer = {};
				priceByOffer = {
					<?foreach ($arResult['PRICES_BY_OFFER'] as $offerId => $arPrice):?>
						'<?=$offerId?>' : {'PRICE':'<?=$arPrice['PRICE']?>', 'DISCOUNT':'<?=$arPrice['DISCOUNT']?>'},
					<?endforeach;?>
				};	
				
				function ValidateFields(){
					var size = $('#size-select').val();
					var color = $('#color-select').val();
					
					if (size && size != 'size')
					{
						$('.product__select--size .nice-select').css('border-color', '#e8e8e8');
					}
					else
					{
						$('.product__select--size .nice-select').css('border-color', '#C5483E').css('margin-bottom', '5px');
                        $('.product__select--size .nice-select').after("<div class='noVariablError'>Не выбрано поле</div>");
					}
					if (color && color != 'color')
					{
						$('.product__select--color .nice-select').css('border-color', '#e8e8e8');
					}
					else
					{
						$('.product__select--color .nice-select').css('border-color', '#C5483E');
					}
				}
				
				$('#color-select').change(function(){
					var value = $(this).val();
					$('#size-select option[value="size"]').prop('selected', true);
					
					if (value == 'color')
					{
						$('#size-select').attr('disabled', 'disabled');
					}
					else
					{
						$('#size-select').removeAttr('disabled');
						$('#size-select option').each(function(){
							$(this).attr('disabled', 'disabled');
						})
						for (key in sizeByColor[value]) {
							$('#size-select option[value="'+sizeByColor[value][key]+'"]').removeAttr('disabled');
						}					
					}	
					$('#size-select').niceSelect('update');
					$('.product__select--size .nice-select').css('border-color', '#e8e8e8');
					$('.product__select--color .nice-select').css('border-color', '#e8e8e8');
					
					var offerId = offers[value+'-'];
					if (offerId)
					{
						$('#add-in-cart').data('id', offerId);
						$('#add-in-cart').attr('data-id', offerId);
						$('.product__old-price').text(priceByOffer[offerId]['PRICE']);
						$('.product__price').text(priceByOffer[offerId]['DISCOUNT']);
					}
					return false;
				})
				
				$('#size-select').change(function(){
					var size = $(this).val();
					var color = $('#color-select').val();
					var offerId = offers[color+'-'+size];
					if (!offerId) offerId = offers['-'+size];
					if (offerId)
					{
						$('#add-in-cart').data('id', offerId);
						$('#add-in-cart').attr('data-id', offerId);
						$('.product__old-price').text(priceByOffer[offerId]['PRICE']);
						$('.product__price').text(priceByOffer[offerId]['DISCOUNT']);
					}
					$('.product__select--size .nice-select').css('border-color', '#e8e8e8');
					$('.product__select--color .nice-select').css('border-color', '#e8e8e8');
					return false;
				});
				
				$('#count-in-cart').change(function(){
					$('#count-in-cart').css('border-color', '#e8e8e8');
					return false;
				})
				
				
				$('#add-in-cart').click(function(){
					if ($(this).hasClass('add-in-cart-disabled')) return false;
					var isOffer = $(this).data('is-offers');
					var id = $(this).data('id');
					var count = $('#count-in-cart').val();
					var size = '';
					var color = '';
					if (isOffer == 'Y')
					{
						size = $('#size-select').val();
						sizeId = $('#size-select').data('id');
						
						color = $('#color-select').val();	
						colorId = $('#color-select').data('id');	
						
						ValidateFields();
						if ( ( !sizeId || (sizeId && size && size != 'size') ) && ( !colorId || (colorId && color && color != 'color') ) )
						{
							//console.log(size + ' ' + color);
						}
						else
						{
							return false;
						}						
					}
					
					$('#count-in-cart').css('border-color', '#e8e8e8');
					if (count > 0)
					{
						$.ajax({
							url : '<?=SITE_DIR?>include/ajax/add-to-cart.php',
							method : 'POST',
							data : {
								'ID' : id,
								'COUNT' : count,
							},
							success : function(result){
								$('#add-in-cart').text('<?echo GetMessage("LODIO_ELEMENT_IN_CART")?>');
								$('#add-in-cart').addClass('add-in-cart-disabled');
								$.ajax({
									url : '<?=SITE_DIR?>include/ajax/update-small-cart.php',
									success : function(cart_result){
										$('#cart-box').html(cart_result);
									}
								})
							}
						});
					}
					else
					{
						$('#count-in-cart').css('border-color', '#C5483E');
						alert('error');
					}
					
					return false;
				})
				
			})
		</script>
<?
$arResult['TEMPLATE_DATA'] = ob_get_contents();
ob_end_clean();
?>