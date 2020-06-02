<?php
// 中间件配置
return [
    // 别名或分组
    'alias'    => [
        'Login' => 'app\middleware\User\Login',
        'Register' => 'app\middleware\User\Register',
        'CheckUser' => 'app\middleware\CheckUser',
    ],
    // 优先级设置，此数组中的中间件会按照数组中的顺序优先执行
    'priority' => [],
];
