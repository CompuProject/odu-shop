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
                                        ?><h2><?=$arResult['NAME'];?></h2><?
                                    ?></div><?
                                    ?><div class="itemBody"><?
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