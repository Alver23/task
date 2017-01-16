<?php
/**
 * Created by PhpStorm.
 * User: agrisales
 * Date: 14/01/17
 * Time: 10:28 PM
 */

if (! function_exists('bcrypt')) {
    /**
     * Hash the given value.
     *
     * @param  string  $value
     * @param  array   $options
     * @return string
     */
    function bcrypt($value, $options = [])
    {
        return app('hash')->make($value, $options);
    }
}