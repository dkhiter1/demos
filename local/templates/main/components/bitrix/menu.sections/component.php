<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */
CModule::IncludeModule("iblock");
$arSelect = array("ID", "IBLOCK_ID", "DETAIL_PAGE_URL", "IBLOCK_SECTION_ID", "NAME");
$arFilter = array(
	"ACTIVE" => "Y",
	"IBLOCK_ID" => $arParams["IBLOCK_ID"],
);

$rsElements = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
while($arElement = $rsElements->GetNext())
{
	$arResult["SECTIONS"][$arElement["IBLOCK_SECTION_ID"]]["ELEMENT_LIST"][] = $arElement;
}
return $arResult;
?>
