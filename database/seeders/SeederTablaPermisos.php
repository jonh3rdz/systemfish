<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//agregamos el modelo de permisos de spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //Operaciones sobre tabla usuarios
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',

            //Operaciones sobre tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            //Operaciones sobre tabla blogs
            'ver-blog',
            'crear-blog',
            'editar-blog',
            'borrar-blog',

            //Operaciones sobre tabla climas
            'ver-clima',
            'crear-clima',
            'editar-clima',
            'borrar-clima',

            //Operaciones sobre tabla control_de_insumos
            'ver-control_de_insumo',
            'crear-control_de_insumo',
            'editar-control_de_insumo',
            'borrar-control_de_insumo',

            //Operaciones sobre tabla control_de_tanques
            'ver-control_de_tanque',
            'crear-control_de_tanque',
            'editar-control_de_tanque',
            'borrar-control_de_tanque',

            //Operaciones sobre tabla distribuidoras
            'ver-distribuidora',
            'crear-distribuidora',
            'editar-distribuidora',
            'borrar-distribuidora',

            //Operaciones sobre tabla medicion_de_parametros
            'ver-medicion_de_parametro',
            'crear-medicion_de_parametro',
            'editar-medicion_de_parametro',
            'borrar-medicion_de_parametro',

            //Operaciones sobre tabla siembra_de_peces
            'ver-siembra_de_pece',
            'crear-siembra_de_pece',
            'editar-siembra_de_pece',
            'borrar-siembra_de_pece',
        ];

        foreach($permisos as $permiso) {
            Permission::create(['name'=>$permiso]);
        }
    }
}
