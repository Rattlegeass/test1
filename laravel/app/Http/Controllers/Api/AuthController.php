<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenExpiredException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenInvalidException;

class AuthController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|confirmed'
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create user
        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'role_id'   => 2,
        ]);

        //return response JSON user is created
        if($user) {
            return response()->json([
                'success' => true,
                'message' => 'Registrasi Berhasil!',
                'user'    => $user,  
            ], 201);
        }

        //return JSON process insert failed 
        return response()->json([
            'success' => false,
            'message' => 'Registrasi Gagal!'
        ], 409);
    }

    public function login(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'email'     => 'required',
            'password'  => 'required'
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Mendapatkan kredensial dari request
        $credentials = $request->only('email', 'password');

        try {
            // Mencoba untuk melakukan otentikasi
            if (!$token = auth()->guard('api')->attempt($credentials)) {
                // Jika otentikasi gagal
                return response()->json([
                    'success' => false,
                    'message' => 'Email Atau Password Anda Salah!'
                ], 401);
            }
        } catch (JWTException $e) {
            // Jika pembuatan token gagal
            return response()->json([
                'success' => false,
                'message' => 'Gagal membuat token.'
            ], 500);
        }

        // Jika otentikasi berhasil, mengambil pengguna yang diautentikasi
        $user = auth()->guard('api')->user();
        // Membuat kata sambutan
        $sambutan = 'Selamat Datang, ' . $user->name . '!';

        if ($user->role_id === 1) {
            // Jika role_id adalah 1
            return response()->json([
                'success' => true,
                'message' => $sambutan,
                'user'    => $user,
                'token'   => $token,
            ], 200);
        } elseif ($user->role_id === 2) {
            // Jika role_id adalah 2
            return response()->json([
                'success' => true,
                'message' => $sambutan,
                'user'    => $user,
                'token'   => $token,
            ], 200);
        }
    }

    // Metode untuk mendapatkan informasi pengguna yang terautentikasi
    public function user(Request $request)
    {
        return response()->json([
            'user' => $request->user()
        ]);
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {        
        // Menghapus token
        try {
            $removeToken = JWTAuth::invalidate(JWTAuth::getToken());

            if ($removeToken) {
                // Mengembalikan respons JSON sukses
                return response()->json([
                    'success' => true,
                    'message' => 'Logout Berhasil!',  
                ]);
            }
        } catch (JWTException $e) {
            // Jika proses logout gagal
            return response()->json([
                'success' => false,
                'message' => 'Gagal logout.'
            ], 500);
        }
    }
}