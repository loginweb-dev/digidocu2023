<?php

use Illuminate\Database\Seeder;

class FileTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\FileType::create([
            'name' => 'Imgenes',
            'no_of_files' => 2,
            'labels' => 'image1,image2',
            'file_validations' => 'mimes:jpeg,bmp,png,jpg',
            'file_maxsize' => 9
        ]);

        // \App\Tag::create([
        //     'name' => 'Sin tag',
        //     'color' => '#00000',
        //     'created_by' => 1
        // ]);
        // \App\Tag::create([
        //     'name' => 'Nota Interna',
        //     'color' => '#fffff',
        //     'created_by' => 1
        // ]);
        // \App\Tag::create([
        //     'name' => 'Informatica',
        //     'color' => '#008080',
        //     'created_by' => 1
        // ]);

        // hoja de ruta-----------------------
        \App\Hojaderuta::create([
            'name' => 'Sin hoja de ruta',
            'text' => 'null',
            'start' => 1
        ]);
        \App\Hojaderuta::create([
            'name' => 'Comunicacion Interna',
            'text' => '##-22/COM. COM.INTER',
            'start' => 1
        ]);
        \App\Hojaderuta::create([
            'name' => 'INSTITU',
            'text' => '##/22-23/INSTITUC',
            'start' => 1
        ]);
        \App\Hojaderuta::create([
            'name' => 'Informe de Comiciones',
            'text' => '##-INFOR.COM',
            'start' => 1
        ]);
        \App\Hojaderuta::create([
            'name' => 'Derecho propietario',
            'text' => '##-22/COM. DERECH.PRO',
            'start' => 1
        ]);

        

    }
}
