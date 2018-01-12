<?php
namespace app\cner\controller;
class Index extends Common{
    public function index(){
        return $this->fetch();
    }
    public function welcome(){
        return $this->fetch();
    }
    public function loginout(){
        session(null);
        $this->redirect('Login/index');
    }
    public function clearCache(){
        $this->sss();
    }
    public function sss($path='./runtime/temp', $delDir = true) {
        $handle = opendir($path);
        if ($handle) {
            while (false !== ( $item = readdir($handle) )) {
                if ($item != "." && $item != "..")
                    is_dir("$path/$item") ? delDirAndFile("$path/$item", $delDir) : unlink("$path/$item");
            }
            closedir($handle);
            if ($delDir)
                return rmdir($path);
        }else {
            if (file_exists($path)) {
                return unlink($path);
            } else {
                return FALSE;
            }
        }
    }
}