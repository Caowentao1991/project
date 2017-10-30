<?php
if ( ! function_exists('get_client_ip')) {
	//获取客户端IP
	function get_client_ip() {
		if (getenv ( "HTTP_CLIENT_IP" ) && strcasecmp ( getenv ( "HTTP_CLIENT_IP" ), "unknown" ))
			$ip = getenv ( "HTTP_CLIENT_IP" );
			else if (getenv ( "HTTP_X_FORWARDED_FOR" ) && strcasecmp ( getenv ( "HTTP_X_FORWARDED_FOR" ), "unknown" ))
				$ip = getenv ( "HTTP_X_FORWARDED_FOR" );
				else if (getenv ( "REMOTE_ADDR" ) && strcasecmp ( getenv ( "REMOTE_ADDR" ), "unknown" ))
					$ip = getenv ( "REMOTE_ADDR" );
					else if (isset ( $_SERVER ['REMOTE_ADDR'] ) && $_SERVER ['REMOTE_ADDR'] && strcasecmp ( $_SERVER ['REMOTE_ADDR'], "unknown" ))
						$ip = $_SERVER ['REMOTE_ADDR'];
						else
							$ip = "unknown";
							return ($ip);
	}
}


/**
 * 二维数组排序
 * @param array $arr 需要排序的二维数组
 * @param string $keys 所根据排序的key
 * @param string $type 排序类型，desc、asc
 * @return array $new_array 排好序的结果
 */
if ( ! function_exists('array_sort')) {
	function array_sort($arr, $keys, $type = 'desc')
	{
		$key_value = $new_array = array();
		foreach ($arr as $k => $v) {
			$key_value[$k] = $v[$keys];
		}
		if ($type == 'asc') {
			asort($key_value);
		} else {
			arsort($key_value);
		}
		reset($key_value);
		foreach ($key_value as $k => $v) {
			$new_array[$k] = $arr[$k];
		}
		return $new_array;
	}
}

if ( ! function_exists('curl_api')) {
    function curl_api($curl_url,$data=array(), $method="GET",$header="x-www-form-urlencoded") {
        try {
            $ch = curl_init();
            $header = array("content-type: application/{$header};charset=UTF-8");
            curl_setopt($ch, CURLOPT_URL, $curl_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            if (strtoupper($method) == "POST") {
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            }
            $output = curl_exec($ch);
            $errno = curl_errno( $ch );
            $info = curl_getinfo($ch);
            if($info['http_code'] != '200')
            {
                throw new Exception("当前时间：".date('Y-m-d H:i:s').$curl_url.json_encode($info).json_encode($errno));
            }
            curl_close($ch);

        }catch (Exception $e) {
            $log_path = SHARED_PATH."libraries/log/payment_error.log";
            $file = fopen($log_path, 'a');
            fwrite($file, $e->getMessage()."\n");
            fclose($file);
            $output = FALSE;
        }
        return $output;
    }
}

if ( ! function_exists('curl_api_opt')) {
	function curl_api_opt($curl_url,$data=array(), $method="POST", $header='content-type: multipart/form-data') {
		try {
			$ch = curl_init();
			$header = array($header.";charset=UTF-8");
			curl_setopt($ch, CURLOPT_URL, $curl_url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			if (strtoupper($method) == "POST") {
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			}
			$output = curl_exec($ch);
			$errno = curl_errno( $ch );
			$info = curl_getinfo($ch);
			if($info['http_code'] != '200')
			{
				throw new Exception("当前时间：".date('Y-m-d H:i:s').$curl_url.json_encode($info).json_encode($errno));
			}
			curl_close($ch);

		}catch (Exception $e) {
			$log_path = SHARED_PATH."libraries/log/payment_error.log";
			$file = fopen($log_path, 'a');
			fwrite($file, $e->getMessage()."\n");
			fclose($file);
			$output = FALSE;
		}
		return $output;
	}
}

if ( ! function_exists('curl_transfer_api')) {
	function curl_transfer_api($curl_url,$data=array(), $method="GET") {
		try {
			$ch = curl_init();
			$header = array("content-type: application/x-www-form-urlencoded;charset=UTF-8");
			curl_setopt($ch, CURLOPT_URL, $curl_url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
			//curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			if (strtoupper($method) == "POST") {
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			}
			$output = curl_exec($ch);
			$errno = curl_errno( $ch );
			$info = curl_getinfo($ch);
			if($info['http_code'] != '200')
			{
				throw new Exception("当前时间：".date('Y-m-d H:i:s').$curl_url.json_encode($info).json_encode($errno));
			}
			curl_close($ch);
				
		}catch (Exception $e) {
			$log_path = SHARED_PATH."libraries/log/payment_error.log";
			$file = fopen($log_path, 'a');
			fwrite($file, $e->getMessage()."\n");
			fclose($file);
			$output = FALSE;
		}
		return $output;
	}
}

if ( ! function_exists('getAllPlat')) {
	function getAllPlat($status=null) {
		if($status===1){
			$where = 'audit = 1';
		}elseif($status===0){
			$where = 'audit = 0';
		}else{
			$where = '1';
		}
		$CI = &get_instance();
		$CI->load->model('platform_model','platform');
		$list = $CI->platform->getAll($where);
		return $list;
	}
}

if ( ! function_exists('getAllProduct')) {
	function getAllProduct($status=null) {
		if($status===1){
			$where = 'audit = 1';
		}elseif($status===0){
			$where = 'audit = 0';
		}else{
			$where = '1';
		}
		$CI = &get_instance();
		$CI->load->model('product_model','product');
		$list = $CI->product->getAll($where);
		return $list;
	}
}

if ( ! function_exists('getUserName')) {
	function getUserName($id=null) {
		$CI = &get_instance();
		$CI->load->model('Admin_model','admin');
		$res = $CI->admin->getbyId($id);
		return $res[0];
	}
}

if ( ! function_exists('getUserId')) {
	function getUserId($name) {
		$CI = &get_instance();
		$CI->load->model('Admin_model','admin');
		$res = $CI->admin->getbyUser('"'.$name.'"');
		return $res;
	}
}
if ( ! function_exists('weekday')) {
    function weekday($week = 1)
    {
        $year = date('Y');
        $year_start = mktime(0, 0, 0, 1, 1, $year);
        $year_end = mktime(0, 0, 0, 12, 31, $year);

        // 判断第一天是否为第一周的开始
        if (intval(date('W', $year_start)) === 1) {
            $start = $year_start;//把第一天做为第一周的开始
        } else {
            $week++;
            $start = strtotime('+1 monday', $year_start);//把第一个周一作为开始
        }

        // 第几周的开始时间
        if ($week === 1) {
            $weekday['start'] = $start;
        } else {
            $weekday['start'] = strtotime('+' . ($week - 1) . ' monday', $start);
        }

        // 第几周的结束时间
        $weekday['end'] = strtotime('+1 sunday', $weekday['start']);
        if (date('Y', $weekday['end']) != $year) {
            $weekday['end'] = $year_end;
        }
        $weekday['start'] =date('Y-m-d', $weekday['start']);
        $weekday['end'] =date('Y-m-d', $weekday['end']);
        return $weekday;
    }
}
/**
 * 计算一年有多少周，每周从星期一开始，
 * 如果最后一天在周四后（包括周四）算完整的一周，否则不计入当年的最后一周
 * 如果第一天在周四前（包括周四）算完整的一周，否则不计入当年的第一周
 * @param int $year
 * return int
 */
if ( ! function_exists('week')) {
    function week($year)
    {
        $year_start = mktime(0, 0, 0, 1, 1, $year);
        $year_end = mktime(0, 0, 0, 12, 31, $year);
        if (intval(date('W', $year_end)) === 1) {
            return date('W', strtotime('last week', $year_end));
        } else {
            return date('W', $year_end);
        }
    }
}

if ( ! function_exists('thisweek')) {
    function thisweek()
    {
        $week['start'] = date('Y-m-d',strtotime(date('Y-m-d').'-1 week Monday'));
        $week['end']   = date('Y-m-d',strtotime("{$week['start']} +6 day"));
        return $week;
    }
}


if ( ! function_exists('weekdayAdv')) {
    function weekdayAdv($week)
    {
        $year = date('Y');
        $year_start = mktime(0, 0, 0, 1, 1, $year);
        $year_end = mktime(0, 0, 0, 12, 31, $year);

        // 判断第一天是否为第一周的开始
        if (intval(date('W', $year_start)) === 1) {
            $start = $year_start;//把第一天做为第一周的开始
        } else {
            $week++;
            $start = strtotime('+1 monday', $year_start);//把第一个周一作为开始
        }

        // 第几周的开始时间
        if ($week === 1) {
            $weekday['start'] = $start;
        } else {
            $weekday['start'] = strtotime('+' . ($week - 1) . ' monday', $start);
        }

        // 第几周的结束时间
        $weekday['end'] = strtotime('+1 sunday', $weekday['start']);
        if (date('Y', $weekday['end']) != $year) {
            $weekday['end'] = $year_end;
        }
        $weekday['start'] =date('Y-m-d', $weekday['start']);
        $weekday['end'] =date('Y-m-d', $weekday['end']+24*3600);
        return $weekday;
    }
}


if ( ! function_exists('write_config') )
{
    /**
     * 在config目录下创建局部配置文件
     *
     */
    function write_config( $path, $data, $mode = 'wb' )
    {
        $CI = & get_instance();
        $CI->load->helper('file');

        $path = APPPATH . 'config' .  $path;



        return write_file( $path, $data, $mode );
    }
}



if ( ! function_exists('unlimitedBladeWorks') )
{
    /**
     * 树状图拼凑
     *
     */
    function unlimitedBladeWorks($data= array(),$group,$myRole)
    {
        $tree = '';
        if(!empty($data)){
            $tree .= RhoAias($data,$group,$myRole);
        }
        return $tree;
    }
}

if ( ! function_exists('RhoAias') )
{
    /**
     * 树状图递归
     *
     */
    function RhoAias($data= array(),$group,$myRole)
    {
        $m = '';
        foreach ($data as $key=>$value){
            if($value['pid'] == 0){
                $m .= '<tbody>';
            }
            $m .= '<tr>';
            switch ($value['pid']){
                case '0':
                    $m .= '<td><i class="fa fa-users"></i></td>';
                    break;
                case '1':
                    $m .= '<td><i class="fa fa-user"></i></td>';
                    break;
                case '2':
                    $m .= '<td><i class="fa fa-star"></i></td>';
                    break;
                case '3':
                    $m .= '<td><i class="fa fa-star-half-o"></i></td>';
                    break;
                case '4':
                    $m .= '<td><i class="fa fa-star-o"></i></td>';
                    break;
                case '5':
                    $m .= '<td><i class="fa fa-street-view"></i></td>';
                    break;
                default:
                    $m .= '<td></td>';
                    break;

            }
            if($value['pid'] == 0){
                $m .= '<td>'.$value["name"].'</td>';
            }else{
                $m .= '<td>';
                for ($i=1;$i<$value['pid'];$i++){
                    $m .= '<span class="space"></span>';
                }

                $m .= '<span class="end"></span>';


                $m .= $value["name"].'</td>';
            }

            $m .= '<td>'.$value["remark"].'</td><td>';
            if(in_array($value["id"],$group)) {

            $m .= '<a class="btn btn-default btn-xs J_ajax_content_modal" data-href="'.site_url("admin/addRole?type=add&pid=".($value["pid"]+1)."&fid=".$value["id"]).'">来个小弟</a>
            <a class="btn btn-primary btn-xs" href="#admin/editRole?id='.$value["id"].'">编辑</a>
            ';
               if($value["id"] != $myRole){
                $m .= '<button type="button" class="btn btn-warning btn-xs J_confirm_modal" data-tip="一定要删除？" data-target="/admin/index.php/admin/delRole?id='.$value["id"].'">删除</button>';
               }

            }
            $m .= '</td></tr>';
            if(!empty($value['more'])){
                $m .= RhoAias($value['more'],$group,$myRole);
            }
            if($value['pid'] == 0){
                $m .= '</tbody>';
            }
        }

        return $m;
    }
}

