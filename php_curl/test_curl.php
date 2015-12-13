<?php

        //post
        $data = array('from' => 'zh', 'to' => 'en', 'query' => '测试用例', 'transtype' => 'trans', 'simple_means_flag' => 3);
        $url  = "http://fanyi.baidu.com/v2transapi";
        $ch   = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $output = json_decode(curl_exec($ch), TRUE);
        echo '<pre>';
        var_dump($output);
        curl_close($ch);

        //get
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://fanyi.youdao.com/openapi.do?keyfrom=yunzhihui&key=524912499&type=data&doctype=json&version=1.1&q=你好世界");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = json_decode(curl_exec($ch), TRUE);
        echo '<meta charset="charset:utf-8">';
        echo '<pre>';
        var_dump($output);
        curl_close($ch);

