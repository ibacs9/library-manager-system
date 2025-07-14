<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class AuthService
{
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function register(array $data)
    {

        $user = $this->userRepo->create($data);
        return $user->createToken('auth_token')->plainTextToken;
    }

    public function login(array $credentials)
    {
        try {
            if (!Auth::attempt($credentials)) {


                throw ValidationException::withMessages([
                    'email' => ['Hibás bejelentkezési adatok'],
                ]);
            }



            $user = $this->userRepo->findByEmail($credentials['email']);

            return $user;

        } catch (ValidationException $e) {

            throw $e;
        } catch (\Exception $e) {

            throw new \Exception('Valami hiba történt a bejelentkezés során.');
        }
    }


    public function logout()
    {


        $user = Auth::guard('web')->user();

        if ($user) {
            $user->tokens()->delete();
        }

        Auth::guard('web')->logout();

        session()->invalidate();
        session()->regenerateToken();


    }
}
