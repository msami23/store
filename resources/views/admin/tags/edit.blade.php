@extends('admin.admin')
@section('content')
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class=" col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title" style="text-align:center;">Add Tag</h4>
@if ($errors->any())
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
</div>
@endif


<form method="post" action="{{ route('tags.update', [$tag->id]) }}">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $tag->name) }}">
    </div>
    <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Update</button>
</form>

@endsection
