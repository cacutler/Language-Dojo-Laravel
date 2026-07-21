<?php
namespace App\Http\Controllers;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
class RegisteredUserController extends Controller {
    /**
     * Show the registration form.
     */
    public function create() {
        return view('auth.register');
    }
    /**
     * Handle an incoming registration request.
     */
    public function store(RegisterRequest $request) {
        $user = User::create($request->validated());
        event(new Registered($user));
        if ($request->expectsJson()) {
            $token = $user->createToken('api')->plainTextToken;
            return response()->json(['user' => $user, 'token' => $token], Response::HTTP_CREATED);
        }
        Auth::login($user);
        return redirect()->route('index')->with('status', 'Welcome to Language Dojo!');
    }
}
