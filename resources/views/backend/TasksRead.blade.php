
<!-- load file Layout.blade.php vao day -->
@extends("backend.Layout")
@section("do-du-lieu-vao-layout")
<div class="container">
<h1>Tasks</h1>
<div class="row col-md-12 centered ">
    <table class="table table-striped custab">
        <thead>
        <a href="{{ url('admin/tasks/create') }}" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new task</a>
        <tr>
            <th>STT</th>
            <th>Title</th>
            <th>Description</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        
        @foreach($data as $index => $rows)
        <tr>
            <td>{{ $index+=1 }}</td>
            <td>{{ $rows->title }}</td>
            <td>{{ $rows->description }}</td>
            <td style="text-align:center;">
                <a  class='btn btn-info btn-xs' href="{{ url('admin/tasks/update/'.$rows->id) }}">Edit</a>&nbsp;
                <a class='btn btn-danger btn-xs' href="{{ url('admin/tasks/delete/'.$rows->id) }}" onclick="return window.confirm('Are you sure?');">Delete</a>
                <!-- $rows->id tac dong vao user co id tuong ung -->
            </td>
        </tr>
        @endforeach
        
    </table>
    
    
</div>

</div>
@endsection