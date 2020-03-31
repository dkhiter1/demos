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
<pre><?//var_dump($arResult)?></pre>
<?
$arImage = CFile::GetFileArray($arResult["DETAIL_PICTURE"]["ID"]);
$file = CFile::ResizeImageGet($arImage, array('width' => 570, 'height' => 400), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);
$arResult["DETAIL_PICTURE"]["RESIZE_IMAGE_SRC"] = $file["src"];
?>
<article class="clearfix"><img class="actions__photo" src="<?=$arResult["DETAIL_PICTURE"]["RESIZE_IMAGE_SRC"]?>">
	<p><?=$arResult["PREVIEW_TEXT"]?></p>
	<h3>Фото центра</h3>
	<div class="photos">
		<?foreach($arResult["PROPERTIES"]["PHOTO_CENTER"]["VALUE"] as $elem):?>
				<div class="photos__item">
						<?$previewImg = CFile::ResizeImageGet($elem, array('width' => 370, 'height' => 370), BX_RESIZE_IMAGE_EXACT); ?>
						<?$detailImg = CFile::ResizeImageGet($elem, array('width' => 700, 'height' => 900), BX_RESIZE_IMAGE_PROPORTIONAL_ALT); ?>
						<a class="photos__link" href="<?=$detailImg["src"];?>" data-fancybox="photos"><img class="photos__photo" src="<?=$previewImg["src"];?>"></a>
				</div>
		<?endforeach;?>
	</div>
	<h3>Лицензии</h3>
	<div class="photos">
		<?foreach($arResult["PROPERTIES"]["LICENSE"]["VALUE"] as $elem):?>
				<div class="photos__item">
						<?$previewImg = CFile::ResizeImageGet($elem, array('width' => 270, 'height' => 205), BX_RESIZE_IMAGE_EXACT); ?>
						<?$detailImg = CFile::ResizeImageGet($elem, array('width' => 700, 'height' => 900), BX_RESIZE_IMAGE_PROPORTIONAL_ALT); ?>
						<a class="photos__link" href="<?=$detailImg["src"];?>" data-fancybox="photos"><img class="photos__photo" src="<?=$previewImg["src"];?>"></a>
				</div>
		<?endforeach;?>
	</div>
	<h3>Результаты СОУТ</h3>
    <div class="review-doc">
        <?
        $HaveFile = !empty($arResult["PROPERTIES"]["DOCUMENTS"]["VALUE"]);
        if($HaveFile):
        ?>
        <?foreach($arResult["PROPERTIES"]["DOCUMENTS"]["VALUE"] as $docID):?>
            <? $arFile = CFile::MakeFileArray($docID);?>
            <? $fileSrc = CFile::GetPath($docID);?>
            <div  class="review-item-doc">
                <img class="rew-doc-ico" src="<?=SITE_TEMPLATE_PATH?>/img/svg/pdf.svg">
                <a class="rew-doc-ico-href" target="_blank" href="<?=$fileSrc?>"><?=$arFile["name"]?></a>
            </div>
        <?endforeach;?>
    </div>
    <?endif;?>
    </div>
</article>
