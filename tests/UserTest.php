<?php

/**
 * Created by PhpStorm.
 * User: agrisales
 * Date: 15/01/17
 * Time: 11:39 PM
 */

class UserTest extends TestCase
{

    /**
     * Se prueba que pueda acceder a todos los usuarios y la estructura por defecto que debe devolver el json
     */
    public function test_user_all()
    {
        $this->call('GET', '/user');
        $this->assertResponseOk();
        $this->seeJsonStructure([
            '*' => [
                'id', 'first_name', 'last_name', 'email'
            ]
        ], json_decode($this->response->content(), true));
    }

    /**
     * Se prueba que pueda acceder a un usuario en especifico y la estructura por defecto que debe devolver el json
     */
    public function test_user_find_found()
    {
        $response = $this->call('GET', '/user/1');
        $this->assertResponseOk();
        $this->seeJsonStructure([
            'id', 'first_name', 'last_name', 'email'
        ], json_decode($this->response->content(), true));
    }

    /**
     * la prueba consiste en buscar un usuario que no existe y el codigo validar el codigo devuelto
     */
    public function test_user_find_no_found()
    {
        $this->call('GET', '/user/10');
        $this->assertResponseStatus(404);
    }

    /**
     * Se crea una para insertar registros en la bd
     */
    public function test_user_created()
    {
        $this->json('POST', '/user', [
            'first_name' => 'test',
            'last_name' => 'test',
            'email' => 'test@test.com'
        ]);
        $this->assertResponseStatus(201);
    }

    /**
     * Prueba para actualizar datos
     */
    public function test_user_update(){
        $this->json('PUT', 'user/1', [
            'first_name' => 'Demo Edit',
        ]);
        $this->assertResponseStatus(200);
    }

    /**
     * Prueba para actualizar un usuario no encontrado
     */
    public function test_user_update_not_found()
    {
        $this->call('PUT', '/user/10');
        $this->assertResponseStatus(404);
    }

    /**
     * Prueba para eliminar un usuario
     */
    public function test_user_remove()
    {
        $this->call('DELETE', '/user/1');
        $this->assertResponseStatus(204);
    }

    /**
     * Prueba para eliminar un usuario no encontrado
     */
    public function test_user_remove_not_found()
    {
        $this->call('DELETE', '/user/10');
        $this->assertResponseStatus(404);
    }

    /**
     * Prueba para restaurar un usuario
     */
    public function test_user_restore()
    {
        $this->call('POST', '/user/1/restore');
        $this->assertResponseStatus(200);
    }

    /**
     * Prueba para restaurar un usuario no encontrado
     */
    public function test_user_restore_not_found()
    {
        $this->call('POST', '/user/10/restore');
        $this->assertResponseStatus(404);
    }

}