<?php

namespace App\Providers;

use App\Subcategory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       //ligas de categorias
        //despues se cambiará por las más buscadas
        $subcategorias=   Subcategory::limit(3)->get();
      
        $arreglocat=array();
       // $arreglocat[0]=array_slice((array)$subcategorias,1,4);
       // $arreglocat[1]=array_slice((array)$subcategorias,4,7);
        $arreglocat[0]=$subcategorias;
        $subcategorias=   Subcategory::limit(3)->offset(4)->get();
        $arreglocat[1]=$subcategorias;
       // var_dump($arreglocat);
       // dd($arreglocat);
//         view()->composer("*",function($view){
//             $view->with("arreglocat",$arreglocat);
//         });
            View::share(["arreglocat"=>$arreglocat,"hola"=>"hola"]);
    }
}
