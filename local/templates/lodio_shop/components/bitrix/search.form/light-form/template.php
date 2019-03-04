<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

?><div class="mod-search"><?
?><form action="<?=$arResult["FORM_ACTION"]?>"><?
	?><div class="mod_search "><?
		?><label for="mod-search-searchword"> </label><?
		?><input name="q" id="mod-search-searchword" maxlength="20" class="inputbox" type="text" size="20" value=" "/><?
		?><input type="submit" value=" " class="button"/><?
	?></div><?
?></form><?
?></div><?