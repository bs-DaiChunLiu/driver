<?php
namespace app\cner\controller;
use think\Controller;
class Common extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!session('user')){
            $this->redirect('Login/index');
        }
    }
}