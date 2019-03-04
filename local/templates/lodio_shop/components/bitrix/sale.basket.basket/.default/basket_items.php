<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
use Bitrix\Sale\DiscountCouponsManager;

if (!empty($arResult["ERROR_MESSAGE"]))
	ShowError($arResult["ERROR_MESSAGE"]);

$bDelayColumn  = false;
$bDeleteColumn = false;
$bWeightColumn = false;
$bPropsColumn  = false;
$bPriceType    = false;

if ($normalCount > 0):
?>
<div id="basket_items_list">
	<div class="bx_ordercart_order_table_container">
		<div class="cart" id="basket_items">
			<div class="cart__head cart__row">
				<?
					foreach ($arResult["GRID"]["HEADERS"] as $id => $arHeader):
						if (in_array($arHeader["id"], array("PREVIEW_PICTURE")))
							continue;
						$arHeader["name"] = (isset($arHeader["name"]) ? (string)$arHeader["name"] : '');
						if ($arHeader["name"] == '')
							$arHeader["name"] = GetMessage("SALE_".$arHeader["id"]);
						$arHeaders[] = $arHeader["id"];

						// remember which values should be shown not in the separate columns, but inside other columns
						if (in_array($arHeader["id"], array("TYPE")))
						{
							$bPriceType = true;
							continue;
						}
						elseif ($arHeader["id"] == "QUANTITY")
						{
							continue;
						}
						elseif ($arHeader["id"] == "PROPS")
						{
							$bPropsColumn = true;
							continue;
						}
						elseif ($arHeader["id"] == "DELAY")
						{
							$bDelayColumn = true;
							continue;
						}
						elseif ($arHeader["id"] == "DELETE")
						{
							$bDeleteColumn = true;
							continue;
						}
						elseif ($arHeader["id"] == "WEIGHT")
						{
							$bWeightColumn = true;
						}
						
						if ($arHeader["id"] == "NAME"):
						?>
							<?/*?><div class="cart__cell"></div><?*/?>
							<div class="cart__cell cart__cell--head item-c"  id="col_<?=$arHeader["id"];?>">
						<?
						elseif ($arHeader["id"] == "OPTIONS"):
						?>
							<div class="cart__cell cart__cell--head" id="col_<?=$arHeader["id"];?>"><?=GetMessage("LODIO_CART_OPTIONS")?>
						<?
						elseif ($arHeader["id"] == "PRICE"):
						?>
							<div class="cart__cell cart__cell--head price" id="col_<?=$arHeader["id"];?>">
						<?
						else:
						?>
							<div class="cart__cell cart__cell--head custom" id="col_<?=$arHeader["id"];?>">
						<?
						endif;
						?>
							<?=$arHeader["name"]; ?>
							</div>
					<?
					endforeach;

					if ($bDeleteColumn || $bDelayColumn):
					?>
						<div class="cart__cell cart__cell--head"></div>
					<?
					endif;
					?>
				</div><?//cart head?>

				<?
				foreach ($arResult["GRID"]["ROWS"] as $k => $arItem):

					if ($arItem["DELAY"] == "N" && $arItem["CAN_BUY"] == "Y"):
				?>
					<div class="cart__row" id="<?=$arItem["ID"]?>">
						<?
						foreach ($arResult["GRID"]["HEADERS"] as $id => $arHeader):

							if (in_array($arHeader["id"], array("PROPS", "DELAY", "DELETE", "TYPE", "PREVIEW_PICTURE"))) // some values are not shown in the columns in this template
								continue;

							if ($arHeader["name"] == '')
								$arHeader["name"] = GetMessage("SALE_".$arHeader["id"]);

							if ($arHeader["id"] == "NAME"):
							?>
								<?/*?>
								<div class="cart__cell itemphoto">
									<div class="bx_ordercart_photo_container">
										<?
										if (strlen($arItem["PREVIEW_PICTURE_SRC"]) > 0):
											$url = $arItem["PREVIEW_PICTURE_SRC"];
										elseif (strlen($arItem["DETAIL_PICTURE_SRC"]) > 0):
											$url = $arItem["DETAIL_PICTURE_SRC"];
										else:
											$url = $templateFolder."/images/no_photo.png";
										endif;
										?>

										<?if (strlen($arItem["DETAIL_PAGE_URL"]) > 0):?><a href="<?=$arItem["DETAIL_PAGE_URL"] ?>"><?endif;?>
											<div class="bx_ordercart_photo" style="background-image:url('<?=$url?>')"></div>
										<?if (strlen($arItem["DETAIL_PAGE_URL"]) > 0):?></a><?endif;?>
									</div>
									<?
									if (!empty($arItem["BRAND"])):
									?>
									<div class="bx_ordercart_brand">
										<img alt="" src="<?=$arItem["BRAND"]?>" />
									</div>
									<?
									endif;
									?>
								</div>
								<?*/?>
								<div class="cart__cell item-c">
									<?
										if (strlen($arItem["PREVIEW_PICTURE_SRC"]) > 0):
											$url = $arItem["PREVIEW_PICTURE_SRC"];
										elseif (strlen($arItem["DETAIL_PICTURE_SRC"]) > 0):
											$url = $arItem["DETAIL_PICTURE_SRC"];
										else:
											$url = SITE_TEMPLATE_PATH."/images/no-photo-268-200.png";
										endif;
									?>
									<div class="cart__pic">
										<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$url?>" alt="<?=$arItem["NAME"]?>"></a>
									</div>
									<div class="cart__title">
										<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="cart__link"><?=$arItem["NAME"]?></a>
									</div>									
									<?/*?>
									<div class="bx_ordercart_itemart">
										<?
										if ($bPropsColumn):
											foreach ($arItem["PROPS"] as $val):

												if (is_array($arItem["SKU_DATA"]))
												{
													$bSkip = false;
													foreach ($arItem["SKU_DATA"] as $propId => $arProp)
													{
														if ($arProp["CODE"] == $val["CODE"])
														{
															$bSkip = true;
															break;
														}
													}
													if ($bSkip)
														continue;
												}

												echo $val["NAME"].":&nbsp;<span>".$val["VALUE"]."<span><br/>";
											endforeach;
										endif;
										?>
									</div>
									<?*/?>
									<?/*?>
									<?
									if (is_array($arItem["SKU_DATA"]) && !empty($arItem["SKU_DATA"])):
										foreach ($arItem["SKU_DATA"] as $propId => $arProp):

											// if property contains images or values
											$isImgProperty = false;
											if (!empty($arProp["VALUES"]) && is_array($arProp["VALUES"]))
											{
												foreach ($arProp["VALUES"] as $id => $arVal)
												{
													if (!empty($arVal["PICT"]) && is_array($arVal["PICT"])
														&& !empty($arVal["PICT"]['SRC']))
													{
														$isImgProperty = true;
														break;
													}
												}
											}
											$countValues = count($arProp["VALUES"]);
											$full = ($countValues > 5) ? "full" : "";

											if ($isImgProperty): // iblock element relation property
											?>
												<div class="bx_item_detail_scu_small_noadaptive <?=$full?>">

													<span class="bx_item_section_name_gray">
														<?=$arProp["NAME"]?>:
													</span>

													<div class="bx_scu_scroller_container">

														<div class="bx_scu">
															<ul id="prop_<?=$arProp["CODE"]?>_<?=$arItem["ID"]?>"
																style="width: 200%; margin-left:0;"
																class="sku_prop_list"
																>
																<?
																foreach ($arProp["VALUES"] as $valueId => $arSkuValue):

																	$selected = "";
																	foreach ($arItem["PROPS"] as $arItemProp):
																		if ($arItemProp["CODE"] == $arItem["SKU_DATA"][$propId]["CODE"])
																		{
																			if ($arItemProp["VALUE"] == $arSkuValue["NAME"] || $arItemProp["VALUE"] == $arSkuValue["XML_ID"])
																				$selected = " bx_active";
																		}
																	endforeach;
																?>
																	<li style="width:10%;"
																		class="sku_prop<?=$selected?>"
																		data-value-id="<?=$arSkuValue["XML_ID"]?>"
																		data-element="<?=$arItem["ID"]?>"
																		data-property="<?=$arProp["CODE"]?>"
																		>
																		<a href="javascript:void(0)" class="cnt"><span class="cnt_item" style="background-image:url(<?=$arSkuValue["PICT"]["SRC"];?>)"></span></a>
																	</li>
																<?
																endforeach;
																?>
															</ul>
														</div>

														<div class="bx_slide_left" onclick="leftScroll('<?=$arProp["CODE"]?>', <?=$arItem["ID"]?>, <?=$countValues?>);"></div>
														<div class="bx_slide_right" onclick="rightScroll('<?=$arProp["CODE"]?>', <?=$arItem["ID"]?>, <?=$countValues?>);"></div>
													</div>

												</div>
											<?
											else:
											?>
												<div class="bx_item_detail_size_small_noadaptive <?=$full?>">

													<span class="bx_item_section_name_gray">
														<?=$arProp["NAME"]?>:
													</span>

													<div class="bx_size_scroller_container">
														<div class="bx_size">
															<ul id="prop_<?=$arProp["CODE"]?>_<?=$arItem["ID"]?>"
																style="width: 200%; margin-left:0;"
																class="sku_prop_list"
																>
																<?
																foreach ($arProp["VALUES"] as $valueId => $arSkuValue):

																	$selected = "";
																	foreach ($arItem["PROPS"] as $arItemProp):
																		if ($arItemProp["CODE"] == $arItem["SKU_DATA"][$propId]["CODE"])
																		{
																			if ($arItemProp["VALUE"] == $arSkuValue["NAME"])
																				$selected = " bx_active";
																		}
																	endforeach;
																?>
																	<li style="width:10%;"
																		class="sku_prop<?=$selected?>"
																		data-value-id="<?=($arProp['TYPE'] == 'S' && $arProp['USER_TYPE'] == 'directory' ? $arSkuValue['XML_ID'] : $arSkuValue['NAME']); ?>"
																		data-element="<?=$arItem["ID"]?>"
																		data-property="<?=$arProp["CODE"]?>"
																		>
																		<a href="javascript:void(0)" class="cnt"><?=$arSkuValue["NAME"]?></a>
																	</li>
																<?
																endforeach;
																?>
															</ul>
														</div>
														<div class="bx_slide_left" onclick="leftScroll('<?=$arProp["CODE"]?>', <?=$arItem["ID"]?>, <?=$countValues?>);"></div>
														<div class="bx_slide_right" onclick="rightScroll('<?=$arProp["CODE"]?>', <?=$arItem["ID"]?>, <?=$countValues?>);"></div>
													</div>

												</div>
											<?
											endif;
										endforeach;
									endif;
									?>
									<?*/?>
								</div>
							<?
							elseif ($arHeader["id"] == "OPTIONS"):
							?>
								<div class="cart__cell">
									<?if ($arItem['PROPS']):?>
										<?foreach ($arItem['PROPS'] as $arProp):?>
											<div class="cart__option"><span><?=GetMessage('LODIO_CART_OPTIONS_' . $arProp['CODE'])?>:</span><span><?=$arProp['VALUE']?></span></div>										
										<?endforeach?>
									<?endif?>
									<?
										$ratio = isset($arItem["MEASURE_RATIO"]) ? $arItem["MEASURE_RATIO"] : 0;
										$max = isset($arItem["AVAILABLE_QUANTITY"]) ? "max=\"".$arItem["AVAILABLE_QUANTITY"]."\"" : "";
										$useFloatQuantity = ($arParams["QUANTITY_FLOAT"] == "Y") ? true : false;
										$useFloatQuantityJS = ($useFloatQuantity ? "true" : "false");
									?>
									<div class="cart__option"><span><?=GetMessage('LODIO_CART_OPTIONS_QUANTITY')?>:</span><span>
										<input
											type="text"
											size="3"
											id="QUANTITY_INPUT_<?=$arItem["ID"]?>"
											name="QUANTITY_INPUT_<?=$arItem["ID"]?>"
											size="2"
											maxlength="18"
											min="0"
											<?=$max?>
											step="<?=$ratio?>"
											style="max-width: 50px"
											value="<?=$arItem["QUANTITY"]?>"
											onchange="updateQuantity('QUANTITY_INPUT_<?=$arItem["ID"]?>', '<?=$arItem["ID"]?>', <?=$ratio?>, <?=$useFloatQuantityJS?>)"
										>
										<?
											if (!isset($arItem["MEASURE_RATIO"]))
											{
												$arItem["MEASURE_RATIO"] = 1;
											}

											if (
												floatval($arItem["MEASURE_RATIO"]) != 0
											):
											?>
												<span class="basket_quantity_control" id="basket_quantity_control">
													<a href="javascript:void(0);" class="plus" onclick="setQuantity(<?=$arItem["ID"]?>, <?=$arItem["MEASURE_RATIO"]?>, 'up', <?=$useFloatQuantityJS?>);"><i class="fa fa-chevron-up"></i></a>
													<a href="javascript:void(0);" class="minus" onclick="setQuantity(<?=$arItem["ID"]?>, <?=$arItem["MEASURE_RATIO"]?>, 'down', <?=$useFloatQuantityJS?>);"><i class="fa fa-chevron-down"></i></a>
												</span>
											<?
												endif;
												if (isset($arItem["MEASURE_TEXT"]))
												{
													?>
														<?=$arItem["MEASURE_TEXT"]?>
													<?
												}
										?>
									</span></div>
									<input type="hidden" id="QUANTITY_<?=$arItem['ID']?>" name="QUANTITY_<?=$arItem['ID']?>" value="<?=$arItem["QUANTITY"]?>" />
								</div>
							<?
							
							elseif ($arHeader["id"] == "QUANTITY"):
								continue;
							/*
							?>
								<div class="cart__cell custom">
									<span><?=$arHeader["name"]; ?>:</span>
									<div class="centered">
										<table cellspacing="0" cellpadding="0" class="counter">
											<tr>
												<td>
													<?
													$ratio = isset($arItem["MEASURE_RATIO"]) ? $arItem["MEASURE_RATIO"] : 0;
													$max = isset($arItem["AVAILABLE_QUANTITY"]) ? "max=\"".$arItem["AVAILABLE_QUANTITY"]."\"" : "";
													$useFloatQuantity = ($arParams["QUANTITY_FLOAT"] == "Y") ? true : false;
													$useFloatQuantityJS = ($useFloatQuantity ? "true" : "false");
													?>
													<input
														type="text"
														size="3"
														id="QUANTITY_INPUT_<?=$arItem["ID"]?>"
														name="QUANTITY_INPUT_<?=$arItem["ID"]?>"
														size="2"
														maxlength="18"
														min="0"
														<?=$max?>
														step="<?=$ratio?>"
														style="max-width: 50px"
														value="<?=$arItem["QUANTITY"]?>"
														onchange="updateQuantity('QUANTITY_INPUT_<?=$arItem["ID"]?>', '<?=$arItem["ID"]?>', <?=$ratio?>, <?=$useFloatQuantityJS?>)"
													>
												</td>
												<?
												if (!isset($arItem["MEASURE_RATIO"]))
												{
													$arItem["MEASURE_RATIO"] = 1;
												}

												if (
													floatval($arItem["MEASURE_RATIO"]) != 0
												):
												?>
													<td id="basket_quantity_control">
														<div class="basket_quantity_control">
															<a href="javascript:void(0);" class="plus" onclick="setQuantity(<?=$arItem["ID"]?>, <?=$arItem["MEASURE_RATIO"]?>, 'up', <?=$useFloatQuantityJS?>);"></a>
															<a href="javascript:void(0);" class="minus" onclick="setQuantity(<?=$arItem["ID"]?>, <?=$arItem["MEASURE_RATIO"]?>, 'down', <?=$useFloatQuantityJS?>);"></a>
														</div>
													</td>
												<?
												endif;
												if (isset($arItem["MEASURE_TEXT"]))
												{
													?>
														<td style="text-align: left"><?=$arItem["MEASURE_TEXT"]?></td>
													<?
												}
												?>
											</tr>
										</table>
									</div>
									<input type="hidden" id="QUANTITY_<?=$arItem['ID']?>" name="QUANTITY_<?=$arItem['ID']?>" value="<?=$arItem["QUANTITY"]?>" />
								</div>
							<?
							*/
							elseif ($arHeader["id"] == "PRICE"):
							?>
								<div class="cart__cell price">
									<?if (floatval($arItem["DISCOUNT_PRICE_PERCENT"]) > 0):?>
										<span class="cart-old_price" id="old_price_<?=$arItem["ID"]?>">
											<?=$arItem["FULL_PRICE_FORMATED"]?>
										</span><br>
									<?endif;?>
									<span class="cart-current_price" id="current_price_<?=$arItem["ID"]?>">
										<?=$arItem["PRICE_FORMATED"]?>
									</span>
								</div>
							<?
							elseif ($arHeader["id"] == "DISCOUNT"):
							?>
								<div class="cart__cell custom">
									<span><?=$arHeader["name"]; ?>:</span>
									<div id="discount_value_<?=$arItem["ID"]?>"><?=$arItem["DISCOUNT_PRICE_PERCENT_FORMATED"]?></div>
								</div>
							<?
							elseif ($arHeader["id"] == "WEIGHT"):
							?>
								<div class="cart__cell custom">
									<span><?=$arHeader["name"]; ?>:</span>
									<?=$arItem["WEIGHT_FORMATED"]?>
								</div>
							<?
							else:
							?>
								<div class="cart__cell custom">
									<span><?=$arHeader["name"]; ?>:</span>
									<?
									if ($arHeader["id"] == "SUM"):
									?>
										<div id="sum_<?=$arItem["ID"]?>">
									<?
									endif;

									echo $arItem[$arHeader["id"]];

									if ($arHeader["id"] == "SUM"):
									?>
										</div>
									<?
									endif;
									?>
								</div>
							<?
							endif;
						endforeach;

						if ($bDelayColumn || $bDeleteColumn):
						?>
							<div class="cart__cell control">
								<?
								if ($bDeleteColumn):
								?>
									<a href="<?=str_replace("#ID#", $arItem["ID"], $arUrls["delete"])?>"><?=GetMessage("SALE_DELETE")?></a><br />
								<?
								endif;
								if ($bDelayColumn):
								?>
									<a href="<?=str_replace("#ID#", $arItem["ID"], $arUrls["delay"])?>"><?=GetMessage("SALE_DELAY")?></a>
								<?
								endif;
								?>
							</div>
						<?
						endif;
						?>
			</div><?// tr?>
					<?
					endif;
				endforeach;
				?>
		</div><?// cart?>
	</div>
	<input type="hidden" id="column_headers" value="<?=CUtil::JSEscape(implode($arHeaders, ","))?>" />
	<input type="hidden" id="offers_props" value="<?=CUtil::JSEscape(implode($arParams["OFFERS_PROPS"], ","))?>" />
	<input type="hidden" id="action_var" value="<?=CUtil::JSEscape($arParams["ACTION_VARIABLE"])?>" />
	<input type="hidden" id="quantity_float" value="<?=$arParams["QUANTITY_FLOAT"]?>" />
	<input type="hidden" id="count_discount_4_all_quantity" value="<?=($arParams["COUNT_DISCOUNT_4_ALL_QUANTITY"] == "Y") ? "Y" : "N"?>" />
	<input type="hidden" id="price_vat_show_value" value="<?=($arParams["PRICE_VAT_SHOW_VALUE"] == "Y") ? "Y" : "N"?>" />
	<input type="hidden" id="hide_coupon" value="<?=($arParams["HIDE_COUPON"] == "Y") ? "Y" : "N"?>" />
	<input type="hidden" id="use_prepayment" value="<?=($arParams["USE_PREPAYMENT"] == "Y") ? "Y" : "N"?>" />
	<input type="hidden" id="auto_calculation" value="<?=($arParams["AUTO_CALCULATION"] == "N") ? "N" : "Y"?>" />
	
	<div class="cart-footer">
		<?if (floatval($arResult["DISCOUNT_PRICE_ALL"]) > 0):?>
			<div class="cart-footer__discount">
				<span><?=GetMessage("LODIO_CART_TOTAL")?>:</span><span id="PRICE_WITHOUT_DISCOUNT"><?=$arResult["PRICE_WITHOUT_DISCOUNT"]?></span>
			</div>
		<?endif;?>
		<div class="cart-footer__total">
			<span><?=GetMessage("LODIO_CART_TOTAL")?>:</span><span id="allSum_FORMATED"><?=str_replace(" ", "&nbsp;", $arResult["allSum_FORMATED"])?></span>
		</div>
		<a href="javascript:void(0)" class="btn checkout" onclick="checkOut();"><?=GetMessage("LODIO_CART_ORDER")?></a>
	</div>
	<?/*?>
	<div class="bx_ordercart_order_pay">

		<div class="bx_ordercart_order_pay_left" id="coupons_block">
		<?
		if ($arParams["HIDE_COUPON"] != "Y")
		{
		?>
			<div class="bx_ordercart_coupon">
				<span><?=GetMessage("STB_COUPON_PROMT")?></span><input type="text" id="coupon" name="COUPON" value="" onchange="enterCoupon();">&nbsp;<a class="bx_bt_button bx_big" href="javascript:void(0)" onclick="enterCoupon();" title="<?=GetMessage('SALE_COUPON_APPLY_TITLE'); ?>"><?=GetMessage('SALE_COUPON_APPLY'); ?></a>
			</div><?
				if (!empty($arResult['COUPON_LIST']))
				{
					foreach ($arResult['COUPON_LIST'] as $oneCoupon)
					{
						$couponClass = 'disabled';
						switch ($oneCoupon['STATUS'])
						{
							case DiscountCouponsManager::STATUS_NOT_FOUND:
							case DiscountCouponsManager::STATUS_FREEZE:
								$couponClass = 'bad';
								break;
							case DiscountCouponsManager::STATUS_APPLYED:
								$couponClass = 'good';
								break;
						}
						?><div class="bx_ordercart_coupon"><input disabled readonly type="text" name="OLD_COUPON[]" value="<?=htmlspecialcharsbx($oneCoupon['COUPON']);?>" class="<? echo $couponClass; ?>"><span class="<? echo $couponClass; ?>" data-coupon="<? echo htmlspecialcharsbx($oneCoupon['COUPON']); ?>"></span><div class="bx_ordercart_coupon_notes"><?
						if (isset($oneCoupon['CHECK_CODE_TEXT']))
						{
							echo (is_array($oneCoupon['CHECK_CODE_TEXT']) ? implode('<br>', $oneCoupon['CHECK_CODE_TEXT']) : $oneCoupon['CHECK_CODE_TEXT']);
						}
						?></div></div><?
					}
					unset($couponClass, $oneCoupon);
				}
		}
		else
		{
			?>&nbsp;<?
		}
?>
		</div>
		<div class="bx_ordercart_order_pay_right">
			<table class="bx_ordercart_order_sum">
				<?if ($bWeightColumn && floatval($arResult['allWeight']) > 0):?>
					<tr>
						<td class="custom_t1"><?=GetMessage("SALE_TOTAL_WEIGHT")?></td>
						<td class="custom_t2" id="allWeight_FORMATED"><?=$arResult["allWeight_FORMATED"]?>
						</td>
					</tr>
				<?endif;?>
				<?if ($arParams["PRICE_VAT_SHOW_VALUE"] == "Y"):?>
					<tr>
						<td><?echo GetMessage('SALE_VAT_EXCLUDED')?></td>
						<td id="allSum_wVAT_FORMATED"><?=$arResult["allSum_wVAT_FORMATED"]?></td>
					</tr>
					<?if (floatval($arResult["DISCOUNT_PRICE_ALL"]) > 0):?>
						<tr>
							<td class="custom_t1"></td>
							<td class="custom_t2" style="text-decoration:line-through; color:#828282;" id="PRICE_WITHOUT_DISCOUNT">
								<?=$arResult["PRICE_WITHOUT_DISCOUNT"]?>
							</td>
						</tr>
					<?endif;?>
					<?
					if (floatval($arResult['allVATSum']) > 0):
						?>
						<tr>
							<td><?echo GetMessage('SALE_VAT')?></td>
							<td id="allVATSum_FORMATED"><?=$arResult["allVATSum_FORMATED"]?></td>
						</tr>
						<?
					endif;
					?>
				<?endif;?>
					<tr>
						<td class="fwb"><?=GetMessage("SALE_TOTAL")?></td>
						<td class="fwb" id="allSum_FORMATED"><?=str_replace(" ", "&nbsp;", $arResult["allSum_FORMATED"])?></td>
					</tr>


			</table>
			<div style="clear:both;"></div>
		</div>
		<div style="clear:both;"></div>
		<div class="bx_ordercart_order_pay_center">

			<?if ($arParams["USE_PREPAYMENT"] == "Y" && strlen($arResult["PREPAY_BUTTON"]) > 0):?>
				<?=$arResult["PREPAY_BUTTON"]?>
				<span><?=GetMessage("SALE_OR")?></span>
			<?endif;?>
			<?
			if ($arParams["AUTO_CALCULATION"] != "Y")
			{
				?>
				<a href="javascript:void(0)" onclick="updateBasket();" class="checkout refresh"><?=GetMessage("SALE_REFRESH")?></a>
				<?
			}
			?>
			<a href="javascript:void(0)" onclick="checkOut();" class="checkout"><?=GetMessage("SALE_ORDER")?></a>
		</div>
	</div>
	<?*/?>
</div>
<?
else:
?>
<div id="basket_items_list">
	<table>
		<tbody>
			<tr>
				<td style="text-align:center">
					<div class=""><?=GetMessage("SALE_NO_ITEMS");?></div>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<?
endif;
?>