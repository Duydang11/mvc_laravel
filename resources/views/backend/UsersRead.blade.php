<!-- load file Layout.blade.php vao day -->
@extends("backend.Layout")
@section("do-du-lieu-vao-layout")
<div class="col-md-8 col-xs-offset-2 my-5">
@if (session('msg'))
    <div class="alert alert-success">{{session('msg')}}</div>
    @endif
	<div style="margin-bottom:5px;">
		<a href="{{ url('admin/users/create') }}" class="btn btn-primary">Add user</a>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">List User</div>
		<div class="panel-body">
			<table class="table table-bordered table-hover">
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th style="width:100px;"></th>
				</tr>
				@foreach($data as $rows)
				<tr>
					<td>{{ $rows->name }}</td>
					<td>{{ $rows->email }}</td>
					<td style="text-align:center;">
						<a  class='btn btn-info btn-xs' href="{{ url('admin/users/update/'.$rows->id) }}">Edit</a>&nbsp;
						<a class='btn btn-danger btn-xs' href="{{ url('admin/users/delete/'.$rows->id) }}" onclick="return window.confirm('Are you sure?');">Delete</a>
						<!-- $rows->id tac dong vao user co id tuong ung -->
					</td>
					@if(Auth::user()->level==1 )
					<td class='text-center'>
                    <form action="{{route('update_permission',$rows->id)}}" method="get">
						@if($rows->level != 1)
                        <input type="checkbox"  name="permission" value="{{$rows->level}}"{{ $rows->level == 2 ? 'checked' : ''  }} >
                    <input type="submit" value="Thay đổi">
					@else
					<p>Super admin</p>
					@endif
                    </form>
					@endif
                    
                </td>
				</tr>
				@endforeach
			</table>
			<style type="text/css">
				.pagination{padding:0px; margin:0px;}
			</style>
						

						

		</div>
		
	</div>

</div>
@endsection