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

<section class="box bg_green">
    <div class="case">
        <h2>Врачи</h2>
        <div class="doctorsSlider">
            <?foreach($arResult["ITEMS"] as $arItem):?>
                <?$renderImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], Array("width" => 290, "height" => 290), BX_RESIZE_IMAGE_EXACT, false); ?>
                <div class="doctorsSlider__item"><picture><img class="doctorsSlider__photo" src="<?=$renderImage["src"]?>"></picture>
                    <div class="doctorsSlider__title"><?=$arItem["NAME"]?></div>
                    <div class="doctorsSlider__position"><?=$arItem["PROPERTIES"]["PROFESSION"]["VALUE"]?></div>
                </div>
            <?endforeach;?>
        </div>
        <div class="case__center"><a class="btn btn_white" href="/doctors/">Все врачи</a></div>
    </div>
</section>
