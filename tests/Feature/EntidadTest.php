<?php
namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Rol;
use App\Models\Entidad;
use Tests\TestCase;

class EntidadTest extends TestCase
{
    use RefreshDatabase;

    private function adminUser()
    {
        $rol = Rol::create(['nombre' => 'Administrador', 'descripcion' => 'Admin']);
        $user = User::factory()->create(['rol_id' => $rol->id]);
        return $user;
    }

    public function test_admin_puede_ver_lista_entidades(): void
    {
        $user = $this->adminUser();
        $response = $this->actingAs($user)->get('/entidades');
        $response->assertStatus(200);
    }

    public function test_admin_puede_crear_entidad(): void
    {
        $user = $this->adminUser();
        $response = $this->actingAs($user)->post('/entidades', [
            'nombre' => 'SNP Ecuador',
            'mision' => 'Planificación pública',
            'estructura' => 'Entidad pública',
        ]);
        $response->assertRedirect('/entidades');
        $this->assertDatabaseHas('entidads', ['nombre' => 'SNP Ecuador']);
    }

    public function test_entidad_requiere_nombre(): void
    {
        $user = $this->adminUser();
        $response = $this->actingAs($user)->post('/entidades', [
            'nombre' => '',
        ]);
        $response->assertSessionHasErrors('nombre');
    }

    public function test_admin_puede_eliminar_entidad(): void
    {
        $user = $this->adminUser();
        $entidad = Entidad::create(['nombre' => 'Test', 'mision' => 'Test', 'estructura' => 'Test']);
        $response = $this->actingAs($user)->delete('/entidades/' . $entidad->id);
        $response->assertRedirect('/entidades');
        $this->assertDatabaseMissing('entidads', ['id' => $entidad->id]);
    }
}