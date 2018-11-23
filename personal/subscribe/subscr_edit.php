<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

?><div class="content-wrap"><?
	?><div class="container confirm"><?
		?><h1 class="title decor-title"><span>Оформление </span><span>подписки</span></h1><?
		?><div class="confirm__row"><?
			?><div class="divider-wrap"><?
				?><h2 class="confirm__title divider">Авторизация</h2><?
			?></div><?
			?><div class="confirm__form confirm__item"><?
				?><div class="row"><?
					$APPLICATION->IncludeComponent("bitrix:subscribe.edit","main-subscribe",Array(
									"AJAX_MODE" => "N", 
									"SHOW_HIDDEN" => "Y", 
									"ALLOW_ANONYMOUS" => "Y", 
									"SHOW_AUTH_LINKS" => "Y", 
									"CACHE_TYPE" => "A", 
									"CACHE_TIME" => "3600", 
									"SET_TITLE" => "Y", 
									"AJAX_OPTION_JUMP" => "N", 
									"AJAX_OPTION_STYLE" => "Y", 
									"AJAX_OPTION_HISTORY" => "N" 
								),
								false
							);
				?></div><?
			?></div><?
		?></div><?
	?></div><?
?></div><?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>