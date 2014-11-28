<?php
/**
 * 微信公共接口测试
 * 
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
    $weObj->valid();
    $type = $weObj->getRev()->getRevType();
    switch($type) {
        case Wechat::MSGTYPE_TEXT:
                //$weObj->text("hihihi")->text("wanggang>".$weObj->getRev()->getRevContent())->text("hihihi")->reply();
                // 回复图文信息
                $news = array(
                    array(
                        'Title' => '大转盘活动正在进行中...',
                        'Description' => '点击\'阅读全文\'前去抽奖',
                        'PicUrl' => 'http://api.wanggang.cc/images/pan.jpg',
                        'Url' => '/pan.php?from='. $weObj->getRevFrom(),
                        ),
                );
                $weObj->news($news)->reply();
                exit;
                break;
        case Wechat::MSGTYPE_EVENT:
                break;
        case Wechat::MSGTYPE_IMAGE:
                break;
        default:
                $weObj->text("help info")->reply();
    }

