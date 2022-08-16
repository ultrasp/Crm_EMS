<?php

use Illuminate\Support\Facades\Route;
use App\Models\Payment;
use App\Http\Resources\Form043Resource;
use App\Models\Patient;
use Illuminate\Support\Str;
use App\Models\Specialization;
use App\Models\FieldCategory;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace'=>'App\Http\Controllers'],function () {
    Route::post('/register', 'AuthController@register');
    Route::post('/check-pincode', 'AuthController@checkPincode');
    Route::post('/login', 'AuthController@login');
    Route::post('/logout', 'AuthController@logout');
    Route::post('/recovery', 'AuthController@sendRecovery');
    Route::get('/confirm-email/{key}', 'AuthController@confirmEmail');
    Route::post('/save/new-password', 'AuthController@saveNewPassword');

    Route::get('/plan-list', 'PaymentController@rate_plans');
    Route::post('/payment/start', 'PaymentController@startPayment');
    Route::get('/payment/form/{id}', 'PaymentController@form')->name('payment.form');
    Route::post('/payment/callback', 'PaymentController@serverCallback')->name('payment.callback');
});

Route::get('/test', function () {
    // dd(Hash::check('test1','$2y$10$R5oVZC1H6oM7.3vVv1Tz4uXBFJVOErAV/bX7qVFGtQYzETMy4XYzu'));
    // $p = Payment::where('id','95')->first();
    // $p->subscribe(json_encode(['info'=>'test']));
});

Route::get('/update-core', function () {
    $spec = Specialization::first();
    $names = [
        'Розвиток теперішнього захворювання',
        'Дані обєктивного дослідження',
        'Стан гігієни порожнини роту',
        'Дані рентгенівських обстежень'
    ];
    foreach ($names as $key => $name) {
        $f = FieldCategory::firstOrNew(['key' => Str::slug($name)]);
        $f->key = Str::slug($name);
        $f->name = $name;
        $f->specialization_id = $spec->id;
        $f->save();
    }

});


Route::middleware(['guest'])->group(function () {
    Route::get('/{vue_capture?}', function () {
        // dd($vue_capture);
        return view('home');
    // })->where('vue_capture', '[\/\w\.-]*');
    })->where('vue_capture', '(register|pin-code|recovery)');
    Route::get('/new-password/{token}', function () {
        return view('home');
    });
    Route::get('/login', function () {
        return view('home');
    })->name('login');
});

Route::group(['namespace'=>'App\Http\Controllers','middleware' => 'auth'], function () {

    Route::get('/testpdf025', 'CabinetController@testPDF025getPdf'); //025 testpdf
    Route::get('/testpdf043', 'CabinetController@testPDF043getPdf'); //043 testpdf
    Route::get('/testpdf043', 'CabinetController@testPDF043getPdf'); //043 testpdf


    Route::get('/testpdf043print-style', function (Request $request) {
        $id = 6;
        $pat  = new Form043Resource(Patient::where('id',$id)->first());
        $patient = $pat->toArray($request);
        // dd($patient);
//        $pdf = \PDF::loadView('print.form_043', compact('patient'))->setPaper('a5', 'landscape');
//        return $pdf->setWarnings(false)->stream('invoice.pdf');


        return view('print.form_043', compact('patient'));
    })->name('print');


    Route::get('/testpdf', 'CabinetController@getPdf');
    Route::get('/download/zip/{id}', 'CabinetController@downloadZip')->name('download.zip');
    Route::group(['middleware' => 'payed'], function () {

        Route::get('/patients', function () {
            return view('logined');
        })->name('patients');
        Route::get('/patients/list', 'PatientController@list');

        Route::get('/patients/form_043/{id}/print', function () {
            return view('platform/vue-print');
        })->name('print');

        Route::get('/patients/form_oftol/{id}/print', function () {
            return view('platform/vue-print');
        })->name('print2');

        Route::get('/patients/consult/print/{id}/{pageNum}', function () {
            return view('platform/vue-consult-print');
        })->name('print3');

        Route::get('/{patient_capture?}', function () {
            return view('logined');
        })->where('patient_capture', '((patients/newPatient)|(patients/card.*)|(patients/form_043.*)|(patients/agreements.*)|(patients/files.*)|profile|clinic|worker|payment|field-template|(sub/payment)|(ticket/form)|faq|(video/list)|(patients/form_oftol.*))');
    });

    Route::get('/first-payment', function () {
    	if(auth()->user()->subscriber_id > 0 )
    		return redirect('/worker');
        return view('logined');
    });


    Route::get('/thank-you', function () {
        return view('logined');
    });

    Route::get('/payment/return/{id}', 'PaymentController@return')->name('payment.return');

    Route::get('/user/profile', 'CabinetController@getProfile');
    Route::post('/user/profile', 'CabinetController@saveProfile');

    Route::get('/clinic/info', 'CabinetController@getClinic');
    Route::post('/clinic/store', 'CabinetController@saveClinic');

    Route::get('/sub/info', 'CabinetController@getSubInfo');
    Route::post('/invite/store', 'CabinetController@saveInvites');
    Route::post('/invite/sendEmail', 'CabinetController@sendEmail');
    Route::post('/invite/delete', 'CabinetController@deleteInvite');

    Route::get('/template/categories', 'CabinetController@getCategories');
    Route::post('/template/list', 'CabinetController@getFieldTemplates');
    Route::post('/template/store', 'CabinetController@saveTemplates');
    Route::post('/form/templates', 'CabinetController@getFieldTemplatesByCatSlug');

    Route::get('/documents/list', 'CabinetController@getDocuments');
    Route::post('/documents/download', 'CabinetController@download');

    Route::get('/patient/get/{id}', 'CabinetController@getPatient');
    Route::post('/patient/store', 'CabinetController@savePatient');
    Route::post('/patient-card/store', 'CabinetController@savePatientCard');
    Route::get('/patient/getForm04/{id}', 'CabinetController@getPatientForm043');
    Route::post('/patient/delete', 'PatientController@delete');
    Route::post('/form025/store', 'PatientController@saveForm025');
    Route::get('/patient/getForm025/{id}', 'PatientController@getPatientForm025');
    Route::post('/patient/getConclution', 'PatientController@getConclution');
    Route::post('/patient/storeConclution', 'PatientController@storeConclution');
    Route::post('/patient/removeDoctorPage', 'PatientController@removeDoctorPage');
    Route::post('/patient/addDownloadJob', 'PatientController@makeDownloadJob');

    Route::get('/files/list/{id}', 'PatientController@getFiles');
    Route::post('/files/store', 'PatientController@storeFile');
    Route::post('/files/delete', 'PatientController@deleteFile');
    Route::get('/files/info', 'PatientController@getQuotaInfo');

    Route::post('/sub/payment', 'PaymentController@subPayment');
    Route::get('/sub/payments', 'CabinetController@getPayments');

    Route::get('/sub/doctors', 'CabinetController@getDoctors');
    Route::get('/patient/doctors/{id}', 'PatientController@getSelDoctors');
    Route::post('/patient/attach-doctor', 'PatientController@attachDoctors');

    Route::get('/notifications', 'CabinetController@getNotifications');
    Route::post('/notification/read', 'CabinetController@markNotification');

    Route::post('/ticket/add', 'CabinetController@addTicket');
    Route::get('/faqs/list', 'CabinetController@getFaqs');
    Route::get('/video-list', 'CabinetController@getVideos');
    // Route::post('/patient/store', 'CabinetController@savePatient');

    Route::post('/promo/check', 'PaymentController@checkPromo');

});


// Route::get('/patients2', function () {
//     return view('platform.Patient.patients');
// })->name('patients');

// Route::get('/patients/patient_card', function () {
//     return view('platform.Patient.patient_card');
// })->name('patient_card');

// Route::get('/patients/form_043', function () {
//     return view('platform.Patient.form_043');
// })->name('form_043');

// Route::get('/patients/newPatient', function () {
//     return view('platform.Patient.form_043_add');
// })->name('form_043_add');

// Route::get('/patients/agreements', function () {
//     return view('platform.Patient.agreements');
// })->name('agreements');



// Route::get('/profile', function () {
//     return view('platform.cabinet.profile');
// })->name('profile');

// Route::get('/clinic', function () {
//     return view('platform.cabinet.clinic');
// })->name('clinic');

// Route::get('/worker', function () {
//     return view('platform.cabinet.worker');
// })->name('worker');

// Route::get('/payment', function () {
//     return view('platform.cabinet.payment');
// })->name('payment');

// Route::get('/field-templates', function () {
//     return view('platform.cabinet.field-templates');
// })->name('field-templates');


//Route::get('/', function () {
//    return view('platform.Patient.patients');
//})->name('patients');
//
//
//Route::get('/patients/visits', function () {
//    return view('platform.Patient.visits');
//})->name('visits');
//
//
//Route::get('/patients/visits/first', function () {
//    return view('platform.Patient.first_patient');
//})->name('patients-first');
//
//
//Route::get('/patients/visits/second', function () {
//    return view('platform.Patient.second_patient');
//})->name('patients-second');
//Route::get('/promo-code', function () {
//    return view('platform.promo-code');
//})->name('promo-code');
