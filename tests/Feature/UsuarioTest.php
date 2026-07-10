<?php
namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Rol;
use Tests\TestCase;

class UsuarioTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_con_credenciales_correctas(): void
    {
        $user = User::factory()->create([
            'email' => 'test@test.com',
            'password' => bcrypt('password123'),
        ]);
        $response = $this->post('/login', [
            'email' => 'test@test.com',
            'password' => 'password123',
        ]);
        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    public function test_login_con_credenciales_incorrectas(): void
    {
        $response = $this->post('/login', [
            'email' => 'noexiste@test.com',
            'password' => 'wrongpassword',
        ]);
        $response->assertSessionHasErrors('email');
    }

    public function test_usuario_sin_rol_no_accede_a_entidades(): void
    {
        $user = User::factory()->create(['rol_id' => null]);
        $response = $this->actingAs($user)->get('/entidades');
        $response->assertStatus(403);
    }
}