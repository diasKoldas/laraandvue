<?php

namespace App\Http\Controllers;

use App\Departments;
use App\Exceptions\CustomException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    protected $departmentsModel;

    public function __construct(Departments $departments)
    {
        $this->departmentsModel = $departments;
    }

    public function add(Request $request)
    {
        $messages = [
            'title.required' => 'Поле названия отдела должно быть заполненным!',
        ];
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
        ], $messages);
        if ($validator->fails()) {
            return redirect('/departments')
                ->withErrors($validator)
                ->withInput();
        }

        $this->departmentsModel->add($request->all());

        return back();
    }

    public function edit(Request $request)
    {
        $messages = [
            'title.required' => 'Поле названия отдела должно быть заполненным!',
        ];
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
        ], $messages);
        if ($validator->fails()) {
            return redirect('/department-edit/'. $request->id)
                ->withErrors($validator)
                ->withInput();
        }

        $this->departmentsModel->edit($request->all());

        return back();
    }

    public function delete(Request $request, Departments $departments)
    {
        try {
            if ($departments->users->count() > 0)
            {
                throw new CustomException('нельзя удалять отдел в котором есть сотрудники!');
            }
            $departments->delete();
        } catch (CustomException $e) {
            $request->session()->flash('customException', $e->getMessage());
        }


        return back();
    }
}
