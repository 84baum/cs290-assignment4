<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <LINK href="tableStyle.css" rel="stylesheet" type="text/css">
  <title>Assignment 4 Part 1</title>
</head>
<body>
<?php
    $valueArray = array(
        'minMultiplicand' => $_GET['minMultiplicand'],
        'maxMultiplicand' => $_GET['maxMultiplicand'],
        'minMultiplier' => $_GET['minMultiplier'],
        'maxMultiplier' => $_GET['maxMultiplier'] 
    );
    $minMultString = 'Min Multiplicand';
    $maxMultString = 'Max Multiplicand';
    $minMulpString = 'Min Multiplier';
    $maxMulpString = 'Max Multiplier';
    function checkForValue($inputMin, $inputMax, $min, $max) {
        $validInput = TRUE;
        if ($inputMin > $inputMax) {
            echo 'Value of ' . $min . ' is greater than ' . $max . '.';
            $validInput = FALSE;
        }
        return $validInput;
    }
    function inputCheck(&$inputArray) {
        $validInput = FALSE;
        foreach ($inputArray as $name => $value) {
            if (!isset($value)) {
                echo 'Missing value in ' . $name;
                return $validInput; 
            }
            if (!is_numeric($value) || $value != round($value)) {
                echo 'Value in ' . $name . ' is not an integer.';
                return $validInput; 
            }
            $value = intval($value);     
        } 
        $validInput = TRUE;
        return $validInput;   
    }
    $printTable = (inputCheck($valueArray) && 
        checkForValue($valueArray['minMultiplier'], $valueArray['maxMultiplier'], $minMulpString, $maxMulpString) && 
        checkForValue($valueArray['minMultiplicand'], $valueArray['maxMultiplicand'], $minMultString, $maxMultString ));
    if ($printTable) {
        echo '<p><h2>Multiplication Table</h2>
            <p>
            <table border="1">
            <tr><td>';    
        for ($tableColumn = $valueArray['minMultiplier']; $tableColumn <= $valueArray['maxMultiplier']; $tableColumn++) {
            echo '<td>' . $tableColumn;
        }
        for ($tableRow = $valueArray['minMultiplicand']; $tableRow <= $valueArray['maxMultiplicand']; $tableRow++) {
            echo '<tr><td>' . $tableRow;
            for ($tableColumn = $valueArray['minMultiplier']; $tableColumn <= $valueArray['maxMultiplier']; $tableColumn++) {
                echo '<td>' . ($tableRow * $tableColumn);    
            }
        }     
        echo '</table>';
    }
?>
</body>
</html>