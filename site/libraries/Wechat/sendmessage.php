<?php
include 'lanewechat.php';

/**
 * 应用一：给粉丝群发发送消息
 */
//群发消息
//获取粉丝列表
$fansList = \LaneWeChat\Core\UserManage::getFansList();

//上传图片
$menuId = \LaneWeChat\Core\Media::upload('C:\Users\nbb\Desktop\26.gif', 'image');
if (empty($menuId['media_id'])) {
    die('error');
}
//上传图文消息
$list = array();
$list[] = array('thumb_media_id'=>$menuId['media_id'] , 'author'=>'作者', 'title'=>'标题', 'content_source_url'=>'www.lanecn.com', 'digest'=>'摘要', 'show_cover_pic'=>'1');
$list[] = array('thumb_media_id'=>$menuId['media_id'] , 'author'=>'作者', 'title'=>'标题', 'content_source_url'=>'www.lanecn.com', 'digest'=>'摘要', 'show_cover_pic'=>'0');
$list[] = array('thumb_media_id'=>$menuId['media_id'] , 'author'=>'作者', 'title'=>'标题', 'content_source_url'=>'www.lanecn.com', 'digest'=>'摘要', 'show_cover_pic'=>'0');
$mediaId = \LaneWeChat\Core\AdvancedBroadcast::uploadNews($list);
//给粉丝列表的用户群发图文消息
$result = \LaneWeChat\Core\AdvancedBroadcast::sentNewsByOpenId($fansList['data']['openid'], $mediaId);
var_dump($result);