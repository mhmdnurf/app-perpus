<?php

namespace App\Http\Requests;

use App\Models\Rack;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RackRequest extends FormRequest
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
    public function rules($id)
    {
        // $rack = Rack::find($id);
        // return [
        //     'nama' => 'required|unique:racks', Rule::unique('racks')->ignore($rack),
        //     'keterangan' => 'max:255'
        // ];
    }

    public function messages()
    {
        return [
            'nama.unique' => 'Nama rak telah digunakan!',
        ];
    }
}
