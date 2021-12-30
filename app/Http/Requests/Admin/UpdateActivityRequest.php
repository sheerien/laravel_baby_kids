<?php

namespace App\Http\Requests\Admin;

use App\Models\Activity;
use Illuminate\Foundation\Http\FormRequest;

class UpdateActivityRequest extends FormRequest
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
        return array_merge(Activity::createActivityRule(),[
            'activity_id' => 'required|exists:activities,id'
        ]);
    }
}