<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="container">
<p style="text-align:center;"><?echo $arResult["MESSAGE_TEXT"]?></p>
<?//here you can place your own messages
	switch($arResult["MESSAGE_CODE"])
	{
	case "E01":
		?><? //When user not found
		break;
	case "E02":
		?><? //User was successfully authorized after confirmation
		break;
	case "E03":
		?><? //User already confirm his registration
		break;
	case "E04":
		?><? //Missed confirmation code
		break;
	case "E05":
		?><? //Confirmation code provided does not match stored one
		break;
	case "E06":
		?><? //Confirmation was successfull
		break;
	case "E07":
		?><? //Some error occured during confirmation
		break;
	}
?>
<?if($arResult["SHOW_FORM"]):?>
	<h1 class="title decor-title"><?$APPLICATION->ShowTitle(false)?></h1>
	<div class="bx-auth">
		<form method="post" action="<?echo $arResult["FORM_ACTION"]?>">
			<div class="form-group">
				<?echo GetMessage("CT_BSAC_LOGIN")?>
			</div>
			<div class="form-group">
				<input class="form-control" type="text" name="<?echo $arParams["LOGIN"]?>" maxlength="50" value="<?echo $arResult["LOGIN"]?>" size="17" placeholder="<?echo GetMessage("CT_BSAC_LOGIN")?>"/>
			</div>
			<div class="form-group">
				<input class="form-control" type="text" name="<?echo $arParams["CONFIRM_CODE"]?>" maxlength="50" value="<?echo $arResult["CONFIRM_CODE"]?>" size="17" style="<?echo GetMessage("CT_BSAC_CONFIRM_CODE")?>" placeholder="<?echo GetMessage("CT_BSAC_CONFIRM_CODE")?>" />
			</div>
			<div class="form-group">
				<input class="btn btn-primary" type="submit" value="<?echo GetMessage("CT_BSAC_CONFIRM")?>" />
				<input type="hidden" name="<?echo $arParams["USER_ID"]?>" value="<?echo $arResult["USER_ID"]?>" />
			</div>
		</form>
	</div>
<?elseif(!$USER->IsAuthorized()):?>
	<?$APPLICATION->IncludeComponent("bitrix:system.auth.authorize", "", array());?>
<?endif?>
</div>