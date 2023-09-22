@extends('layouts.app')

@section('page-title', 'Index')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        Sei nell'index dei technologies!
                    </h1>

                    <table class="table">

                        <thead>
                
                            <tr>
                
                                <th scope="col">#</th>
                     
                                <th scope="col">
                                    Title
                                </th>
                     
                                <th scope="col">
                                    projects
                                </th>
                     
                
                        
                            </tr>
                
                        </thead>    
                
                        <tbody>
            
                            @foreach ($technologies as $technology)
                            <tr>
            
                                <th scope="row">
                                    {{$technology->id}}
                                </th>                    
                                
                                <td>
                                    {{$technology->technology_name}}
                                </td>

                                <td>
                                    
                                    @forelse ($technology->projects as $project)

                                        <a href="{{route('admin.projects.show',['project'=>$project])}}"> {{ $project->title }} </a>

                                        @if ((!$loop->last))
                                        ,

                                        @endif
                                        
                                    @empty

                                        -
                                        
                                    @endforelse 

                                </td>

                              

            

                                <td>

                                    <a href="{{route('admin.technologies.show',['technology'=>$technology])}}">
                                  
                                        <button>
                                            Show
                                        </button>

                                    </a>

                                    <a href="{{route('admin.technologies.edit',['technology'=>$technology])}}">

                                        <button>
                                            Edit
                                        </button>

                                    </a>

                                    <form onsubmit="return confirm('sei sicuro?')" action="{{route('admin.technologies.destroy',['technology'=>$technology])}}" method="POST">
                                        @csrf
                                        @method('Delete')

                                        <button technology='submit'>
                                            Delete
                                        </button>

                                    </form>
                                    
                                </td>
                                
                                
                                
                            </tr>
                            @endforeach


                                                            
                        </tbody>
            
                    </table>

                    <a href="{{route('admin.technologies.create')}}">
                    
                        <button>
                            + Nuova tecnologia 
                        </button>

                    </a>

                 
                </div>
            </div>
        </div>
    </div>
@endsection