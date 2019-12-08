<?php
use App\Formation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       // Formation::truncate(); // empty the table

        Schema::create('formations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('former_id');
            $table->integer('category_id');
            $table->string('code', 10);
            $table->integer('length');
            $table->string('label');
            $table->integer('state')->default(1);
            $table->text('description');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('former_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formations');
        /*Schema::table('formations', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // drop the foreign key.
            $table->dropColumn('user_id'); // drop the column
        });*/
    }
}
