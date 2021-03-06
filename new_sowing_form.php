﻿<?php
require_once 'classes/database.php';
$database = database::getInstance();
$validUser = $database->validUser();
if (!$validUser) {
    header("Location: 404.php");
}

require_once 'classes/fields.php';
require_once 'classes/cultures.php';
require_once 'classes/display.php';

$fields = new fields();
$fieldsArr = $fields->getList();

$cultures = new cultures();
$culturesArr = $cultures->getList();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styles/styles.css">
        <title>Полевые работы</title>
        <script src="lib.js"></script>
    </head>
    <body>
        <div class="head">
            <div class="top-panel">
                <?php
                $display = new display();
                $display->topMenu();
                ?>
                <h1>Полевые работы АО "АФ "Заречье"</h1>
            </div> 
            <?php
            $display->mainMenu('common_data');
            ?>
        </div>
        <div class="content">
            <script>
                function cancel() {
                    window.location.href = "sowings.php";
                }
            </script>
            <h2>Новый посев</h2>
            <form name="new_fert_exp" class="fert-sowing-form" method="post" action="new_sowing.php">
                <table> 
                    <tr>
                        <td class="fert-sowing-form-lb">Поле:</td>
                        <td class="fert-sowing-form-input">
                            <select id="fields" name="field">
                                <option></option>
                                <?php
                                foreach ($fieldsArr as $val) {
                                    echo "<option value='{$val['id']}'>" . $val['name'] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="fert-sowing-form-lb">Культура:</td>
                        <td class="fert-sowing-form-input">
                            <select id="fields" name="culture">
                                <option></option>
                                <?php
                                foreach ($culturesArr as $val) {
                                    echo "<option value='{$val['id']}'>" . $val['name'] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="fert-sowing-form-lb">Полощадь (га):</td>
                        <td class="fert-sowing-form-input" id="sowing_area">
                            <input id="sowing_area_val" type="text" name="sowing_area">
                        </td>
                    </tr>
                    <tr>
                        <td class="fert-sowing-form-lb"></td>
                        <td class="fert-sowing-form-input"><input type="submit" value="Сохранить" class="save-btn">&nbsp;
                            <input type="button" value="Отмена" onclick="cancel();" class="cancel-btn">
                        </td>
                    </tr>        
                </table>
            </form>  
        </div>
    </body>
</html>
