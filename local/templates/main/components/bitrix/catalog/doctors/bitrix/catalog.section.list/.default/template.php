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
$this->setFrameMode(true);
?>



<section class="catalog">
  <aside class="catalog__right">
      <nav class="catalogFilter">
          <?
          foreach ($arResult['SECTIONS'] as $id => &$arSection) {
              $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
              $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

              if ($arSection["DEPTH_LEVEL"] == "1") { ?>
                  <? if ($id != 0) { echo "</ul></li>"; } ?>
                  <li class="catalogFilter__item">
                      <a class="<?if ($arItem["SELECTED"]):?>catalogFilter__title catalogFilter__title__active<?else:?>catalogFilter__title<?endif?>" href="<?=$arSection['SECTION_PAGE_URL']?>"><?=$arSection["NAME"]?></a>
                  </li>
              <? }
          }
          echo "</ul></li>";?>
      </nav>
  </aside>
