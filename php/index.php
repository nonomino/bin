<?php
$json_data = file_get_contents('knowledge.json');
$data = json_decode($json_data, true);

if (isset($_GET['company'])) {
    $requested_company = $_GET['company'];

    $found_company = null;
    foreach ($data as $company_name => $company_info) {
        if (strcasecmp($company_name, $requested_company) === 0) {
            $found_company = $company_info;
            break;
        }
    }

    if ($found_company !== null) {
        echo '<div class="card mb-3">';
        echo '<div class="card-body">';
        echo '<div class="col-xs-12 col-md-6">';
        echo '<h3>' . $found_company['company_name'] . '</h3>';
        echo '<p style="color:#334488;">';
        echo '<hr>';
        echo '<a href="' . $found_company['link'] . '"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe-americas" style="margin: 5px;" viewBox="0 0 16 16">';
        echo '<path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0ZM2.04 4.326c.325 1.329 2.532 2.54 3.717 3.19.48.263.793.434.743.484-.08.08-.162.158-.242.234-.416.396-.787.749-.758 1.266.035.634.618.824 1.214 1.017.577.188 1.168.38 1.286.983.082.417-.075.988-.22 1.52-.215.782-.406 1.48.22 1.48 1.5-.5 3.798-3.186 4-5 .138-1.243-2-2-3.5-2.5-.478-.16-.755.081-.990.284-.172.15-.322.279-.51.216-.445-.148-2.5-2-1.5-2.5.78-.39.952-.171 1.227.182.078.099.163.208.273.318.609.304.662-.132.723-.633.039-.322.081-.671.277-.867.434-.434 1.265-.791 2.028-1.12.712-.306 1.365-.587 1.579-.88A7 7 0 1 1 2.04 4.327Z"/>';
        echo '</svg> ' . $found_company['link'] . '</a>';
        echo '<hr>';
        echo '</p>';
        echo '<p>' . $found_company['description'] . '<br />';
        echo '<a href="https://wikipedia.org" style="float:right; text-decoration: none;">Wikipedia</a>';
        echo '</p>';
        echo '<b>Headquarters </b>: ' . $found_company['headquarters'] . '<br />';
        echo '<b>Key People </b>: ' . $found_company['key_people'] . '<br />';
        echo '<b>Founded </b>: ' . $found_company['founded'] . '<br />';
        echo '<b><h4>Social Media</h4></b>';
        echo '<ul style="margin-top:8px; float:left;" class="list">';
        foreach ($found_company['social_media'] as $social_media) {
            echo '<li class="list-item">';
            echo '<a href="' . $social_media['link'] . '">';
            echo '<span class="glyphicon glyphicon-log-in"></span> ' . $social_media['platform'] . '</a>';
            echo '</li>';
        }
        echo '</ul>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    } else {
        echo 'Company not found.';
    }
} else {
    echo 'Please specify a company using the "company" GET parameter.';
}
?>