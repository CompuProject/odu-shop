<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("КОНТАКТЫ");

?><div class="content-wrap"><?
	?><div class="container confirm"><?
		?><h1 class="title decor-title"><span>Наши </span><span>контакты</span></h1><?
		?><div class="confirm__row"><?
			?><div class="divider-wrap"><?
				?><h2 class="confirm__title divider">Свяжитесь с нами</h2><?
			?></div><?
			?><div class="confirm__form confirm__item"><?
				?><div class="row"><?
					global $arSite;
					$APPLICATION->IncludeComponent(
						"bitrix:main.feedback",
						"feedback",
						Array(
							"EMAIL_TO" => $arSite['EMAIL'],											
							"OK_TEXT" => "Спасибо, ваше сообщение принято.",
							"REQUIRED_FIELDS" => array("NAME","EMAIL","MESSAGE"),
							"USE_CAPTCHA" => "Y"
						)
						);
				?></div><?
			?></div><?
		?></div><?
		?><div class="confirm__row"><?
			?><div class="divider-wrap"><?
				?><h2 class="confirm__title divider">Наше расположение</h2><?
			?></div><?
			?><div class="confirm__form confirm__item"><?
				?><div class="row"><?
					
					?><div class="col-sm-12"><?
						?><div class="row"><?
							?><div class="confirm__form-item col-sm-12"><?
								?><script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=3f4FfaHkOsJfFKeIMmCY1JJmsoR_5eOh&width=100%&height=254&lang=ru_RU&sourceType=constructor&scroll=true" data-skip-moving="true"></script><?
							?></div><?
							?><div class="confirm__form-item col-sm-12"><?
								?><label title="">681320 Ивановская область, г.Иваново,</label><?
								?><label title="">ул.Иванова, д.1.</label><?
								?><label title="">Телефон: 8 959 111 1111</label><?
								?><label title="">Факс: 8 959 111 1112</label><?
								?><label title="">E-mail: <a href="mailto:mail@example.com">mail@example.com</a></label><?
							?></div><?
						?></div><?
					?></div><?				
				?></div><?
			?></div><?
		?></div><?
	?></div><?
?></div><?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>