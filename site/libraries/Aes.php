<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Aes{
	const KEY="123";
	const KEY16="heqtxmzwjd2YNeDw";
	/**
	 * pkcs7补码
	 * @param string $string  明文
	 * @param int $blocksize Blocksize , 以 byte 为单位
	 * @return String
	 */
	
	private function addPkcs7Padding($string, $blocksize = 32) {
		$len = strlen($string); //取得字符串长度
		$pad = $blocksize - ($len % $blocksize); //取得补码的长度
		$string .= str_repeat(chr($pad), $pad); //用ASCII码为补码长度的字符， 补足最后一段
		return $string;
	}

	/**
	 * 除去pkcs7 padding
	 *
	 * @param String 解密后的结果
	 *
	 * @return String
	 */
	private function stripPkcs7Padding($string){
		$slast = ord(substr($string, -1));
		$slastc = chr($slast);
		$pcheck = substr($string, -$slast);
//var_dump($pcheck);die;
		if(preg_match("/$slastc{".$slast."}/", $string)){
			$string = substr($string, 0, strlen($string)-$slast);
			return $string;
		} else {
			return false;
		}
	}

	function hexToStr($hex)//十六进制转字符串
	{
		$hex=strtoupper($hex);
		$string="";
		for($i=0;$i<strlen($hex)-1;$i+=2)
			$string.=chr(hexdec($hex[$i].$hex[$i+1]));
			return  $string;
	}
	function strToHex($string)//字符串转十六进制
	{
		$hex="";
		$tmp="";
		for($i=0;$i<strlen($string);$i++)
		{
			$tmp = dechex(ord($string[$i]));
			$hex.= strlen($tmp) == 1 ? "0".$tmp : $tmp;
		}
		return $hex;
	}

function aes128ecbDecrypt($encryptedText, $key=self::KEY) {
		//$str = $this->hexToStr($encryptedText);
		//return $this->stripPkcs7Padding(mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $str, MCRYPT_MODE_ECB));
		$td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_ECB, '');
		$iv = @mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
		mcrypt_generic_init($td, $key, $iv);
		$decrypted_text = mdecrypt_generic($td, $this->hexToStr($encryptedText));
		$rt = $decrypted_text;
		mcrypt_generic_deinit($td);
		mcrypt_module_close($td);
		
		return $this->stripPkcs7Padding($rt);
	}

	function aes128ecbEncrypt($str, $key=self::KEY ) {    // $this->addPkcs7Padding($str,16)
		//$base = (mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key,$this->addPkcs7Padding($str,16) , MCRYPT_MODE_ECB));
		//return $this->strToHex($base);
		$td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_ECB, '');
		$iv = @mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
		mcrypt_generic_init($td, $key, $iv);
		$cyper_text = mcrypt_generic($td, $this->addPkcs7Padding($str,16));
		//$rt=base64_encode($cyper_text);
		//$rt = bin2hex($cyper_text);
		mcrypt_generic_deinit($td);
		mcrypt_module_close($td);
		return $this->strToHex($cyper_text);
	}
	
	function key16aes128ecbDecrypt($encryptedText, $key=self::KEY16) {
		//$str = $this->hexToStr($encryptedText);
		//return $this->stripPkcs7Padding(mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $str, MCRYPT_MODE_ECB));
		$td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_ECB, '');
		$iv = @mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
		mcrypt_generic_init($td, $key, $iv);
		$decrypted_text = mdecrypt_generic($td, $this->hexToStr($encryptedText));
		$rt = $decrypted_text;
		mcrypt_generic_deinit($td);
		mcrypt_module_close($td);
	
		return $this->stripPkcs7Padding($rt);
	}
	
	function key16aes128ecbEncrypt($str, $key=self::KEY16 ) {    // $this->addPkcs7Padding($str,16)
		//$base = (mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key,$this->addPkcs7Padding($str,16) , MCRYPT_MODE_ECB));
		//return $this->strToHex($base);
		$td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_ECB, '');
		$iv = @mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
		mcrypt_generic_init($td, $key, $iv);
		$cyper_text = mcrypt_generic($td, $this->addPkcs7Padding($str,16));
		//$rt=base64_encode($cyper_text);
		//$rt = bin2hex($cyper_text);
		mcrypt_generic_deinit($td);
		mcrypt_module_close($td);
		return $this->strToHex($cyper_text); 
	}
}