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
 *
 *  _________________________________________________________________________
 * |	Attention!
 * |	The following comments are for system use
 * |	and are required for the component to work correctly in ajax mode:
 * |	<!-- items-container -->
 * |	<!-- pagination-container -->S
 * |	<!-- component-end -->
 */
$this->setFrameMode(true);

$rsResult = CIBlockSection::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => $arResult["IBLOCK_ID"], "ID" => $arResult["ID"]), false, $arSelect = array("UF_*"));
if($arSection = $rsResult->GetNext()) {
   $arSection["UF_ADVANTAGES"];
}
$rfResult = CIBlockSection::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => $arResult["IBLOCK_ID"], "ID" => $arResult["ID"]), false, $arSelect = array("UF_*"));
if($arSection = $rfResult->GetNext()) {
    $arSection["UF_IMG_OUR_WORKS"];
}
?>
    <article class="catalog__main">
        <div class="box-image box-content"><img src="<?=$arResult["PICTURE"]["RESIZE_IMAGE_SRC"]?>">
            <p><?=$arResult["DESCRIPTION"]?></p>
        </div>
        <div class="box-content">
            <h3>Услуги</h3>
            <nav class="article__menu">
                <?foreach($arResult["ITEMS"] as $key => $arItem):?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="article__menuItem"><a class="article__menuLink" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></div>
                <?endforeach;?>
            </nav>
        </div>
        <?if(!empty($arSection["UF_ADVANTAGES"])){?>
        <div class="box-content">
            <h3>Преимущества</h3>
            <ul>
                <?foreach($arSection["UF_ADVANTAGES"] as $elem):?>
                <li><?=$elem?></li>
                <?endforeach;?>
            </ul>
        </div>
        <?}?>
        <?if(!empty($arSection["UF_IMG_OUR_WORKS"])){?>
        <div class="box-content">
            <h3>Наши работы</h3>
            <div class="photos">

                <?foreach($arSection["UF_IMG_OUR_WORKS"] as $elem):?>

                <div class="photos__item">
                    <?$previewImg = CFile::ResizeImageGet($elem, array('width' => 270, 'height' => 270), BX_RESIZE_IMAGE_EXACT); ?>
                    <?$detailImg = CFile::ResizeImageGet($elem, array('width' => 700, 'height' => 900), BX_RESIZE_IMAGE_PROPORTIONAL_ALT); ?>
                    <a class="photos__link" href="<?=$detailImg["src"];?>" data-fancybox="photos"><img class="photos__photo" src="<?=$previewImg["src"];?>"></a>
                </div>
                <?endforeach;?>
            </div>
        </div>
        <?}?>
    </article>