<?php

use Illuminate\Database\Seeder;
use App\Models\Teacher;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacher = new Teacher;
        $teacher -> name = 'Hikmet';
        $teacher -> surname = 'Berhuş';
        $teacher -> city = '65';
        $teacher -> organization_type = 'Üniversite';
        $teacher -> education = 'Fırat üniversitesi';
        $teacher -> mission = '1';
        $teacher -> email = 'info@senedu.com';
        $teacher -> password = Hash::make('123456');
        $teacher -> save();
    }
}
