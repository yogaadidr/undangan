<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->id(); // int(11) AUTO_INCREMENT PRIMARY KEY

            $table->string('name', 50);
            $table->string('phone', 14);

            // enum('1','2','3') default '3'
            $table->enum('session', ['1', '2', '3'])->default('1')
                ->comment('1=11.00-12.30, 2=12.00-13.30, 3=11.00-13.30');

            // enum('CPW','CPP')
            $table->enum('side', ['CPW', 'CPP']);

            // tinyint(1) nullable default 0
            $table->boolean('is_vip')->nullable()->default(0);
            $table->boolean('invited')->nullable()->default(0);

            // timestamps with current_timestamp()
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
