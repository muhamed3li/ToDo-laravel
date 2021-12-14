<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
  public function index()
  {
    $todos = Todo::all();
    return view('todos.index', compact('todos')); // الطريقة الصحيحة
  }

  public function show($id)
  {
    return view('todos.show')->with('id', Todo::find($id));
  }

  public function create()
  {
    return view('todos.create');
  }

  public function store(Request $request)
  {
    // $request->validate([
    //   'todoTitle' => 'required|min:6',
    //   'todoDescription' => 'required',
    // ]);
    $this->validate($request, [
      'todoTitle' => 'required|min:6',
      'todoDescription' => 'required',
    ]);


    $todo = new Todo();
    $todo->title = $request->todoTitle;
    $todo->description = $request->input('todoDescription');
    $todo->save();
    $request->session()->flash('status','Todo Created successifuly');
    return redirect('todos');
  }

  public function edit($id)
  {
    $todo = Todo::find($id);
    return view('todos.edit', compact('todo'));
  }

  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'todoTitle' => 'required|min:6',
      'todoDescription' => 'required',
    ]);

    $todo = Todo::find($id);
    $todo->title = $request->todoTitle;
    $todo->description = $request->get('todoDescription');
    $todo->save();
    session()->flash('status','Todo updated successifuly');
    return redirect('todos');
  }

  public function destroy(Todo $id) // here use Route Model Binding 
  {
    // $todo = Todo::find($id);
    $id->delete();
    session()->flash('status','Todo deleted successifuly');
    return redirect('todos');
  }

  public function complete(Todo $id)
  {
    $id->completed = true;
    $id->save();
    session()->flash('status','Todo completed successifuly');
    return redirect('todos');
  }
}
