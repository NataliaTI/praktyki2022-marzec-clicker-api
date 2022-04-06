<?php
/**
 * Indicates if given variable is not empty
 * @param $checkedVar - variable to check
 * @return $checkedVarStat - true if variable is not empty; false if variable empty
 */
function statusChecker($checkedVar){
    if(isset($checkedVar) && !empty($checkedVar)) {
        return $checkedVarStat = true;
    } else {
        return $checkedVarStat = false;
    }
}