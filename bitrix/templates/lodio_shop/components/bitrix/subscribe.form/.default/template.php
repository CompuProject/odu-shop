<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

?><div class="subscribe-form"  id="subscribe-form"><?
$frame = $this->createFrame("subscribe-form", false)->begin();
	?><section class="subscribe"><?	
		?><form action="<?=$arResult["FORM_ACTION"]?>"><?
			foreach($arResult["RUBRICS"] as $itemID => $itemValue):
				?><div><?
				?><label for="sf_RUB_ID_<?=$itemValue["ID"]?>" class="elementdisplaynone"><?
					?><input type="checkbox" name="sf_RUB_ID[]" id="sf_RUB_ID_<?=$itemValue["ID"]?>" value="<?=$itemValue["ID"]?>"<?if($itemValue["CHECKED"]) echo " checked"?> /> <?=$itemValue["NAME"]?><?
				?></label><?
				?></div><?
			endforeach;	
			?><div class="subscribe__title decor-title"><?=GetMessage('T_LODIO_SUBSCRIBEINFO')?></div><?
			?><p class="subscribe__text"><?=GetMessage('T_LODIO_SUBINFORMATION')?></p><?
			?><div class="subscribe__input"><?
				?><input type="text" name="sf_EMAIL" placeholder="Email" class="input__text"><?
				?><button type="submit" name="OK" class="input__btn"><?=GetMessage('T_LODIO_SUBSCRIBE')?></button><?
			?></div><?
		?></form><?
	?></section><?
	$frame->beginStub();
	?><section class="subscribe"><?	
		?><form action="<?=$arResult["FORM_ACTION"]?>"><?
			foreach($arResult["RUBRICS"] as $itemID => $itemValue):
				?><div><?
				?><label for="sf_RUB_ID_<?=$itemValue["ID"]?>" class="elementdisplaynone"><?
					?><input type="checkbox" name="sf_RUB_ID[]" id="sf_RUB_ID_<?=$itemValue["ID"]?>" value="<?=$itemValue["ID"]?>"<?if($itemValue["CHECKED"]) echo " checked"?> /> <?=$itemValue["NAME"]?><?
				?></label><?
				?></div><?
			endforeach;	
			?><div class="subscribe__title decor-title"><?=GetMessage('T_LODIO_SUBSCRIBEINFO')?></div><?
			?><p class="subscribe__text"><?=GetMessage('T_LODIO_SUBINFORMATION')?></p><?
			?><div class="subscribe__input"><?
				?><input type="text" name="sf_EMAIL" placeholder="Email" class="input__text"><?
				?><button type="submit" name="OK" class="input__btn"><?=GetMessage('T_LODIO_SUBSCRIBE')?></button><?
			?></div><?
		?></form><?
	?></section><?	
	$frame->end();
?></div><?