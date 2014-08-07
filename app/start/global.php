<?php

/*
|--------------------------------------------------------------------------
| Register The Laravel Class Loader
|--------------------------------------------------------------------------
|
| In addition to using Composer, you may use the Laravel class loader to
| load your controllers and models. This is useful for keeping all of
| your classes in the "global" namespace without Composer updating.
|
*/

ClassLoader::addDirectories(array(

	app_path().'/commands',
	app_path().'/controllers',
	app_path().'/models',
    app_path().'/validators',
	app_path().'/database/seeds',

));

/*
|--------------------------------------------------------------------------
| Application Error Logger
|--------------------------------------------------------------------------
|
| Here we will configure the error logger setup for the application which
| is built on top of the wonderful Monolog library. By default we will
| build a basic log file setup which creates a single file for logs.
|
*/

Log::useFiles(storage_path().'/logs/laravel.log');

/*
|--------------------------------------------------------------------------
| Application Error Handler
|--------------------------------------------------------------------------
|
| Here you may handle any errors that occur in your application, including
| logging them or displaying custom views for specific errors. You may
| even register several error handlers to handle different types of
| exceptions. If nothing is returned, the default error view is
| shown, which includes a detailed stack trace during debug.
|
*/

App::error(function(Exception $exception, $code)
{
	Log::error($exception);
});

/*
|--------------------------------------------------------------------------
| Maintenance Mode Handler
|--------------------------------------------------------------------------
|
| The "down" Artisan command gives you the ability to put an application
| into maintenance mode. Here, you will define what is displayed back
| to the user if maintenance mode is in effect for the application.
|
*/

App::down(function()
{
	return Response::make("Be right back!", 503);
});

/*
|--------------------------------------------------------------------------
| Require The Filters File
|--------------------------------------------------------------------------
|
| Next we will load the filters file for the application. This gives us
| a nice separate location to store our route and application filter
| definitions instead of putting them all in the main routes file.
|
*/

require app_path().'/filters.php';

/*
 * Add Custom Validation Methods
 */

Validator::resolver(function($translator, $data, $rules, $messages)
{
    return new CustomValidator($translator, $data, $rules, $messages);
});

/*
 * State Macro for Form Drop Down
 */

Form::macro('states', function($name = "state", $selected = null) {

    $states = array(
        ''=>"Select",
        'AL'=>"AL",
        'AK'=>"AK",
        'AZ'=>"AZ",
        'AR'=>"AR",
        'CA'=>"CA",
        'CO'=>"CO",
        'CT'=>"CT",
        'DE'=>"DE",
        'DC'=>"DC",
        'FL'=>"FL",
        'GA'=>"GA",
        'HI'=>"HI",
        'ID'=>"ID",
        'IL'=>"IL",
        'IN'=>"IN",
        'IA'=>"IA",
        'KS'=>"KS",
        'KY'=>"KY",
        'LA'=>"LA",
        'ME'=>"ME",
        'MD'=>"MD",
        'MA'=>"MA",
        'MI'=>"MI",
        'MN'=>"MN",
        'MS'=>"MS",
        'MO'=>"MO",
        'MT'=>"MT",
        'NE'=>"NE",
        'NV'=>"NV",
        'NH'=>"NH",
        'NJ'=>"NJ",
        'NM'=>"NM",
        'NY'=>"NY",
        'NC'=>"NC",
        'ND'=>"North Dakota",
        'OH'=>"ND",
        'OK'=>"OK",
        'OR'=>"OR",
        'PA'=>"PA",
        'RI'=>"RI",
        'SC'=>"SC",
        'SD'=>"SD",
        'TN'=>"TN",
        'TX'=>"TX",
        'UT'=>"UT",
        'VT'=>"VT",
        'VA'=>"VA",
        'WA'=>"WA",
        'WV'=>"WV",
        'WI'=>"WI",
        'WY'=>"WY"
    );

    $select = '<select name="'.$name.'">';

    foreach ($states as $abbr => $state)
    {
        $select .= '<option value="'.$abbr.'"'.($selected == $abbr ? ' selected="selected"' : '').'>'.$state.'</option> ';
    }

    $select .= '</select>';

    return $select;

});
