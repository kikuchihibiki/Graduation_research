<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin.admin');
    }
    public function admin_menu()
    {
        return view('admin.admin_menu');
    }
    public function admin_questionAdd()
    {
        return view('admin.admin_questionAdd');
    }
    public function admin_questionlist()
    {
        return view('admin.admin_questionlist');
    }
    public function admin_ranking()
    {
        return view('admin.admin_ranking');
    }
    public function admin_newAdmin()
    {
        return view('admin.admin_newAdmin');
    }
    public function admin_password()
    {
        return view('admin.admin_passreset');
    }
}
