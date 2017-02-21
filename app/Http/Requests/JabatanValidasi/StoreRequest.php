<?php

namespace App\Http\Requests\JabatanValidasi;

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
            'kode_jabatan'=>'required',
            'kode_jabatan'=>'required|unique:jabatans',
            'nama_jabatan'=>'required',
            'besaran_uang'=>'required',
        ];
    }

    public function messages()
    {
        return[
            'kode_jabatan.required'=>'Kode Jabatan Tidak Boleh Kosong',
            'kode_jabatan.unique'=>'Kode Jabatan Tidak Boleh Sama',
            'nama_jabatan.required'=>'Nama Jabatan Tidak Boleh Kosong',
            'besaran_uang.required'=>'Besaran Uang Tidak Boleh Kosong',
        ];
    }
}
