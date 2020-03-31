<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true);
$this->addExternalCss('/bitrix/css/main/bootstrap.css');
?>
<?
$arImage = CFile::GetFileArray($arResult["PREVIEW_PICTURE"]["ID"]);
$file = CFile::ResizeImageGet($arImage, array('width' => 270, 'height' => 370), BX_RESIZE_IMAGE_EXACT);
$arResult["PREVIEW_PICTURE"]["RESIZE_IMAGE_SRC"] = $file["src"];
?>

<section class="doctorsDetail"><img class="doctorsDetail__photo" src="<?=$arResult["PREVIEW_PICTURE"]["RESIZE_IMAGE_SRC"]?>">
    <div class="doctorsDetail__description">
        <div class="doctorsDetail__position"><?=$arResult["PROPERTIES"]["PROFESSION"]["VALUE"]?></div>
        <div class="doctorsDetail__experience"><?=$arResult["PROPERTIES"]["EXPERIENCE"]["VALUE"]?></div>
        <button class="btn doctorsDetail__btn" data-fancybox="" data-src="#form__request" data-modal="true">Записаться на прием</button>
        <article>
            <?if(!empty($arResult["PREVIEW_TEXT"])){?>
            <h3>Образование</h3>
            <p><?=$arResult["PREVIEW_TEXT"]?></p>
            <?}?>
            <?if(!empty($arResult["DETAIL_TEXT"])){?>
            <h3>Стажировки</h3>
            <p><?=$arResult["DETAIL_TEXT"]?></p>
            <?}?>
            <?if(!empty($arResult["PROPERTIES"]["SCIENTIFIC_INTERESTS"]["VALUE"]["TEXT"])){?>
            <h3>Область научных интересов</h3>
            <p><?=$arResult["PROPERTIES"]["SCIENTIFIC_INTERESTS"]["VALUE"]["TEXT"]?></p>
            <?}?>
            <?if(!empty($arResult["PROPERTIES"]["CERTIFICATE"]["VALUE"])){?>
            <h3>Сертификаты</h3>
            <div class="photos">
                <?foreach($arResult["PROPERTIES"]["CERTIFICATE"]["VALUE"] as $elem):?>
                    <div class="photos__item">
                        <?$previewImg = CFile::ResizeImageGet($elem, array('width' => 270, 'height' => 205), BX_RESIZE_IMAGE_EXACT); ?>
                        <?$detailImg = CFile::ResizeImageGet($elem, array('width' => 700, 'height' => 900), BX_RESIZE_IMAGE_PROPORTIONAL_ALT); ?>
                        <a class="photos__link" href="<?=$detailImg["src"];?>" data-fancybox="photos"><img class="photos__photo" src="<?=$previewImg["src"];?>"></a>
                    </div>
                <?endforeach;?>
            </div>
            <?}?>
        </article>
    </div>
</section>
