<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\ResponseResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        try {
            $users = User::latest()->get();
            if ($users->isEmpty()) {
                return new ResponseResource(false, 'Data users tidak ditemukan', null);
            }

            return new ResponseResource(true, 'list data users', $users);

        } catch (\Exception $e) {
            Log::error('Error fetching users data: ' . $e->getMessage());
            return new ResponseResource(false, 'Failed to fetch data', null);
        }

    }

    public function show($id)
    {
        try {
            $users = User::find($id);
            if (!$users) {
                return new ResponseResource(false, 'Data users tidak ditemukan', null);
            }

            return new ResponseResource(true, 'Data user ditemukan', $users);
        } catch (\Exception $e) {
            Log::error('Error fetching users data: ' . $e->getMessage());
            return new ResponseResource(false, 'Failed to fetch data', null);
        }

    }

    public function store(UserRequest $request)
    {
        try {
            $validateUser = $request->validated();
            $users = User::create($validateUser);
            return new ResponseResource(true, 'Data user berhasil ditambahkan', $users);
        } catch (\Exception $e) {
            Log::error('Error fetching users data: ' . $e->getMessage());
            return new ResponseResource(false, 'Failed to fetch data', null);
        }

    }

    public function update(UserRequest $request, $id)
    {
        try {
            $validatedUser = $request->validated();
            $user = User::find($id);
            if (!$user) {
                return new ResponseResource(false, 'data user tidak ditemukan', null);
            }
            $user->update($validatedUser);

            return new ResponseResource(true, 'Berhasil update data user', $user);
        } catch (\Exception $e) {
            Log::error('Error fetching users data: ' . $e->getMessage());
            return new ResponseResource(false, 'Failed to fetch data', null);
        }

    }

    public function destroy($id)
    {
        try {
            $users = User::find($id);
            if (!$users) {
                return new ResponseResource(false, 'Data user tidak ditemukan', null);
            }
            $users->delete();
            return new ResponseResource(true, 'Data user berhasil dihapus', $users);
        } catch (\Exception $e) {
            Log::error('Error fetching users data: ' . $e->getMessage());
            return new ResponseResource(false, 'Failed to fetch data', null);
        }

    }

    public function login(Request $request)
    {
        try {
            $validatedUser = $request->validate([
                'username'=>'required',
                'password'=>'required'
            ]);

            $dataUser = User::firstWhere('username', $validatedUser['username']);
            if (!$dataUser) {

                return new ResponseResource(false, 'username atau password salah', null);
            }

            if (!Hash::check($validatedUser['password'], $dataUser->password)) {

                return new ResponseResource(false, 'username atau password salah', null);
            }

            return new ResponseResource(true, 'berhasil login', $dataUser);
        } catch (\Exception $e) {
            Log::error('Error fetching users data: ' . $e->getMessage());
            return new ResponseResource(false, 'Failed to fetch data', null);
        }
    }
}
