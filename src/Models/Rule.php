<?php

declare(strict_types=1);

namespace Hyperf\Permission\Models;

use Hyperf\DbConnection\Model\Model;

class Rule extends Model
{
  /**
   * Fillable.
   *
   * @var array
   */
  protected $fillable = ['ptype', 'v0', 'v1', 'v2', 'v3', 'v4', 'v5'];

  /**
   * Create a new Eloquent model instance.
   *
   * @param array $attributes
   */
  public function __construct(array $attributes = [])
  {
    $this->setTable(config('permission.database.rules_table'));

    parent::__construct($attributes);
  }
}
