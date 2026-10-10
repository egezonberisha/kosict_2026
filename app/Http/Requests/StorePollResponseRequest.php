<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePollResponseRequest extends FormRequest
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
            'backup_choice' => ['required', 'integer', 'between:1,4'],
            'deploy_choice' => ['required', 'integer', 'between:1,4'],
            'slack_choice' => ['required', 'integer', 'between:1,4'],
        ];
    }
}
