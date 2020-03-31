<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?$countMenu = 0;?>
<? if(!empty($arResult)): ?>
<nav class="header__servicesMenuCase case">
    <ul class="header__servicesMenu">
            <? $previousLevel = 0;
            foreach($arResult as $arItem): ?>

            <? if($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
                <?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
            <? endif; ?>

            <? if($arItem["IS_PARENT"]): ?>

            <? if($arItem["DEPTH_LEVEL"] == 1): ?>
            <li class="one header__servicesMenuItem<? if($arItem["SELECTED"]): ?> first_lvl_selected<? endif; ?>" <?if($countMenu == 0):?>onmouseout="OutoverElement();"
                onmouseover="HoverElement();"<?endif?>><a href="<?=$arItem["LINK"]?>" class="one header__servicesMenuLink <? if($arItem["SELECTED"]): ?>root-item-selected<? else: ?>root-item<? endif; ?>"<?if($countMenu == 0):?>style="padding-left:0;"<?endif?> ><?if($countMenu == 0):?>

                            <?$countMenu = 1;?>
                        <?endif;?><?=$arItem["TEXT"]?></a>
                <ul class="one header__servicesSubMenu" style="height:470px">
                    <? else: ?>
                    <li class="two">
                <a href="<?=$arItem["LINK"]?>" class="two header__servicesSubMenuLink">
                  <?=$arItem["TEXT"]?>
                </a>
                        <ul class="two parent_lvl" >
                            <? endif; ?>
                            <? else: ?>
                                <? if($arItem["PERMISSION"] > "D"): ?>
                                    <? if($arItem["DEPTH_LEVEL"] == 1): ?>
                                        <li class="twree header__servicesMenuItem <? if($arItem["SELECTED"]): ?> first_lvl_selected<? endif; ?>"><a href="<?=$arItem["LINK"]?>" class="thewe header__servicesMenuLink <? if($arItem["SELECTED"]): ?>root-item-selected<? else: ?>root-item<? endif; ?>"><?=$arItem["TEXT"]?></a>
                                            <ul class="header__servicesSubMenu" data-header-services-sub-menu="1">
                                                <pre><?//var_dump($arItem);?></pre>
                                                <?foreach ($arItem["ID"] as $arItem){ ?>
                                                    <li><a class="header__servicesSubMenuLink" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></li>
                                                <?}?>
                                            </ul>
                                        </li>

                                    <? else: ?>
                                        <li<? if($arItem["SELECTED"]): ?> class="fore header__servicesMenuLink item-selected"<? endif; ?>><a class="foo" href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
                                    <? endif; ?>
                                <? endif; ?>
                            <? endif; ?>
                            <? $previousLevel = $arItem["DEPTH_LEVEL"]; ?>
                            <? endforeach; ?>
                            <? if($previousLevel > 1): ?>
                                <?=str_repeat("</ul></li>", ($previousLevel-1) );?>
                            <? endif; ?>
                        </ul>
</nav>

<? endif; ?>
