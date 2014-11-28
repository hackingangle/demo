<?php
/**
 * 微信公共接口测试
 * 需要CHECK接口 
 */
    include("../wechat.class.php");
    
    function logdebug($text){
        file_put_contents('/home/wwwlogs/wechat.log', $text."\n", FILE_APPEND);        
    };
    $options = array(
        'token'=>'wanggang', //填写你设定的key
        'encodingaeskey'=>'1mFinjHJ4Msdawa0cQbQCTQU3I5qe3WCT0SXOzZzO7L',
        'debug'=>true,
        'logcallback'=>'logdebug'
    );
    $weObj = new Wechat($options);
    $weObj->
