<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\Language;

class SeedEnglishToLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Language::create([
            'name' => 'English',
            'code' => 'en',
            'status' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
