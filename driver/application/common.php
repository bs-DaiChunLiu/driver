<?php
function show($status,$message){
    $result=[
        'status'=>$status,
        'message'=>$message,
    ];
    exit(json_encode($result));
}
