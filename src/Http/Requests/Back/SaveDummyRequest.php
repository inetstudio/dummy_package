<?php

namespace InetStudio\Dummies\Http\Requests\Back;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use InetStudio\Dummies\Contracts\Http\Requests\Back\SaveDummyRequestContract;

/**
 * Class SaveDummyRequest.
 */
class SaveDummyRequest extends FormRequest implements SaveDummyRequestContract
{
    /**
     * Определить, авторизован ли пользователь для этого запроса.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Сообщения об ошибках.
     *
     * @return array
     */
    public function messages()
    {
        return [
        ];
    }

    /**
     * Правила проверки запроса.
     *
     * @param Request $request
     * @return array
     */
    public function rules(Request $request)
    {
        return [
        ];
    }
}
