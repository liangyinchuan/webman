<?php
namespace process;

use support\Log;
use Workerman\Crontab\Crontab;

class Task
{
    public function onWorkerStart()
    {
        // 每分钟的第一秒执行
        new Crontab('10-20 * * * * *', function(){
            $s = date('Y-m-d H:i:s')."\n";
            Log::info('10-20 * * * * * - '.$s);
        });

        // 每天的7点50执行，注意这里省略了秒位
        new Crontab('50 7 * * *', function(){
            $s = date('Y-m-d H:i:s')."\n";
            Log::info('50 7 * * * - '.$s);
        });

        // 每2分钟执行一次，注意这里省略了秒位
        new Crontab('*/2 * * * *', function(){
            $s = date('Y-m-d H:i:s')."\n";
            Log::info('*/2 * * * * - '.$s);
        });
    }
}