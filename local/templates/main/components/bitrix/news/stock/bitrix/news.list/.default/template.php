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
?>

<section class="actions">
    <div class="actionsList">
    <?$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'))); ?>

        <?foreach($arResult["ITEMS"] as $key => $arItem):?>
            <div class="actionsList__item"><a class="actionsList__link" href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                <div class="actionsList__photo"><img src="<?=$arItem["RESIZE_IMAGE_SRC"][$key]?>"></div>
                <div class="actionsList__duration"><?=$arItem["PROPERTIES"]["STOCK_END"]["VALUE"]?></div>
                <div class="actionsList__title"><?=$arItem["NAME"]?></div></a>
            </div>
        <?endforeach;?>
    </div>
</section>
