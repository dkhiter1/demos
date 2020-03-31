<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
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
$this->setFrameMode(false);
?>

<form action="<?=POST_FORM_ACTION_URI?>#feedback" method="POST" id="form__feedback__form">
    <?=bitrix_sessid_post()?>
    <a name="feedback"></a>
    <?if ($arParams["MAX_FILE_SIZE"] > 0):?><input type="hidden" name="MAX_FILE_SIZE" value="<?=$arParams["MAX_FILE_SIZE"]?>" /><?endif?>

    <?if (is_array($arResult["PROPERTY_LIST"]) && !empty($arResult["PROPERTY_LIST"])):?>


        <div class="forms__group">
            <div class="forms__label">Имя*</div>
            <input class="forms__text" type="text" name="PROPERTY[NAME][0]" size="<?=$arResult["PROPERTY_LIST_FULL"][$propertyID]["COL_COUNT"]; ?>" value="<?=$value?>" <?if(empty($value)):?>required<?endif?>/>
        </div>

        <div class="forms__group">
            <div class="forms__label">Фотография</div>
            <div class="forms__file">
                <input class="forms__fileInput" id="form__feedback__file" type="file" size="<?=$arResult["PROPERTY_LIST_FULL"][$propertyID]["COL_COUNT"]?>"  name="PROPERTY_FILE_<?=$propertyID?>_<?=$arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] : $i?>" />
                <label class="forms__fileLabel" for="form__feedback__file"><span>Загрузить фотографию</span><i class="fas fa-camera forms__fileIcon"></i></label>
                <input class="forms__fileInput" type="hidden" name="PROPERTY_FILE_PREVIEW_PICTURE_0" value="<?=$value?>" <?if(empty($value)):?>required<?endif?>/>
            </div>
        </div>

        <div class="forms__group">
            <div class="forms__label">Отзыв*</div>
            <textarea class="forms__text" name="message" cols="30" rows="<?=$arResult["PROPERTY_LIST_FULL"][$propertyID]["ROW_COUNT"]?>" name="PROPERTY[DETAIL_TEXT][0]"><?=$value?></textarea>
        </div>

        <div class="forms__group">
            <div class="forms__label">Email*</div>
            <input class="forms__text" type="text" name="PROPERTY[15][0]" size="30" value="<?=$value?>" <?if(empty($value)):?>required<?endif?>/>
        </div>
    <?endif?>

    <div class="forms__group forms__agreement">
        <input class="forms__checkbox" name="agreement" type="checkbox" checked>
        <div class="forms__label">
            Подтверждаю свое согласие на обработку
            и хранение моих персональных данных
            в соответствии с &nbsp;<a href="/">пользовательским соглашением</a>
        </div>
    </div>
    <button class="btn forms__btn">Отправить</button>
    <input type="hidden" name="iblock_submit" value="<?=GetMessage("IBLOCK_FORM_SUBMIT")?>" />
</form>

<script>
    // $( document ).ready(function() {
    //     $("#form__feedback__form").submit(function(e) {
    //         e.preventDefault();
    //         $.ajax({
    //             type: "POST",
    //             url: "/local/blaze.su/forms/submit.php",
    //             data: $(this).serialize()
    //         }).done(function () {
    //
    //             $("#form__feedback").hide();
    //         });
    //         return false;
    //     });
    // });
</script>
