@extends('layouts.app')
@section('title', 'Todo - ' . $id->id)

@section('content')
    <div class="container">
        <h1 class="mt-5 text-center">{{ $id->title }}</h1>
        <div class="row pt-5 justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span>Details</span>
                        <span class="badge bg-warning text-dark float-right">
                            {{ boolval($id->completed) ? 'Completed' : 'Non Completed' }}
                        </span>
                    </div>
                    <div class="card-body">
                        {{ $id->description }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
