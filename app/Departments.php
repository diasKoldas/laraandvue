<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function add($data)
    {
        $this->title = $data['title'];
        $this->save();
    }

    public function edit($data)
    {
        $department = Departments::find($data['id']);

        $department->title = $data['title'];
        $department->save();
    }
}
