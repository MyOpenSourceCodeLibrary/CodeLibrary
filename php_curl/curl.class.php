<?php
/**
 * Created by PhpStorm.
 * User: bob
 * Date: 16-1-25
 * Time: 下午12:15
 */
class curl_class{
    //curl,post 类
    private function curl_post_send($url,$data,$header = null){
        $ch   = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, trim($data));
        if($header){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    //使用
    //登陆,获取sid
    public function use_curl(){
        $data = '<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Body>
    <Login xmlns="http://www.welltake.com.tw/">
      <userName>CloudEye</userName>
      <password>WellTake888</password>
    </Login>
  </soap:Body>
</soap:Envelope>';
        $url  = "http://sms.welltake.com.tw/CloudEye.asmx";
        $header = array();
        $header[0] = 'Content-Type: text/xml;charset=utf-8';
        $header[1] = 'Host: sms.welltake.com.tw';
        $header[2] = 'SOAPAction: "http://www.welltake.com.tw/Login"';
        $output = $this->curl_post_send($url,$data,$header);
        preg_match_all('/<LoginResult>(.*?)<\/LoginResult>/is',$output,$p_output);
        return $p_output;
    }
}

//测试
$test = new curl_class();
$test->use_curl();