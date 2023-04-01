# Rapidmvc
MVC framework for rapid development.

## # Directory Structure
```bash
Rapidmvc
│ 
├───app               # MVC structure.
│   ├───controller
│   ├───model
│   └───view
│
├───bootstrap         # Autoloader file.
│ 
├───cache             # System cache.
│   └───blade
│ 
├───config            # Configuration files.
│ 
├───core              # Framework core classes.
│
├───helpers           # Helpers functions.
│ 
├───public            # Web assets (js, css, images).
│   └───assets
│       ├───css
│       ├───images
│       └───js
│ 
├───routes            # Web routes.
│ 
├───storage           # Data and sessions storage.
│   └───data
│       ├───array
│       ├───json
│       └───sqlite
│   └───sessions
│ 
└───vendor            # Composer packages.
```

## # Models
Rapidmvc provides a simple data model that makes it easy to interact with your database no matter what relational database you're using. but before you start useing models you should specify your database information in the configuration file located in this path ```config\app.php``` .

``` php
// Database
'db_driver' => 'mysql',
'db_host' => 'localhost',
'db_name' => 'test',
'db_user' => 'root',
'db_password' => '',
'db_port' => 3306,
'db_charset' => 'utf8',
'db_sslmode' => 'disable' // disable - require
```

##### # Create Model
The framework store model files in ```app/model``` folder, all you need is to create php file in this folder with the database table name like this ```User.php``` .

The model file must have ```App\Model``` namespace and extend Model class and also must have ```$table``` property to specify the database table that the model will interact with like the example below:
``` php
namespace App\Model;

use Core\Db\Model;

class User extends Model
{
	protected static $table = 'users';
}
```

##### # How to Use Model
Just use the namespace ```App\Model\YourModelName``` in the controller like the following example:
``` php
namespace App\Controller;

use App\Model\User;

class HomeController
{
	
	public function index ()
	{
		$users = User::execute()->all()->get();

		return view('home', compact('users'));
	}
}
```

##### # Model Properties
Once you associated the model with the database table, you are ready to start adjust and retrieve data from your database. The model has a good query builder allowing you to rapidly query the database table.

Here are all the methods and properties you will need to query the database table:

**Retrieve all data**
``` php
$data = User::execute()->all()->get();
```

**Retrieve single column**
``` php
$data = User::execute()->select('email')->column();
```

**Retrieve single row**
``` php
$data = User::execute()->all()->first();
```

**Select specific columns**
``` php
$data = User::execute()->select('id')->get();

$data = User::execute()->select('id, name, email')->get();
```

**Limit rows**
``` php
$data = User::execute()->all()->limit(10)->get();
```

**Order By**
``` php
$data = User::execute()->all()->orderBy('username', 'asc')->get();
```

**Group By / Having**
``` php
$data = User::execute()->select('item, category')
                       ->groupBy('category')
                       ->having('item', '!=', 'anything')
                       ->get();
```

**Where condition**
``` php
// Where
$data = User::execute()->all()
                       ->where('id', '=', 1)
                       ->get();
// Where IS NULL
$data = User::execute()->all()
                       ->whereIsNull('image')
                       ->get();
// Where IS NOT NULL
$data = User::execute()->all()
                       ->whereIsNotNull('image')
                       ->get();
// Where Like
$data = User::execute()->all()
                       ->whereLike('name', '%ahmed%')
                       ->get();
// Where In
$data = User::execute()->all()
                       ->whereIn('name', 'omar,momen,tamer,ahmed')
                       ->get();
```

**AND / OR**
``` php
// AND
$data = User::execute()->all()
                       ->where('id', '>', 0)
                       ->and('name', '=', 'ahmed')
                       ->get();
// OR
$data = User::execute()->all()
                       ->where('id', '=', 1)
                       ->or('id', '=', 2)
                       ->get();
```

**Union / Union All**
``` php
// Union
$data = User::execute()->select('column1, column2')
                       ->union('table', 'column1, column2')
                       ->get();
// Union All
$data = User::execute()->select('column1, column2')
                       ->unionAll('table', 'column1, column2')
                       ->get();
```

**Joins**
``` php
// Inner Join
$data = User::execute()->all()
                       ->join('table', 'table.id', '=', 'users.id')
                       ->join('table2', 'table2.number', '=', 'users.number')
                       ->get();
// Left Join
$data = User::execute()->all()
                       ->leftJoin('table', 'table.id', '=', 'users.id')
                       ->get();
// Right Join
$data = User::execute()->all()
                       ->rightJoin('table', 'table.id', '=', 'users.id')
                       ->get();
// Cross Join
$data = User::execute()->all()
                       ->crossJoin('table')
                       ->get();
```

**Insert Data**
``` php
User::execute()->insert([
	'id' => 1,
	'name' => 'ahmed',
	'email' => 'ahmed@gmail.com',
])->save();
```

**Update Data**
``` php
User::execute()->update([
	'name' => 'omar',
	'email' => 'omar@gmail.com',
])->where('id', '=', 1) // condition
  ->save();			
```

**Delete**
``` php
User::execute()->delete()
               ->where('id', '=', 3) // condition
               ->save();
```

**Truncate Table**
``` php
User::execute()->truncate()->save();		
```

**Custom Query**
``` php
$data = User::execute()->custom('SELECT * FROM table')->get();		
```

## # Views
To create view just go to the views path ```app/view``` and create php file with ```.blade``` like the following example: ```viewname.blade.php```
The reasone why the file has ```.blade``` with the name because the framework use [Blade](http://laravel.com/docs/5.8/blade) as a **template engine** to make use of it's awesome features.

To read more about [Blade](http://laravel.com/docs/5.8/blade) the information can be found through the links below.

**Documentation** [http://laravel.com/docs/5.8/blade](http://laravel.com/docs/5.8/blade) <br/>
**Github Repo** [http://github.com/jenssegers/blade](http://github.com/jenssegers/blade) <br/>