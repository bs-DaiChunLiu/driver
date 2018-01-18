<?php
namespace app\cner\controller;
class Callme extends Common{
     public function index(){
     	$res=db('callme')->select();
     	$this->assign('cl',$res);
     	return $this->fetch();
     }
     public function edit(){
        if(request()->isAjax()){
            $data=input('post.');
            $id=$data['id'];
            $type=['type'=>1];
            $res=db('callme')->where('id',$id)->update($type);
            if($res){
                return show(1,'成功');
            }
        }
     }
 }