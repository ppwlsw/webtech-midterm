<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAchievementRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'achievement_name' => ['required', 'min:3'],
        'achievement_detail' => ['required', 'min:3'],
        'achievement_year' => ['required'],
        'achievement_type' => ['required'],
        ];
    }

    public function messages(): array {
        return [
            'achievement_name.required' => 'กรุณาระบุชื่อ',
            'achievement_name.min' => 'ชื่อต้องมีอย่างน้อย 3 ตัวอักษร',
            'achievement_detail.required' => 'กรุณาระบุรายละเอียด',
            'achievement_detail.min' => 'รายละเอียดน้อยเกินไป',
            'achievement_year.required' => 'กรุณาระบุปีที่ได้รับรางวัล',
            'achievement_type.required' => 'กรุณาระบุประเภทรางวัลที่ได้รับ'
        ];
    }
}
