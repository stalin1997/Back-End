<?php

namespace App\Http\Requests\App\Status;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\App\AppFormRequest;

class UpdateStatusRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [];
        return AppFormRequest::rules($rules);
    }

    public function attributes()
    {
        $attributes = [];
        return AppFormRequest::attributes($attributes);
    }
}
