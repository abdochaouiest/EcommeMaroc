<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('users', function (Blueprint $table) {
       $table->string('full_name');
        $table->boolean('agreed_to_terms_and_privacy')->default(false); 
        $table->string('cin')->nullable(); 
        $table->string('primary_phone');
        $table->string('additional_phone')->nullable(); 
        $table->string('country')->nullable()->change();
        $table->string('state')->nullable(); 
        $table->string('city')->nullable(); 
        $table->string('zip_code')->nullable(); 
        $table->text('address')->nullable();
    });
}

public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn([
            'full_name',  
            'agreed_to_terms_and_privacy', 
            'cin',
            'primary_phone', 
            'additional_phone', 
            'country', 
            'state', 
            'city', 
            'zip_code', 
            'address'
        ]);
    });
}
};
