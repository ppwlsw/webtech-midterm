<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreActivityRequest extends FormRequest
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
            'start_datetime' => ['required', 'before:end_datetime'],
            'end_datetime' => ['required', 'after:start_datetime'],
            'max_participants' => ['required', 'integer', 'min:1'],
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

            'activity_type.required' => 'กรุณาระบุประเภทกิจกรรม/ประกาศ',

            'start_datetime.required' => 'กรุณาระบุวันเวลาเริ่มต้น',
            'start_datetime.before' => 'ต้องเริ่มต้นก่อนวันเวลาสิ้นสุด',

            'end_datetime.required' => 'กรุณาระบุวันเวลาสิ้นสุด',
            'end_datetime.after' => 'ต้องสิ้นสุดหลังวันเวลาเริ่มต้น',

            'max_participants.required' => 'กรุณาระบุจำนวนผู้เข้าร่วม',
            'max_participants.integer' => 'ต้องเป็นตัวเลข',
            'max_participants.min' => 'ต้องมีผู้เข้าร่วมอย่างน้อย 1 คน'
        ];
    }
}
