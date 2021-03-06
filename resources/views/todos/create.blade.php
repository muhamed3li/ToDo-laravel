@extends('layouts.app')

@section('title', 'Create Todo')

@section('content')

    <div class="container pt-5">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h1>create a new todo</h1>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="/create" method="POST">
                            @csrf
                            <div class="form-group">
                                <input value="{{ old('todoTitle') }}" type="text" class="form-control"
                                    placeholder="Enter todo title" name="todoTitle">
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" rows="3" placeholder="Enter description for you todo"
                                    name="todoDescription"
                                    class="@error('todoDescription') is-invalid @enderror"></textarea>
                            </div>
                            <div class="form-group text-center mt-3">
                                <button type="submit" class="btn btn-success" style="width: 40%">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
