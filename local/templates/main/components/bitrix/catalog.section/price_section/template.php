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

    <div class="catalogPrice__item">
        <?foreach($arResult["ITEMS"] as $key => $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="catalogPrice__header">
            <div class="catalogPrice__title"><?=$arItem["NAME"]?></div>
            <div class="catalogPrice__price"><?=$arItem["PROPERTIES"]["SERVICES_PRICE"]["VALUE"]?> ₽</div>
            <div class="catalogPrice__marker catalogPrice__marker__close"></div>
        </div>
        <div class="catalogPrice__description">
            <p> <?=$arItem["PREVIEW_TEXT"]?></p>
            <button class="btn" data-fancybox data-src="#form__request" data-modal="true">Записаться на прием</button>
        </div>
        <?endforeach;?>
        <div class="catalogPrice__offer">Обращаем ваше внимание на то, что вся представленная на сайте информация, касающаяся оказываемых услуг,
            а также стоимости услуг носит информационный характер и ни при каких условиях не является публичной офертой,
                определяемой положениями Статьи 437 (2) Гражданского кодекса Российской Федерации.</div>

    </div>
