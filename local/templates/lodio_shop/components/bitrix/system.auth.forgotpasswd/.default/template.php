<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?
?>
<?if ($APPLICATION->GetCurDir() == '/auth/'):?>
<div class="container">
	<h1 class="title decor-title"><?$APPLICATION->ShowTitle(false)?></h1>
<?endif;?>
<div class="data-table bx-forgotpass-table">
<?ShowMessage($arParams["~AUTH_RESULT"]);?>
<form name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
<?
if (strlen($arResult["BACKURL"]) > 0)
{
?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?
}
?>
	<input type="hidden" name="AUTH_FORM" value="Y">
	<input type="hidden" name="TYPE" value="SEND_PWD">
	<p style="text-align:justify;">
	<?=GetMessage("AUTH_FORGOT_PASSWORD_1")?>
	</p>
	<div class="form-group">
		<p style="text-align:justify;">
		<b><?=GetMessage("AUTH_GET_CHECK_STRING")?></b>
		</p>
	</div>
	<div class="form-group">
		<input class="form-control" type="text" name="USER_LOGIN" maxlength="50" value="<?=$arResult["LAST_LOGIN"]?>" placeholder="<?=GetMessage("AUTH_LOGIN")?>" />
	</div>
	<div class="form-group">
		<?=GetMessage("AUTH_OR")?>
	</div>
	<div class="form-group">
		<input class="form-control" type="text" name="USER_EMAIL" maxlength="255" placeholder="<?=GetMessage("AUTH_EMAIL")?>" />
	</div>
	<?if($arResult["USE_CAPTCHA"]):?>
		<div class="form-group">
				<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
				<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
		</div>
		<div class="form-group">
			<input class="form-control" type="text" name="captcha_word" maxlength="50" value="" placeholder="<?echo GetMessage("system_auth_captcha")?>" />
		</div>
	<?endif?>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="send_account_info" value="<?=GetMessage("AUTH_SEND")?>" />
	</div>
<p>
	<a href="<?=$arResult["AUTH_AUTH_URL"]?>"><b><?=GetMessage("AUTH_AUTH")?></b></a>
</p> 
</form>
<script type="text/javascript">
document.bform.USER_LOGIN.focus();
</script>
</div>
<?if ($APPLICATION->GetCurDir() == '/auth/'):?>
	</div>
<?endif;?>

