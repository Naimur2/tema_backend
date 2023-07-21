<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('mobile_number');
            $table->string('shirt_size', 5);
            $table->string('image_path');
            $table->string('company_name');
            $table->date('arrival_date');
            $table->date('departure_date');
            $table->integer('bed_preference');
            $table->foreignId('team_id')->nullable()->constrained('teams')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('userType')->default(1);
            $table->boolean('is_active')->default(true);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
