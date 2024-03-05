<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatemenuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
   public function rules(): array
    {
      return [
            'nama_menu' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'jenis_id' => 'required'
            
        ];
    }

    public function messages()
    {
        return [
            'nama_menu.required' => 'Data nama menu belum di isi!'
        ];
    }
}
