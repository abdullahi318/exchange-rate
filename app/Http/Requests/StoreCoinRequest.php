<?php

namespace App\Http\Requests;

use App\Models\Coin;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCoinRequest extends FormRequest
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
            'name' => 'required|max:150',
            'code' => ['required', 'max:3', 'unique:'.Coin::class,],
            'buy_rate' => 'required|numeric|min:0',
            'sell_rate' => 'required|numeric|min:0',
        ];
    }
}
