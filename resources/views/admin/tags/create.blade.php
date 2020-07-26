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

<form method="post" action="{{ route('tags.store') }}">
    @csrf
    <div class="form-group is-invalid">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}">
        @if($errors->has('name'))
        <p class="text-danger">{{ implode(', ', $errors->get('name')) }}</p>
        @endif
    </div>
    <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Create</button>
</form>

@endsection
