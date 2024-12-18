<?php
// Define o idioma atual ou padrão
$language_code = function_exists('icl_object_id') ? ICL_LANGUAGE_CODE : 'default';

// Define texto com base no idioma
$text = ($language_code === 'en') ? 'Schedule a Free Demo' : 'Agendar demonstração gratuita';
?>

<!-- Popup Modal -->
<div id="hire-popup" class="hire-popup-overlay">
    <div class="hire-popup-content">
        <span class="hire-popup-close" onclick="closePopup()">&times;</span>
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
    </div>
</div>