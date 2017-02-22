<?php

namespace App\Http\Requests\PegawaiValidasi;

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
            'nip'=>'required',
            'jabatan_id'=>'required',
            'golongan_id'=>'required'
            'photo'=>'required',
        ];
    }
    public function messages()
    {
        return[
        'nip.required'=>'NIP Tidak Boleh Kosong',
        'jabatan_id.required'=>'Jabatan Tidak Boleh Kosong',
        'golongan_id.required'=>'Golongan Tidak Boleh Kosong',
        'photo'=>'Foto Harus Dipilih',
        ];
    }
}
