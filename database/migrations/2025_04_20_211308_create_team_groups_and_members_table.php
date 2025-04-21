<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamGroupsAndMembersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // إنشاء جدول المجموعات
        Schema::create('team_groups', function (Blueprint $table) {
            $table->id();                         // معرف المجموعة
            $table->string('name');               // اسم المجموعة
            $table->text('description')->nullable(); // وصف اختياري
            $table->timestamps();                 // created_at, updated_at
        });

        // إنشاء جدول أعضاء الفريق
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();                                     // معرف العضو
            $table->string('name');                           // الاسم الكامل
            $table->string('email')->unique();                // البريد الإلكتروني
            $table->string('phone')->nullable();              // رقم الهاتف (اختياري)
            $table->string('password');                       // كلمة المرور المشفّرة
            $table->enum('status', ['pending', 'active', 'suspended'])
                  ->default('pending');                       // حالة العضو
            // علاقة بالمجموعة:
            $table->foreignId('team_group_id')
                  ->constrained('team_groups')
                  ->cascadeOnDelete();
            $table->timestamps();                             // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_members');
        Schema::dropIfExists('team_groups');
    }
}
