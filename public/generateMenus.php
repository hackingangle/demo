<?php
/**
 * @name GenerateMenus
 * @desc 生成微信公众账号菜单
 * @author wanggang11@baidu.com
 */
include("../wechat.class.php");

$apiOptions = array(
    'token'=>'wanggang', //填写你设定的key
    'encodingaeskey'=>'1mFinjHJ4Msdawa0cQbQCTQU3I5qe3WCT0SXOzZzO7L',
    'debug'=>true,
    'logcallback'=>'$this->logdebug'
);

$menuDatas = array(
    'button' => array(
        0 => array(
            'name' => '扫码',
            'sub_button' => array(
                0 => array(
                    'name' => '扫码带提示',
                    'type' => 'scancode_waitmsg',
                    'key' => 'rselfmenu_0_0',
                ),
                1 => array (
                    'name' => '扫码推事件',
                    'type' => 'scancode_push',
                    'key' => 'rselfmenu_0_1',
                ),
            ),
        ),
        1 => array(
            'name' => '发图',
            'sub_button' => array(
                0 => array(
                    'name' => '系统拍照发图',
                    'type' => 'pic_sysphoto',
                    'key' => 'rselfmenu_1_0',
                ),
                1 => array (
                    'name' => '拍照或者相册发图',
                    'type' => 'pic_photo_or_album',
                    'key' => 'rselfmenu_1_1',
                ),
            ),
        ),
        2 => array(
            'name' => '发送位置',
            'type' => 'location_select',
            'key' => 'rselfmenu_2_0'
        ),
    ),
);

function logdebug($text){
    file_put_contents('/home/wwwlogs/wechat.log', $text."\n", FILE_APPEND);        
};

// 执行生成菜单命令
$weObj = new Wechat($apiOptions);
$result = $weObj->createMenu($menuDatas);
print_r($result);
