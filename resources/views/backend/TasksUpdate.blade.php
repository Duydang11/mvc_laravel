@extends("backend.Layout")
@section("do-du-lieu-vao-layout")
<h1>Edit task</h1>

<form method='post' action='#' enctype = "multipart/form-data">
@csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" placeholder="Enter a title" name="title" value ="{{ isset($record->title)?$record->title:'' }}" >
        @error('title')
        <span style="color:red;">{{$message}}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" placeholder="Enter a description" name="description" value ="{{ isset($record->description)?$record->description:'' }}">
        @error('description')
        <span style="color:red;">{{$message}}</span>
        @enderror
    </div>
     <!-- row -->
			<!-- <div class="row" style="margin-top:5px;">
				<div class="col-md-3">Ảnh</div>
				<div class="col-md-9">
					<input type="file" name="photo">
				</div>
			</div> -->
            <div class="form-group">
                            <label class="col-md-3 col-sm-4 control-label">Ảnh </label>
                            <div class="col-md-9 col-sm-8">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <img id="mat_truoc_preview" src="{{ $record->photo? asset('upload/news/'.$record->photo):'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg' }}" alt="your image"
                                             style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                                        <input type="file" name="photo" accept="image/*"
                                               class="form-control-file @error('photo') is-invalid @enderror" id="cmt_truoc">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
           
			<!-- end row -->
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<script>
        $(function(){
            function readURL(input, selector) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();

                    reader.onload = function (e) {
                        $(selector).attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#cmt_truoc").change(function () {
                readURL(this, '#mat_truoc_preview');
            });

        });
    </script>

@endsection