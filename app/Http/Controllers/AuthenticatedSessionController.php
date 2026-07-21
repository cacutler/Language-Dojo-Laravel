<?php
namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;
class AuthenticatedSessionController extends Controller {
    /**
     * Show the login form.
     */
    public function create() {
        return view('auth.login');
    }
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request) {
        $request->authenticate();
        if ($request->expectsJson()) {
            $token = $request->user()->createToken('api')->plainTextToken;
            return response()->json(['user' => $request->user(), 'token' => $token]);
        }
        $request->session()->regenerate();
        return redirect()->intended(route('index'));
    }
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request) {
        if ($request->expectsJson()) {
            $token = $request->user()->currentAccessToken();
            if ($token instanceof PersonalAccessToken) {
                $token->delete();
            }
            return response()->noContent();
        }
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index');
    }
}
