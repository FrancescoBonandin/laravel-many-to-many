@extends('layouts.app')

@section('page-title', 'edit')

@section('main-content')

<div class="container">
    <div class="row">
       
        <div class="col bg-dark text-white py-4">

            <h1>
                sei nella sezione edit di {{$type->type_name}}!!!!
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

            <form action="{{ route('admin.types.update', ['type'=>$type]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="type_name" class="form-label">type_name</label>
                    <input type="text" maxlength="1024" class="form-control @error('type_name') is-invalid @enderror"  id="type_name" name="type_name" value='{{old('type_name',$type->type_name)}}' placeholder="Enter value..." required>
                </div>

                @error('title')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                @enderror

                <div>
                    <button type="submit" class="btn btn-success w-100">
                        + Modifica
                    </button>
                </div>
            </form>
        </div>
        
    </div>
</div>

@endsection