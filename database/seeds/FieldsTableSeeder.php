<?php

use Illuminate\Database\Seeder;
use App\Field;

class FieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=5;$i++ ) {
            Field::insert([
                'fieldname' => str_random(5)
            ]);
        }
    }
}
