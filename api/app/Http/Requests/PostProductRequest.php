<?php

namespace BCS\Http\Requests;

use BCS\Entities\CategoryAttribute;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostProductRequest extends FormRequest
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
            'model' => 'required|max:255',
            'imgUrl' => 'required|max:255',
            'desc' => 'required|max:255',
            'price' => 'required|integer',
            'status' => [
                'required',
                Rule::in(\BCS\Entities\Product::$availableStatus),
            ],
            'quantity' => 'required|integer',
            'category_id' => 'required|integer'
        ];
    }
}
