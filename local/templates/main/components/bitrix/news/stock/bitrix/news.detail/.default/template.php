<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
$renderImage = CFile::ResizeImageGet($arResult["PREVIEW_PICTURE"], Array("width" => 570, "height" => 570), BX_RESIZE_IMAGE_EXACT, false);
$APPLICATION->SetPageProperty('title', $arResult["NAME"]);
?>


<section class="case">
    <div class="actions__duration">Срок действия акции – <?=$arResult["PROPERTIES"]["STOCK_END"]["VALUE"]?></div>
    <article class="clearfix">
        <h3>Условия акции</h3><img class="actions__photo" src="<?=$renderImage["src"]?>">
        <p><b>В стоимость акции включено:</b></p>
        <ul>
            <?foreach($arResult["PROPERTIES"]["STOCK_INCLUDED"]["VALUE"] as $elem):?>
                <li><?=$elem?></li>
            <?endforeach;?>
        </ul>
        <p><b>Дополнительно оплачиваются:</b></p>
        <ul>
            <?foreach($arResult["PROPERTIES"]["ADDITIONAL_PAYMENT"]["VALUE"] as $elem):?>
                <li><?=$elem?></li>
            <?endforeach;?>
        </ul>
        <p><?=$arResult["DETAIL_TEXT"]?></p>
    </article>
</section>
