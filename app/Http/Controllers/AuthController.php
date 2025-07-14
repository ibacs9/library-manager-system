<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(Request $request)
    {
        try {

            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:3'
            ]);


            $token = $this->authService->register($validated);


            return redirect()->route('home')->with('success', 'Sikeres regisztráció!');
        } catch (ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Váratlan hiba történt: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function login(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $this->authService->login($validated);

        $request->session()->regenerate();

        return redirect()->route('home')->with('success', 'Sikeres bejelentkezés!');

    }


    public function logout()
    {
        try {
            $this->authService->logout();
            return redirect()->route('home')->with('error', 'Sikeres Kijelentkezve!');
        } catch (ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Váratlan hiba történt: ' . $e->getMessage())
                ->withInput();
        }



    }
}
