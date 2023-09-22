@extends('layouts.app')

@section('page-title', "Show {{$type->type_name}} ")

@section('main-content')
    <div class="row">
        <div class="col">

            <h1 class="text-center text-success">
                Sei nello Show di {{$type->type_name}}!
            </h1>

            <div class="card">

                <div class="card-body">

                    <div>
                        id:{{$type->id}}
                    </div>

                    <div>
                        Title:{{$type->type_name}}
                    </div>

                    <div>
                        projects:
                        
                        @forelse ($type->projects as $project)

                        <a href="{{route('admin.projects.show',['project'=>$project])}}"> {{ $project->title }} </a>

                        @if ((!$loop->last))
                        , 

                        @endif
                        
                    @empty

                        -
                        
                    @endforelse 

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection