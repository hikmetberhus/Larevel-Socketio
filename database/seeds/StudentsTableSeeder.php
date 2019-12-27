<?php

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = new Student;
        $student -> name = 'Hikmet';
        $student -> surname = 'Berhuş';
        $student -> education = 'Fırat üniversitesi';
        $student -> email = 'hikmetberhus@gmail.com';
        $student -> password = Hash::make('123456');
        $student -> save();
    }
}
