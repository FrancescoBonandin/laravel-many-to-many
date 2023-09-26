@extends('layouts.app')

@section('page-title', 'Index')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        Sei nell'index dei projects!
                    </h1>

                    <table class="table">

                        <thead>
                
                            <tr>
                
                                <th scope="col">#</th>
                     
                                <th scope="col">
                                    Title
                                </th>
                     
                                <th scope="col">
                                    slug
                                </th>
                     
                                <th scope="col">
                                    Description
                                </th>

                                <th scope="col">
                                    Img
                                </th>

                                <th scope="col">
                                    Type
                                </th>
                              
                                <th scope="col">
                                    Technologies
                                </th>
                
                        
                            </tr>
                
                        </thead>    
                
                        <tbody>
            
                            @foreach ($projects as $project)
                            <tr>
            
                                <th scope="row">
                                    {{$project->id}}
                                </th>                    
                                
                                <td>
                                    {{$project->title}}
                                </td>

                                <td>
                                    {{$project->slug}}
                                </td>

                                <td>
                                    {{$project->description}}
                                </td>

                                <td>
                                    @if ($project->img)
                                        Si
                                    @else
                                        No
                                    @endif
                                </td>
                               
                                <td>
                                    
                                    @if ($project->type)

                                    
                                  
                                        <a href="{{route('admin.types.show',['type'=>$project->type])}}">{{$project->type->type_name}}</a>
                                    

                                    @else
                                        -
                                    @endif   

                                </td>
                              
                                <td>
                                    @forelse ($project->technologies as $technology)

                                    <a href="{{route('admin.technologies.show',['technology'=>$technology])}}">
                                        
                                        {{$technology->technology_name}},</a>
                                        
                                    @empty
                                    -

                                    @endforelse
                             
                                </td>

                                <td>

                                    <a href="{{route('admin.projects.show',['project'=>$project])}}">
                                  
                                        <button>
                                            Show
                                        </button>

                                    </a>

                                    <a href="{{route('admin.projects.edit',['project'=>$project])}}">

                                        <button>
                                            Edit
                                        </button>

                                    </a>

                                    <form onsubmit="return confirm('sei sicuro?')" action="{{route('admin.projects.destroy',['project'=>$project])}}" method="POST">
                                        @csrf
                                        @method('Delete')

                                        <button type='submit'>
                                            Delete
                                        </button>

                                    </form>
                                    
                                </td>
                                
                                
                                
                            </tr>
                            @endforeach


                                                            
                        </tbody>
            
                    </table>

                    <a href="{{route('admin.projects.create')}}">
                    
                        <button>
                            + Nuovo Progetto
                        </button>

                    </a>

                 
                </div>
            </div>
        </div>
    </div>
@endsection