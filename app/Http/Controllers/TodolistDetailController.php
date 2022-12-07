<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use App\Models\TodolistDetail;
use Illuminate\Http\Request;

class TodolistDetailController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Todolist $todolist)
    {
        return view('app-todolist.pages.todolist-detail.create', compact("todolist"));
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
            "todolist_id" => "required"
        ]);

        $data["user_id"] = auth()->user()->id;

        $saved = TodolistDetail::create($data);

        return redirect()->route("todolist.show", $saved->todolist_id)->with("success", "Data has been created!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TodolistDetail  $todolistDetail
     * @return \Illuminate\Http\Response
     */
    public function show(TodolistDetail $todolistDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TodolistDetail  $todolistDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(TodolistDetail $todolistDetail)
    {
        return view('app-todolist.pages.todolist-detail.edit', compact("todolistDetail"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TodolistDetail  $todolistDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TodolistDetail $todolistDetail)
    {
        $data = $request->validate([
            "name" => "required|max:100",
        ]);

        $data["user_id"] = auth()->user()->id;
        $todolistID = $todolistDetail->todolist_id;
        $todolistDetail->update($data);

        return redirect()->route("todolist.show", $todolistID)->with("success", "Data has been updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TodolistDetail  $todolistDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(TodolistDetail $todolistDetail)
    {
        $todolistID = $todolistDetail->todolist_id;
        $todolistDetail->delete();

        return redirect()->route("todolist.show", $todolistID)->with("success", "Data has been Deleted!");
    }
}
