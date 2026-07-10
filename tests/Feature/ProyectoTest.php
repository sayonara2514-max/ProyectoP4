<?php
namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Rol;
use App\Models\Entidad;
use App\Models\Plan;
use App\Models\Programa;
use App\Models\Proyecto;
use Tests\TestCase;

class ProyectoTest extends TestCase
{
    use RefreshDatabase;

    private function adminUser()
    {
        $rol = Rol::create(['nombre' => 'Administrador', 'descripcion' => 'Admin']);
        $user = User::factory()->create(['rol_id' => $rol->id]);
        return $user;
    }

    public function test_admin_puede_ver_lista_proyectos(): void
    {
        $user = $this->adminUser();
        $response = $this->actingAs($user)->get('/proyectos');
        $response->assertStatus(200);
    }

    public function test_admin_puede_crear_proyecto(): void
    {
        $user = $this->adminUser();
        $entidad = Entidad::create(['nombre' => 'SNP', 'mision' => 'Planificar', 'estructura' => 'Publica']);
        $plan = Plan::create(['nombre' => 'Plan Test', 'periodo_inicio' => '2026-01-01', 'periodo_fin' => '2026-12-31', 'estado' => 'activo', 'entidad_id' => $entidad->id]);
        $programa = Programa::create(['nombre' => 'Programa Test', 'plan_id' => $plan->id]);

        $response = $this->actingAs($user)->post('/proyectos', [
            'nombre' => 'Proyecto Test',
            'presupuesto' => 5000,
            'fecha_inicio' => '2026-01-01',
            'fecha_fin' => '2026-12-31',
            'estado' => 'formulacion',
            'programa_id' => $programa->id,
        ]);
        $response->assertRedirect('/proyectos');
        $this->assertDatabaseHas('proyectos', ['nombre' => 'Proyecto Test']);
    }

    public function test_proyecto_requiere_nombre(): void
    {
        $user = $this->adminUser();
        $response = $this->actingAs($user)->post('/proyectos', [
            'nombre' => '',
            'presupuesto' => 5000,
            'fecha_inicio' => '2026-01-01',
            'fecha_fin' => '2026-12-31',
            'estado' => 'formulacion',
            'programa_id' => 1,
        ]);
        $response->assertSessionHasErrors('nombre');
    }
}