<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    protected $redirectTo = '/home';

    public function __construct()
    {
        // يمكنك إزالة هذا السطر لأننا بنظام يدوي
        // $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // 1) التحقق من البيانات
        $data = $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|string|email|max:255|unique:users',
            'password'              => 'required|string|min:8|confirmed',
            'phone'                 => 'nullable|string|max:20',
            'company'               => 'nullable|string|max:255',
        ]);

        // 2) إنشاء المستخدم مع الحقول الجديدة
        $user = User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
            'phone'     => $data['phone']   ?? null,
            'company'   => $data['company'] ?? null,
        ]);

        // 3) تسجيل الدخول تلقائيًا
        Auth::login($user);

        // 4) إعادة التوجيه
        return redirect($this->redirectTo)
               ->with('success', 'تم التسجيل وتسجيل الدخول بنجاح');
    }
}
