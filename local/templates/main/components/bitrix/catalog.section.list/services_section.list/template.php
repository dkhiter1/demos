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


<section class="box bg_grey">
    <?
    function ElementListFunc($sectoinID) {
        CModule::IncludeModule("iblock");

            $arSelect = Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL");

            $arFilter = Array("IBLOCK_ID" => 10, "ACTIVE" => "Y", "SECTION_ID" =>$sectoinID );

            $res = CIBlockElement::GetList(
                Array(),
                $arFilter,
                false,
                false,
                $arSelect
            );

            $i=1;
            while ($ob = $res->GetNextElement()) {
                if ($i < 6) {
                    $arItem = $ob->GetFields();
                    $arItem["PROPERTIES"] = $ob->GetProperties();
                    $arResult[] = $arItem;
                    $i++;
                }
            }
            //print_r($arResult);
            return $arResult;
    }

    function ElementListPic() {
        CModule::IncludeModule("iblock");
        $rsResult = CIBlockSection::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => $arResult["IBLOCK_ID"], "ID" => $arResult["ID"]), false, $arSelect = array("UF_*"));
        $arSection = $rsResult->Fetch();
        print_r($arSection["PICTURE"]);
    }
    ?>
    <div class="case">
        <h2>Услуги</h2>
        <nav class="servicesMenu">
            <?foreach ($arResult["SECTIONS"] as $arSection){?>
            <li>
                <?$rsResult = CIBlockSection::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => $arSection["IBLOCK_ID"], "ID" => $arSection["ID"]), false, $arSelect = array("UF_*"));
                if($arSection = $rsResult->GetNext()) {
                    $arSection["UF_IMG_FONT"];
                }
                $imageSvg=CFile::GetPath($arSection["UF_IMG_FONT"]);
                ?>
                <div class="servicesMenu__item" style="background: url(<?=$imageSvg?>);">
                    <a class="servicesMenu__title" href="<?=$arSection["SECTION_PAGE_URL"]?>"><?=$arSection["NAME"]?></a>
                    <div class="servicesMenu__subMenu">

                        <?foreach (ElementListFunc($arSection["ID"]) as $arItem){ ?>
                        <a class="servicesMenu__link" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
                        <?}?>
                    </div>
                    <a class="servicesMenu__linkAll" href="<?=$arSection["SECTION_PAGE_URL"]?>">Все услуги</a>
                </div>
            </li>
            <?}?>
        </nav>
    </div>
</section>