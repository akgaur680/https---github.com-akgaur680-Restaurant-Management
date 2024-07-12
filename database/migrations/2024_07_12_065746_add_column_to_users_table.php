<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('dob');
            $table->enum( 'gender', ['M','F','O']);
            $table->text('address');
            $table->string('profile_image', 100);
            $table->string('role',100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['contact', 'dob', 'gender', 'address', 'profile_image', 'text']); // Added to reverse changes
       
        });
    }
};
