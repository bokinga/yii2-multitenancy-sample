<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'i18n' => [
            'translations' => [
                'backend' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@backend/messages',
                    'sourceLanguage' => 'en_US',
                    'fileMap' => [
                        'backend' => 'backend.php',
                    ],
                ],
            ],
        ],
        'actsAsTenant' => [
            'class' => 'CrazyStudio\ActsAsTenant\ActsAsTenant',
            'tenantModelClass' => 'common\models\Tenant',
            'domainModelClass' => 'common\models\Domain',
        ]
    ],
    'as beforeRequest' => [
        'class' => 'CrazyStudio\ActsAsTenant\filters\TenantFilter',
    ],
    'params' => $params,
];
