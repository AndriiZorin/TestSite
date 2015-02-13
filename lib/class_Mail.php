<?php
class Mail {
	static $subject = 'Default';
	static $from = 'test@lovestory@mail.com';
	static $to = 'test@lovestory@mail.com';
	static $text = 'Some text';
	static $header = '';

	static function send() {
		self::$subject = '=?utf-8?b?'.base64_encode(self::$subject) .'?=';

		self::$subject = "Content-type: text/html; charset=\"utf-8\"\r\n";
		self::$header  .= "From ".self::$from."\r\n";
		self::$header  .= "MIME-Version: 1.0\r\n";
		self::$header  .= "Date: ".date('D, d M Y h:i:s O')."\r\n";
		self::$header  .= "Precendce: bulk "."\r\n ";

		return mail(self::$to, self::$subject, self::$text, self::$header);
	}
 
	static function testSend() {
		if(mail(self::$to, 'English words', 'English words')) {
			echo "Письмо отправилось";
		} else {
			echo "Письмо НЕ отправилось";
		}
		exit();
	}
}
