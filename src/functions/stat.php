<?php
//  ABY SPRAWDZIĆ CZY DANA RZECZ ZOSTAŁA WYGENEROWANA UŻYJ
//      statusChecker($zmienna)
//  JAKO
//      $zmienna
//  WPISZ RZECZ DO SPRAWDZENIA
function statusChecker($checkedVar){
    if(isset($checkedVar) && !empty($checkedVar)) {
        return $checkedVarStat = 'Succeded';
    } else {
        return $checkedVarStat = 'Failed';
    }
}