<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function generate_key() {
        $id = Auth::id();
        $user = User::find($id);
        $token = $user->createToken('personal-token')->accessToken;
        return view('home', ['token' => $token]);
    }

    public function reveal_tokens(){
        
    }
}
