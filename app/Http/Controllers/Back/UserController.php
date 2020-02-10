<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users=User::paginate(5);
        $count_user=User::count();
       return view('back.user.user',compact('users','count_user'));
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeRole(User $user)
    {
        if ($user->role == 1){
           $user->role =2;
           $user->save();
           return back();
        }elseif($user->role ==2 ){
            $user->role = 1;
            $user->save();
            return back();
        }
        return back();
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeStatus(User $user)
    {
        if ($user->status) {
            $user->status = 0;
            $user->save();
            return back();
        } else{
            $user->status = 1;
            $user->save();
            return back();
        }
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function deleteUser(User $user)
    {
        $user->delete();
        return back();
    }

}
