<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected $userModel;
    protected $userDepartmentModel;

    public function __construct(User $user)
    {
        $this->userModel = $user;
    }

    public function add(Request $request)
    {
        $messages = [
            'first_name.required' => 'Поле имени должно быть заполненным!',
            'first_name.max' => 'Поле имени не должно превышать 255 символов!',
            'last_name.required' => 'Поле фамилии должно быть заполненным!',
            'last_name.max' => 'Поле фамилии не должно превышать 255 символов!',
            'patronymic.max' => 'Поле отчества не должно превышать 255 символов!',
            'departments.required' => 'Вы должны выбрать хотя бы один отдел!',
        ];
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'patronymic' => 'max:255',
            'wage' => 'max:255',
            'departments' => 'required|max:255'
        ], $messages);
        if ($validator->fails()) {
            return redirect('/users')
                ->withErrors($validator)
                ->withInput();
        }

        $this->userModel->add($request->all());
        $this->userModel->departments()->sync($request->departments);

        return back();
    }

    public function edit(Request $request)
    {
        $messages = [
            'first_name.required' => 'Поле имени должно быть заполненным!',
            'first_name.max' => 'Поле имени не должно превышать 255 символов!',
            'last_name.required' => 'Поле фамилии должно быть заполненным!',
            'last_name.max' => 'Поле фамилии не должно превышать 255 символов!',
            'patronymic.max' => 'Поле отчества не должно превышать 255 символов!',
            'departments.required' => 'Вы должны выбрать хотя бы один отдел!',
        ];
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'patronymic' => 'max:255',
            'wage' => 'max:255',
            'departments' => 'required|max:255'
        ], $messages);
        if ($validator->fails()) {
            return redirect('/user-edit/'.$request->id)
                ->withErrors($validator)
                ->withInput();
        }

        $user = $this->userModel->edit($request->all());
        $user->departments()->sync($request->departments);

        return back();
    }

    public function delete(User $user)
    {
        $user->departments()->detach();
        $user->delete();

        return back();
    }
}
