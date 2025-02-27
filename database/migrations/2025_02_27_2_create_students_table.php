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
        Schema::create('students', function (Blueprint $table) {
            $table->id('student_id');
            $table->string('email', 45)->unique();
            $table->string('password', 45);
            $table->string('fname', 45);
            $table->string('lname', 45);
            $table->date('dob');
            $table->string('phone', 15)->nullable();
            $table->string('mobile', 15)->nullable();
            $table->unsignedBigInteger('parent_id');
            $table->boolean('status')->default(1);
            $table->date('date_of_join');
            $table->date('last_login_date')->nullable();
            $table->string('last_login_ip', 45)->nullable();
            $table->timestamps();
            
            // Foreign key constraint
            $table->foreign('parent_id')->references('parent_id')->on('parents')->onDelete('cascade');
        
        });
    }
};
