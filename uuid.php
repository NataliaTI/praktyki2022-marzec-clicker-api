<?php
/*  ABY SPRAWDZIĆ CZY UUID ZOSTAŁ WYGENEROWANY
    SKORZYSTAJ ZE ZMIENNEJ
        $status_uuid  

    ABY WYKORZYSTAĆ WYGENEROWANE UUID W TWOIM KODZIE
    SKORZYSTAJ ZE ZMIENNEJ
        $uuid
*/
$uuid = gen_uuid();
function gen_uuid() {

    $data = random_bytes(16);

    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);

    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));

}
/*  STATUS_JWT
    PRZYJĄŁEM, ŻE
        $status_jwt = false
        OZNACZA, ŻE
            $jwtGen
            WYGENEROWAŁ SIĘ DOBRZE
        $status_jwt = true
        OZNACZA, ŻE
            $jwtGen
            WYGENEROWAŁ SIĘ ŹLE
*/
$status_uuid='';
if(isset($uuid) && !empty($uuid)) {
    $status_uuid = 'Succeded';
    
} else {
    $status_uuid = 'Failed';
}
//  TESTOWE: WYŚWIETLENIE $status_uuid
//echo $status_uuid;

//  TESTOWE: WYŚWIETLENIE $uuid
//echo $uuid;