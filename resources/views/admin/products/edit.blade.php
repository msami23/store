@extends('admin.admin')
@section('css')
    <!-- TinyMCE -->
	<link rel="stylesheet" href="{{asset('admin/plugin/tinymce/skins/lightgray/skin.min.css')}}">
	<!-- Must include this script FIRST -->
	<script src="{{asset('admin/plugin/tinymce/tinymce.min.js')}}"></script>
@endsection
@section('content')
@section('title','Categories')
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class=" col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title" style="text-align:center;">Products</h4>
					<!-- /.box-title -->
					<div class="card-content">
                        <form method ="post" action="{{ route('products.update',[$product->id])}}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
							<div class="form-group">
								<label for="name">Name</label>
                                <input type="text" name = "name" class="form-control @error('name')is-invalid @enderror" id="name" value="{{old('name',$product->name)}}">
                                @error('name')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
							</div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                    <textarea  name="description" class="form-control @error('description')is-invalid @enderror" id="tinymce">{{ old('description',$product->description)}}</textarea>
                                    @error('description')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                           </div>
                           <div class="form-group">
                                 <label for="category_id">category</label>
                                    <select name="category_id" id="category_id" class="form-control @error('category_id')is-invalid @enderror">

                                          <option value="" >No select category</option>
                                          @foreach(App\Category::all() as $pro)
                                        <option value ="{{$pro->id }}"
                                        @if ($pro ->id == old('category_id',$product->category_id))selected
                                        @endif>
                                        {{ $pro->name }}</option>
                                       @endforeach

                                    </select>
                                    @error('category_id')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror

                          </div>
                          <div class="form-group">
                                <label for="price">Price</label>
                                    <input type="text" name="price" class="form-control @error('price')is-invalid @enderror" id="price" value="{{old('price',$product->price)}}">
                                    @if($errors->has('price'))
                                    <p class="text-danger">{{ implode (',', $errors->get('price'))}}</p>
                                    @endif
                              </div>
                              <div class="form-group">
                                <label for="image">Image</label>
                                    <input type="file" name="image" class="form-control @error('image')is-invalid @enderror" id="image" >
                                   @if($product->image)
                                    <img src="{{asset('storage/'.$product->image)}}"width="100" >
                                   @endif
                                    @if($errors->has('image'))
                                    <p class="text-danger">{{ implode (',', $errors->get('image'))}}</p>
                                    @endif
                              </div>

							<button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Update</button>
						</form>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-6 col-xs-12 -->
			<!-- /.col-lg-6 col-xs-12 -->
		</div>
		<!-- /.row -->

		<!-- /.row small-spacing -->
		      <br><br><br><br><br><br><br><br><br>
		<footer class="footer">
			<ul class="list-inline">
				<li>2020 © Mohammed Sami</li>

			</ul>
        </footer>
	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->

@endsection
@section('js')

	<!-- TinyMCE -->
	<!-- Plugin Files DON'T INCLUDES THESES FILES IF YOU USE IN THE HOST -->
	<link rel="stylesheet" href="{{asset('admin/plugin/tinymce/skins/lightgray/skin.min.css')}}">
	<script src="{{asset('admin/plugin/tinymce/plugins/advlist/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/anchor/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/autolink/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/autoresize/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/autosave/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/bbcode/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/charmap/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/code/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/codesample/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/colorpicker/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/contextmenu/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/directionality/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/emoticons/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/example/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/example_dependency/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/fullpage/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/fullscreen/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/hr/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/image/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/imagetools/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/importcss/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/insertdatetime/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/layer/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/legacyoutput/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/link/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/lists/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/media/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/nonbreaking/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/noneditable/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/pagebreak/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/paste/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/preview/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/print/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/save/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/searchreplace/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/spellchecker/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/tabfocus/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/table/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/template/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/textcolor/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/textpattern/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/visualblocks/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/visualchars/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/plugins/wordcount/plugin.min.js')}} "></script>
	<script src="{{asset('admin/plugin/tinymce/themes/modern/theme.min.js')}}"></script>
	<!-- Plugin Files DON'T INCLUDES THESES FILES IF YOU USE IN THE HOST -->

    <script src="{{asset('admin/scripts/tinymce.init.min.js')}}"></script>
@endsection














