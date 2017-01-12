<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiDocRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $commentId = $this->route('comment');

        return Comment::where('id', $commentId)
            ->where('user_id', Auth::id())->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ];
    }

    public function store(ApiDocRequest $request)
    {
        // The incoming request is valid...
    }
}