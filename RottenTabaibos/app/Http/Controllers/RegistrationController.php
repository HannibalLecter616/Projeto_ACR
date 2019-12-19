<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
public function create()
{
return view('registration.create');     
}

public function store()
{
    $this->validate(request(), [
    'name' => 'required',
    'email' => 'required|email',
    'password' => 'required',
   /* 'type' => 'required',*/
    ]);

    $user = User::create(request(['name', 'email', 'password'/*,'type'*/ ]));

    auth()->login($user);

    return redirect()->to('/welcome');
}
}
