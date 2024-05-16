<?php
/**
 * description
 * author: longhui.huang <1592328848@qq.com>
 * datetime: 2024/5/16 11:49
 */
declare(strict_types=1);
\Co\run(function () {
   while (1) {
//       go(function () {
//           Co::sleep(0.01);
//           var_dump(\Swoole\Coroutine::getCid());
//           var_dump('123213213');
//       });
       var_dump(\Swoole\Coroutine::getCid());
       var_dump('xxxxxx');
       Co::sleep(1);
//       break;
   }
});
