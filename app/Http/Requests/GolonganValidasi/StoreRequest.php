<?php

namespace App\Http\Requests\GolonganValidasi;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            //
            'kode_golongan'=>'required',
            'kode_golongan'=>'required|unique:golongans',
            'nama_golongan'=>'required',
            'besaran_uang'=>'required', 
        ];
    }

    public function messages()
    {
        return[
            'kode_golongan.required'=>'Kode Golongan Tidak Boleh Kosong',
            'kode_golongan.unique'=>'Kode Golongan Tidak Boleh Sama',
            'nama_golongan.required'=>'Nama Golongan Tidak Boleh Kosong',
            'besaran_uang.required'=>'Besaran Uang Tidak Boleh Kosong',
        ];
    }
}
