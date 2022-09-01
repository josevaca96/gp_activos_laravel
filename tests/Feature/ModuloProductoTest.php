<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ModuloProductoTest extends TestCase
{
    /**
     * @test
     */
    public function comprobando_acceso_a_productos_list()
    {
    //Afirmar que un usuario no está autenticado:
    $this->assertGuest($guard = null);
    /**el código 302 hace referencia a una redirección temporal en este caso 
     la pagina por defecto de acción no autorizada de laravel **/
    $this->get('productos')
     ->assertStatus(302);   
    }
}
