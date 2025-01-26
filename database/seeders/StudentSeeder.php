<?php

namespace Database\Seeders;

use App\Models\Student;

use App\Models\User;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $faker = \Faker\Factory::create('th_TH');

        $users = User::where('role', 'STUDENT')->get();

        if ($users->isEmpty()) {
            $this->command->info('No users found with the "STUDENT" role.');
            return;
        }

        $users->each(function ($user) use ($faker) {
            $names = explode(" ", $user->name);
            $first_name = $names[0];
            $last_name = $names[1];
            $admission_year = $faker->year();
            $student_status = $faker->randomElement(['active', 'inactive']);
            $second_element = $faker->randomElement([3,4,5,6]);
            $sixth_element = $faker->randomElement([0,5]);
            $contribution = $faker->randomElement([
                    'การพัฒนาโครงการซอฟต์แวร์ที่ช่วยเพิ่มประสิทธิภาพในกระบวนการธุรกิจ',
                    'การออกแบบระบบที่ช่วยในการจัดการฐานข้อมูลขนาดใหญ่',
                    'การเขียนบทความวิจัยในวารสารระดับสากลเกี่ยวกับเทคโนโลยีสารสนเทศ',
                    'การทำงานเป็นที่ปรึกษาทางเทคนิคให้กับองค์กรต่างๆ',
                    'ผลงานในการพัฒนาแอปพลิเคชันที่ได้รับการยอมรับจากผู้ใช้งานกว่า 1 ล้านคน'
                ]);


            $completionDate = [];
            if ($student_status === 'inactive') {
                $completionDate['completion_year'] = $faker->numberBetween((int)$admission_year + 4, (int)$admission_year + 8);
            }

            $completionData = array_merge([
                'user_id' => $user->id,
                'student_code' => '6'. $second_element . '104'. $sixth_element . $faker->numberBetween(1000, 9999),
                'first_name' => $first_name,
                'last_name' => $last_name,
                'student_type' => $faker->randomElement(['regular', 'special']),
                'contact_info' => $faker->address(),
                'telephone_num' => $faker->phoneNumber(),
                'admission_channel' => $faker->randomElement(['1', '2', '3']),
                'semester' => $faker->randomElement([1,1.5,2,2.5,3,3.5,4]),
                'admission_year' => $admission_year,
                'student_status' => $student_status,
                'curriculum' => $faker->randomElement(['65', '60']),
                'advisor_first_name' => $faker-> firstName,
                'advisor_last_name' => $faker->lastName,
                'workplace' =>  $faker->company(),
                'contribution' => $contribution,
            ], $completionDate);

            Student::create($completionData);
        });
    }
}
