<?php

namespace App\Http\Controllers;

use App\Departments;
use App\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $user;
    protected $departments;

    public function __construct(User $user, Departments $departments)
    {
        $this->user = $user;
        $this->departments = $departments;
    }

    public function index()
    {
        return view('pages.home', [
            'title' => 'home page',
            'users' => $this->user->all(),
            'departments' => $this->departments->all()
        ]);
    }

    public function users()
    {
        return view('pages.users', [
            'title' => 'users page',
            'users' => $this->user->all(),
            'departments' => $this->departments->all()
        ]);
    }

    public function userEdit(User $user)
    {
        return view('pages.user_edit', [
            'title' => 'user-edit page',
            'user' => $user,
            'departments' => $this->departments->all()
        ]);
    }

    public function departments(Request $request)
    {
        if ($request->session()->get('customException'))
        {
            $data['customException'] = $request->session()->get('customException');
            $request->session()->forget('customException');
        }

        $data['title'] = 'departments page';
        $data['departments'] = $this->departments->all();

        return view('pages.departments', $data);
    }

    public function departmentEdit(Departments $departments)
    {
        return view('pages.department_edit', [
            'id' => $departments->id,
            'title' => $departments->title
        ]);
    }
}
