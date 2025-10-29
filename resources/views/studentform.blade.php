@extends('app')

@section('content')
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="shadow bg-body-tertiary rounded p-4" style="width: 30%">
            <form method="POST" action="{{ route('delete.student') }}">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Student Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputNim" class="form-label">Nim</label>
                    <input type="text" class="form-control" name="nim">
                </div>
                <button type="submit" class="btn btn-success">process</button>
            </form>
        </div>
    </div>
@endsection
