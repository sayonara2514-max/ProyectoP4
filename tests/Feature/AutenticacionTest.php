<?php
namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\{User, Rol};
use Tests\TestCase;

class AutenticacionTest extends TestCase {
    use RefreshDatabase;

    public function test_login_correcto_redirige_al_dashboard(): void {
        $user = User::factory()->create([
            'email' => 'test@snp.gob.ec',
            'password' => bcrypt('password123'),
        ]);
        $this->post('/login', [
            'email' => 'test@snp.gob.ec',
            'password' => 'password123',
        ])->assertRedirect('/dashboard');
    }

    public function test_login_incorrecto_retorna_error(): void {
        $this->post('/login', [
            'email' => 'noexiste@snp.gob.ec',
            'password' => 'wrongpassword',
        ])->assertSessionHasErrors('email');
    }

    public function test_usuario_sin_autenticar_no_accede_al_dashboard(): void {
        $this->get('/dashboard')->assertRedirect('/login');
    }

    public function test_usuario_sin_rol_no_accede_a_planes(): void {
        $user = User::factory()->create(['rol_id' => null]);
        $this->actingAs($user)->get('/planes')->assertStatus(403);
    }

    public function test_auditor_solo_accede_a_auditoria(): void {
        $rol = Rol::create(['nombre' => 'Auditor', 'descripcion' => 'Auditor']);
        $user = User::factory()->create(['rol_id' => $rol->id]);
        $this->actingAs($user)->get('/auditorias')->assertStatus(200);
        $this->actingAs($user)->get('/planes')->assertStatus(403);
    }
}