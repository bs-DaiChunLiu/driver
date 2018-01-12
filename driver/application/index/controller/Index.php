<?php
namespace app\index\controller;
use think\Controller;
class Index extends Controller
{
    public function index(){
       return $this->fetch();
    }
    public function applynotice(){
        return $this->fetch();
    }
    public function aboutme(){
        return $this->fetch();
    }
    public function joinme(){
        return $this->fetch();
    }
    public function yard(){
        return $this->fetch();
    }
}
