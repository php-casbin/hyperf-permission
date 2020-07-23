<?php

namespace Hyperf\Permission;

use Casbin\Enforcer;
use Casbin\Model\Model;

class Casbin
{
  public $enforcer;

  public $adapter;

  public $model;

  public $config = [];

  public function __construct($config = [])
  {
    $this->config = $this->mergeConfig(
      require dirname(__DIR__) . '/pubish/permission.php',
      $config
    );

    $this->adapter = $this->config['adapter'];

    $this->model = new Model();
    if ('file' == $this->config['model']['config_type']) {
      $this->model->loadModel($this->config['model']['config_file_path']);
    } elseif ('test' == $this->config['model']['config_type']) {
      $this->model->loadModel($this->config['model']['config_text']);
    }
  }

  public function enforcer($newInstance = false)
  {
    if ($newInstance || is_null($this->enforcer)) {
      $this->enforcer = new Enforcer($this->model, $this->adapter);
    }

    return $this->enforcer;
  }

  private function mergeConfig(array $a, array $b)
  {
    foreach ($a as $key => $val) {
      if (isset($b[$key])) {
        if (gettype($a[$key]) != gettype($b[$key])) {
          continue;
        }
        if (is_array($a[$key])) {
          $a[$key] = $this->mergeConfig($a[$key], $b[$key]);
        } else {
          $a[$key] = $b[$key];
        }
      }
    }

    return $a;
  }

  public function __call($name, $params)
  {
    return call_user_func_array([$this->enforcer(), $name], $params);
  }
}
