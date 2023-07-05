<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('role')->default('normal');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        User::create([
            'name' => 'King Admin',
            'email' => 'kingadmin@text.com',
            'role' => 'superadmin',
            'password' => Hash::make('password')
            
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@text.com',
            'role' => 'admin',
            'password' => Hash::make('password')
            
        ]);

        User::create([
            'name' => 'Normal',
            'email' => 'normal@text.com',
            'role' => 'normal',
            'password' => Hash::make('password')
            
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
