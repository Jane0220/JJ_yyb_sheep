<?php
define('PATH', dirname(__FILE__));
require_once PATH . '/lib/SnsNetwork.php';
require_once PATH . '/lib/SnsSigCheck.php';

class YYBE_DEMO {

    var $providerId = '';
    var $pSecret = '';
    var $isDebug;

    public function __construct($providerId, $secret, $isDebug) {
        $this->providerId = $providerId;
        $this->pSecret = $secret;
        $this->isDebug = $isDebug;
    }

    public function addArticle($data) {

        $url = 'api.yybv.qq.com/yybe/article/add';
        $res = $this->_request($url, $data);
        return $res;
    }

    private function _request($url, $data) {

        $method = 'POST'; //
        $url_path = '/yybe/article/add';
        $secret = $this->pSecret . '&'; // 和open.qq.com签名保持一致


        // 公共参数
        $data['providerId'] = $this->providerId;
        $data['ts'] = time();
        $data['debug'] = $this->isDebug ? 1 : 0;


        $sig = SnsSigCheck::makeSig($method, $url_path, $data, $secret);
        $data['sig'] = $sig;

        //var_dump($data);
        $cookie = array();
        $method='post';
        $protocol='http';
        $ret = SnsNetwork::makeRequest($url, $data, $cookie, $method, $protocol);

        return $ret;
    }
}

// 配置
$config = array('providerId' => 10008, // 平台分配
                'secret' => 'xV7@xF8%eD4*eS0@eG1(yX1)oD5(tT7(', // 平台分配
                'isDebug' => 1,  // 是否处于调试模式，正式推送时可置为0
               );
//$config['isDebug'] = 0;
$demo = new YYBE_Demo($config['providerId'], $config['secret'], $config['isDebug']);
/*
$data = array(
              'title' => 'hello world',
              'type' => 1, // 1: 段子 2: 动漫，详细请参考文档
              'content' => '这里是正文内容，我是应用宝<img src="http://img3.sj.qq.com/res/static/myapp/assets/images/common/logo-yyb.png" alt="yyb" />，测试，html<h1>我是H1</H1>，<strong>我是粗体</strong> 太平轮：<img src="http://p.qpic.cn/aiguang_info/0/video_banner_pic_index_551c9926bef46/0" alt="太平轮图片" />',
              'articleUrl' => 'http://baidu.com/',
              'author' => '我是作者',
             );
*/
$content = $_POST['content'];
$title = $_POST['title'];
$author = $_POST['author'];		 
$thumb = $_POST['thumb'];
$thumbUrl = "http://game.ppickup.com/smallgame/web/yyb/images/".$thumb;	 
$data = array(
              'title' => $title,
              'type' => 3, // 1: 段子 2: 动漫 3: 逗比们
              'content' => $content,
              'articleUrl' => 'https://www.daxiangce123.com/',
              'thumbUrl' => $thumbUrl,
			  'author' => $author
             );
$data['articleId'] = time();    // debug

$res = $demo->addArticle($data);
if (isset($res['errno'])) {
    echo "==== Error: ====\n\n";
    print_r($res);
} else {
    echo "==== Success: =====\n\n";
    $response = json_decode($res['msg'], 1);
    if ($response) {
        printf("ret: %d, msg: %s \n\n", $response['ret'], $response['msg']);
        echo "Response: \n";
        print_r($response);
    } else {
        echo "json decode error\n";
        var_dump($res);
    }
}
