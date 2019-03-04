<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$this->setFrameMode(true);
?>

<div class="cont">
    <div id="rt-utility">
        <div class="rt-container">
            <div class="clear"></div>
        </div>
    </div>
    <div id="rt-main" class="mb8-sa4">
        <div class="rt-container">
            <div class="rt-containerInner">
                <div class="rt-grid-12 ">
                    <div class="rt-block">
                        <div id="rt-mainbody">
                            <div class="component-content">
                                <div class="search ">
                                    <div class="componentheading">
                                        <h1><?=GetMessage("T_LODIO_SEARCH_TITLE")?></h1>
                                    </div>                                   
                                </div>					
								<?
								$arCloudParams = array(
									"SEARCH" => $arResult["REQUEST"]["~QUERY"],
									"TAGS" => $arResult["REQUEST"]["~TAGS"],
									"CHECK_DATES" => $arParams["CHECK_DATES"],
									"arrFILTER" => $arParams["arrFILTER"],
									"SORT" => $arParams["TAGS_SORT"],
									"PAGE_ELEMENTS" => $arParams["TAGS_PAGE_ELEMENTS"],
									"PERIOD" => $arParams["TAGS_PERIOD"],
									"URL_SEARCH" => $arParams["TAGS_URL_SEARCH"],
									"TAGS_INHERIT" => $arParams["TAGS_INHERIT"],
									"FONT_MAX" => $arParams["FONT_MAX"],
									"FONT_MIN" => $arParams["FONT_MIN"],
									"COLOR_NEW" => $arParams["COLOR_NEW"],
									"COLOR_OLD" => $arParams["COLOR_OLD"],
									"PERIOD_NEW_TAGS" => $arParams["PERIOD_NEW_TAGS"],
									"SHOW_CHAIN" => $arParams["SHOW_CHAIN"],
									"COLOR_TYPE" => $arParams["COLOR_TYPE"],
									"WIDTH" => $arParams["WIDTH"],
									"CACHE_TIME" => $arParams["CACHE_TIME"],
									"CACHE_TYPE" => $arParams["CACHE_TYPE"],
									"RESTART" => $arParams["RESTART"],
								);

								if(is_array($arCloudParams["arrFILTER"]))
								{
									foreach($arCloudParams["arrFILTER"] as $strFILTER)
									{
										if($strFILTER=="main")
										{
											$arCloudParams["arrFILTER_main"] = $arParams["arrFILTER_main"];
										}
										elseif($strFILTER=="forum" && IsModuleInstalled("forum"))
										{
											$arCloudParams["arrFILTER_forum"] = $arParams["arrFILTER_forum"];
										}
										elseif(strpos($strFILTER,"iblock_")===0)
										{
											if (isset($arParams["arrFILTER_".$strFILTER]) && is_array($arParams["arrFILTER_".$strFILTER]))
											{
												foreach($arParams["arrFILTER_".$strFILTER] as $strIBlock)
													$arCloudParams["arrFILTER_".$strFILTER] = $arParams["arrFILTER_".$strFILTER];
											}
										}
										elseif($strFILTER=="blog")
										{
											$arCloudParams["arrFILTER_blog"] = $arParams["arrFILTER_blog"];
										}
										elseif($strFILTER=="socialnetwork")
										{
											$arCloudParams["arrFILTER_socialnetwork"] = $arParams["arrFILTER_socialnetwork"];
										}
									}
								}

								$APPLICATION->IncludeComponent("bitrix:search.tags.cloud", ".default", $arCloudParams, $component);?>
								<div class="search-page">
								<form action="" method="get">
									<input type="hidden" name="tags" value="<?echo $arResult["REQUEST"]["TAGS"]?>" />
								<?if($arParams["USE_SUGGEST"] === "Y"):
									if(strlen($arResult["REQUEST"]["~QUERY"]) && is_object($arResult["NAV_RESULT"]))
									{
										$arResult["FILTER_MD5"] = $arResult["NAV_RESULT"]->GetFilterMD5();
										$obSearchSuggest = new CSearchSuggest($arResult["FILTER_MD5"], $arResult["REQUEST"]["~QUERY"]);
										$obSearchSuggest->SetResultCount($arResult["NAV_RESULT"]->NavRecordCount);
									}
									?>
									<?$APPLICATION->IncludeComponent(
										"bitrix:search.suggest.input",
										"",
										array(
											"NAME" => "q",
											"VALUE" => $arResult["REQUEST"]["~QUERY"],
											"INPUT_SIZE" => 40,
											"DROPDOWN_SIZE" => 10,
											"FILTER_MD5" => $arResult["FILTER_MD5"],
										),
										$component, array("HIDE_ICONS" => "Y")
									);?>
								<?else:?>
									<input class="b_search-page__input" type="text" name="q" value="<?=$arResult["REQUEST"]["QUERY"]?>" size="40" />
								<?endif;?>
																								
									&nbsp;
									<input type="submit" value="�����<?//=GetMessage("SEARCH_GO")?>" 
									 style="padding: 15px 15px 15px 15px;text-align: center; font: 19px 'Asap',sans-serif;text-transform: uppercase;
									border-radius: 5px;border: 0;"	
									/>
									<input type="hidden" name="how" value="<?//echo $arResult["REQUEST"]["HOW"]=="d"? "d": "r"?>" />

								<?if($arParams["SHOW_WHEN"]):?>
									<script>
									var switch_search_params = function()
									{
										var sp = document.getElementById('search_params');
										var flag;
										var i;

										if(sp.style.display == 'none')
										{
											flag = false;
											sp.style.display = 'block'
										}
										else
										{
											flag = true;
											sp.style.display = 'none';
										}

										var from = document.getElementsByName('from');
										for(i = 0; i < from.length; i++)
											if(from[i].type.toLowerCase() == 'text')
												from[i].disabled = flag;

										var to = document.getElementsByName('to');
										for(i = 0; i < to.length; i++)
											if(to[i].type.toLowerCase() == 'text')
												to[i].disabled = flag;

										return false;
									}
									</script>
									<br /><a class="search-page-params" href="#" onclick="return switch_search_params()"><?echo GetMessage('CT_BSP_ADDITIONAL_PARAMS')?></a>
									<div id="search_params" class="search-page-params" style="display:<?echo $arResult["REQUEST"]["FROM"] || $arResult["REQUEST"]["TO"]? 'block': 'none'?>">
										<?$APPLICATION->IncludeComponent(
											'bitrix:main.calendar',
											'',
											array(
												'SHOW_INPUT' => 'Y',
												'INPUT_NAME' => 'from',
												'INPUT_VALUE' => $arResult["REQUEST"]["~FROM"],
												'INPUT_NAME_FINISH' => 'to',
												'INPUT_VALUE_FINISH' =>$arResult["REQUEST"]["~TO"],
												'INPUT_ADDITIONAL_ATTR' => 'size="10"',
											),
											null,
											array('HIDE_ICONS' => 'Y')
										);?>
									</div>
								<?endif?>
								</form><br />
									<?if($arParams["DISPLAY_TOP_PAGER"] != "N"):?>
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
											<?$buttonsNavigation =str_replace("����.&nbsp; &nbsp;�����", "<li class=\"pagination-start firstItem\"><span class=\"pagenav\">����.</span></li>
																				<li class=\"pagination-prev\"><span class=\"pagenav\">�����</span></li>", "$buttonsNavigation");?>
											<?$buttonsNavigation =str_replace("������&nbsp; &nbsp;����.&nbsp;", "<li class=\"pagination-start firstItem\"><span class=\"pagenav\">� ������</span></li>
																				<li class=\"pagination-prev\"><span class=\"pagenav\">����.</span></li>", "$buttonsNavigation");?>				
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
								<?if(isset($arResult["REQUEST"]["ORIGINAL_QUERY"])):
									?>
									<div class="search-language-guess">
										<?echo GetMessage("CT_BSP_KEYBOARD_WARNING", array("#query#"=>'<a href="'.$arResult["ORIGINAL_QUERY_URL"].'">'.$arResult["REQUEST"]["ORIGINAL_QUERY"].'</a>'))?>
									</div><br /><?
								endif;?>

								<?if($arResult["REQUEST"]["QUERY"] === false && $arResult["REQUEST"]["TAGS"] === false):?>
								<?elseif($arResult["ERROR_CODE"]!=0):?>
									<p><?ShowError($arResult["ERROR_TEXT"]);?></p>																		
								<?elseif(count($arResult["SEARCH"])>0):?>
									<?//if($arParams["DISPLAY_TOP_PAGER"] != "N") echo $arResult["NAV_STRING"]?>
									<br />
									<!---<hr />--->
									<?//print_r($arResult["SEARCH"])?>
									
									<?foreach($arResult["SEARCH"] as $arItem):?>
										<a href="<?echo $arItem["URL_WO_PARAMS"]?>"><?echo $arItem["TITLE_FORMATED"]?></a>
										<p><?echo $arItem["BODY_FORMATED"]?></p>
										<?if (
											$arParams["SHOW_RATING"] == "Y"
											&& strlen($arItem["RATING_TYPE_ID"]) > 0
											&& $arItem["RATING_ENTITY_ID"] > 0
										):?>
											<div class="search-item-rate"><?
												$APPLICATION->IncludeComponent(
													"bitrix:rating.vote", $arParams["RATING_TYPE"],
													Array(
														"ENTITY_TYPE_ID" => $arItem["RATING_TYPE_ID"],
														"ENTITY_ID" => $arItem["RATING_ENTITY_ID"],
														"OWNER_ID" => $arItem["USER_ID"],
														"USER_VOTE" => $arItem["RATING_USER_VOTE_VALUE"],
														"USER_HAS_VOTED" => $arItem["RATING_USER_VOTE_VALUE"] == 0? 'N': 'Y',
														"TOTAL_VOTES" => $arItem["RATING_TOTAL_VOTES"],
														"TOTAL_POSITIVE_VOTES" => $arItem["RATING_TOTAL_POSITIVE_VOTES"],
														"TOTAL_NEGATIVE_VOTES" => $arItem["RATING_TOTAL_NEGATIVE_VOTES"],
														"TOTAL_VALUE" => $arItem["RATING_TOTAL_VALUE"],
														"PATH_TO_USER_PROFILE" => $arParams["~PATH_TO_USER_PROFILE"],
													),
													$component,
													array("HIDE_ICONS" => "Y")
												);?>
											</div>
										<?endif;?>
										<small><?=GetMessage("SEARCH_MODIFIED")?> <?=$arItem["DATE_CHANGE"]?></small><br /><?
										if (!empty($arItem["TAGS"]))
										{
											?><small><?
											$first = true;
											foreach ($arItem["TAGS"] as $tags):
												if (!$first)
												{
													?>, <?
												}
												?><a href="<?=$tags["URL"]?>"><?=$tags["TAG_NAME"]?></a> <?
												$first = false;
											endforeach;
											?></small><br /><?
										}
										if($arItem["CHAIN_PATH"]):?>
											<small><?=GetMessage("SEARCH_PATH")?>&nbsp;<?=$arItem["CHAIN_PATH"]?></small><?
										endif;
										?><!---<hr />---> <br />
									<?endforeach;?>
									<?if($arParams["DISPLAY_BOTTOM_PAGER"] != "N") echo $arResult["NAV_STRING"]?>
									<br />
									
								<?else:?>
									<p><?=GetMessage("T_LODIO_SEARCH_NOFIND")?></p>
									<?$arParams["DISPLAY_BOTTOM_PAGER"] = "N"?>									
								<?endif;?>
								</div>	
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>