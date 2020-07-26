@extends('admin.admin')
@section('content')
@section('title','Categories')

<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class=" col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title" style="text-align:center;" >{{__('Create Categories')}} </h4>
					<!-- /.box-title -->
					<div class="card-content">
                        <form method ="post" action="{{ route('categories.store')}}">
                            @csrf
							<div class="form-group">
								<label for="name">{{ __('Name')}}</label>
                                <input type="text" name = "name" class="form-control @error('name')is-invalid @enderror" id="name" value="{{old('name')}}">
                                @if($errors->has('name'))
                                <p class="text-danger">{{ implode (',', $errors->get('name'))}}</p><!--تقوم بعرض جميع الاخطاء -->
                                @endif
							</div>
							<div class="form-group">
								<label for="description">Description</label>
                                <textarea  name="description" class="form-control @error('description')is-invalid @enderror"  id="description">{{old('description')}}</textarea>
                                @error('description')
                                <p class="text-danger">{{$message}}</p>

                                @enderror
                            	</div>
                                <div class="form-group">
                                    <label for="parent_id">Category Parent</label>
                                       <select id="parent_id" name="parent_id" class="form-control @error('parent_id') is-invalid @enderror">

                                             <option value="">No select parent</option>
                                             <
                                             @foreach(App\Category::all() as $cat)
                                           <option value ="{{$cat->id }}"@if(old('parent_id')== $cat->id)selected @endif >{{ $cat->name }}</option>
                                         @endforeach

                                       </select>
                                       @error('parent_id')
                                       <p class="text-danger">{{$message}}</p>

                                       @enderror
                             </div>

							<button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Create</button>
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














