<?php declare(strict_types=1);

namespace App\Core\Infra\Http\Controller\Api\User;

use Illuminate\Foundation\Http\FormRequest;

class UserApiFormRequestValidator extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ];
    }
}
