<?php

/**
 * Created by PhpStorm.
 * User: agrisales
 * Date: 15/01/17
 * Time: 11:39 PM
 */

class UserTest extends TestCase
{

    public function test_user_get()
    {
        $response = $this->call('GET', '/user');
        $this->assertResponseOk();
        $this->seeJsonStructure([
            '*' => [
                'id', 'first_name', 'last_name', 'email'
            ]
        ], json_decode($this->response->content(), true));
    }

}