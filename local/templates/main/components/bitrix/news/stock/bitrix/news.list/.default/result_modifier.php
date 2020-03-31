<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach ($arResult["ITEMS"] as $key => $item) {
    $arImage = CFile::GetFileArray($item["PREVIEW_PICTURE"]["ID"]);
    $file = CFile::ResizeImageGet($arImage, array('width'=>270, 'height'=>270), BX_RESIZE_IMAGE_EXACT);
    $arResult["ITEMS"][$key]["RESIZE_IMAGE_SRC"][$key] = $file["src"];
}
