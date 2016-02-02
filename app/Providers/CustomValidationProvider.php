<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class CustomValidationProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        
        Validator::extendImplicit('xor', function($attribute, $value, $parameters)
        {
            if( $value XOR app('Illuminate\Http\Request')->get($parameters[0]))
                return true;
            return false;
        });

        Validator::replacer('xor', function($message, $attribute, $rule, $parameters)
        {
            // add indefinite articles
            $IAattribute = (stristr('aeiou', $attribute[0]) ? 'an ' : 'a ') . $attribute;
            $parameters[0] = (stristr('aeiou', $parameters[0][0]) ? 'an ' : 'a ') . $parameters[0];

            if(app('Illuminate\Http\Request')->get($attribute))
                return 'You cannot choose both '.$IAattribute.' and '.$parameters[0].'.';
            return $IAattribute.' or '.$parameters[0].' is required.';
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
