<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolSeeder extends Seeder {
    public function run(): void {
        $roles = [
            ['nombre' => 'Administrador', 'descripcion' => 'Control total del sistema'],
            ['nombre' => 'Técnico de Planificación', 'descripcion' => 'Gestión de planes y proyectos'],
            ['nombre' => 'Revisor Institucional', 'descripcion' => 'Revisión y validación de información'],
            ['nombre' => 'Autoridad Validante', 'descripcion' => 'Aprobación de planes y metas'],
            ['nombre' => 'Auditor', 'descripcion' => 'Consulta de registros de auditoría'],
        ];
        foreach ($roles as $rol) { Rol::create($rol); }
    }
}