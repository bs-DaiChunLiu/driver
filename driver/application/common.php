<?php
function show($status,$message){
    $result=[
        'status'=>$status,
        'message'=>$message,
    ];
    exit(json_encode($result));
}
function getTree($arr,$pid=0,$level=0){
    $tree=array();
    foreach ($arr as $v){
        if($v['pid']==$pid){
            $v['level']=$level;
            $v['html']=str_repeat('--',$level);
            $tree[]=$v;
            $tree=array_merge($tree,getTree($arr,$v['id'],$level+1));
        }
    }
    return $tree;
}
function getCateStatus($data){
    if($data==0){
        echo '显示';
    }else{
        echo '隐藏';
    }
}