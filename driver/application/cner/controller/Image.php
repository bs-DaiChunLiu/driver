<?php
namespace app\cner\controller;
class Image extends Common
{
    public function uploadAder(){
        $file=request()->file('file');
        $info = $file->rule('uniqid')->move(ROOT_PATH.'public\images\ader');
        $filePath=config('u').'/images/ader/'.$info->getSaveName();
        if($info){
            return show(1,$filePath);
        }else{
            return show(0,$file->getError());
        }
    }
    public function uploadEnsure(){
        $file=request()->file('file');
        $info = $file->rule('uniqid')->move(ROOT_PATH.'public\images\ensure');
        $filePath=config('u').'/images/ensure/'.$info->getSaveName();
        if($info){
            return show(1,$filePath);
        }else{
            return show(0,$file->getError());
        }
    }
}