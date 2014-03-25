<?php
/**
 * Created by PhpStorm.
 * User: Yen Hoang
 * Date: 3/9/14
 * Time: 6:58 PM
 */
require(__DIR__."/../classes/Input.php");

class InputTest extends PHPUnit_Framework_Testcase {

    public function tearDown() {
        # clean out super global for each test
        $_GET['email'] = null;
    }

    public function test_input_works() {
        $email = 'yenh@usc.edu';

        $_GET['email'] = $email;

        $this->assertEquals(Input::get('email'), $email);

    }

    public function test_input_when_null() {
        // email should be empty

        $this->assertNull(Input::get('email'));

        $default_value = 'standard';

        $this->assertEquals(Input::get('plan', $default_value), $default_value);

    }

} 