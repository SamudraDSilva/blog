<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostsRequest extends FormRequest
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
        return [
            'title'=>'required|unique:posts',
            'image'=>'required|image',
            'content'=> 'required',
            'published_at'=>'required',
            'category_id'=>'required',
            'author_id' => 'required'
            

        ];
    }
}
