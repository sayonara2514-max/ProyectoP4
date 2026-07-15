<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Rol;

class DatabaseSeeder extends Seeder {
    public function run(): void {
        $this->call([
            RolSeeder::class,
            OdsSeeder::class,
            PdnSeeder::class,
        ]);

        $roles = Rol::all()->keyBy('nombre');

        // Administrador
        User::create([
            'name' => 'Administrador SNP',
            'email' => 'admin@snp.gob.ec',
            'password' => bcrypt('Admin1234'),
            'rol_id' => $roles['Administrador']->id,
        ]);

        // Tecnico de Planificacion
        User::create([
            'name' => 'Tecnico Planificacion',
            'email' => 'tecnico@snp.gob.ec',
            'password' => bcrypt('Tecnico1234'),
            'rol_id' => $roles['Técnico de Planificación']->id,
        ]);

        // Revisor Institucional
        User::create([
            'name' => 'Revisor Institucional',
            'email' => 'revisor@snp.gob.ec',
            'password' => bcrypt('Revisor1234'),
            'rol_id' => $roles['Revisor Institucional']->id,
        ]);

        // Autoridad Validante
        User::create([
            'name' => 'Autoridad Validante',
            'email' => 'autoridad@snp.gob.ec',
            'password' => bcrypt('Autoridad1234'),
            'rol_id' => $roles['Autoridad Validante']->id,
        ]);

        // Auditor
        User::create([
            'name' => 'Auditor SNP',
            'email' => 'auditor@snp.gob.ec',
            'password' => bcrypt('Auditor1234'),
            'rol_id' => $roles['Auditor']->id,
        ]);
    }
}