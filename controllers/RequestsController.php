<?php

namespace app\controllers;

use app\controllers\Requests\Request;
use yii\web\Controller;


class RequestsController extends Controller
{
    /**
     * @var int|mixed
     */
    private $counter;

    function actionRequest(Request $request)
    {
        return $this->asJson(["test"=>"test"]);
    }

    function actionProcess()
    {
        $descriptorspec = array(
            0 => array("pipe", "r"),  // stdin - канал, из которого дочерний процесс будет читать
            1 => array("pipe", "w"),  // stdout - канал, в который дочерний процесс будет записывать
            2 => array("file", "/tmp/error-output.txt", "a") // stderr - файл для записи
        );

        $cwd = '/tmp';
//        $env = array('some_option' => 'aeiou');
        $env = null;
        $process = proc_open('php /app/yii hello/index', $descriptorspec, $pipes, $cwd, $env);
        $running = true;
        while ($running === true) {
            $status = proc_get_status($process);
            print_r($status);
            sleep(1);
            $running = $status['running'];
        }
        $out = stream_get_contents($pipes[1]);
        $ret = proc_close($process);
        print_r(["test"=>$out, "ret" => $ret]);
        exit(0);
    }
}