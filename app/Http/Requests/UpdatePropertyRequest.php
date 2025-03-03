<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdatePropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => "required|string|max:255",
            "type_id" => "required|exists:types,id",
            "bedrooms" => "required|numeric",
            "bathrooms" => "required|numeric",
            "city_id" => "required|exists:cities,id",
            "address" => "required|string|max:255",
            "description" => "required|string",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
            "price" => "required|numeric",
            "available_from" => "required|date",
            "available_to" => "required|date|after_or_equal:available_from",
        ];
    }
}
