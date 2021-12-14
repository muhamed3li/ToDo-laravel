@extends('layouts.app')
@section('title', 'All Todos')

@section('content')

    <div class="container">
        <div class="row pt-5 justify-content-center">
            <div class="card" style="width: 50%">
                <div class="card-header text-center">
                    <h1>All Todos</h1>
                </div>
                {{-- @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                    @if (session()->has('status'))
                        <div class="alert alert-success">
                          {{session('status')}}
                        </div>
                    @endif
                <div class="card-body">
                    <ul class="list-group">
                        @forelse ($todos as $todo)
                            <li class="list-group-item text-muted">
                                {{ $todo->title }}
                                <span class="float-right">
                                    <a href="/todos/{{ $todo->id }}/delete" style="color: #f90b0b">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </span>
                                <span class="float-right mr-2">
                                    <a href="/todos/{{ $todo->id }}/edit" style="color: #1b8e1a">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </span>
                                <span class="float-right mr-2">
                                    <a href="/todos/{{ $todo->id }}" style="color: #00bcd4">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </span>
                                @if (!$todo->completed)
                                <span class="float-right mr-2">
                                  <a href="/todos/{{ $todo->id }}/complete" style="color: #fd7d06">
                                      <i class="fas fa-check-square"></i>
                                  </a>
                              </span>
                                @endif
                            </li>
                        @empty
                            <p class="text-center">No Todos</p>
                        @endforelse
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
