# WordPress Custom Theme
## Main concepts or techniques used in this theme.
1. **Namespaces**
2. **Autoloader**
3. **Traits**
4. **Singleton**

### 1. Namespaces:
Namespace is a way of encapsulating items. It's like a virtual folder or directory defined with namespace keyword at the top of the class file followed by the name you like.

Allow you to have two or more classes with the same name in different namespaced directories. 

#### Example:
```php
namespace App;
class Products {};
$products = new App\Products();
```

### 2. Autoloader
Loading classes or interfaces automatically when the instance is initiated.

#### Example:
```php
spl_autoload_register( function( $class_name) ) {
  inlcude "inc/$class_name.php";  # inc/Products.php 
}
new Products(); # spl_autoload_register() will be triggered
```

### 3. Traits
Earlier we could only inherit properties and methods from one class to another, by extending them. And if we wanted to inherit properties/methods from multiple classes then we were need to extend them - Creates chain of inheritance.

PHP `v5.4+` introduced a mechanism for code reuse-ability called `traits`

Traits allow us to reuse sets of methods freely in several independent classes living in different class hierarchies. Traits are similar to classes, but only intended to group functionality in a fine-grained and consistent way.

It's not possible to instantiate a trait on its own.

#### Example:
```php
trait Sayhello {
  public function hello() {
    echo "Hello Developers";
  }
}

new Sayhello() # Error. We can instantiate Trait

class Base {
  use Sayhello;
}
$base = new Sayhello();
$base->hello(); # Hello Developers
```

### 4. Singleton
It's used to restrict the instantiation of a class to a single object. Useful when only one object is required across the system. Ensures a single class instance and that is global its point of access.

```php
# Traditional way 
class User {};
$user = new User();
$user2 = new User();
/*
 * We don't need $user2 object. 
 * We can use $user across the project
 */
```