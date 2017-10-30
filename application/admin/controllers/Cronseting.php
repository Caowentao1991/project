<?php
class Cronseting extends CI_Controller
{
    public function cronset()
    {
        if(!isset($_SERVER['SERVER_PROTOCOL']))
        {

            //仅命令行能访问 用于统一设置cron
            date_default_timezone_set('Asia/Shanghai');

            $now = time();
            $ymd = date('Y-m-d',$now);
            $day = date('N',$now);
            $hour = date('H',$now);
            $minute = date('i',$now);
            $second = date('s',$now);
            $week = date('D',$now);

            $phpcmd = exec("which php");

            $cmd = $phpcmd." index.php audojob dailyReport";
            system($cmd);


        }else
        {
            echo '浏览器无效';exit;
        }
    }
}
?>
