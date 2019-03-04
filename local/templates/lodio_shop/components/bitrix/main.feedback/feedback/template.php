<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
		
		?><div class="col-sm-12"><?
			?><div class="row"><?
				?><div class="confirm__form-item col-sm-12"><?
					?><label title=""><?echo GetMessage("T_LODIO_FEEDBACK_TITLE")?></label><?
				?></div><?
			?></div><?
		?></div><?		
		?><div class="mfeedback"><?
			if(!empty($arResult["ERROR_MESSAGE"]))
			{
				foreach($arResult["ERROR_MESSAGE"] as $v)
					ShowError($v);
			}
			if(strlen($arResult["OK_MESSAGE"]) > 0)
			{
				?><div class="confirm__form-item col-sm-12 mf-req"><?=$arResult["OK_MESSAGE"]?></div><?
			}
			?><form action="<?=POST_FORM_ACTION_URI?>" method="POST"><?
			echo bitrix_sessid_post();
				?><div class="col-sm-6"><?
					?><div class="row"><?
						?><div class="confirm__form-item col-sm-12"><?
							?><label title=""><?=GetMessage("T_LODIO_FEEDBACK_NAME")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span></label><?endif;
							?><input class="input" type="text" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>"><?
						?></div><?
						?><div class="confirm__form-item col-sm-12"><?
							?><label title=""><?=GetMessage("T_LODIO_FEEDBACK_EMAIL")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span></label><?endif;
							?><input class="input" type="text" name="user_email" value="<?=$arResult["AUTHOR_EMAIL"]?>"><?
						?></div><?
					?></div><?
				?></div><?
					
				?><div class="col-sm-12"><?	
					?><div class="row"><?
						?><div class="confirm__form-item col-sm-12"><?
							?><label title=""><?=GetMessage("T_LODIO_FEEDBACK_MESSAGE")?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span></label><?endif;
						?></div><?
						?><textarea id="jform_contact_message" cols="50" rows="10" class="textarea confirm__form-item" name="MESSAGE"><?=$arResult["MESSAGE"]?></textarea><?
					?></div><?
				?></div><?
				
				if($arParams["USE_CAPTCHA"] == "Y")
				{
				?><div class="confirm__form-item col-sm-6"><?
					?><div class="confirm__form-item"><?=GetMessage("T_LODIO_FEEDBACK_CAPTCHA")?></div><?
					?><input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>"><?
					?><img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA"><?
					?><div class="confirm__form-item"><?=GetMessage("T_LODIO_FEEDBACK_CAPTCHA_CODE")?><span class="mf-req">*</span></div><?
					?><input type="text" name="captcha_word" size="30" maxlength="50" value=""><?
				?></div><?
				}
				?><div class="col-sm-12"><?	
					?><div class="row"><?
						?><input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>"><?
						?><input type="submit" name="submit" class="button validate btn" value="<?=GetMessage("T_LODIO_FEEDBACK_SUBMIT")?>"><?
					?></div><?
				?></div><?
			?></form><?
		?></div><?