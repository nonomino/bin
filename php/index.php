<?php
$json_data = file_get_contents('companies.json');
$data = json_decode($json_data, true);

if (isset($_GET['company'])) {
	$requested_company = $_GET['company'];

	$found_company = null;
	foreach ($data['companies'] as $company) {
		if ($company['name'] === $requested_company) {
			$found_company = $company;
			break;
		}
	}

	if ($found_company !== null) {
		$company_name = $found_company['name'];
		$button_texts = $found_company['button_text'];
		$accordion_bodies = $found_company['accordion_body'];

		echo "<h3> People also ask for $company_name</h3>";

		for ($i = 0; $i < count($button_texts); $i++) {
			echo '<div class="accordion accordion-flush" id="accordion_flush_example">';
			echo '<div class="accordion-item">';
			echo '<h2 class="accordion-header">';
			echo '<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush_collapse_' . $i . '" aria-expanded="false" aria-controls="flush_collapse_' . $i . '">';
			echo $button_texts[$i];
			echo '</button>';
			echo '</h2>';
			echo '<div id="flush_collapse_' . $i . '" class="accordion-collapse collapse" data-bs-parent="#accordion_flush_example">';
			echo '<div class="accordion-body">' . $accordion_bodies[$i] . '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
		}
	} else {
		echo 'Company not found.';
	}
} else {
	echo 'Please specify a company.';
}
?>