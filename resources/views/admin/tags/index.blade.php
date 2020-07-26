@extends('admin.admin')
@section('content')
@section('title','Products')
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class=" col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title" style="text-align:center;">Tags </h4>


                     <a class="btn btn-primary waves-effect waves-ligh" href="{{ route('tags.create') }}"> Create Tag </a>

                </header>
@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Date</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @forelse($tags as $tag)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $tag->id }}</td>
            <td>{{ $tag->name }}</td>
            <td>{{ $tag->created_at }}</td>
            <td>
                <div class="col-xs-12 ">
                    <button> <a href="{{ route('tags.edit', [$tag->id]) }}" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a>
                <form method="post" action="{{ route('tags.destroy', [$tag->id]) }}" class="form-inline d-inline"></button>
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm waves-effect waves-light">Delete</button>
                </form>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">No tags found!</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
