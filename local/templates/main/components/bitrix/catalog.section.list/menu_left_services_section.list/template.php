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


    <aside class="catalog__left">
        <nav class="catalogMenu">
        <?
        function ElementListFuncLeft($sectoinID) {
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
            <li class="catalogMenu__items"><a class="catalogMenu__title" href="<?=$arSection["SECTION_PAGE_URL"]?>"><?=$arSection["NAME"]?></a>
                <ul>
                    <?foreach (ElementListFuncLeft($arSection["ID"]) as $arItem){ ?>
                        <a class="catalogMenu__link" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
                    <?}?>
                </ul>
            </li>
        <?}?>
    </nav>
</aside>