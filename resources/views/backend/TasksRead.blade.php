
<!-- load file Layout.blade.php vao day -->
@extends("backend.Layout")
@section("do-du-lieu-vao-layout")
<div class="container">
<form action="{{ route('search') }}" method="get">
        <input type="text" name="search">
        <input type="submit" value = "search" >
    </form> 

<h1>Tasks</h1>
@if (session('msg'))
    <div class="alert alert-danger">{{session('msg')}}</div>
    @endif
<div class="row col-md-12 centered alo ">
    <br>
    <table class="table table-striped custab alo2">
        <thead class="alo2">
            @if(Auth::user()->level==1 || Auth::user()->level==2)
        <a href="{{ url('admin/tasks/create') }}" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new task</a>
        @endif
        <tr>
            <th>STT</th>
            <th>Ảnh</th>
            <th>Title</th>
            <th>Description</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        @foreach($data as $index => $rows)
        <tr>
            <td>{{ $index+=1 }}</td>
            <td style="text-align:center;">
                         <!-- ($rows->photo > 0) -->
						@if($rows->photo > 0)
						<img style="width:100px;height:80px;" src="{{ asset('upload/news/'.$rows->photo) }}">
						@endif
					</td>
            <td>{{ $rows->title }}</td>
            <td>{{ $rows->description }}</td>

           <td style="text-align:center;">
           @if(Auth::user()->level==1 || Auth::user()->level==2) 
           
                <a class='btn btn-info btn-xs' href="{{ url('admin/tasks/update/'.$rows->id) }}">Edit</a>&nbsp;
                <a class='btn btn-danger btn-xs' href="{{ url('admin/tasks/delete/'.$rows->id) }}" onclick="return window.confirm('Are you sure?');">Delete</a>
                <!-- <a href="" data-toggle="modal" data-target="#exampleModal" class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Delete</a> -->
                <!-- $rows->id tac dong vao user co id tuong ung -->
            
               @endif
               <!-- <div class="modal fade" style="top:35%" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn xoá không?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Xoá
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          <a href="{{ url('admin/tasks/delete/' .$rows->id) }}"><button type="button" class="btn btn-primary">Xoá</button></a>
        </div>
      </div>
    </div>
  </div> -->
            </td>
        </tr>
        @endforeach
       
    </table>
    {{$data->render()}}
    
</div>

</div>

@endsection