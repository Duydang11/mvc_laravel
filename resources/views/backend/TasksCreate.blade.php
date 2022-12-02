<h1>Create task</h1>
@extends("backend.Layout")
@section("do-du-lieu-vao-layout")
<form method='post' action='#'>
@csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" placeholder="Enter a title" name="title">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" placeholder="Enter a description" name="description">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection