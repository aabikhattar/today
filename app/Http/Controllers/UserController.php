<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\MainUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $database_connection = config('database.default');
        config(['database.default' => 'pgsql']);
        MainUser::create([
            'email' => "gaoun12@yopmail.com",
            'password' => Hash::make('123456'),
            'table_connection' => 'DB_DATABASE_US'
        ]);

        config(['database.default' => $database_connection]);
        Person::create([
            "first_name" => "georges",
            "last_name" => 'aoun',
            "email" => "gaoun12@yopmail.com"
        ]);

    }

    public function index()
    {
        $database_connection = config('database.default');
        config(['database.default' => 'pgsql']);
        MainUser::get();
    }
}
