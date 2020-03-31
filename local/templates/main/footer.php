    <? $bIsNotServices = (!$bIsMainPage = true) & ($bIsServices <= true);?>
                <?if($bIsServices) {?>
                 </section>
            <? } ?>
         <?if($bIsNotServices) {?>
        </section>
    <? } ?>
    </div>
    <footer class="footer box">
        <div class="case"><a class="footer__logo"><img class="footer__logoImg" src="/local/templates/main/img/footer/logo.png"></a>
            <div class="footer__case">
                <div class="footer__address">
                    <div>
                        <?$APPLICATION->IncludeFile(
                            SITE_DIR."include/cityfooter.php",
                            array(),
                            array(
                                "MODE" => "text"
                            )
                        );?>
                    </div>
                    <div>
                        <?$APPLICATION->IncludeFile(
                            SITE_DIR."include/adressfooter.php",
                            array(),
                            array(
                                "MODE" => "text"
                            )
                        );?>
                    </div>
                    <div class="footer__time">
                        <?$APPLICATION->IncludeFile(
                            SITE_DIR."include/worktime.php",
                            array(),
                            array(
                                "MODE" => "text"
                            )
                        );?></div>
                    <div class="footer__phone">
                        <a href="tel:+7(812) 701-81-00">
                            <?$APPLICATION->IncludeFile(
                                SITE_DIR."include/phone.php",
                                array(),
                                array(
                                    "MODE" => "text"
                                )
                            );?>
                        </a>
                        <a href="tel:+7(812) 701-81-01">
                            <?$APPLICATION->IncludeFile(
                                SITE_DIR."include/phone2.php",
                                array(),
                                array(
                                    "MODE" => "text"
                                )
                            );?>
                        </a>
                    </div>
                    <div>
                        <?$APPLICATION->IncludeFile(
                            SITE_DIR."include/email.php",
                            array(),
                            array(
                                "MODE" => "text"
                            )
                        );?>
                    </div>
                    <div class="footer__social">
                        <a class="footer__socialLink footer__aboutItem facebook" href="https://www.facebook.com/demosmed"></a>
                        <a class="footer__socialLink footer__aboutItem vk" href="https://vk.com/demosmed"></a>
                        <a class="footer__socialLink footer__aboutItem instagram" href="https://www.instagram.com/mcdemos/"></a>
                    </div>
                </div>
                <div class="footer__info">
                    <h3>Информация</h3>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "footer_menu_info",
                        array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "bottom",
                            "COMPONENT_TEMPLATE" => "footer_menu_info",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "A",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "MENU_THEME" => "site",
                            "ROOT_MENU_TYPE" => "menu_info",
                            "USE_EXT" => "N"
                        ),
                        false
                    );?>
                </div>
                <div class="footer__services">
                    <h3>Услуги</h3>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "footer_menu_info",
                        array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "bottom",
                            "COMPONENT_TEMPLATE" => "footer_menu_info",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "A",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "MENU_THEME" => "site",
                            "ROOT_MENU_TYPE" => "menu_services",
                            "USE_EXT" => "N"
                        ),
                        false
                    );?>
                </div>
            </div>
            <div class="footer__about">
                <div class="footer__aboutItem">
                    <?$APPLICATION->IncludeFile(
                        SITE_DIR."include/company.php",
                        array(),
                        array(
                            "MODE" => "text"
                        )
                    );?>
                </div>
                <div class="footer__aboutItem"><a href="/the-client/index.php">Соглашение об обработке перснальных данных</a></div>
                <div class="footer__aboutItem footer__blaze">Разработка и продвижение<a class="footer__blazeLink" href="https://blaze.su"></a></div>
            </div>
        </div>
        <div class="forms forms__case" id="form__request">
            <div class="forms__close" data-fancybox-close><svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.25021 1.25039C0.46916 2.03144 0.460295 3.30663 1.24134 4.08768L7.65393 10.5003L1.24104 16.9132C0.459993 17.6942 0.468856 18.9694 1.24991 19.7504C2.03095 20.5315 3.30615 20.5404 4.08719 19.7593L10.5001 13.3464L16.9129 19.7593C17.694 20.5403 18.9692 20.5314 19.7502 19.7504C20.5313 18.9693 20.5401 17.6942 19.7591 16.9131L13.3462 10.5003L19.7588 4.08773C20.5398 3.30669 20.531 2.03149 19.7499 1.25044C18.9689 0.469396 17.6937 0.460531 16.9126 1.24158L10.5001 7.65411L4.0875 1.24153C3.30645 0.460482 2.03126 0.469344 1.25021 1.25039Z"/>
                </svg>
            </div>
            <h3 class="forms__title">Записаться на прием</h3>
            <?$APPLICATION->IncludeComponent(
                "bitrix:main.feedback",
                "feedback",
                array(
                    "EMAIL_TO" => "d.kaplyush@blaze.su",
                    "EVENT_MESSAGE_ID" => array(
                        0 => "31",
                    ),
                    "OK_TEXT" => "Спасибо, ваше сообщение принято.",
                    "REQUIRED_FIELDS" => array(
                        0 => "NAME",
                        1 => "MESSAGE",
                    ),
                    "USE_CAPTCHA" => "N",
                    "COMPONENT_TEMPLATE" => "feedback"
                ),
                false
            );?>
        </div>
    </footer>
    <?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
    </body>
</html>
