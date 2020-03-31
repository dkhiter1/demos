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

<section class="reviewsList">

    <?foreach($arResult["ITEMS"] as $key => $arItem):?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    ?>

    <div class="reviewsList__item clearfix">
        <?
        $pictureSrc[] = SITE_TEMPLATE_PATH."/img/no_photo.png";
        $havePhoto = (!empty($arItem["DETAIL_PICTURE"]));
        if ($havePhoto) {
            $pictureSrc = $arItem["RESIZE_IMAGE_SRC"];
        }
        ?>
        <img class="reviewsList__photo" border="0" src="<?=$pictureSrc[$key]?>" title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>">
        <div class="reviewsList__title"><?=$arItem["NAME"]?></div>
        <div class="reviewsList__date"><?=$arItem["DATE_CREATE"]?></div>
        <?global $USER;
        if ($USER->IsAdmin()){?><a class="reviewsList__original" href="<?=$arItem["RESIZE_IMAGE_DETAIL_SRC"][$key]?>" data-type="image">Показать оригинал</a><?}?>
        <div class="reviewsList__text"><?=$arItem["PREVIEW_TEXT"]?></div>
    </div>
        <?if($arItem["DETAIL_TEXT"]){?>
            <div class="reviewsList__item answer__admin">
                <img class="reviewsList__photo" border="0" src="<??>">
                <div class="answer__text">
                    <div class="reviewsList__title">Администрация</div>
                    <div class="reviewsList__date "><?=$arItem["TIMESTAMP_X"]?></div>
                </div>
                <div class="reviewsList__text"><?=$arItem["DETAIL_TEXT"]?></div>
            </div>
        <?}?>
    <?endforeach;?>
</section>


<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
