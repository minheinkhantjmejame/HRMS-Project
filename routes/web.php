<?php
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;


Route::get('/',function(){
    return view('index');
});

// intern pages
Route::get('intern', function () {
    return view('intern.index'); 
})->name('intern');  

// Program Page
Route::get('/program', function () {
    // Define your job categories here (or fetch from the database)
    $categories = [
        'IT' => [
            ['title' => 'Software Developer Intern', 'description' => 'Work on development projects...', 'positions' => 3],
            ['title' => 'Web Developer Intern', 'description' => 'Design and develop websites...', 'positions' => 2],
        ],
        'Marketing' => [
            ['title' => 'Marketing Intern', 'description' => 'Assist in marketing campaigns...', 'positions' => 1],
            ['title' => 'Social Media Intern', 'description' => 'Manage social media accounts...', 'positions' => 2],
        ]
    ];

    // Set the default category or retrieve it from request
    $currentCategory = 'IT'; // Or fetch from request, e.g., $currentCategory = request('category');

    // Pass the categories and currentCategory to the view
    return view('intern.program', compact('categories', 'currentCategory'));
});




// Application Page
Route::get('/application_search', function () {
    return view('intern.application_search');
});

// Register Page
Route::get('/register', function () {
    return view('intern.register'); 
});

// Login Page
Route::get('/login', function () {
    return view('intern.login');
});

Route::get('/forgot_pw', function () {
    return view('intern.forgot_pw');
});

// Internship Page 
Route::get('/internship', function () {
    $title = request('title');
    $category = request('category');
    $positions = request('positions');

    // Set the current category, or fallback if not passed
    $currentCategory = $category ?: 'IT';  // Default to 'IT' if category is not passed

    return view('intern.internship', compact('title', 'category', 'positions', 'currentCategory'));
})->name('internship');


// Application Success Page
Route::get('/application_success', function () {
    return view('intern.application_success');
});

// pending status Page
Route::get('/pending_status', function () {
    return view('intern.pending_status');
});


// request internship application Page
Route::get('/request_internship_application', function () {
    return view('intern.request_internship_application');
});

// skill test form Page
Route::get('/skill_test_form', function () {
    return view('intern.skill_test_form');
});

// powerpoint presentation form page
Route::get('/presentation_form', function () {
    return view('intern.presentation_form');
});

// intruduce yourself form page
Route::get('/introduction_video', function () {
    return view('intern.introduction_video');
});

// document checklist
Route::get('/document_checklist', function () {
    return view('intern.document_checklist');
});

// internship registration form page
Route::get('/internship_registration_form', function () {
    return view('intern.internship_registration_form');
});

// request internship application success page
Route::get('/request_internship_application_success', function () {
    return view('intern.request_internship_application_success');
});

// pending_request_internship_application page
Route::get('/pending_request_internship_application', function () {
    return view('intern.pending_request_internship_application');
});

// request internship document pending 
Route::get('/request_internship_document_pending', function () {
    return view('intern.request_internship_document_pending');
});

// request_internship_document_submission page
Route::get('/request_internship_document_submission', function () {
    return view('intern.request_internship_document_submission');
});

// document form university page
Route::get('/document_from_university', function () {
    return view('intern.document_from_university');
});

// request_internship_document_submission success
Route::get('/request_internship_document_submission_success', function () {
    return view('intern.request_internship_document_submission_success');
});

// pending acceptance terms 
Route::get('/pending_acceptance_terms', function () {
    return view('intern.pending_acceptance_terms');
});

// acceptance terms form
Route::get('/acceptance_terms_form', function () {
    return view('intern.acceptance_terms_form');
});

// acceptance terms form success
Route::get('/acceptance_terms_form_fill', function () {
    return view('intern.acceptance_terms_form_fill');
});

// acceptance terms form success
Route::get('/acceptance_terms_form_success', function () {
    return view('intern.acceptance_terms_form_success');
});

// pending success
Route::get('/pending_success', function () {
    return view('intern.pending_success');
});

// success login register after application success

Route::get('/success_login_register', function () {
    return view('intern.success_login_register');
});


// home_page_dashboard_before_approve
Route::get('/home_page_dashboard_before_approve', function () {
    return view('intern.dashboard_before_approve.home_page_dashboard_before_approve');
});

// home_page_dashboard_before_approve_program

Route::get('/home_page_dashboard_before_approve_program', function () {
    // Define your job categories here (or fetch from the database)
    $categories = [
        'IT' => [
            ['title' => 'Software Developer Intern', 'description' => 'Work on development projects...', 'positions' => 3],
            ['title' => 'Web Developer Intern', 'description' => 'Design and develop websites...', 'positions' => 2],
        ],
        'Marketing' => [
            ['title' => 'Marketing Intern', 'description' => 'Assist in marketing campaigns...', 'positions' => 1],
            ['title' => 'Social Media Intern', 'description' => 'Manage social media accounts...', 'positions' => 2],
        ]
    ];

    // Set the default category or retrieve it from request
    $currentCategory = 'IT'; // Or fetch from request, e.g., $currentCategory = request('category');

    // Pass the categories and currentCategory to the view
    return view('intern.dashboard_before_approve.home_page_dashboard_before_approve_program', compact('categories', 'currentCategory'));
});

// home_page_dashboard_before_approve_application_search
Route::get('/home_page_dashboard_before_approve_application_search', function () {
    return view('intern.dashboard_before_approve.home_page_dashboard_before_approve_application_search');
});

// home_page_dashboard_before_approve_internship

Route::get('/home_page_dashboard_before_approve_internship', function () {
    return view('intern.dashboard_before_approve.home_page_dashboard_before_approve_internship');
});

Route::get('/home_page_dashboard_before_approve_internship', function () {
    $title = request('title');
    $category = request('category');
    $positions = request('positions');

    // Set the current category, or fallback if not passed
    $currentCategory = $category ?: 'IT';  // Default to 'IT' if category is not passed

    return view('intern.dashboard_before_approve.home_page_dashboard_before_approve_internship', compact('title', 'category', 'positions', 'currentCategory'));
})->name('home_page_dashboard_before_approve_internship');


// intern pages

//hr pages
Route::prefix('hr')->group(function(){
    Route::get('/', function () {
        return view('hr.index'); 
    })->name('hr');
    
    // register 
    Route::get('/register', function () {
        return view('hr.register'); 
    })->name('hr.register');
    
    // login
    Route::get('/login', function () {
        return view('hr.login'); 
    })->name('hr.login');

    

    // assignment sheet 
    Route::get('/assignment_sheet', function () {
        return view('hr.assignment_sheet'); 
    });
    
    // calendar 
    Route::get('/calendar', function () {
        return view('hr.calendar'); 
    });
    
    // dashboard
    Route::get('/dashboard', function () {
        $hrAccount = Auth::guard('hr')->user();
        return view('hr.dashboard', [
            'hr_name' => $hrAccount->first_name . ' ' . $hrAccount->last_name,
            'hr_email' => $hrAccount->email
        ]);
    })->name('hr.dashboard')->middleware('auth:hr');
    
    // candidates 
    Route::get('/candidates', function () {
        return view('hr.candidates'); 
    });
    
    // interns
    Route::get('/interns', function () {
        return view('hr.interns'); 
    });
    
    // offboard 
    Route::get('/offboard', function () {
        return view('hr.offboard'); 
    });
    
    // payroll
    Route::get('/payroll', function () {
        return view('hr.payroll'); 
    });
    
    // program 
    Route::get('/program', function () {
        return view('hr.program'); 
    });
    
    // registration_successful 
    Route::get('/registration_successful', function () {
        return view('hr.registration_successful'); 
    });
    
    // report
    Route::get('/report', function () {
        return view('hr.report'); 
    });
    
    // storage 
    Route::get('/storage', function () {
        return view('hr.storage'); 
    });
    
    // test_forms 
    Route::get('/test_forms', function () {
        return view('hr.test_forms'); 
    });
    
    // time_attendance
    Route::get('/time_attendance', function () {
        return view('hr.time_attendance'); 
    });
    
    // hr accounts 

    Route::post('/register', [AuthController::class, 'register'])->name('register');
    
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    
    // Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('hr.dashboard');
    // Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    

});

    //hr pages

// Admin Dashboard For HR accounts


Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');  // This will load the dashboard.blade.php view from the admin folder
    })->name('admin.dashboard');
});


// Admin login page route
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');

// Admin login submit route
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');

// Admin logout route
Route::post('/admin/logout', function () {
    Auth::guard('admin')->logout();  // Log out the admin user
    request()->session()->invalidate(); // Invalidate the session
    request()->session()->regenerateToken(); // Regenerate the CSRF token to prevent session fixation attacks

    return redirect('/admin/login'); // Redirect to the login page after logout
})->name('admin.logout');
// Admin Dashboard For HR accounts


Route::get('/init-db', function() {
    try {
        Artisan::call('migrate:fresh', [
            '--seed' => true,
            '--force' => true
        ]);
        return "Database initialized successfully!";
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});