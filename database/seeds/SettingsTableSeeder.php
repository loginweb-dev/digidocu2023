<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create(['name'=>'system_title','value'=>'Gestion Documental']);
        \App\Setting::create(['name'=>'system_logo','value'=>'logo.png']);
        \App\Setting::create(['name'=>'system_url','value'=>'http://localhost:8000/']);


        \App\Setting::create(['name'=>'tags_label_singular','value'=>'Grupo']);
        \App\Setting::create(['name'=>'tags_label_plural','value'=>'Grupos']);

        \App\Setting::create(['name'=>'document_label_singular','value'=>'documento']);
        \App\Setting::create(['name'=>'document_label_plural','value'=>'documentos']);
        \App\Setting::create(['name'=>'document_name','value'=>'Titulo']);

        \App\Setting::create(['name'=>'file_label_singular','value'=>'archivo']);
        \App\Setting::create(['name'=>'file_label_plural','value'=>'archivos']);

        \App\Setting::create(['name'=>'default_file_validations','value'=>'mimes:jpeg,bmp,png,jpg']);
        \App\Setting::create(['name'=>'default_file_maxsize','value'=>'99']);

        \App\Setting::create(['name'=>'image_files_resize','value'=>'300,500,700']);

        \App\Setting::create(['name'=>'show_missing_files_errors','value'=>'false']);

        \App\Setting::create(['name'=>'com_interna_title','value'=>'Com. interna']);
        \App\Setting::create(['name'=>'com_interna_tag','value'=>'2']);
    
        App\Setting::create(['name'=>'WHATICKET_BASEURL','value'=>'https://api.appxi.net']);
        \App\Setting::create(['name'=>'WHATICKET_TOKEN','value'=>'4cf2980f-2d69-40e8-9d85-318d602f336c']);
        \App\Setting::create(['name'=>'WHATICKET_WHATSAPP_ID','value'=>'3']);
        
        \App\Setting::create(['name'=>'hr_title','value'=>'Hoja de ruta']);
    }
}
