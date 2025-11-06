<?php
defined('BASEPATH') OR exit('No direct script access allowed');

## 파일 서버 저장용 이름
function fileMakeUniqueName($fileName="")
{

    srand((double)microtime()*1000000) ;
    $Rnd = rand(1000000,2000000) ;
    $Temp = date("Ymdhis") ;

    return $Temp.$Rnd.".".fileExplodeExtension($fileName) ;
}

// 파일명중 확장자를 분리해준다.
function fileExplodeExtension($fileName)
{
    $Tmp = explode(".",$fileName);
    return $Tmp[count($Tmp)-1];
}