<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__);
?>
</div>
<footer class="footer">
    <div class="container footer__container">
        <div class="footer__row row">
            <div class="col-md-8">
                <div class="footer__nav">
                    <?
                    $APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "bottom-menu",
                        array(
                            "ROOT_MENU_TYPE" => "bottom",
                            "MENU_CACHE_TYPE" => "A",
                            "MENU_CACHE_TIME" => "3600000",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "MENU_CACHE_GET_VARS" => array(),
                            "MAX_LEVEL" => "1",
                            "CHILD_MENU_TYPE" => "",
                            "USE_EXT" => "Y",
                            "ALLOW_MULTI_SELECT" => "N"
                        ),
                        false
                    );
                    ?>
                </div>
                <div class="footer__contacts">
                    <div class="footer__contacts-box">
                        <div class="footer_header">Контактная информация</div>
                    </div>
                    <div class="footer__contacts-box">
                        <p>
                            <? $APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => SITE_DIR . "include/footer_text.php"
                                )
                            ); ?>
                        </p>
                    </div>
                    <div class="footer__contacts-box"><span>
							<? $APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => SITE_DIR . "include/footer_phone.php"
                                )
                            ); ?>
							</span></div>
                    <div class="footer__contacts-box">
                        <p>
                            <? $APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => SITE_DIR . "include/footer_adress.php"
                                )
                            ); ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="footer__contacts-box">
                    <div class="footer_header">Социальные сети</div>
                </div>
                <ul class="footer__list footer__list--social">
                    <? $APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => SITE_DIR . "include/footer_soc.php"
                        )
                    ); ?>
                </ul>
            </div>
            <div class="col-md-2 footerCP">
                <div class="footer__contacts-box">
                    <div class="footer_header">Разработка и поддержка</div>
                </div>
                <div class="footer__contacts-box imgCP">
                    <? $APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => SITE_DIR . "include/footer_cp.php"
                        )
                    ); ?>
                </div>
                <div class="footer__contacts-box">
                    <p>
                        <? $APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
                                "AREA_FILE_SHOW" => "file",
                                "PATH" => SITE_DIR . "include/footer_cp_email.php"
                            )
                        ); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>