<?php

$jsonData = file_get_contents('companies.json');
$data = json_decode($jsonData, true);

if (isset($data['companies'])) {
    $companies = $data['companies'];
    foreach ($companies as $company) {
        $companyName = $company['name'];
        $buttonTexts = $company['button_text'];
        $accordionBodies = $company['accordion_body'];

        echo "<h3> People also ask for $companyName</h3>";

        for ($i = 0; $i < count($buttonTexts); $i++) {
            echo '<div class="accordion accordion-flush" id="accordionFlushExample">';
            echo '<div class="accordion-item">';
            echo '<h2 class="accordion-header">';
            echo '<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse' . $i . '" aria-expanded="false" aria-controls="flush-collapse' . $i . '">';
            echo $buttonTexts[$i];
            echo '</button>';
            echo '</h2>';
            echo '<div id="flush-collapse' . $i . '" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">';
            echo '<div class="accordion-body">' . $accordionBodies[$i] . '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }
}
?>