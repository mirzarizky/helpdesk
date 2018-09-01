<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Add indicies for better performance.
 *
 * Class AddIndexes
 */
class AddIndexes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ticketid', function (Blueprint $table) {
            $table->index('subject');
            $table->index('status_id');
            $table->index('priority_id');
            $table->index('user_id');
            $table->index('agent_id');
            $table->index('category_id');
            $table->index('completed_at');
        });

        Schema::table('ticketid_comments', function (Blueprint $table) {
            $table->index('user_id');
            $table->index('ticket_id');
        });

        Schema::table('ticketid_settings', function (Blueprint $table) {
            $table->index('lang');
            $table->index('slug');
        });

        Schema::table('ticketid_telegrams', function (Blueprint $table) {
            $table->index('user_id');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->index('telegram_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ticketid', function (Blueprint $table) {
            $table->dropIndex('ticketid_subject_index');
            $table->dropIndex('ticketid_status_id_index');
            $table->dropIndex('ticketid_priority_id_index');
            $table->dropIndex('ticketid_user_id_index');
            $table->dropIndex('ticketid_agent_id_index');
            $table->dropIndex('ticketid_category_id_index');
            $table->dropIndex('ticketid_completed_at_index');
        });

        Schema::table('ticketid_comments', function (Blueprint $table) {
            $table->dropIndex('ticketid_comments_user_id_index');
            $table->dropIndex('ticketid_comments_ticket_id_index');
        });

        Schema::table('ticketid_settings', function (Blueprint $table) {
            $table->dropIndex('ticketid_settings_lang_index');
            $table->dropIndex('ticketid_settings_slug_index');
        });

        Schema::table('ticketid_telegrams', function (Blueprint $table) {
            $table->dropIndex('ticketid_telegrams_user_id_index');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex('users_telegram_id_index');
        });
    }
}
