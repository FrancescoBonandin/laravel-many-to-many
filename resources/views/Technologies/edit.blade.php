@extends('layouts.app')

@section('page-title', 'edit')

@section('main-content')

<div class="container">
    <div class="row">
       
        <div class="col bg-dark text-white py-4">

            <h1>
                sei nella sezione edit di {{$technology->technology_name}}!!!!
            </h1>

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

            <form action="{{ route('admin.technologies.update', ['technology'=>$technology]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="technology_name" class="form-label">technology_name</label>
                    <input technology="text" maxlength="1024" class="form-control @error('technology_name') is-invalid @enderror"  id="technology_name" name="technology_name" value='{{old('technology_name',$technology->technology_name)}}' placeholder="Enter value..." required>
                </div>

                @error('title')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                @enderror

                <div>
                    <button technology="submit" class="btn btn-success w-100">
                        + Modifica
                    </button>
                </div>
            </form>
        </div>
        
    </div>
</div>

@endsection