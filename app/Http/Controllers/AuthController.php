<?php
namespace App\Http\Controllers;
use App\Models\User;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\Validation\Rules\Password;
class AuthController extends Controller {
 public function registerForm(){return view('auth.register');}
 public function register(Request $r){$d=$r->validate(['name'=>'required|max:120','email'=>'required|email|unique:users','phone'=>'required|max:30','address'=>'required','password'=>['required','confirmed',Password::min(8)]]);$u=User::create($d);Auth::login($u);$r->session()->regenerate();return redirect()->route('home');}
 public function loginForm(){return view('auth.login');}
 public function login(Request $r){$d=$r->validate(['email'=>'required|email','password'=>'required']);if(!Auth::attempt($d))return back()->withErrors(['email'=>'Email atau password salah.']);$r->session()->regenerate();return redirect()->intended('/');}
 public function logout(Request $r){Auth::logout();$r->session()->invalidate();$r->session()->regenerateToken();return redirect('/');}
}