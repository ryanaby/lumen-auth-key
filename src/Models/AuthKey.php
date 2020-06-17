<?php

namespace Ryanaby\LumenAuthKey\Models;

use Illuminate\Database\Eloquent\Model;

class AuthKey extends Model
{
    /**
     * Get auth key from .env file
     *
     * @return array
     */
    public static function getAuthKey()
    {
        $key = env('AUTH_KEY') ?? '';

        return explode('|', $key);
    }

    /**
     * Check api key is valid
     *
     * @param string $key
     * @return bool
     */
    public static function keyIsValid($key)
    {
        return in_array($key, self::getAuthKey());
    }
}
