<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Users extends Model
{
    private $name;
    private $email;
    private $password;
    private $phone;
    private $address;
    private $role;

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'phone', 'address', 'role'];

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function setPassWord($password)
    {
        $this->password = $password;
        return $this;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }

    public function makeObjFromRequest(Request $request)
    {
        $this
            ->setName($request->name)
            ->setEmail($request->email)
            ->setPhone($request->phone)
            ->setAddress($request->address)
            ->setRole($request->role);

        return $this;
    }
}
