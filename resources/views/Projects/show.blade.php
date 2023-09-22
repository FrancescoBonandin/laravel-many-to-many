@extends('layouts.app')

@section('page-title', 'Show')

@section('main-content')
    <div class="row">
        <div class="col">

            <h1 class="text-center text-success">
                Sei nello Show di {{$project->title}}!
            </h1>

            <div class="card">
                <div class="card-body">

                    <div>
                        Title:{{$project->title}}
                    </div>

                    <div>
                        Slug:{{$project->slug}}
                    </div>

                    <div>
                        Description:{{$project->description}}
                    </div>

                    <div>
                        type:
                        <a href="{{route('admin.types.show',['type'=>$project->type])}}">{{$project->type->type_name}}</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection