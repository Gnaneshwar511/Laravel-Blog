<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use DB;

class PagesController extends Controller
{
    public function contact() {
        $people = [
            'Taylor Swift', 'Dwayne Johnson'
        ];

        return view('pages.contact', compact('people'));
    }

    public function index() {
        return view('welcome');
    }

    public function about() {
        $first = '1st';
        return view('pages.about', compact('first'));
    }

/*    public function usersList() {
        $users = User::all();
        return view('pages.users', compact('users'));
    }*/

    public function revertAdminStatus($id, $change) {
        $user = User::findOrFail($id);
        $user->admin = $change;
        $user->update();
        return redirect('admin');
    }
}