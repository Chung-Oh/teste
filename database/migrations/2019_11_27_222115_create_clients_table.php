<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Comando Artisan: php artisan make:migration create_clients_table
 */
class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('document_number'); // cpf ou cnpj
            $table->string('email');
            $table->string('phone');
            $table->boolean('defaulter'); // inadimplente
            $table->date('date_birth');
            $table->char('sex', 10);
            $table->enum('marital_status', array_keys(App\Client::MARITAL_STATUS)); // estado civil
            $table->string('physical_desability')->nullable(); // deficiência física
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
        Schema::dropIfExists('clients');
    }
}
