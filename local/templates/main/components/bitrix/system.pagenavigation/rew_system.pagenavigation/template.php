<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/** @var array $arParams */
/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */

$this->setFrameMode(true);

if(!$arResult["NavShowAlways"])
{
    if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
        return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");

$colorSchemes = array(
    "green" => "bx-green",
    "yellow" => "bx-yellow",
    "red" => "bx-red",
    "blue" => "bx-blue",
);
if(isset($colorSchemes[$arParams["TEMPLATE_THEME"]]))
{
    $colorScheme = $colorSchemes[$arParams["TEMPLATE_THEME"]];
}
else
{
    $colorScheme = "";
}
?>

<div class="pagination">

            <?if($arResult["bDescPageNumbering"] === true):?>

                <?if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
                    <?if($arResult["bSavePage"]):?>
                        <a class="pagination__item" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><span><?echo GetMessage("round_nav_back")?></span></a>
                        <a class="pagination__item" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><span>1</span></a>
                    <?else:?>
                        <?if (($arResult["NavPageNomer"]+1) == $arResult["NavPageCount"]):?>
                            <a class="pagination__item" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><div class="pagination__arrows pagination__prev"><?echo GetMessage("round_nav_back")?></div></a>
                        <?else:?>
                            <a class="pagination__item" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><div class="pagination__arrows pagination__prev"><?echo GetMessage("round_nav_back")?></div></a>
                        <?endif?>
                        <a class="pagination__item" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">1</a>
                    <?endif?>
                <?else:?>
                    <div class="pagination__arrows pagination__prev left_arrow"><?echo GetMessage("round_nav_back")?></div>
                    <a class="bx-pagination__item pagination__item__active">1</a>
                <?endif?>

                <?
                $arResult["nStartPage"]--;
                while($arResult["nStartPage"] >= $arResult["nEndPage"]+1):
                    ?>
                    <?$NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;?>

                    <?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
                    <div class="pagination__item"><?=$NavRecordGroupPrint?></div>
                <?else:?>
                    <a class="pagination__item" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><div class="pagination__item"><?=$NavRecordGroupPrint?></div></a>
                <?endif?>

                    <?$arResult["nStartPage"]--?>
                <?endwhile?>

                <?if ($arResult["NavPageNomer"] > 1):?>
                    <?if($arResult["NavPageCount"] > 1):?>
                        <a class="pagination__item" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1"><?=$arResult["NavPageCount"]?></a>
                    <?endif?>
                    <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><div class="pagination__arrows pagination__next"><?echo GetMessage("round_nav_forward")?></div></a>
                <?else:?>
                    <?if($arResult["NavPageCount"] > 1):?>
                        <div class="pagination__item"><?=$arResult["NavPageCount"]?></div>
                    <?endif?>
                    <div class="pagination__arrows pagination__next right_arrow"><?echo GetMessage("round_nav_forward")?></div>
                <?endif?>

            <?else:?>

                <?if ($arResult["NavPageNomer"] > 1):?>
                    <?if($arResult["bSavePage"]):?>
                        <a class="pagination__item" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><div class="pagination__arrows pagination__prev left_arrow"><?echo GetMessage("round_nav_back")?></div></a></a>
                        <a class="pagination__item" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1">1</a>
                    <?else:?>
                        <?if ($arResult["NavPageNomer"] > 2):?>
                            <a class="pagination__item" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><div class="pagination__arrows pagination__prev left_arrow"><?echo GetMessage("round_nav_back")?></div></a>
                        <?else:?>
                            <a class="pagination__item" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><div class="pagination__arrows pagination__prev left_arrow"><?echo GetMessage("round_nav_back")?></div></a>
                        <?endif?>
                        <a class="pagination__item" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">1</a>
                    <?endif?>
                <?else:?>
                    <div class="pagination__arrows pagination__prev left_arrow"><?echo GetMessage("round_nav_back")?></div>
                    <div class="pagination__item pagination__item__active">1</div>
                <?endif?>

                <?
                $arResult["nStartPage"]++;
                while($arResult["nStartPage"] <= $arResult["nEndPage"]-1):
                    ?>
                    <?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
                    <div class="pagination__item pagination__item__active"><?=$arResult["nStartPage"]?></div>
                <?else:?>
                    <a class="pagination__item" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$arResult["nStartPage"]?></a>
                <?endif?>
                    <?$arResult["nStartPage"]++?>
                <?endwhile?>

                <?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
                    <?if($arResult["NavPageCount"] > 1):?>
                        <a class="pagination__item" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><?=$arResult["NavPageCount"]?></a>
                    <?endif?>
                    <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><div class="pagination__arrows pagination__prev right_arrow"><?echo GetMessage("round_nav_forward")?></div></a>
                <?else:?>
                    <?if($arResult["NavPageCount"] > 1):?>
                        <div class="pagination__item pagination__item__active"><?=$arResult["NavPageCount"]?></div>
                    <?endif?>
                    <div class="pagination__arrows pagination__prev  right_arrow"><?echo GetMessage("round_nav_forward")?></div>
                <?endif?>
            <?endif?>

            <?if ($arResult["bShowAll"]):?>
                <?if ($arResult["NavShowAll"]):?>
                    <a class="pagination__item" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=0" rel="nofollow"><?echo GetMessage("round_nav_pages")?></a>
                <?else:?>
                    <a class="pagination__item" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=1" rel="nofollow"><?echo GetMessage("round_nav_all")?></a>
                <?endif?>
            <?endif?>
        <div style="clear:both"></div>
</div>
