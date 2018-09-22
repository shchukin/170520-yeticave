<?php

function renderTemplate($name, $data) {
    $name = 'templates/' . $name;
    $result = '';

    if (!file_exists($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require($name);

    $result = ob_get_clean();

    return $result;
}


function cleanUpPrice($value)
{
    $value = ceil($value);
    if ($value >= 1000) {
        $value = number_format($value, 0, '.', ' ');
    }
    $value = $value . '<b class="rub">р</b>';
    return $value;
}

function calculateRemainTime($expirationTime) {
    return $expirationTime - strtotime('now');
}