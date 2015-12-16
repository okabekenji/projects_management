<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail {

  public function __construct()
  {
    $this->CI =& get_instance();
  }

  public function send($to = "okabe@webisu-inc.com", $body = "テスト")
  {
      mb_language("japanese");
      mb_internal_encoding("UTF-8");

      //日本語メール送信
      $subject = MAIL_SUBJECT;
      $from = MAIL_FROM;

      mb_send_mail($to, $subject, $body, "From:".$from);
  }


}
