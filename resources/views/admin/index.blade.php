@extends('admin.master')

@section('main-content')

{{-- need to pass name of the resource --}}
<h1 class="table-title">{{ ucfirst($modelName) }}</h1>

{{-- need to pass link to resource --}}
<a class="action-link" href="{{ $createLink }}"> 
    <i class="fa fa-plus" aria-hidden="true"></i> Add
</a> 


<table class="admin-table">

    <thead class="admin-table__header">

        <tr class="admin-table__row">
            <th class="admin-table__head">Id</th>

            @foreach ($modelColumns as $column)
                <th class="admin-table__head">{{ ucfirst($column) }}</th>
            @endforeach
            
            {{-- required for all models --}}
            <th class="admin-table__head">Actions</th>
        </tr>
    </thead>



    <tbody>

        @foreach ($records as $item )

            
            <tr class="admin-table__row">

                <td class="admin-table__data" id="first-column">{{ $item->id }}</td>

                @foreach($modelColumns as $column)
                    <td class="admin-table__data">{{ $item[$column] }}</td>
                @endforeach

                
                <td class="admin-table__data action-links">
                    
                    <a id="show-link" href="{{ $basePath }}/{{ $item->id }}"> 
                        <i class="fa fa-eye" aria-hidden="true"></i> View 
                    </a>


                    <a id="edit-link" href="{{ $basePath }}/{{ $item->id }}/edit"> 
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Edit 
                    </a>

                    {{-- need to pass link --}}
                    <form action="{{ $basePath }}/{{ $item->id }}"  method="POST" class="delete-link">
                        @csrf
                        @method('DELETE')
                        <button type="submit"> 
                            <i class="fa fa-trash" aria-hidden="true"></i> Delete 
                        </button>
                    </form>
                        
                </td>
                
            </tr>


        @endforeach


    </tbody>


</table>

<div id="pagination-container">

    {{ $records->links() }}

</div>

@endsection