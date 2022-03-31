<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\AuthResource;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // public function register(Request $request)
    // {
    //     $fields= $request->validate([
    //         'dni'=>'required|string',
    //         'password'=>'required|string',
    //     ]);

    //     $user= User::create([
    //         'dni'=>$fields['dni'],
    //         'password'=>bcrypt($fields['password']),
    //     ]);


    // }

    public function login(Request $request)
    {
        $user = User::firstWhere('dni', $request->input('dni'));

        // if (!$user) {
        //     throw new ModelNotFound();
        // }

        if (!Hash::check($request->input('password'), $user->password)) {
            // return $this->reducePasswordAttempts($user);
            return response()->json([
                'message' => 'credenciales incorrectas'
            ], 401);
        }

        // $this->resetMaxAttempts($user);
        $token = $user->createToken($request->getClientIp())->plainTextToken;
        return (new AuthResource($user))->additional([
            'token' => $token,
            'msg' => [
                'summary' => 'Acceso correcto',
                'detail' => 'Bienvenido',
                'code' => '200'
            ]
        ]);
    }

    public function register(Request $request)
    {
        $user = new User();
        $user->dni = $request->input('dni');
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->password = bcrypt($request->input('password'));
        $user->assignRole($request->input('role'));
        $user->save();

        $token = $user->createToken($user->name)->plainTextToken;
        $detail = '';
        // if (!$user->email_verified_at) {
        //     $detail = "Revise su correo para verificar su cuenta";
        //     Mail::to($user->email)
        //         ->send(new EmailVerifiedMailable(
        //             'Verificación de Correo Electrónico',
        //             json_encode(['user' => $user]),
        //             null,
        //             $request->input('system')
        //         ));
        // }


        return (new AuthResource($user))->additional([
            'token' => $token,
            'msg' => [
                'summary' => 'Usuario registrado correctamente',
                'detail' => $detail,
                'code' => '201'
            ]
        ]);
    }

    // public function logout(Request $request)
    // {
    //     $user = User::firstWhere('dni', $request->input('user.dni'));

    //     $user->tokens()->where('token', $request->input('user.token'))->delete();

    //     return response()->json([
    //         'msg' => [
    //             'summary' => 'Logged out',
    //             'detail' => '',
    //             'code' => '200'
    //         ]
    //     ], 200);
    // }
    public function logout(Request $request)
    {
        // $user->tokens()->delete();
        $request->user()->currentAccessToken()->delete();
        // $user->tokens()->where('id', $tokenId)->delete();
        return response()->json([
            'msg' => [
                'summary' => 'Logged out',
                'detail' => '',
                'code' => '200'
            ]
        ], 200);
    }
}
