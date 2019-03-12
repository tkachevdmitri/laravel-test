<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            // можно завязаться таким способом
            $table->integer('user_id')->unsigned();  // целое положительное число
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamp('published_at');
            $table->timestamps();
            
            // НАСТРОЙКА ВНЕШНЕГО ОГРАНИЧЕНИЯ, делается для того, чтобы когда пользователь удаляет свой акк. то произойдет удалениее всего что ему принадлежит (статьи, комменты и тд)
            // внешний ключ user_id ссылается на поле идентификатора id в таблице users
            $table->foreign('user_id')  // внешний ключ user_id
				  ->references('id')
				  ->on('users')  // ссылается на поле id таблицы users
				  ->onDelete('cascade');  // т.о. когда пользователь удалит аккаунт, каскадом проходим вних и удаляем все его статьи и любые другие записи
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
