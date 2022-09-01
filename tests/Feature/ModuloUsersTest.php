<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;
class ModuloUsersTest extends TestCase
{
    /** @test */
    public function aceeso_user()
    {
        $this->assertDatabaseHas('users', [
            'name' => 'JOSE ANDRES',
            'email' => 'jose.vaca@enterprice.com'
        ]);
    }
    
}
