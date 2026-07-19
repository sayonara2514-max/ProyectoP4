<?php
namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\{User, Rol, Entidad};
use Tests\TestCase;

class EntidadTest extends TestCase {
    use RefreshDatabase;

    private function adminUser() {
        $rol = Rol::create(['nombre' => 'Administrador', 'descripcion' => 'Admin']);
        return User::factory()->create(['rol_id' => $rol->id]);
    }

    public function test_admin_puede_ver_lista_entidades(): void {
        $user = $this->adminUser();
        $this->actingAs($user)->get('/entidades')->assertStatus(200);
    }

    public function test_admin_puede_crear_entidad(): void {
        $user = $this->adminUser();
        $this->actingAs($user)->post('/entidades', [
            'nombre' => 'Ministerio Test',
            'mision' => 'Mision test',
            'estructura' => 'Estructura test',
        ])->assertRedirect('/entidades');
        $this->assertDatabaseHas('entidads', ['nombre' => 'Ministerio Test']);
    }

    public function test_entidad_requiere_nombre(): void {
        $user = $this->adminUser();
        $this->actingAs($user)->post('/entidades', [
            'mision' => 'Sin nombre',
        ])->assertSessionHasErrors('nombre');
    }

    public function test_admin_puede_eliminar_entidad(): void {
        $user = $this->adminUser();
        $entidad = Entidad::create(['nombre' => 'Entidad a Eliminar', 'mision' => 'Test', 'estructura' => 'Test']);
        $this->actingAs($user)->delete('/entidades/' . $entidad->id)->assertRedirect('/entidades');
        $this->assertDatabaseMissing('entidads', ['id' => $entidad->id]);
    }

    public function test_tecnico_no_puede_acceder_a_entidades(): void {
        $rol = Rol::create(['nombre' => 'Técnico de Planificación', 'descripcion' => 'Tecnico']);
        $user = User::factory()->create(['rol_id' => $rol->id]);
        $this->actingAs($user)->get('/entidades')->assertStatus(403);
    }
}