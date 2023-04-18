# CodeIgniter CRUD API
[![License](https://img.shields.io/badge/License-MIT-blue.svg)](https://opensource.org/licenses/MIT) [![codecov](https://codecov.io/gh/drkNsubuga/codeigniter-crud-api/branch/main/graph/badge.svg)](https://codecov.io/gh/drkNsubuga/codeigniter-crud-api) ![Code Climate maintainability](https://img.shields.io/codeclimate/maintainability/drkNsubuga/codeigniter-crud-api)
 ![GitHub all releases](https://img.shields.io/github/downloads/drkNsubuga/codeigniter-crud-api/total) 

This Codeigniter package provides a simple integration of the [PhpCrudApi](https://github.com/mevdschee/php-crud-api) library, allowing for automatic API generation based on your database.  It provides CodeIgniter-specific functionality and configuration.

## Installation
1. Download the latest version of the package from the releases page.
2. Extract the contents of the archive.
3. Copy the files from this package to the correspoding folders in your application folder. 
4. Install **PhpCrudApi** via Composer in root directory of your project: 
```console
composer require mevdschee/php-crud-api
```
5. Update the **`crud_api.php`** file with your database credentials and other configuration options.
6. Update your routes:
```php
$route['api/(.*)'] = 'api/index';
```

## Usage
Once installed, the CRUD API can be accessed via the /records endpoint of your CodeIgniter application. For example, if your CodeIgniter application is running on `http://localhost`, the CRUD API can be accessed at **`http://localhost/api/records`**.

## Endpoints
The following endpoints are available:

**`/records`** - The main CRUD API endpoint. Provides Create, Read, Update, and Delete operations for database tables.
**`/cache/clear`** - Clears the cache for the application, if applicable.
**`/geojson`** - Provides a GeoJSON data endpoint for serving geospatial data.
**`/openapi`** - Provides an OpenAPI (formerly Swagger) specification for the API.
**`/status/ping`** - Provides a simple status check endpoint for testing the availability of the API.
**`/login`** - Provides a login page for managing user authentication.
**`/logout`** - Logs the user out and redirects them to the login page.

## Configuration
The config/crud_api.php file provides options for configuring the CRUD API. Options include database credentials, cache settings, and OpenAPI information. See the comments in the file for more information.

## Documentation 

## Credits
This project is based on [PHP-CRUD-API](https://github.com/mevdschee/php-crud-api) by Marco van de Voort.

## Contributing
Contributions are welcome! If you encounter any issues or have ideas for improvements, please open an issue or submit a pull request.

## License
This project is licensed under the MIT License. See the LICENSE file for details.