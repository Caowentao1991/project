<?php
include 'lanewechat.php';
defined('BASEPATH') OR exit('No direct script access allowed');
class Menu_class
{
    public function get()
    {
        $list = \LaneWeChat\Core\Menu::getMenu();
        return $list;
    }

    public function set($menuList)
    {
        $list = \LaneWeChat\Core\Menu::setMenu($menuList);
        return $list;
    }

    public function del()
    {
        return \LaneWeChat\Core\Menu::delMenu();
    }
}