<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'=>'required',
            'pages'=>'required|numeric'
        ];
    }

    public function messages()
    {
        return [
             return [
            'title.required' => 'Coloque o título vacilão!',
            'pages.numeric|required'  => 'Apenas números! Sem gracinha, em!',
            'price.numeric|required'  => 'só números',
            'id_user.required'=>    'escolha algo',
       
        ];
    }
}
