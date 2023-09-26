@extends('layouts.app')

@section('page-title', 'create project record')

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

            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" maxlength="1024" class="form-control @error('title') is-invalid @enderror"  id="title" name="title" value='{{old('title')}}' placeholder="Enter value..." required>
                </div>

                @error('title')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                @enderror

                <div class="mb-3">
                    <label for="description" class="form-label">description</label>
                    <textarea  class="form-control @error('description') is-invalid @enderror"  id="description" name="description" placeholder="Enter value..." >{{old('description')}}</textarea>
                </div>

                @error('description')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                @enderror  
                
                <div class="mb-3">
                    <label for="img" class="form-label">img</label>
                    <input type="file" accept="image/*" maxlength="1024" class="form-control @error('img') is-invalid @enderror"  id="img" name="img" value='{{old('img')}}' placeholder="Enter value..." required>
                </div>

                @error('img')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                @enderror

                <div class="mb-3">

                    <label for="type_id" class="form-label">Categoria</label>
                    <select class="form-select" id="type_id" name="type_id">
                        <option value="">Seleziona una categoria...</option>
                        @foreach ($types as $type)
                            <option
                                {{-- Il value sarà l'ID della categoria --}}
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

                    <div class="my-3">

                        <label class="form-label d-block">Technologies</label>

                        @foreach ($technologies as $technology)

                            <div class="form-check form-check-inline">

                                <input class="form-check-input" type="checkbox" name="technologies[]" id="technology-{{ $technology->id }}"value="{{ $technology->id }}"

                                    @if (
                                        in_array(
                                            $technology->id,
                                            old('technologies', [])
                                        )
                                    )
                                        checked
                                    @endif
                                    >
                                <label class="form-check-label" for="technology-{{ $technology->id }}">
                                    {{ $technology->technology_name }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                <div>
                    <button type="submit" class=" mt-4 btn btn-success w-100">
                        + Aggiungi
                    </button>
                </div>
            </form>
        </div>
        
    </div>
</div>

@endsection