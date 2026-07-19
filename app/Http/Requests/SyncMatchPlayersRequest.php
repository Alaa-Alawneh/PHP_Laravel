<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Enums\UserRole;
use Illuminate\Validation\Rule;
class SyncMatchPlayersRequest extends FormRequest
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
                'player_ids'   => ['nullable', 'array'],
                'player_ids.*' => [
                    'integer',
                    Rule::exists('users', 'id')->where('role', UserRole::Player->value),
                    //the second rule to prevent altering the request manually and putting a trainer id
                ],
            ];
    }
}
