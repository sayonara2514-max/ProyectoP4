<?php
namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\{User, Rol, Entidad, Plan};
use Tests\TestCase;

class PlanTest extends TestCase {
    use RefreshDatabase;

    private function adminUser() {
        $rol = Rol::create(['nombre' => 'Administrador', 'descripcion' => 'Admin']);
        return User::factory()->create(['rol_id' => $rol->id]);
    }

    public function test_admin_puede_ver_lista_planes(): void {
        $user = $this->adminUser();
        $this->actingAs($user)->get('/planes')->assertStatus(200);
    }

    public function test_tecnico_puede_crear_plan(): void {
        $rolTecnico = Rol::create(['nombre' => 'Técnico de Planificación', 'descripcion' => 'Tecnico']);
        $user = User::factory()->create(['rol_id' => $rolTecnico->id]);
        $entidad = Entidad::create(['nombre' => 'SNP', 'mision' => 'Test', 'estructura' => 'Test']);
        $this->actingAs($user)->post('/planes', [
            'codigo' => 'PL-001',
            'nombre' => 'Plan Test',
            'periodo_inicio' => '2026-01-01',
            'periodo_fin' => '2026-12-31',
            'entidad_id' => $entidad->id,
        ])->assertRedirect('/planes');
        $this->assertDatabaseHas('planes', ['nombre' => 'Plan Test', 'estado' => 'formulado']);
    }

    public function test_plan_se_crea_en_estado_formulado(): void {
        $user = $this->adminUser();
        $entidad = Entidad::create(['nombre' => 'SNP', 'mision' => 'Test', 'estructura' => 'Test']);
        $this->actingAs($user)->post('/planes', [
            'codigo' => 'PL-002',
            'nombre' => 'Plan Estado Test',
            'periodo_inicio' => '2026-01-01',
            'periodo_fin' => '2026-12-31',
            'entidad_id' => $entidad->id,
        ]);
        $plan = Plan::where('nombre', 'Plan Estado Test')->first();
        $this->assertEquals('formulado', $plan->estado);
    }

    public function test_plan_requiere_nombre(): void {
        $user = $this->adminUser();
        $this->actingAs($user)->post('/planes', [
            'codigo' => 'PL-003',
            'periodo_inicio' => '2026-01-01',
            'periodo_fin' => '2026-12-31',
        ])->assertSessionHasErrors('nombre');
    }

     public function test_revisor_no_puede_eliminar_plan(): void {
    $rol = Rol::create(['nombre' => 'Revisor Institucional', 'descripcion' => 'Revisor']);
    $user = User::factory()->create(['rol_id' => $rol->id]);
    $rolAdmin = Rol::create(['nombre' => 'Administrador', 'descripcion' => 'Admin']);
    $entidad = Entidad::create(['nombre' => 'SNP', 'mision' => 'Test', 'estructura' => 'Test']);
    $plan = Plan::create(['codigo' => 'PL-005', 'nombre' => 'Plan Revisor', 'periodo_inicio' => '2026-01-01', 'periodo_fin' => '2026-12-31', 'estado' => 'formulado', 'entidad_id' => $entidad->id]);
    $this->actingAs($user)->delete('/planes/' . $plan->id);
    $this->assertDatabaseHas('planes', ['id' => $plan->id]);
    }
}