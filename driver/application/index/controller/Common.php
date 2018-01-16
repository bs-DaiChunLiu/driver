<?php
namespace app\index\controller;
use think\Controller;
class Common extends Controller{
	public function __construct()
    {
        parent::__construct();
        $res=db('ader')->where('type','eq',2)->select();
        $this->assign('rw',$res);
    }
}