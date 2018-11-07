<?php

use Illuminate\Database\Seeder;

class comentariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert(
            [
            'comentario'    => 'El producto es muy bueno bla bla blaba bla blaba bla blaba'
            'usuario'       => 'pedro'
            'calificacion'  => 5
            'producto'      => 10
            'estado'        => 1

            ],
            [
            'comentario'    => 'El producto es muy bueno bla bla blaba bla blaba bla blaba'
            'usuario'       => 'juan'
            'calificacion'  => 4
            'producto'      => 10
            'estado'        => 1

            ],
            [
            'comentario'    => 'El producto es muy bueno bla bla blaba bla blaba bla blaba'
            'usuario'       => 'pedro2'
            'calificacion'  => 3
            'producto'      => 10
            'estado'        => 1

            ],
            [
            'comentario'    => 'El producto es muy bueno bla bla blaba bla blaba bla blaba'
            'usuario'       => 'pedro6'
            'calificacion'  => 5
            'producto'      => 10
            'estado'        => 1

            ],
            [
            'comentario'    => 'El producto es muy bueno bla bla blaba bla blaba bla blaba'
            'usuario'       => 'pedro8'
            'calificacion'  => 3
            'producto'      => 10
            'estado'        => 1

            ],
                        [
            'comentario'    => 'El producto es muy bueno bla bla blaba bla blaba bla blaba'
            'usuario'       => 'pedro9'
            'calificacion'  => 4
            'producto'      => 10
            'estado'        => 1

            ],            [
            'comentario'    => 'El producto es muy bueno bla bla blaba bla blaba bla blaba'
            'usuario'       => 'resle7'
            'calificacion'  => 4
            'producto'      => 10
            'estado'        => 1

            ],            [
            'comentario'    => 'El producto es muy bueno bla bla blaba bla blaba bla blaba'
            'usuario'       => 'joaquin'
            'calificacion'  => 1
            'producto'      => 10
            'estado'        => 1

            ],
              [
            'comentario'    => 'El producto es muy bueno bla bla blaba bla blaba bla blaba'
            'usuario'       => 'carlos'
            'calificacion'  => 3
            'producto'      => 10
            'estado'        => 1

            ],
            
    );
    }
}
