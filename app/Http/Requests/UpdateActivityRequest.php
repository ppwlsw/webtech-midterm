<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateActivityRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'activity_name' => ['required', 'min:3', 'max:255'],
            'activity_detail' => ['required', 'min:3', 'max:255'],
            'activity_type' => ['required'],
            'start_datetime' => [],
            'end_datetime' => [],
            'max_participants' => [],
            'condition' => [],
        ];
    }

    public function messages(): array {
        return [
            'activity_name.required' => 'กรุณาระบุชื่อ',
            'activity_name.min' => 'ชื่อต้องมีอย่างน้อย 3 ตัวอักษร',
            'activity_name.max' => 'ชื่อต้องไม่เกิน 255 ตัวอักษร',

            'activity_detail.required' => 'กรุณาระบุรายละเอียด',
            'activity_detail.min' => 'รายละเอียดน้อยเกินไป',
            'activity_detail.max' => 'รายละเอียด้องไม่เกิน 255 ตัวอักษร',

            'activity_type.required' => 'กรุณาระบุประเภทประกาศ',
        ];
    }
}
