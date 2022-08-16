<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('symbol');
            $table->string('iso_code');
            $table->string('name');
            // $table->timestamps();
        });
        Schema::create('rate_plans', function (Blueprint $table) {
            $table->id();
            $table->string('currency_id');
            $table->string('name');
            $table->decimal('amount');
            $table->integer('period_count');
            $table->string('period_type');
            $table->integer('has_coupon_code');
            $table->mediumText('description')->nullable();
            $table->integer('is_active')->default(1)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->id();
            $table->string('rate_plan_id')->default(0);
            $table->string('code')->unique();
            $table->date('date_end')->nullable();
            $table->integer('created_by');
            $table->mediumText('comment')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->decimal('price');
            $table->integer('doctor_count');
            $table->integer('rate_plan_id');
            $table->string('status');
            $table->string('gateway');
            $table->mediumText('users_id')->nullable();
            $table->integer('promo_code_id')->nullable()->default(0);
            $table->mediumText('details')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('subscribes', function (Blueprint $table) {
            $table->id();
            $table->integer('owner_id');
            $table->integer('auto_write_off')->default(1)->nullable();
            $table->integer('admin_count')->default(1)->nullable();
            $table->integer('manager_count');
            $table->integer('doctor_count');
            $table->integer('status');
            $table->integer('specialization_id');
            $table->string('activation_comment')->nullable();
            $table->date('date_end');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('clinics', function (Blueprint $table) {
            $table->id();
            $table->integer('subscriber_id');
            $table->string('address')->nullable();
            $table->string('name')->nullable();
            $table->string('kod_edropu')->nullable();
            $table->string('start_card_number')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();
        });
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('lastname')->nullable();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('birthday')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->integer('gender')->nullable();
            $table->integer('card_number');
            $table->mediumText('comment')->nullable();
            $table->integer('clinic_id');
            $table->integer('subscriber_id');
            $table->integer('doctor_id');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('patient_doctors', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->integer('doctor_id');
        });
        Schema::create('form043s', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->string('doc_year')->nullable();
            $table->integer('doc_write_count')->default(1)->nullable();
            $table->mediumText('field5')->nullable();
            $table->mediumText('field6')->nullable();
            $table->mediumText('field7')->nullable();
            $table->char('field71',1)->nullable();
            $table->char('field72',1)->nullable();
            $table->char('field73',1)->nullable();
            $table->char('field74',1)->nullable();
            $table->char('field75',1)->nullable();
            $table->char('field76',1)->nullable();
            $table->char('field77',1)->nullable();
            $table->char('field78',1)->nullable();
            $table->char('field79',1)->nullable();
            $table->char('field80',1)->nullable();
            $table->string('field81')->nullable();
            $table->string('field82')->nullable();
            $table->mediumText('field8')->nullable();
            $table->mediumText('field9')->nullable();
            $table->mediumText('field9time')->nullable();
            $table->mediumText('field9table')->nullable();
            $table->text('field10')->nullable();
            $table->mediumText('field11')->nullable();
            $table->mediumText('field12')->nullable();
            $table->string('field13')->nullable();
            $table->string('field14')->nullable();
            $table->string('field15')->nullable();
            $table->mediumText('field15text')->nullable();
            $table->mediumText('field18')->nullable();
            $table->mediumText('field19')->nullable();
            $table->timestamps();
        });
        Schema::create('form043_details', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->string('page_key');
            $table->integer('page_num');
            $table->mediumText('date')->nullable();
            $table->mediumText('text')->nullable();
            $table->integer('doctor_id');
            $table->timestamps();
        });
        Schema::create('form025s', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->integer('doc_write_count')->default(1)->nullable();
            $table->string('doc_year')->nullable();
            $table->mediumText('field5')->nullable();
            $table->string('field6')->nullable();
            $table->string('field8text')->nullable();
            $table->string('field8')->nullable();
            $table->string('field9')->nullable();
            $table->string('field10')->nullable();
            $table->string('field10text')->nullable();
            $table->string('field11')->nullable();
            $table->string('field11text')->nullable();
            $table->string('blood')->nullable();
            $table->string('rezus')->nullable();
            $table->string('blood_transfusion')->nullable();
            $table->string('diabet')->nullable();
            $table->string('infection')->nullable();
            $table->string('hirurgion')->nullable();
            $table->string('allergy')->nullable();
            $table->string('preparate')->nullable();
            $table->string('factor_risk')->nullable();
            $table->integer('doctor_id')->default(0)->nullable();
            $table->timestamps();
        });
        Schema::create('form025_conclusions', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->integer('page_num');
            $table->mediumText('skargi')->nullable();
            $table->mediumText('anamnez')->nullable();
            $table->string('visus_od')->nullable();
            $table->string('visus_od_kop')->nullable();
            $table->string('visus_od_cyl')->nullable();
            $table->string('visus_od_ax')->nullable();
            $table->string('visus_od_equal')->nullable();
            $table->string('visus_od_konyuktiv')->nullable();
            $table->string('visus_od_rogivka')->nullable();
            $table->string('visus_od_krishtalik')->nullable();
            $table->string('visus_od_sklo')->nullable();
            $table->string('visus_od_ochne')->nullable();
            $table->string('visus_od_keratot')->nullable();
            $table->string('visus_od_refrakt')->nullable();
            $table->string('visus_os')->nullable();
            $table->string('visus_os_sph')->nullable();
            $table->string('visus_os_cyl')->nullable();
            $table->string('visus_os_ax')->nullable();
            $table->string('visus_os_equal')->nullable();
            $table->string('visus_os_konyuktiv')->nullable();
            $table->string('visus_os_rogivka')->nullable();
            $table->string('visus_os_krishtalik')->nullable();
            $table->string('visus_os_sklo')->nullable();
            $table->string('visus_os_ochne')->nullable();
            $table->string('visus_os_keratot')->nullable();
            $table->string('visus_os_refrakt')->nullable();
            $table->mediumText('diagnoz')->nullable();
            $table->mediumText('priznan')->nullable();
            $table->mediumText('rekomend')->nullable();
            $table->integer('doctor_id')->default(0)->nullable();
            $table->timestamps();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar')->nullable();
            $table->string('sign_image')->nullable();
            $table->integer('subscriber_id')->nullable();
            $table->string('role')->nullable();
            $table->softDeletes();
        });
        Schema::create('users_a', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('nickname')->nullable();
            $table->string('surname')->nullable();
            $table->string('phone')->nullable();
            $table->string('specialization')->nullable();
            $table->string('confirmation_code')->nullable();
            $table->integer('status')->nullable();
            $table->string('avatar')->nullable();
            $table->string('sign_image')->nullable();
            $table->integer('subscriber_id')->nullable();
            $table->string('role')->nullable();
            $table->dateTime('deleted_at')->nullable();
            // $table->timestamps();
        });
        Schema::create('field_categories', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('name');
            $table->integer('specialization_id');
            $table->timestamps();
        });
        Schema::create('field_templates', function (Blueprint $table) {
            $table->id();
            // $table->string('field_key');
            $table->string('name');
            $table->string('full_description');
            $table->integer('field_category_id');
            $table->integer('subscriber_id')->default(0)->nullable();
            $table->integer('created_by');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('question');
            $table->string('file')->nullable();
            $table->integer('created_by');
            $table->integer('subscriber_id');
            $table->integer('status');
            $table->integer('group_id');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('file');
            $table->integer('specialization_id');
            $table->timestamps();
        });
        Schema::create('specializations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('value')->nullable();
            $table->string('group');
        });
        Schema::create('invite_codes', function (Blueprint $table) {
            $table->id();
            $table->integer('subscriber_id');
            $table->string('email')->nullable()->unique();
            $table->string('role');
            $table->integer('user_id')->nullable()->default(0);
            $table->date('end_date')->nullable();
            $table->string('code')->nullable();
            $table->dateTime('email_send_at')->nullable();
            $table->integer('payed_days')->default(0)->nullable();
            $table->timestamps();
        });
        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('type');
            $table->morphs('notifiable');
            $table->text('data');
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
        });
        Schema::create('video_instructions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('video')->nullable();
            $table->text('video_url')->nullable();
            $table->string('type');
            $table->integer('specialization_id');
            $table->timestamps();
        });
        Schema::create('patient_files', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('file');
            $table->integer('size');
            $table->integer('subscriber_id');
            $table->integer('patient_id');
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
        Schema::dropIfExists('currencies');
        Schema::dropIfExists('rate_plans');
        Schema::dropIfExists('promo_codes');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('subscribes');
        Schema::dropIfExists('patients');
        Schema::dropIfExists('patient_doctors');
        Schema::dropIfExists('form043s');
        Schema::dropIfExists('form043_details');
        Schema::dropIfExists('clinics');
        Schema::dropIfExists('field_categories');
        Schema::dropIfExists('field_templates');
        Schema::dropIfExists('tickets');
        Schema::dropIfExists('documents');
        Schema::dropIfExists('specializations');
        Schema::dropIfExists('settings');
        Schema::dropIfExists('invite_codes');
        Schema::dropIfExists('notifications');
        Schema::dropIfExists('video_instructions');
        Schema::dropIfExists('users_a');
        Schema::dropIfExists('form025s');
        Schema::dropIfExists('form025_conclusions');
        Schema::dropIfExists('patient_files');
    }
}
