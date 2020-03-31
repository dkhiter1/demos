<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);

$bUrlString = $APPLICATION->GetCurDir();
$servicesStr = "services";
$pos = strpos($bUrlString, $servicesStr);
    if($pos === false) {
        $bIsServices = false;
    } else {
        $bIsServices = true;
    }

$bIsMainPage =  $APPLICATION->GetCurPage(false) == SITE_DIR;
?>
<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID;?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?$APPLICATION->ShowTitle()?></title>
    <?$APPLICATION->ShowHead();?>
    <meta name="theme-color" content="#fff">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="shortcut icon" href="<?=SITE_TEMPLATE_PATH?>/img/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" sizes="16x16" href="<?=SITE_TEMPLATE_PATH?>/img/favicons/favicon-16x16.png" type="image/png">
    <link rel="icon" sizes="32x32" href="<?=SITE_TEMPLATE_PATH?>/img/favicons/favicon-32x32.png" type="image/png">
    <link rel="apple-touch-icon-precomposed" href="<?=SITE_TEMPLATE_PATH?>/img/favicons/apple-touch-icon-precomposed.png">
    <link rel="apple-touch-icon" href="<?=SITE_TEMPLATE_PATH?>/img/favicons/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="57x57" href="<?=SITE_TEMPLATE_PATH?>/img/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?=SITE_TEMPLATE_PATH?>/img/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?=SITE_TEMPLATE_PATH?>/img/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?=SITE_TEMPLATE_PATH?>/img/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?=SITE_TEMPLATE_PATH?>/img/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?=SITE_TEMPLATE_PATH?>/img/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?=SITE_TEMPLATE_PATH?>/img/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?=SITE_TEMPLATE_PATH?>/img/favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="167x167" href="<?=SITE_TEMPLATE_PATH?>/img/favicons/apple-touch-icon-167x167.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?=SITE_TEMPLATE_PATH?>/img/favicons/apple-touch-icon-180x180.png">
    <link rel="apple-touch-icon" sizes="1024x1024" href="<?=SITE_TEMPLATE_PATH?>/img/favicons/apple-touch-icon-1024x1024.png">
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/styles/main.css");?>
    <?$APPLICATION->SetAdditionalCSS("https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css");?>
    <?$APPLICATION->SetAdditionalCSS("https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css");?>
    <?$APPLICATION->AddHeadScript("https://code.jquery.com/jquery-3.4.1.min.js");?>
    <?$APPLICATION->AddHeadScript("https://code.jquery.com/ui/1.12.1/jquery-ui.min.js");?>
    <?$APPLICATION->AddHeadScript("https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js");?>
    <?$APPLICATION->AddHeadScript("https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js");?>
    <?$APPLICATION->AddHeadScript("https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js");?>
    <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/main.js");?>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=6c817fb5-1757-477b-81d0-82f479d53338" type="text/javascript"></script>
    <script src="/contacts/polyline_animation.js" type="text/javascript"></script>
    <script src="/contacts/animated_line.js" type="text/javascript"></script>
</head>
<body>
<?$APPLICATION->ShowPanel()?>
<header class="header">
    <div class="header__top">
        <div class="header__mainMenuCase case">
            <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"header_menu_info", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "menu_info",
		"COMPONENT_TEMPLATE" => "header_menu_info",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_THEME" => "site",
		"ROOT_MENU_TYPE" => "menu_info",
		"USE_EXT" => "N"
	),
	false
);?>
            <div class="header__address">
                <?$APPLICATION->IncludeFile(
                        SITE_DIR."include/adresshead.php",
                        array(),
                        array(
                                "MODE" => "text"
                        )
                );?>
            </div>
        </div>
    </div>
    <div class="header__center case">
        <div class="header__mobileMenuIcon"></div>
        <div class="header__logoCase">
            <a class="header__logo" href="/">
                <img class="header__logoImg" src="<?=SITE_TEMPLATE_PATH?>/img/header/logo.png">
            </a>
        </div>
       <div class="header__phone"><a href="tel:+7(812) 701-81-00">
            <?$APPLICATION->IncludeFile(
                SITE_DIR."include/phone.php",
                array(),
                array(
                    "MODE" => "text"
                )
            );?>
        </a>
       </div>
        <div class="header__search">
            <a href="/search/"><button class="footer__aboutItem header__searchBtn"></button></a>
        </div>
        <button class="btn header__btn" data-fancybox data-src="#form__request" data-modal="true">Записаться на прием</button>
    </div>
    <?$APPLICATION->IncludeComponent(
        "bitrix:catalog.section.list",
        "menu_services_section.list",
        array(

            "ADD_SECTIONS_CHAIN" => "N",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "COMPONENT_TEMPLATE" => "menu_services_section.list",
            "COUNT_ELEMENTS" => "Y",
            "FILTER_NAME" => "sectionsFilter",
            "HIDE_SECTION_NAME" => "N",
            "IBLOCK_ID" => "10",
            "IBLOCK_TYPE" => "info",
            "SECTION_CODE" => "",
            "SECTION_FIELDS" => array(
                0 => "",
                1 => "",
            ),
            "SECTION_ID" => $_REQUEST["SECTION_ID"],
            "SECTION_URL" => "",
            "INCLUDE_SUBSECTIONS" => "Y",
            "SECTION_USER_FIELDS" => array(
                0 => "",
                1 => "",
            ),
            "SHOW_PARENT_NAME" => "Y",
            "TOP_DEPTH" => "3",
            "VIEW_MODE" => "LIST"
        ),
        false
    );?>
</header>
<section class="header__mobileMenu">
    <?$APPLICATION->IncludeComponent(
        "bitrix:catalog.section.list",
        "mobile_menu_services_section.list",
        array(

            "ADD_SECTIONS_CHAIN" => "N",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "COMPONENT_TEMPLATE" => "mobile_menu_services_section.list",
            "COUNT_ELEMENTS" => "Y",
            "FILTER_NAME" => "sectionsFilter",
            "HIDE_SECTION_NAME" => "N",
            "IBLOCK_ID" => "10",
            "IBLOCK_TYPE" => "info",
            "SECTION_CODE" => "",
            "SECTION_FIELDS" => array(
                0 => "",
                1 => "",
            ),
            "SECTION_ID" => $_REQUEST["SECTION_ID"],
            "SECTION_URL" => "",
            "INCLUDE_SUBSECTIONS" => "Y",
            "SECTION_USER_FIELDS" => array(
                0 => "",
                1 => "",
            ),
            "SHOW_PARENT_NAME" => "Y",
            "TOP_DEPTH" => "3",
            "VIEW_MODE" => "LIST"
        ),
        false
    );?>
</section>
<div class="page">
    <?if(!$bIsMainPage) {?>
    <section class="case">
        <?$APPLICATION->IncludeComponent(
            "bitrix:breadcrumb",
            "curmbs",
            Array(
                "PATH" => "",
                "SITE_ID" => "s1",
                "START_FROM" => "0"
            )
        );?>
        <h1><?$APPLICATION->ShowTitle();?></h1>
    <? } ?>

    <? if($bIsServices) {?>
        <section class="catalog">
        <?$APPLICATION->IncludeComponent(
            "bitrix:catalog.section.list",
            "menu_left_services_section.list",
            array(

                "ADD_SECTIONS_CHAIN" => "N",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "CACHE_TIME" => "36000000",
                "CACHE_TYPE" => "A",
                "COMPONENT_TEMPLATE" => "menu_left_services_section.list",
                "COUNT_ELEMENTS" => "Y",
                "FILTER_NAME" => "sectionsFilter",
                "HIDE_SECTION_NAME" => "N",
                "IBLOCK_ID" => "10",
                "IBLOCK_TYPE" => "info",
                "SECTION_CODE" => "",
                "SECTION_FIELDS" => array(
                    0 => "",
                    1 => "",
                ),
                "SECTION_ID" => $_REQUEST["SECTION_ID"],
                "SECTION_URL" => "",
                "INCLUDE_SUBSECTIONS" => "Y",
                "SECTION_USER_FIELDS" => array(
                    0 => "",
                    1 => "",
                ),
                "SHOW_PARENT_NAME" => "Y",
                "TOP_DEPTH" => "3",
                "VIEW_MODE" => "LIST"
            ),
            false
        );?>
    <?} ?>
