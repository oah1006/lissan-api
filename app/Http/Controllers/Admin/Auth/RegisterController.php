<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\RegisterRequest;
use App\Models\Staff;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request) {
        $data = $request->validated();

        $staff = Staff::create($data);

        $staff->user()->create($data);

        return response()->json([
            'staff' => $staff
        ]);

    }
}
