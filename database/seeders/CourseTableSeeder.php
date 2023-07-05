<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $course =[
            [
                'name'=>'Cyber Security',
                'description'=>'This professional course has been designed to develop and equip a participant with the state-of-the-art skills and competencies on malware analysis.',
                'duration'=>'7 weeks',
                'courseId'=>'20.1',

            ],
            [
                'name'=>'Networking',
                'description'=>'The module will equip participants with modern techniques to secure any kind of network and network-accessible resources.',
                'duration'=>'25 weeks',
                'courseId'=>'29.1',

            ]
        ];
        foreach($course as $key => $value)
        {
            Course::create($value);
        }
    }
}
