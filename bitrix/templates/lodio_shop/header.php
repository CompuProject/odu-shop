<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();

$curDir = $APPLICATION->GetCurDir();

?><!DOCTYPE html><?
?><html><?
	?><head><?
		?><title><?$APPLICATION->ShowTitle();?></title><?
		?><meta name="viewport" content="width=device-width, initial-scale=1"><?
		?><link rel="shortcut icon" type="image/x-icon" href="<?=SITE_TEMPLATE_PATH?>/favicon.ico" /><?
		?><script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script><?	
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/bootstrap.js");
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/slick.min.js");
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/velocity.js");
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/velocity.ui.js");
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/jquery.nice-select.min.js");
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/jquery.mixitup.js");
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/main.js");
		
		$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/css/slick.css");
		if (mb_internal_encoding()=="Windows-1251")
			{
				$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/css/slick-theme.css");
			}
			else
			{
				$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/css/slick-theme-u8.css");
			};
		$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/css/nice-select.css");
		$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/css/bootstrap.css");
		$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/css/font-awesome.css");
		$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/css/main.css");
		$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/css/media.css");
		
		$APPLICATION->ShowHead();
		
	?></head><?
	?><body><?
		?><div id="panel"><?
			$APPLICATION->ShowPanel();
		?></div><?
		?><!--[if lt IE 10]><?
		?><p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]--><?
		?><div class="wrap"><?
			?><header class="header"><?
				?><div class="container"><?
					?><div class="header__inner"><?
						?><a href="<?=SITE_DIR?>" class="logo">
							<?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
									"AREA_FILE_SHOW" => "file", 
									"PATH" => SITE_DIR . "include/header_logo.php"
								)
							);?>
						</a>
						<?$APPLICATION->IncludeComponent(
							"bitrix:menu",
							"top-menu-multi",
							array(
								"ROOT_MENU_TYPE" => "top",
								"MENU_CACHE_TYPE" => "A",
								"MENU_CACHE_TIME" => "3600000",
								"MENU_CACHE_USE_GROUPS" => "N",
								"MENU_CACHE_GET_VARS" => array(),
								"MAX_LEVEL" => "1",
								"USE_EXT" => "Y",
								"ALLOW_MULTI_SELECT" => "N"
							),
							false
						);?>
						<div class="header__buttons">
							<?$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.line","main-basket",Array(
									"HIDE_ON_BASKET_PAGES" => "N",
									"PATH_TO_BASKET" => SITE_DIR."personal/cart/",
									"PATH_TO_ORDER" => SITE_DIR."personal/order/make/",
									"PATH_TO_PERSONAL" => SITE_DIR."personal/",
									"PATH_TO_PROFILE" => SITE_DIR."personal/",
									"PATH_TO_REGISTER" => SITE_DIR."login/",
									"POSITION_FIXED" => "Y",
									"POSITION_HORIZONTAL" => "right",
									"POSITION_VERTICAL" => "top",
									"SHOW_AUTHOR" => "Y",
									"SHOW_DELAY" => "N",
									"SHOW_EMPTY_VALUES" => "Y",
									"SHOW_IMAGE" => "Y",
									"SHOW_NOTAVAIL" => "N",
									"SHOW_NUM_PRODUCTS" => "Y",
									"SHOW_PERSONAL_LINK" => "N",
									"SHOW_PRICE" => "Y",
									"SHOW_PRODUCTS" => "Y",
									"SHOW_SUBSCRIBE" => "Y",
									"SHOW_SUMMARY" => "Y",
									"SHOW_TOTAL_PRICE" => "Y"
								)
							);?>
							<div class="mobile-menu"><a data-toggle="collapse" href="#mobileMenu" class="mobile-menu__btn"><span></span></a></div><?
						?></div><?
					?></div><?
				?></div><?
			?></header><?
			?><section id="mobileMenu" class="collapse">
				<?$APPLICATION->IncludeComponent(
							"bitrix:menu",
							"top-menu-mobile",
							array(
								"ROOT_MENU_TYPE" => "top",
								"MENU_CACHE_TYPE" => "A",
								"MENU_CACHE_TIME" => "3600000",
								"MENU_CACHE_USE_GROUPS" => "N",
								"MENU_CACHE_GET_VARS" => array(),
								"MAX_LEVEL" => "1",
								"CHILD_MENU_TYPE" => "menulevel2",
								"USE_EXT" => "Y",
								"ALLOW_MULTI_SELECT" => "N"
							),
							false
						);?>
			</section><?
			if ($curDir != SITE_DIR)
			{
				$APPLICATION->IncludeComponent("bitrix:breadcrumb","",Array(
						"START_FROM" => "0", 
						"PATH" => "",
					)
				);
			}