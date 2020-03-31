<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
    <nav class="header__mainMenu">

<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
    <a class="header__mainMenuLink"  href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
	
<?endforeach?>

    </nav>
<?endif?>