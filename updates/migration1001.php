<?php namespace Bombozama\OTLT\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class Migration1002 extends Migration
{
    public function up()
    {
        Schema::create('bombozama_otlt_lookupvalues', function($table) {
            $table->engine = 'MyISAM';
            $table->increments('id')->unsigned();
            $table->string('category')->collation('latin1_general_ci')->nullable();
            $table->string('slug')->collation('latin1_general_ci')->nullable();
            $table->string('name')->nullable();
            $table->string('extra')->nullable();
            $table->boolean('is_published')->nullable()->default(0);
            $table->integer('user_id')->nullable()->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->unique(['category','slug']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('bombozama_otlt_lookupvalues');
    }
}