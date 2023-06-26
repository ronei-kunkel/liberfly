<?php declare(strict_types=1);

namespace App\Core\Infra\Http\Controller\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AuthApiFormRequestValidator extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ];
    }
}
