<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends FormRequest
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
            'name' => 'required|max:250',
            'email' => 'required|max:250|email',
            'type' => 'required',
            'cpf' => 'required',
            'cep' => 'required|max:10',
            'state' => 'required|max:100',
            'city' => 'required|max:100',
            'neighborhood' => 'required|max:100',
            'address' => 'required|max:100',
            'number' => 'required|integer',
            'complement' => 'nullable|max:250',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.max' => 'O máximo de caracteres para o campo nome é :max',
            'email.required' => 'O campo email é obrigatório',
            'email.max' => 'O máximo de caracteres para o campo email é :max',
            'email.email' => 'O email informado é inválido',
            'type.required' => 'O campo tipo é obrigatório',
            'cpf.required' => 'O campo CPF é obrigatório',
            'cpf.cpf' => 'O CPF informado é inválido',
            'cep.required' => 'O campo CEP é obrigatório',
            'cep.max' => 'O máximo de caracteres para o campo CEP é :max',
            'state.required' => 'O campo estado é obrigatório',
            'state.max' => 'O máximo de caracteres para o campo estado é :max',
            'city.required' => 'O campo cidade é obrigatório',
            'city.max' => 'O máximo de caracteres para o campo cidade é :max',
            'neighborhood.required' => 'O campo bairro é obrigatório',
            'neighborhood.max' => 'O máximo de caracteres para o campo bairro é :max',
            'address.required' => 'O campo endereço é obrigatório',
            'address.max' => 'O máximo de caracteres para o endereço é :max',
            'number.required' => 'O campo número é obrigatório',
            'number.integer' => 'O campo número deve ser um número',
            'complement.max' => 'O máximo de caracteres para o complemento é :max',
        ];
    }
}
