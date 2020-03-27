<?php

use Illuminate\Database\Seeder;
use App\estudiante;
use App\docente;
use App\materia;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        estudiante::truncate();
        docente::truncate();
        materia::truncate();
        factory(estudiante::class,10)->create();//200
        factory(docente::class,2)->create();//20
        factory(materia::class,10)->create()->each(//30
            function ($materia){
                $estudiantes = estudiante::all()->random(mt_rand(5,9))->pluck('id');//5,20
                $materia->rela_estudiante()->attach($estudiantes);
            }
        );

    }
}
