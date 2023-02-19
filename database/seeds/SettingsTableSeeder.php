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

        \App\Setting::create(['name'=>'tags_label_singular','value'=>'Copia']);
        \App\Setting::create(['name'=>'tags_label_plural','value'=>'Copias']);

        \App\Setting::create(['name'=>'document_label_singular','value'=>'documento']);
        \App\Setting::create(['name'=>'document_label_plural','value'=>'documentos']);
        \App\Setting::create(['name'=>'document_name','value'=>'Titulo']);

        \App\Setting::create(['name'=>'file_label_singular','value'=>'archivo']);
        \App\Setting::create(['name'=>'file_label_plural','value'=>'archivos']);

        \App\Setting::create(['name'=>'default_file_validations','value'=>'mimes:jpeg,bmp,png,jpg']);
        \App\Setting::create(['name'=>'default_file_maxsize','value'=>'99']);

        \App\Setting::create(['name'=>'image_files_resize','value'=>'300,500,700']);

        \App\Setting::create(['name'=>'show_missing_files_errors','value'=>'false']);

        \App\Setting::create(['name'=>'com_interna_tag','value'=>'2']);
        
    }
}
