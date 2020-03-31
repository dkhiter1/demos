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
$this->setFrameMode(true);?>

<section class="mainSliders case">
    <div class="mainSliders__slider">
        <?foreach($arResult["ITEMS"] as $arItem):?>
        <div>
            <div class="mainSliders__item">
                <div class="mainSliders__title"><?=$arItem["PREVIEW_TEXT"]?></div><img class="mainSliders__photo" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>">
            </div>
        </div>
        <?endforeach;?>
    </div>
</section>