<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>


		<form action="<?=POST_FORM_ACTION_URI?>#request" method="POST">
			<?=bitrix_sessid_post()?>
			<a name="request"></a>
				<div class="forms__group">
						<div class="forms__label">Напишите как к Вам обращатся *</div>
						<input class="forms__text" name="user_name" type="text" value="<?=$arResult["AUTHOR_NAME"]?>" <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])):?>required<?endif?>>
				</div>
				<div class="forms__group">
						<div class="forms__label">Укажите № контактного телефона *</div>
						<input class="forms__text forms__phone" type="text" name="MESSAGE" value="<?=$arResult["MESSAGE"]?>" <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])):?>required<?endif?>>
				</div>
				<div class="forms__group forms__agreement">
						<input class="forms__checkbox" name="agreement" type="checkbox" checked>
						<div class="forms__label">
								Подтверждаю свое согласие на обработку
								и хранение моих персональных данных
								в соответствии с &nbsp;<a href="/the-client/index.php">пользовательским соглашением</a>
						</div>
				</div>
				<button class="btn forms__btn">Отправить</button>
				<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
				<input type="hidden" name="submit" value="<?=GetMessage("MFT_SUBMIT")?>">
		</form>

