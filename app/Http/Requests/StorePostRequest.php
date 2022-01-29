<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Category;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
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
        $names = [];
        $cat = Category::select('name')->get();
        foreach($cat as $c){
            array_push($names, $c['name']);
        }
        return [
            'title' => 'required|min:4',
            'topic' => ['required', Rule::in($names)],
            'content' => 'required|min:10'
        ];
    }
}
