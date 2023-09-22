@extends('layouts.app')

@section('page-title', 'create technology record')

@section('main-content')

<div class="container">
    <div class="row">
       
        <div class="col bg-dark text-white py-4">

            @if ($errors->any())

                <div class='alert alert-danger mb-4'>

                    <ul>

                        @foreach ($errors->all() as $error)
                            <li>
                                {{$error}}
                            </li>
                        @endforeach

                    </ul>

                </div>
                
            @endif

            <form action="{{ route('admin.technologies.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="technology_name" class="form-label">nome della tecnologia</label>
                    <input technology="text" maxlength="1024" class="form-control @error('technology_name') is-invalid @enderror"  id="technology_name" name="technology_name" value='{{old('technology_name')}}' placeholder="Enter value..." required>
                </div>

                @error('technology_name')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                @enderror

                <div>
                    <button technology="submit" class="btn btn-success w-100">
                        + Aggiungi
                    </button>
                </div>
            </form>
        </div>
        
    </div>
</div>

@endsection