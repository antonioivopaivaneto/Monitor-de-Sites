<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateEndpointRequest extends FormRequest
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
        $id = $this->site->id ?? '';
        return [
            'frequency' => [
                'required'
            ],
            'endpoint' => [
                'required',
                'max:255',
                Rule::unique('endpoints')
                    ->where('site_id',$id )
                    ->ignore($this->segment(3))
            ],
        ];
    }
}
