@extends("backend.Layout")
@section("do-du-lieu-vao-layout")
<h1>Edit task</h1>

<form method='post' action='#'>
@csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" placeholder="Enter a title" name="title" value ="{{ isset($record->title)?$record->title:'' }}">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" placeholder="Enter a description" name="description" value ="{{ isset($record->description)?$record->description:'' }}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection