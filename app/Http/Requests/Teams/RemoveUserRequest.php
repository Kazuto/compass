<?php

declare(strict_types=1);

namespace App\Http\Requests\Teams;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RemoveUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer', Rule::in(User::pluck('id')->toArray())],
        ];
    }
}
