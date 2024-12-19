<?php
    $language_code = function_exists('icl_object_id') ? ICL_LANGUAGE_CODE : 'default'; 
    $stylesheet_dir_uri = esc_url(get_stylesheet_directory_uri());
?>


<!-- Popup Modal -->
<div id="demo-modal" class="demo-modal-overlay">
    <div class="demo-modal__content">
        <div class="demo-modal-close-container">
            <button class="demo-modal__close" onclick="togglePopup()" aria-label="Fechar popup">
                <img
                    src="<?php echo $stylesheet_dir_uri; ?>/assets/icons/menu-close.svg"
                    alt="Fechar Menu"
                    class="demo-modal__close-icon"
                    width="24"
                    height="24"
                >
            </button>
        </div>

        <div id="form-container">
            <?php if ($language_code === 'en') : ?>
                <!-- Formulário em inglês -->
                <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
                <script>
                    hbspt.forms.create({
                        portalId: "5594807",
                        formId: "f09d5442-e993-4455-bb4f-45dac26fed13"
                    });
                </script>
            <?php else : ?>
                <!-- Formulário em português -->
                <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
                <script>
                    hbspt.forms.create({
                        portalId: "5594807",
                        formId: "96c4548e-bc5f-4ffa-b24f-817057ec4c68"
                    });
                </script>
            <?php endif; ?>
        </div>

        <div class="demo-modal-close-container">
            <button class="demo-modal__close demo-modal__text" onclick="togglePopup()" aria-label="Fechar popup">Fechar</button>
        </div>
    </div>
</div>