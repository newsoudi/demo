use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TeamGroupController;
use App\Http\Controllers\TeamMemberController;

Route::get('/', function () {
    return view('welcome');
});

// Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Team Groups
Route::prefix('team-groups')->group(function () {
    Route::get('/', [TeamGroupController::class, 'index'])->name('team-groups.index');
    Route::get('create', [TeamGroupController::class, 'create'])->name('team-groups.create');
    Route::post('store', [TeamGroupController::class, 'store'])->name('team-groups.store');
});

// Team Members - Resource
Route::resource('team-members', TeamMemberController::class);
