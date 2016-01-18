<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Hash;
use Input;
use Route;
use Session;
use Datetime;
use Redirect;
use App\Models\User;
use App\Models\Menu;
use App\Http\Requests;
use App\Http\UpdateRequest;
use Illuminate\Http\Request;
use App\Commands\CreateUserCommand;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\RegisterRequest;
use app\Jobs\updateUserJob;
class UserController extends GlobalController
{
    public function showLogIn()
    {
        return View('Runningshoes/pages/User')->with(array(
            'token' => $this->getToken(),
            ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $tokenDB;
    private function getToken(){    
        Route::get('someRoute', array('uses' => 'HomeController@getSomeRoute', 'middleware' => 'csrf'));
        $getToken = $this->fetchTable(DB::table('users')->get(array('remember_token' =>'remember_token')));
        foreach ($getToken as $token) {
            $this->tokenDB = $token->remember_token;
        }
        return $this->tokenDB;
    }
    public function getDate()
    {
        $date = new DateTime();
        $date->format('Y-m-d H:i:s');
        return $date;
    }
    public function reguser(RegisterRequest $request)
    {
        $userR = new CreateUserCommand($request->Reg_username, Hash::make($request->Reg_password), $request->Reg_email);
        $this->dispatch($userR);
        return back()->with('RegUser', 'You Have Created A New User');
    }

    public function makeLogin(ProfileRequest $request)
    {
        $user_ids = User::where("username","=", Input::get('login_username'))->get();
        foreach ($user_ids as $user_id ) {
            $userId = $user_id->id. "<br>";
        }
        $valid = array(
        'username'     => Input::get('login_username'),
        'password'  => Input::get('login_password'),
        );
        if(Auth::attempt($valid)) {
        $setSession = Session::put([
            'username' => Input::get('login_username'),
            'password' => Input::get('login_password'),
            'user_id' => $userId,
            'token' => Input::get('_token')
        ]);
            return redirect('Runningshoes');        
        } else {
            $Session = Session::put([
                'Error' => 'Your Log in information was incorrect',
            ]);
            return redirect('Login');    
        }
    }

    public function logout()
    {
        if (Session()->has('token'))
            Session::flush();
            return redirect('/');
    }

    public function AccountView()
    {
        return View('Runningshoes.pages.Account');
    }

    public function updateAcc(UpdateRequest $request)
    {
        $updateUser = new updateUserJob($request->update_username, Hash::make($request->update_password), $request->update_email);
        $this->dispatch($updateUser);
        return back()->with('Updated', 'You have updated your login information');
    }


}
