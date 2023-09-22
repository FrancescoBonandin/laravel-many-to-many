@extends('layouts.app')

@section('page-title', 'edit')

@section('main-content')

<div class="container">
    <div class="row">
       
        <div class="col bg-dark text-white py-4">

            <h1>
                sei nella sezione edit di{{$project->title}}!!!!
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

            <form action="{{ route('admin.projects.update', ['project'=>$project]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" maxlength="1024" class="form-control @error('title') is-invalid @enderror"  id="title" name="title" value='{{old('title',$project->title)}}' placeholder="Enter value..." required>
                </div>

                @error('title')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                @enderror

                <div class="mb-3">
                    <label for="description" class="form-label">description</label>
                    <textarea  class="form-control @error('description') is-invalid @enderror"  id="description" name="description" placeholder="Enter value..." >{{old('description',$project->description)}}</textarea>
                </div>

                @error('description')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                @enderror   

                <div class="mb-3">

                    <label for="type_id" class="form-label">tipo</label>
                    <select class="form-select" id="type_id" name="type_id">
                        <option value="">Seleziona un tipo...</option>
                        @foreach ($types as $type)
                            <option
                                {{-- Il value sarà l'ID della tipo --}}
                                value="{{ $type->id }}"

                                {{-- Aggiungo l'attributo selected sulla option che era stata precedentemente selezionata --}}
                                @if (old('type_id', $type->id) == $type->id)
                                    selected
                                @endif
                                {{-- {{ old('type_id') == $type->id ? 'selected' : '' }} --}}
                                >
                                {{ $type->type_name }}
                            </option>
                        @endforeach
                    </select>
                <div>

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