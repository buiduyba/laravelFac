<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('email',150)->unique();
            $table->string('phone',20);
            $table->date('date_of_birth');
            $table->dateTime('hire_date');
            $table->decimal('salary');
            $table->tinyInteger('is_active')->default(1);
            $table->integer('department_id');
            $table->integer('manager_id')->nullable();
            $table->text('address');
            $table->binary('profile_picture')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
