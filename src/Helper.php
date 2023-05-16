<?php 
class Helper
{
  public static function curlFetch($endPoint , $postData = [] , $authorization = [])
  {
      $output = [];
      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL, $endPoint);


      // Return Page contents.
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       
      $res = curl_exec($ch);
      
      $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
      $error = curl_errno($ch);
      if ($error) {
          $output['status'] = FAILED;
          $output['message'] = DATA_FETCH_ERROR;
          return $output;
      }
      $output['status'] = OK;
      $output['message'] = SUCCESS_MSG;
      $output['result'] = $res;
      curl_close($ch);
      return $output;
  }
  public function cleanInput($input)
  {
    if(is_array($input))
    {
      foreach($input as $k=>$v)
      {
        $v = trim($v);
        $v = filter_var($v, FILTER_SANITIZE_STRING);
        $input[$k] = $v;
      }
      return $input;
    }

    $input = trim($input);
    $input = filter_var($input, FILTER_SANITIZE_STRING);
    return $input;
  }

  public function sendResponse($response , $die = false)
  {
    echo json_encode($response);
    if($die)
    {
      exit;
    }
  }
}