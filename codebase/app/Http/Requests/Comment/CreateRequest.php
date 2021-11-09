<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Кастомный валидатор для нового комментария
 * Если произойдёт ошибка вернётся с ошибкой 422
 *
 * Class CreateRequest
 * @package App\Http\Requests\Comment
 */
class CreateRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Правила валидации комментария
     * @return array
     */
    public function rules()
    {
        return [
            'subject' => 'required|min:6',
            'body' => 'required|min:10',
            'article_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'subject.required' => 'Тема комментария обязательна для заполнения',
            'subject.min' => 'Темы комментария должна быть минимум :min символов',
            'body.required' => 'Комментарий обязателен для заполнения',
            'body.min' => 'Комментарий должен быть минимум :min символов',
        ];
    }
}
