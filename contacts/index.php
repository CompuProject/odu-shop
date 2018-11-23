<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("КОНТАКТЫ");
?>
    <div class="container confirm">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="title decor-title"><span>Наши </span><span>контакты</span></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="confirm__order confirm__title">Свяжитесь с нами</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <? global $arSite;
                        $APPLICATION->IncludeComponent(
                            "bitrix:main.feedback",
                            "feedback",
                            Array(
                                "EMAIL_TO" => $arSite['EMAIL'],
                                "OK_TEXT" => "Спасибо, ваше сообщение принято.",
                                "REQUIRED_FIELDS" => array("NAME", "EMAIL", "MESSAGE"),
                                "USE_CAPTCHA" => "Y"
                            )
                        ); ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="confirm__order confirm__title">Наше расположение</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <script type="text/javascript" charset="utf-8" async
                                src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A72bd28a24b2be19b6203605176b6caeea7df41255e83d047252a25bfbc7f833c&amp;width=565&amp;height=320&amp;lang=ru_RU&amp;scroll=true"></script>
                    </div>
                </div>
                <div class="row">
                    <div class="confirm__form-item contant_data_bottom col-sm-12">
                        <label title="">390013 Рязанская область, г.Рязань,</label>
                        <label title=""> Московское шоссе, 5а. ТЦ «Барс на Московском», 1 этаж</label>
                        <label title="">Телефон: 8 (4912) 95-26-00</label>
                        <label title="">E-mail: <a href="moda-ryazan@yandex.ru">moda-ryazan@yandex.ru</a></label>
                    </div>
                </div>
            </div>
        </div>
    </div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>