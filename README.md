<h1 align="center"> hyperf-permission </h1>

<p align="center"> An authorization library that supports access control models like ACL, RBAC, ABAC in Hyperf..</p>


## Installing

Require this package in the `composer.json` of your Hyperf project. This will download the package.

```shell
$ composer require yi17310320725/hyperf-permission:dev-master -vvv
```

To publish the config, run the vendor publish command:

```shell
$ php bin/hyperf.php vendor:publish yi17310320725/hyperf-permission
```

This will create a new model config file named `config/autoload/casbin-rbac-model.conf`,  a new permission config file named `config/autoload/permission.php` and new migrate file named `2020_07_22_213202_create_rules_table.php`.

To migrate the migrations, run the migrate command:

```shell
$ php bin/hyperf.php migrate
```

This will create a new table named `rules` .

## Usage

### Quick start

Once installed you can do stuff like this:

```php
use Hyperf\Permission\Casbin;

$casbin = new Casbin();

// adds permissions to a user
$casbin->addPermissionForUser('eve', 'articles', 'read');
// adds a role for a user.
$casbin->addRoleForUser('eve', 'writer');
// adds permissions to a rule
$casbin->addPolicy('writer', 'articles', 'edit');
```

You can check if a user has a permission like this:

```php
// to check if a user has permission
if ($casbin->enforce('eve', 'articles', 'edit')) {
  // permit eve to edit articles
} else {
  // deny the request, show an error
}
```

### Using Enforcer Api

It provides a very rich api to facilitate various operations on the Policy:

Gets all roles:

```php
Enforcer::getAllRoles(); // ['writer', 'reader']
```

Gets all the authorization rules in the policy.:

```php
Enforcer::getPolicy();
```

Gets the roles that a user has.

```php
Enforcer::getRolesForUser('eve'); // ['writer']
```

Gets the users that has a role.

```php
Enforcer::getUsersForRole('writer'); // ['eve']
```

Determines whether a user has a role.

```php
Enforcer::hasRoleForUser('eve', 'writer'); // true or false
```

Adds a role for a user.

```php
Enforcer::addRoleForUser('eve', 'writer');
```

Adds a permission for a user or role.

```php
// to user
Enforcer::addPermissionForUser('eve', 'articles', 'read');
// to role
Enforcer::addPermissionForUser('writer', 'articles','edit');
```

Deletes a role for a user.

```php
Enforcer::deleteRoleForUser('eve', 'writer');
```

Deletes all roles for a user.

```php
Enforcer::deleteRolesForUser('eve');
```

Deletes a role.

```php
Enforcer::deleteRole('writer');
```

Deletes a permission.

```php
Enforcer::deletePermission('articles', 'read'); // returns false if the permission does not exist (aka not affected).
```

Deletes a permission for a user or role.

```php
Enforcer::deletePermissionForUser('eve', 'articles', 'read');
```

Deletes permissions for a user or role.

```php
// to user
Enforcer::deletePermissionsForUser('eve');
// to role
Enforcer::deletePermissionsForUser('writer');
```

Gets permissions for a user or role.

```php
Enforcer::getPermissionsForUser('eve'); // return array
```

Determines whether a user has a permission.

```php
Enforcer::hasPermissionForUser('eve', 'articles', 'read');  // true or false
```

See [Casbin API](https://casbin.org/docs/en/management-api) for more APIs.

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/yi17310320725/hyperf-authz/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/yi17310320725/hyperf-authz/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

Apache-2.0
