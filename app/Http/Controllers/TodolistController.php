<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use App\Models\TodolistDetail;
use Dentro\Yalr\Attributes\Delete;
use Illuminate\Http\Request;
use Dentro\Yalr\Attributes\Get;
use Dentro\Yalr\Attributes\Middleware;
use Dentro\Yalr\Attributes\Post;
use Dentro\Yalr\Attributes\Put;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

#[Middleware(['auth:sanctum', 'verified'])]
class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = auth()->user()->getTodolistAndTodolistItems;
        return view('app-todolist.pages.todolist.index', compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app-todolist.pages.todolist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required|max:100",
        ]);

        $data["user_id"] = auth()->user()->id;

        Todolist::create($data);

        return redirect()->route("todolist.index")->with("success", "Data has been created!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function show(Todolist $todolist)
    {
        $todolist=  $todolist->load("todolistDetail");
        return view('app-todolist.pages.todolist-detail.index', compact("todolist"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function edit(Todolist $todolist)
    {
        return view('app-todolist.pages.todolist.edit', compact("todolist"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requesttodolist
     * @param  \App\Models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todolist $todolist)
    {

        $data = $request->validate([
            "name" => "required|max:100",
        ]);

        $todolist->update($data);

        return redirect()->route("todolist.index")->with("success", "Data has been Updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todolist $todolist)
    {
        TodolistDetail::where("todolist_id", $todolist->id)->delete();
        $todolist->delete();

        return redirect()->route("todolist.index")->with("success", "Data has been Deleted!");
    }
}
