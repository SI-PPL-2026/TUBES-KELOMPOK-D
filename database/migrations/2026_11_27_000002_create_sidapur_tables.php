<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('aid_requests')) {
            Schema::create('aid_requests', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
                $table->string('applicant_name');
                $table->string('whatsapp');
                $table->string('university');
                $table->string('nim');
                $table->string('assistance_type')->default('porsi_makan');
                $table->text('reason');
                $table->string('ktm_photo')->nullable();
                $table->string('qris_proof')->nullable();
                $table->string('stall_name')->nullable();
                $table->decimal('nominal', 12, 2)->default(15000);
                $table->string('status')->default('pending'); // pending, approved, rejected, completed
                $table->text('admin_notes')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('donations')) {
            Schema::create('donations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
                $table->unsignedBigInteger('payment_method_id')->nullable();
                $table->string('donor_name');
                $table->string('whatsapp');
                $table->decimal('amount', 12, 2);
                $table->text('message')->nullable();
                $table->string('transfer_proof')->nullable();
                $table->string('status')->default('pending'); // pending, verified, rejected
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('finances')) {
            Schema::create('finances', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
                $table->foreignId('aid_request_id')->nullable()->constrained('aid_requests')->nullOnDelete();
                $table->foreignId('donation_id')->nullable()->constrained('donations')->nullOnDelete();
                $table->string('type'); // inflow, outflow
                $table->decimal('amount', 12, 2);
                $table->string('description');
                $table->string('proof')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('finances');
        Schema::dropIfExists('donations');
        Schema::dropIfExists('aid_requests');
    }
};
