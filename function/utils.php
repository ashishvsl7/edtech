<?php
/**
 * Created by PhpStorm.
 * User: ash
 * Date: 23-Dec-23
 * Time: 11:58 AM
 */

function validateLength($agrs, $validLength){
    $removeBlankSpaces = trim($agrs," ");
    if(strlen($removeBlankSpaces)>=$validLength){
        return true;
    }else{
        return false;
    }

}
?>