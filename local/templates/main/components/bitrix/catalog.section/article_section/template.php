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
 * |	<!-- pagination-container -->
 * |	<!-- component-end -->
 */
$this->setFrameMode(true);

$rsResult = CIBlockSection::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => $arResult["IBLOCK_ID"], "ID" => $arResult["ID"]), false, $arSelect = array("UF_*"));
if($arSection = $rsResult->GetNext()) {
$arSection["UF_ADVANTAGES"];
}
$rfResult = CIBlockSection::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => $arResult["IBLOCK_ID"], "ID" => $arResult["ID"]), false, $arSelect = array("UF_*"));
if($arSection = $rfResult->GetNext()) {
$arSection["PROFESSION"];
}
?>


    <div class="articlesList">
        <?foreach($arResult["ITEMS"] as $key => $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <a class="articlesList__item clearfix" href="<?=$arItem["DETAIL_PAGE_URL"]?>">
            <?
            $arImage = CFile::GetFileArray($arItem["PREVIEW_PICTURE"]["ID"]);
            $file = CFile::ResizeImageGet($arImage, array('width' => 270, 'height' => 200), BX_RESIZE_IMAGE_EXACT);
            $arItem["PREVIEW_PICTURE"]["RESIZE_IMAGE_SRC"] = $file["src"];
            ?>
            <img class="articlesList__photo" src="<?=$arItem["PREVIEW_PICTURE"]["RESIZE_IMAGE_SRC"]?>">
            <div class="articlesList__title"><?=$arItem["NAME"]?></div>
            <div class="articlesList__description">
                <?=TruncateText($arItem["PREVIEW_TEXT"], 200);?>
            </div>
        </a>
        <?endforeach;?>
    </div>


