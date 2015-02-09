<?php
    class formInput {
        public $Type = '';
        public $parameters = array();
    }
    
    $input = new formInput();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $input->Type = 'POST';
        $paramArray = array();
        $emptyForm = TRUE;
        foreach($_POST as $key => $value) {
            if ($value != "") {
                $emptyForm = FALSE;
            }
            $paramArray[$key] = $value;
        }
        if ($emptyForm) {
            $input->parameters = null;
        }
        else {
            $input->parameters = $paramArray;
        }   
    }
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $input->Type = 'GET';
        $paramArray = array();
        $emptyForm = TRUE;
        foreach($_GET as $key => $value) {
            if ($value != "") {
                $emptyForm = FALSE;
            }
            $paramArray[$key] = $value;
        }
        if ($emptyForm) {
            $input->parameters = null;
        }
        else {
            $input->parameters = $paramArray;
        }
    }
    
    $jInput = json_encode($input);
    echo $jInput;
?>