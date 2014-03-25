<?php
/**
 * Created by PhpStorm.
 * User: Yen Hoang
 * Date: 3/9/14
 * Time: 6:58 PM
 */

class Input {

    public static function get($string, $default = null) {

        if (isset($_GET[$string])) {
            return $_GET[$string];
        }
        else {
            return $default;
        }
    }

} 