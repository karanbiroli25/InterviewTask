<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrizeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    protected $probability;

    public function __construct()
    {
        $this->probability = 100 - getProbability();
    }
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
        $prize = $this->route('prize');
        if(isset($prize->probability)){
                $this->probability = $this->probability + floatval($prize->probability);
        }
        return [
            'title' => 'required|string',
            'probability' => "required|numeric|lte:$this->probability",
        ];
    }
}
