<?php

namespace Hyperf\Permission;

class ConfigProvider
{
  public function __invoke(): array
  {
    return [
      'dependencies' => [],
      'annotations' => [
        'scan' => [
          'paths' => [
            __DIR__,
          ],
        ],
      ],
      'commands' => [],
      'listeners' => [],
      'publish' => [
        [
          'id' => 'permission',
          'description' => 'Hyperf Authz',
          'source' => __DIR__ . '/../publish/permission.php',
          'destination' => BASE_PATH . '/config/autoload/permission.php',
        ],
        [
          'id' => 'model',
          'description' => 'RBAC Model file',
          'source' => __DIR__ . '/../publish/casbin-rbac-model.conf',
          'destination' => BASE_PATH . '/config/autoload/casbin-rbac-model.conf',
        ],
        [
          'id' => 'database',
          'description' => 'migrate file',
          'source' => __DIR__ . '/../database/migrations/2020_07_22_213202_create_rules_table.php',
          'destination' => BASE_PATH . '/migrations/2020_07_22_213202_create_rules_table.php',
        ],
      ],
    ];
  }
}
