<?php declare(strict_types=1);

namespace App\Core\Infra\Http\Controller\Api\Flight;

use Illuminate\Foundation\Http\FormRequest;

class FlightApiFormRequestValidator extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [];
    }
}
