<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api {

   static public $error_code = array(
      'REQUEST_INVALID' => array(
                    'id' => '1',
                    'message' => 'リクエストデータが不正です',
                  ),
      'NOT_FOUND' => array(
                    'id' => '2',
                    'message' => 'データが見つかりません',
                  ),
      'HAS_REQUIRED_FIELDS' => array(
                    'id' => '3',
                    'message' => '未入力項目があります',
                  ),
      'MAIL_EXISTS' => array(
                    'id' => '4',
                    'message' => 'メールアドレスは既に登録されています',
                  ),
      'COMMIT_ERROR' => array(
                    'id' => '6',
                    'message' => '登録できませんでした',
                  ),
      'UNAUTHORIZE' => array(
                    'id' => '7',
                    'message' => '再度ログインしてください',
                  ),
      'MB_INT' => array(
                    'id' => '8',
                    'message' => 'マナビーは整数を入力してください',
                  ),
      'MEMBER_NOT_FOUND' => array(
                    'id' => '9',
                    'message' => '存在しない会員です',
                  ),
      'MEMBER_MB_SHORT' => array(
                    'id' => '10',
                    'message' => 'マナビーが足りません',
                  ),
      'MEMBER_SAME' => array(
                    'id' => '11',
                    'message' => 'マナビーを付与できません',
                  ),
      'REQUESTID_NOT_FOUND' => array(
                    'id' => '12',
                    'message' => '存在しないリクエストです',
                  ),
      'DEFAULT_MB_ERROR' => array(
                    'id' => '13',
                    'message' => '初期マナビーは数値を設定してください。',
                  ),
      'EMOJI' => array(
                    'id' => '14',
                    'message' => '絵文字は入力出来ません。',
                  ),
      'MBUPDATE_ERROR' => array(
                    'id' => '15',
                    'message' => '入力内容が正しくありません。',
                  ),
  );

  public function __construct()
  {
    $this->CI =& get_instance();
  }

  /**
   * POSTリクエストのみ許可
   */
  public function allow_from_post()
  {
    if ($_SERVER["REQUEST_METHOD"] != "POST")
    {
        $this->error_respond_to_json('REQUEST_INVALID');
        return false;
    }
    return true;
  }

  /**
   * 指定したエラーを返す
   * @param json $err
   */
  public function error_respond_to_json($err)
  {
    $this->CI->output->set_content_type('application/json');
    $this->CI->output->set_status_header('200');
    $this->CI->output->set_output(json_encode(array(
      "status" => "false",
      "errors" => self::$error_code[$err]
    )));
  }
  /**
   * JSONでレスポンスを返す
   * @param string $http_statu_code
   * @param json $data
  */
  public function respond_to_json($http_statu_code, $data)
  {
    $this->CI->output->set_content_type('application/json');
    $this->CI->output->set_status_header($http_statu_code);
    $this->CI->output->set_output(json_encode($data));
  }

}
