<?php

require_once 'classes/database.php';
$database = database::getInstance();
$validUser = $database->validUser();
if (!$validUser) {
    header("Location: 404.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include "edit_sowing_form.php";
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'classes/common_functions.php';
    $commonFunctions = new common_functions();

    require_once 'classes/sowings.php';
    $sowings = new sowings();

    $sowingID = $commonFunctions->clearData($_POST['sowing_id'], "i");
    $fieldID = $commonFunctions->clearData($_POST['field'], "i");
    $cultureID = $commonFunctions->clearData($_POST['culture'], "i");
    $area = $commonFunctions->clearData($_POST['sowing_area'], "f");

    $sowings->editSowing($sowingID, $fieldID, $cultureID, $area);
}
