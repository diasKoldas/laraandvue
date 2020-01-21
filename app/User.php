<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function departments()
    {
        return $this->belongsToMany(Departments::class);
    }

    public function add($data)
    {
        $this->first_name = $data['first_name'];
        $this->last_name = $data['last_name'];
        $this->patronymic = $data['patronymic'];
        $this->gender = $data['gender'];
        $this->wage = $data['wage'];
        return $this->save();
    }

    public function edit($data)
    {
        $user = User::find($data['id']);

        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->patronymic = $data['patronymic'];
        $user->gender = $data['gender'];
        $user->wage = $data['wage'];
        $user->save();

        return $user;
    }
}
