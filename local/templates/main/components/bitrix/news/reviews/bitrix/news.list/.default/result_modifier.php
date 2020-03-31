<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach ($arResult["ITEMS"] as $key => $item) {
    $arImage = CFile::GetFileArray($item["DETAIL_PICTURE"]["ID"]);
    $file = CFile::ResizeImageGet($arImage, array('width'=>75, 'height'=>75), BX_RESIZE_IMAGE_EXACT);
    $arResult["ITEMS"][$key]["RESIZE_IMAGE_SRC"][$key] = $file["src"];

    $arImageDetail = CFile::GetFileArray($item["PREVIEW_PICTURE"]["ID"]);
    $fileDetail = CFile::ResizeImageGet($arImageDetail, array('width'=>500, 'height'=>700), BX_RESIZE_IMAGE_EXACT);
    $arResult["ITEMS"][$key]["RESIZE_IMAGE_DETAIL_SRC"][$key] = $fileDetail["src"];
}
