<?php

namespace Tests\Unit;

use App\Models\Todolist;
use App\Models\TodolistDetail;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Support\Str;

class TodoListTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_insert_todolist()
    {
        $rand = Str::random(6);
        $user = User::create([
            "name" => "Agus {$rand}",
            "email" => "{$rand}@gmail.com",
            "password" => bcrypt("12345678"),
        ]);

        $this->assertTrue(true,"create user completed");

        $data = [
            "name" => "Task CRUD TODOLIST",
            "user_id" => $user->id,
        ];

        $todolist = Todolist::create($data);
        $this->assertTrue(true,"create todolist completed");


        $data = [
            [
                "user_id" => $user->id,
                "todolist_id" => $todolist->id,
                "name" => "Read Data",
                "created_at" => now(),
            ],
            [
                "user_id" => $user->id,
                "todolist_id" => $todolist->id,
                "name" => "Create Data",
                "created_at" => now(),
            ], [
                "user_id" => $user->id,
                "todolist_id" => $todolist->id,
                "name" => "Update Data",
                "created_at" => now(),
            ], [
                "user_id" => $user->id,
                "todolist_id" => $todolist->id,
                "name" => "Delete Data",
                "created_at" => now(),
            ],
        ];

        TodolistDetail::insert($data);
        $this->assertTrue(true,"create todolist detail completed");
    }
}
