@extends('layouts.app')

@section('page-title', "Show {{$technology->technology_name}} ")

@section('main-content')
    <div class="row">
        <div class="col">

            <h1 class="text-center text-success">
                Sei nello Show di {{$technology->technology_name}}!
            </h1>

            <div class="card">

                <div class="card-body">

                    <div>
                        id:{{$technology->id}}
                    </div>

                    <div>
                        Title:{{$technology->technology_name}}
                    </div>

                    <div>
                        projects:
                        
                        @forelse ($technology->projects as $project)

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