<?php

namespace App\Domains\Test\Http\Requests\Backend\Test;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreTestRequest.
 */
class StoreTestRequest extends FormRequest
{
    /**
     * Determine if the test is authorized to make this request.
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
        return [
            'test'=>'nullable',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}