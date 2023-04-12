<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

           // \App\Models\User::factory(10)->create();
           $category = new Categoria();

           $category->fld_nombre = "INSUNAT";
           $category->fld_descripcion = "Insumos de natacion";
   
           $category->save();
   
   
           $category = new Categoria();
   
           $category->fld_nombre = "INSUCAMP";
           $category->fld_descripcion = "Insumos de camping";
   
           $category->save();
   
           $category = new Categoria();
   
           $category->fld_nombre = "INSUPLAYA";
           $category->fld_descripcion = "Insumos de playa";
   
           $category->save();
   
   
           $category = new Categoria();
   
           $category->fld_nombre = "INSUMONT";
           $category->fld_descripcion = "Insumos de caminata por montaña";
   
           $category->save();
   
           $category = new Categoria();
   
           $category->fld_nombre = "INSUDEP1F";
           $category->fld_descripcion = "Insumos de deporte #1 Futbol";
   
           $category->save();
   
           $category = new Categoria();
   
           $category->fld_nombre = "INSUDEP2B";
           $category->fld_descripcion = "Insumos de deporte #2 Basket";
   
           $category->save();
   
           $category = new Categoria();
   
           $category->fld_nombre = "SOUND1";
           $category->fld_descripcion = "Componente de sonido (pequeño)";
   
           $category->save();
   
           
           $category = new Categoria();
   
           $category->fld_nombre = "SOUND2";
           $category->fld_descripcion = "Componente de sonido (mediano)";
   
           $category->save();
   
   
           $category = new Categoria();
   
           $category->fld_nombre = "SOUND3";
           $category->fld_descripcion = "Componente de sonido (grande)";
   
           $category->save();
   
   
           $category = new Categoria();
   
           $category->fld_nombre = "INSUPRESO";
           $category->fld_descripcion = "Insumos de cuidado personal";
   
           $category->save();
   
   
           $category = new Categoria();
   
           $category->fld_nombre = "INSUPET";
           $category->fld_descripcion = "Insumos de cuidado animal";
   
           $category->save();
    }
}
