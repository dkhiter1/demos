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
 * @var string $templateFolder
 */

$this->setFrameMode(true);
$this->addExternalCss('/bitrix/css/main/bootstrap.css');
$renderImage = CFile::ResizeImageGet($arResult["PREVIEW_PICTURE"], Array("width" => 570, "height" => 570), BX_RESIZE_IMAGE_EXACT, false);
$APPLICATION->SetPageProperty('title', $arResult["NAME"]);
?>


<section class="case">
    <article class="clearfix">
        <img class="actions__photo" src="<?=$renderImage["src"]?>">
        <p><?=$arResult["PREVIEW_TEXT"]?></p>
    </article>
</section>
