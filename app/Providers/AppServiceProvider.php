<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Settings;
use App\Models\Ticket;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('opent_ticket_count', Ticket::openTicketCount());
        \Form::component('bsText', 'components.form.text', ['label','name', 'value', 'attributes'  => []]);
        \Form::component('bsSelect', 'components.form.dropdown', ['label','name', 'value','options', 'attributes'  => []]);
        \Form::component('bsDate', 'components.form.date', ['label','name', 'value', 'attributes'  => []]);
        \Form::component('bsTextarea', 'components.form.textarea', ['label','name', 'value','editor' => false, 'attributes'  => []]);
        \Form::component('bsCheckbox', 'components.form.checkbox', ['label','name', 'value', 'attributes'  => []]);
        \Form::component('bsImage', 'components.form.image', ['label','name', 'url']);
        \Form::component('bsIcon', 'components.form.icons', ['label','name', 'value']);
        \Form::component('bsDropFile', 'components.form.dropFile', ['label','name', 'value','is_single' => false]);
        \Form::component('bsFile', 'components.form.file', ['label','name', 'value','attributes'=>[]]);
        \Form::component('bsTextEditor', 'components.form.texteditor', ['label','name', 'value', 'attributes'  => []]);
        //
    }
}
