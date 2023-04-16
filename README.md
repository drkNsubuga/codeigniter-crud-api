# CodeIgniter CRUD API
This package provides a simple integration of the [PhpCrudApi](https://github.com/mevdschee/php-crud-api) library into CodeIgniter projects, allowing for automatic API generation based on the project's database.  It provides CodeIgniter-specific functionality and configuration.

## Installation
1. Download the latest version of the package from the releases page.
2. Extract the contents of the archive to your CodeIgniter project's application directory.
3. Copy the files from this package to the correspoding folder in your application folder. 
4. Install the PhpCrudApi library via Composer project's root directory: **`composer require mevdschee/php-crud-api`**
5. Update the **`crud_api.php`** file with your database credentials and other configuration options.
Usage
5. Once installed, the CRUD API can be accessed via the /records endpoint of your CodeIgniter application. For example, if your CodeIgniter application is running on `http://localhost`, the CRUD API can be accessed at **`http://localhost/records`**.

## Endpoints
The following endpoints are available:

* **`/records`** - The main CRUD API endpoint. Provides Create, Read, Update, and Delete operations for database tables.
* **`/openapi`** - Provides an OpenAPI (formerly Swagger) specification for the API.
* **`/login`** - Provides a login page for managing user authentication.
* **`/logout`** - Logs the user out and redirects them to the login page.

## Configuration
The config/crud_api.php file provides options for configuring the CRUD API. Options include database credentials, cache settings, and OpenAPI information. See the comments in the file for more information.

## Credits
This project is based on [PHP-CRUD-API](https://github.com/mevdschee/php-crud-api) by Marco van de Voort.

## Contributing
Contributions are welcome! If you encounter any issues or have ideas for improvements, please open an issue or submit a pull request.

## License
This project is licensed under the MIT License. See the LICENSE file for details.
