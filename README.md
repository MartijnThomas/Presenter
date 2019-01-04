# Presenter

Decorate Eloquent models.

## Installation

This package can be used in Laravel 5.4 or higher.

You can install the package via composer:

``` bash
composer require martijnthomas/presenter
```

In Laravel 5.5 the service provider will automatically get registered. In older versions of the framework just add the service provider in `config/app.php` file:

```php
'providers' => [
    // ...
    MartijnThomas\Presenter\PresenterServiceProvider::class,
];
```

## Usage

First, add the `MartijnThomas\Presenter\Presentable` trait to your `Eloquent` model(s):

```php
namespace App;

use Illuminate\Database\Eloquent\Model;
use MartijnThomas\Presenter\Presentable;

class Product extends Model
{
    use Presentable;

    // ...
}
```

Next, you can create a `ModelPresenter`, this class has to extend the `MartijnThomas\Presenter\PresenterAbstract`. Within the created `ModelPresenter` you can add methods representing your presenters.

You can access your original model data through `$this->model`.

```php
namespace App\Presenters;

use MartijnThomas\Presenter\PresenterAbstract;

class ProductPresenter extends PresenterAbstract
{
    /**
     * Format the amount
     *
     * @return string
     */
    public function amount()
    {
        return $this->model->amount / 100;
    }
}
```

Then there is one thing left to do, you need to register the presenter within your model. This is simple:

```php
namespace App;

use App\Presenters\ProductPresenter;
use Illuminate\Database\Eloquent\Model;
use MartijnThomas\Presenter\Presentable;

class Product extends Model
{
    use Presentable;

    /**
     * Set the Presenter for the Model
     *
     * @var \App\Presenters\ProductPresenter
     */
    protected $presenter = ProductPresenter::class;

    // ...
}
```

Now you can access your decorated properties as follows:

```php
$product = Product::find(1);

$product->present()->amount;
```

Enjoy!

## Open ends

Packages is not yet fully featured, still needs to do:
- Add generator for the presenters
