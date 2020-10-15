<?php

namespace Devfaysal\SelectOption\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'select' => 'required',
            'value' => 'required',
            'display' => 'required'
        ];

        return $rules;
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
<<<<<<< HEAD
        $this->merge([
            'display' => $this->value ?? null,
        ]);
=======
        if (! $this->display) {
            $this->display = $this->value ?? null;
        }
>>>>>>> d0b6783fb9458d401bfe1a5396dd046c88d6c3a0
    }
}
