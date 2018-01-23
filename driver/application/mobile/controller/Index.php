<?php
namespace app\mobile\controller;
class Index extends Common{
	public function index(){
		$res=db('yard')->select();
        for($i=0;$i<count($res);$i++){
            $data[$i]['title']=$res[$i]['title'];
            $data[$i]['tel']=$res[$i]['tel'];
            $data[$i]['point']=$res[$i]['point'];
            $data[$i]['address']=$res[$i]['address'];
        }
        $this->assign('point',json_encode($data));
		return $this->fetch();
	}
	public function yard(){
		$res=db('yard')->select();
        for($i=0;$i<count($res);$i++){
            $data[$i]['title']=$res[$i]['title'];
            $data[$i]['tel']=$res[$i]['tel'];
            $data[$i]['point']=$res[$i]['point'];
            $data[$i]['address']=$res[$i]['address'];
        }
        $this->assign('point',json_encode($data));
		return $this->fetch();
	}
	public function aboutme(){
		return $this->fetch();
	}
	public function applynotce(){
		return $this->fetch();
	}
}