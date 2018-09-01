<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketidTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticketid_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('color');
        });

        Schema::create('ticketid_priorities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('color');
        });

        Schema::create('ticketid_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('color');
        });

        Schema::create('ticketid_categories_users', function (Blueprint $table) {
            $table->integer('category_id')->unsigned();
            $table->integer('user_id')->unsigned();
        });

        Schema::create('ticketid_telegrams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('username')->nullable()->default(null);
            $table->double('chat_id')->nullable()->default(null);
            $table->timestamps();
        });

        Schema::create('ticketid', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject');
            $table->longText('content');
            $table->integer('status_id')->unsigned();
            $table->integer('priority_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('agent_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->timestamps();
        });

        Schema::create('ticketid_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->boolean('isPinned')->default(0);
            $table->integer('user_id')->unsigned();
            $table->integer('ticket_id')->unsigned();
            $table->timestamps();
        });

        Schema::create('ticketid_audits', function (Blueprint $table) {
            $table->increments('id');
            $table->text('operation');
            $table->integer('user_id')->unsigned();
            $table->integer('ticket_id')->unsigned();
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
        Schema::drop('ticketid_audits');
        Schema::drop('ticketid_comments');
        Schema::drop('ticketid_telegrams');
        Schema::drop('ticketid');
        Schema::drop('ticketid_categories_users');
        Schema::drop('ticketid_categories');
        Schema::drop('ticketid_priorities');
        Schema::drop('ticketid_statuses');
    }
}
