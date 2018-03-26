# wse-project

## Web Server Environment Project

### MVC Pattern

index.php acts as a FrontController

### Authentication

Using session-based authentication 

### Devious Admin Theme

Developed by myself, implemented using it as master page

### Development steps

1- Create a new model with the following name convention {yourModelName}.class.php under the model folder. Models should have mapped database properties and mapped CRUD, stored procedure related calls and business logic. Other notes:

- The general model creation convention is:
  - First, add all the method fields using
  encapsulation like:

    - `private $id;`
    - `public function getId () { return $this->id; }`
    - `private function setId ($id) { $this->id = $id; }`
  - Add a get by id static method: `public static function Get{ModelName}ById($id)` - Example: GetUserById
  - Add a get all static method: `public static function GetAll{PluralModelName}()` - Example: GetAllUsers
  - Add a Create method: `public function Create()`
  - Add an Edit method: `public function Edit()`
  - Add a Delete method: `public function Delete()`
  - Add extra logic and functions: `public function YourFunction()`

2- Create your views under /view/{PluralModelName}/ . Views should only contain display logic, for loops and conditions to render the data passed by the controller. Never make requests inside of a view. By default, the renderer puts the view under a master page passed by the controller. Soon we will change this by adding a nullable conditional to the rendering engine when no template is specified in order to allow rendering full html files in the views. For now you have to create a new template for individual and no - template related views. Use authentication as an example. Examples:

- `view/users/users.php`
- `view/users/create.php`
- `view/users/edit.php`
- `view/users/details.php`
- `view/users/delete.php`

3- Create a new controller using the following name convention {yourControllerName}.controller.php under the controllers folder. Controllers should contain request mappings, mapping logic, small format conversion functions and web related logic. Other notes:

- Create your class inside your new controller file. Example: `class UsersController extends BaseController { ... }`
- Create your methods and page mappings like: `public function Index () { ... }`
- Inside of your methods, use the BaseController methods to render your response. Example, being inside of `Index(){...}`
  - `parent::RenderPage('Users', 'view/shared/dtadmin/layout.php', 'view/users/users.php', $model);`
    - In this case, the first parameter is the Page name, the second one is the master page path, the third one is the view to render, and the fourth one is the data to pass to the view.
    
### Important

The model data will be passed to the view as a variable named $MODEL, if null, then $MODEL will be null too.

### Extras

#### The Security class

`class Security { ... }` This class has a handful of methods that allows the programmer to use session based authentication. The methods are:

- `public static function CreateSessionForUser ($user) { ... }`

  - Creates a new session for the given user model.

- `public static function UserIsLoggedIn () { ... }`

  - Checks if there is a logged user.

- `public static function GetLoggedUser () { ... }`

  - Gets the current logged user data, returns null if the user is not logged.

- `public static function DeleteSession () { ... }`

  - Destroys the current session

- `public static function HashPassword ($password) { .. }`

  - Uses PHP's default bcrypt to hash the given password string

#### The database configuration class

`class DataBase { ... }` - This class contains the default values for the connection to a mysql db. Set your default connection values in the default strings for the constructor.

`public function __construct(
  $hostname= 'localhost',
  $database= 'awsrv',
  $username= 'AWSRV',
  $password= 'sanpedro123!'
) { ... }`

#### The assets folder

Put here your css, js, fonts and image files. Mostly used by the views and the templates.

#### The session folder

It is highly recommended to use classes to manage your sessions. This will ensure scalability and code order. Use shoppingcart.session.php as an example.
