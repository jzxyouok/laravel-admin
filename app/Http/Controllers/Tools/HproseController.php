<?php

// +----------------------------------------------------------------------
// | date: 2015-08-22
// +----------------------------------------------------------------------
// | HproseController.php: 高性能远程对象服务引擎服务提供者
// +----------------------------------------------------------------------
// | Author: yangyifan <yangyifanphp@gmail.com>
// +----------------------------------------------------------------------

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\BaseController;

use App;

use App\Model\Admin\NewsModel;

class HproseController extends BaseController{

    private $Client;
    private $Server;

    /**
     * 构造函数
     *
     * @author yangyifan <yangyifanphp@gmail.com>
     */
    public function __construct(){
        //设置对象
        $this->Client = App::make('\Hprose\Http\Client');
        $this->Server = App::make('\Hprose\Http\Server');
    }

    /**
     * 开始执行采集
     *
     * @author yangyifan <yangyifanphp@gmail.com>
     */
    public function getIndex(){
        $this->Client->useService(action('Tools\HproseController@postIndex2'));
        var_dump($this->Client->a());
    }

    public function getIndex2(){
        print_r(new App\Http\Controllers\Tools\HtmlDomController());die;
        $this->Server->addMethod('a', new App\Http\Controllers\Tools\HtmlDomController());
    }


    public function a($param){
        echo '这里是'.$param;
    }


}