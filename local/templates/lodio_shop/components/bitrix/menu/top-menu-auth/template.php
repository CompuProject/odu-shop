<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

if (!empty($arResult))
{
    ?><ul class="mobile-nav visible-xs"><?
    if (CUser::IsAuthorized()) {?>
        <li class="mobile-nav__item"><a href="/personal" class="nav__link blue">Личный кабинет</a></li>
        <li class="mobile-nav__item"><a href="?logout=yes" class="nav__link blue">Выйти</a></li>
    <?} else {?>
        <li class="mobile-nav__item"><a href="/auth" class="nav__link blue">Авторизоваться</a></li>
        <li class="mobile-nav__item"><a href="/auth/?register=yes" class="nav__link blue">Зарегистрироваться</a></li>
    <?}
    ?></ul><?
}