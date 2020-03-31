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

<section class="box">
    <div class="case">
        <h2>Отзывы</h2>
        <div class="reviewsShort">
            <?foreach($arResult["ITEMS"] as $key => $arItem):?>
            <div class="reviewsShort__itemCase">
                <div class="reviewsShort__item"><?
                    $pictureSrc[] = SITE_TEMPLATE_PATH."/img/no_photo.png";
                    $havePhoto = (!empty($arItem["DETAIL_PICTURE"]));
                    if ($havePhoto) {
                        $pictureSrc = $arItem["RESIZE_IMAGE_SRC"];
                    }
                    ?>
                    <img class="reviewsShort__photo" src="<?=$pictureSrc[$key]?>">
                    <div class="reviewsShort__title"><?=$arItem["NAME"]?></div>
                    <div class="reviewsShort__date"><?=$arItem["DATE_CREATE"]?></div>
                    <div class="reviewsShort__text"><?=TruncateText($arItem["PREVIEW_TEXT"], 250);?></div>
                </div>
            </div>
            <?endforeach;?>
        </div>
        <div class="case__center"><a class="btn btn_green" href="/reviews/">Все отзывы</a></div>
    </div>
</section>
