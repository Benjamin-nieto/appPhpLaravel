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

           $category->fld_nombre = "MANU";
           $category->fld_descripcion = "Manualidades";
   
           $category->save();
   
   
           $category = new Categoria();
   
           $category->fld_nombre = "DEPO";
           $category->fld_descripcion = "Deportes";
   
           $category->save();
   
           $category = new Categoria();
   
           $category->fld_nombre = "VDSN";
           $category->fld_descripcion = "Vida Sana";
   
           $category->save();
   
   
           $category = new Categoria();
   
           $category->fld_nombre = "BALM";
           $category->fld_descripcion = "Buena alimentacion";
   
           $category->save();
   
           $category = new Categoria();
   
           $category->fld_nombre = "SALU";
           $category->fld_descripcion = "Salud y Medicina";
   
           $category->save();
   
           $category = new Categoria();
   
           $category->fld_nombre = "ENTR";
           $category->fld_descripcion = "Entretenimiento";
   
           $category->save();
   
           $category = new Categoria();
   
           $category->fld_nombre = "FODI";
           $category->fld_descripcion = "Comida & Bebida";
   
           $category->save();
   
           
           $category = new Categoria();
   
           $category->fld_nombre = "AYDA";
           $category->fld_descripcion = "Ayudas";
   
           $category->save();
   
   
           $category = new Categoria();
   
           $category->fld_nombre = "OTHR";
           $category->fld_descripcion = "Otros";
   
           $category->save();
   
           $category = new Categoria();
   
           $category->fld_nombre = "ELMT";
           $category->fld_descripcion = "Elementos";
   
           $category->save();
   
      
    }
}
