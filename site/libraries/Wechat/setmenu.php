<?php
include 'lanewechat.php';

/**
 * 自定义菜单
 */
//设置菜单
$menuList = array(
    array('id'=>'1', 'pid'=>'',  'name'=>'羊毛', 'type'=>'', 'code'=>'key_1'),
    array('id'=>'2', 'pid'=>'1',  'name'=>'网信', 'type'=>'click', 'code'=>'wx'),
    array('id'=>'3', 'pid'=>'1',  'name'=>'陆金所', 'type'=>'click', 'code'=>'key_3'),
    array('id'=>'4', 'pid'=>'',  'name'=>'发图', 'type'=>'', 'code'=>'key_3'),
    array('id'=>'5', 'pid'=>'4', 'name'=>'系统拍照发图', 'type'=>'pic_sysphoto', 'code'=>'key_4'),
    array('id'=>'6', 'pid'=>'4', 'name'=>'拍照或者相册发图', 'type'=>'pic_photo_or_album', 'code'=>'key_5'),
);
//\LaneWeChat\Core\Menu::delMenu();
//\LaneWeChat\Core\Menu::setMenu($menuList);
////获取菜单
$list = \LaneWeChat\Core\Menu::getMenu();
header("Content-Type: text/html;charset=utf-8");
var_dump($list['menu']['button'][0]);
////删除菜单

