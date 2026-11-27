<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role')->default('donor')->after('password'); // donor, recipient, admin
            }
            if (!Schema::hasColumn('users', 'phone')) {
                $table->string('phone')->nullable()->after('role');
            }
            if (!Schema::hasColumn('users', 'university')) {
                $table->string('university')->nullable()->after('phone');
            }
            if (!Schema::hasColumn('users', 'student_id')) {
                $table->string('student_id')->nullable()->after('university');
            }
            if (!Schema::hasColumn('users', 'address')) {
                $table->text('address')->nullable()->after('student_id');
            }
            if (!Schema::hasColumn('users', 'profile_photo')) {
                $table->string('profile_photo')->nullable()->after('address');
            }
            if (!Schema::hasColumn('users', 'status')) {
                $table->string('status')->default('active')->after('profile_photo');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $columns = ['role', 'phone', 'university', 'student_id', 'address', 'profile_photo', 'status'];
            foreach ($columns as $column) {
                if (Schema::hasColumn('users', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
