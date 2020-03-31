<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */


    $arImage = CFile::GetFileArray($arResult["PICTURE"]["ID"]);
    $file = CFile::ResizeImageGet($arImage, array('width' => 370, 'height' => 370), BX_RESIZE_IMAGE_EXACT);
    $arResult["PICTURE"]["RESIZE_IMAGE_SRC"] = $file["src"];


$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();
