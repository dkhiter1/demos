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

<nav class="servicesMenu">
    <li>
    <?
    function ElementListFuncMobMenu($sectoinID) {
        CModule::IncludeModule("iblock");

            $arSelect = Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL");
            //IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше

            $arFilter = Array("IBLOCK_ID" => 10, "ACTIVE" => "Y", "SECTION_ID" =>$sectoinID );

            $res = CIBlockElement::GetList(
                Array(),
                $arFilter,
                false,
                false,
                $arSelect
            );

            while ($ob = $res->GetNextElement()) {
                    $arItem = $ob->GetFields();
                    $arItem["PROPERTIES"] = $ob->GetProperties();
                    $arResult[] = $arItem;
                }
            //print_r($arResult);
            return $arResult;
    }
    ?>
        <?foreach ($arResult["SECTIONS"] as $arSection){?>
        <div class="servicesMenu__item"><a class="servicesMenu__title" href="<?=$arSection["SECTION_PAGE_URL"]?>"><?=$arSection["NAME"]?></a>

            <div class="servicesMenu__subMenu">
                <?foreach (ElementListFuncMobMenu($arSection["ID"]) as $arItem){ ?>
                    <a class="servicesMenu__link" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
                <?}?>
            </div>

        </div>
        <?}?>
    </li>
</nav>