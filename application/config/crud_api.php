<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Driver
|--------------------------------------------------------------------------
|
| The name of the database driver.
|
| Supported options: mysql, pgsql, sqlsrv, sqlite.
|
 */
$config['driver'] = 'mysql';

/*
|--------------------------------------------------------------------------
| Address
|--------------------------------------------------------------------------
|
| The hostname (or filename) of the database server.
|
 */
$config['address'] = 'localhost';

/*
|--------------------------------------------------------------------------
| Port
|--------------------------------------------------------------------------
|
| The TCP port of the database server (defaults to driver default).
|
 */
$config['port'] = 0;

/*
|--------------------------------------------------------------------------
| Username
|--------------------------------------------------------------------------
|
| The username of the user connecting to the database.
|
 */
$config['username'] = '';

/*
|--------------------------------------------------------------------------
| Password
|--------------------------------------------------------------------------
|
| The password of the user connecting to the database.
|
 */
$config['password'] = '';

/*
|--------------------------------------------------------------------------
| Database
|--------------------------------------------------------------------------
|
| The database the connecting is made to.
|
 */
$config['database'] = '';

/*
|--------------------------------------------------------------------------
| Command
|--------------------------------------------------------------------------
|
| Extra SQL to initialize the database connection.
|
 */
$config['command'] = '';

/*
|--------------------------------------------------------------------------
| Tables
|--------------------------------------------------------------------------
|
| A comma separated list of tables to publish.
|
| Default: 'all'
|
 */
$config['tables'] = 'all';

/*
|--------------------------------------------------------------------------
| Mapping
|--------------------------------------------------------------------------
|
| A comma separated list of table/column mappings.
|
 */
$config['mapping'] = '';

/*
|--------------------------------------------------------------------------
| Geometry SRID
|--------------------------------------------------------------------------
|
| The SRID assumed when converting from WKT to geometry.
|
| Default: 4326
|
 */
$config['geometrySrid'] = 4326;

/*
|--------------------------------------------------------------------------
| Middlewares
|--------------------------------------------------------------------------
|
| A list of middlewares to load.
|
| Supported options: cors.
|
 */
$config['middlewares'] = 'cors';

/*
|--------------------------------------------------------------------------
| Controllers
|--------------------------------------------------------------------------
|
| A comma list of controllers to load.
|
| Supported options: records, geojson, openapi, status.
|
 */
$config['controllers'] = 'records, geojson, openapi, status';

/*
|--------------------------------------------------------------------------
| Custom Controllers
|--------------------------------------------------------------------------
|
| A list of user custom controllers to load.
|
| Default: ''
|
 */
$config['customControllers'] = '';

/*
|--------------------------------------------------------------------------
| OpenAPI Base
|--------------------------------------------------------------------------
|
| OpenAPI info.
|
| Default: {"info":{"title":"PHP-CRUD-API","version":"1.0.0"}}
|
 */
$config['openApiBase'] = '{"info":{"title":"PHP-CRUD-API","version":"1.0.0"}}';

/*
|--------------------------------------------------------------------------
| Cache Type
|--------------------------------------------------------------------------
|
| The type of cache to use.
|
| Supported options: TempFile, Redis, Memcache, Memcached, NoCache.
|
| Default: TempFile
|
 */
$config['cacheType'] = 'TempFile';

/*
|--------------------------------------------------------------------------
| Cache Path
|--------------------------------------------------------------------------
|
| The path/address of the cache.
|
| Default: The system's temp directory.
|
 */
$config['cachePath'] = '';

/*
|--------------------------------------------------------------------------
| Cache Time
|--------------------------------------------------------------------------
|
| The number of seconds the cache is valid.
|
| Default: 10
|
 */
$config['cacheTime'] = 10;

/*
|--------------------------------------------------------------------------
| JSON Options
|--------------------------------------------------------------------------
|
| Options used for encoding JSON.
|
| Default: JSON_UNESCAPED_UNICODE
|
 */
$config['jsonOptions'] = JSON_UNESCAPED_UNICODE;

/*
|--------------------------------------------------------------------------
| Debug
|--------------------------------------------------------------------------
|
| Show errors in the "X-Exception" headers.
|
| Default: FALSE
|
 */
$config['debug'] = FALSE;

/*
|--------------------------------------------------------------------------
| Base Path
|--------------------------------------------------------------------------
|
| The URI base path of the API (determined using PATH_INFO by default).
|
 */
$config['basePath'] = '';
