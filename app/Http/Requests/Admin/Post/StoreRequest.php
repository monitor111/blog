<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Це поле необхідно для заповнення',
            'title.string' => 'Дані повинні відповідати строчному типу',
            'content.required' => 'Це поле необхідно для заповнення',
            'content.string' => 'Дані повинні відповідати строчному типу',
            'preview_image.required' => 'Це поле необхідно для заповнення',
            'preview_image.file' => 'Необхідно вибрати файл',
            'main_image.required' => 'Це поле необхідно для заповнення',
            'main_image.file' => 'Необхідно вибрати файл',
            'category_id.required' => 'Це поле необхідно для заповнення',
            'category_id.integer' => 'ID категорії повинен бути числом',
            'category_id.exists' => 'ID категорії повинен бути в Базі Даних',
            'tag_ids.array' => 'Необхідно відправити масив даних',
        ];
    }
}
