<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Enums\ItemStatus;
use Illuminate\Validation\Rules\Enum;

class UpdateItemRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string', 'max:50'],
            'category' => ['sometimes', 'string', 'max:50'],
            'location' => ['nullable', 'string', 'max:100'],
            'status' => ['sometimes', new Enum(ItemStatus::class)],
            'note' => ['nullable', 'string'],
        ];
    }
}
