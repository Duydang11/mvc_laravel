<!-- load file Layout.blade.php vao day -->
@extends("backend.Layout")
@section("do-du-lieu-vao-layout")
<div class="col-md-8 col-xs-offset-2 my-5">	
	<div class="panel panel-primary">
		<div class="panel-heading">Edit user</div>
		<div class="panel-body">
		<form method="post" action="">
		
		@csrf	
		<!-- rows -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-2">Name</div>
				<div class="col-md-10">
					<!-- neu record->name ton tai trong bo nho thi thuc hien value= record->name  -->
					<input type="text" value="{{ isset($record->name)?$record->name:'' }}" name="name" class="form-control" >
					@error('name')
        <span style="color:red;">{{$message}}</span>
        @enderror
				</div>
			</div>
			<!-- end rows -->
			<!-- rows -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-2">Email</div>
				<div class="col-md-10">
					<input  disabled value="{{ isset($record->email)?$record->email:'' }}" name="email" class="form-control" >
				</div>
				@error('email')
        <span style="color:red;">{{$message}}</span>
        @enderror
			</div>
			<!-- end rows -->
			
			
			<!-- rows -->
			<div class="row" style="margin-top:5px;">
				<div class="col-md-2"></div>
				<div class="col-md-10">
					<input type="submit" value="Process" class="btn btn-primary">
				</div>
			</div>
			<!-- end rows -->
		</form>
		</div>
	</div>
</div>