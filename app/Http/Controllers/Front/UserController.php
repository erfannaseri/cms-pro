<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','checkuser'])->except('show');
    }
    public function show($name)
    {
        $user=User::find(['name'=>$name,'id'=>Auth::user()->id]);
       // return $user;
        //$user=User::where(['name'=>$name,'id'=>Auth::user()->id])->get();
        return view('front.profile.profile',compact('user'));
    }

    public function edit($name)
    {
        $member=User::find(['id'=>Auth::user()->id,'name'=>$name]);

        return view('front.profile.edit-profile',compact('member'));
    }

    public function update(UpdateUserRequest $request,User $name)
    {


        $users=User::find(['id'=>Auth::user()->id,'name'=>$name]);
        foreach ($users as $user){

            try {
                $user->name=$request->input('name');
                $user->email=$request->input('email');
                $user->password=Hash::make($request->input('password'));
                $user->save();
            } catch (Exception $exception) {
                if ($exception->getCode() == 23000){
                    return redirect()->back()->with('error-email','چنین ایمیلی قبلا ثبت گردیده است');
                }
            }

        }

        return redirect(route('user.show',Auth::user()->name))->with('success-error','بروز رسانی حساب شما با موفقیت انجام گردید');

    }
}
