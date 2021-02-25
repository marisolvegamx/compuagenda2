<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MyregisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "nameusu"=>"required|max:255",
            "emailusu"=>"required|max:100|email|unique:cms_users,email",
            'name'=>'required|max:100',
            
            'description'=>'required',
            'adress'=>'required',
            'state'=>'required|exists:ca_states,id',
            'category'=>'required|exists:ca_categorias,id',
            "subcategorias"=>"required|array"
            //
        ];
    }
    
    public function attributes()
    {
        return [
            "nameusu"=>"nombre",
            "emailusu"=>"correo electrónico",
            'name'=>'nombre o empresa',
            
            'description'=>'descripción',
            'adress'=>'dirección',
            'state'=>'estado',
            'category'=>'categoría',
            "subcategorias"=>"subcategoria"
        ];
    }
}
