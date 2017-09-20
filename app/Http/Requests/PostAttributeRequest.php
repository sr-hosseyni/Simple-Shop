<?php

namespace BCS\Http\Requests;

use BCS\Entities\CategoryAttribute;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostAttributeRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        /*
         * We have not Acl yet
         */
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
            'title' => 'required|max:255',
            'type' => [
                'required',
                Rule::in(CategoryAttribute::$availableTypes),
            ],
        ];
    }

    protected function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance();

        $rules = [
            'required',
            'regex:/(^[^,]+,)*[^,]+$/u'
        ];
        $validator->sometimes('optionsStr', $rules, function($input) {
            return $input->type === 'opt';
        });

        return $validator;
    }

    /**
     * @todo needs to setting proper error messages
     */
}
