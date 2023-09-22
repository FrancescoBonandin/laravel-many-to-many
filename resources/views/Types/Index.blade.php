@extends('layouts.app')

@section('page-title', 'Index')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        Sei nell'index dei types!
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
            
                            @foreach ($types as $type)
                            <tr>
            
                                <th scope="row">
                                    {{$type->id}}
                                </th>                    
                                
                                <td>
                                    {{$type->type_name}}
                                </td>

                                <td>
                                    
                                    @forelse ($type->projects as $project)

                                        <a href="{{route('admin.projects.show',['project'=>$project])}}"> {{ $project->title }} </a>

                                        @if ((!$loop->last))
                                        ,

                                        @endif
                                        
                                    @empty

                                        -
                                        
                                    @endforelse 

                                </td>

                              

            

                                <td>

                                    <a href="{{route('admin.types.show',['type'=>$type])}}">
                                  
                                        <button>
                                            Show
                                        </button>

                                    </a>

                                    <a href="{{route('admin.types.edit',['type'=>$type])}}">

                                        <button>
                                            Edit
                                        </button>

                                    </a>

                                    <form onsubmit="return confirm('sei sicuro?')" action="{{route('admin.types.destroy',['type'=>$type])}}" method="POST">
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

                    <a href="{{route('admin.types.create')}}">
                    
                        <button>
                            + Nuovo Tipo
                        </button>

                    </a>

                 
                </div>
            </div>
        </div>
    </div>
@endsection