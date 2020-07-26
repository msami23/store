@extends('admin.admin')
@section('content')
@section('title','Categories')
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class=" col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title" style="text-align:center;" >Categories  @if($parent) : <small class="text-primary"> {{ $parent->name }}</small> @endif</h4>


                       <a class="btn btn-primary waves-effect waves-ligh" href="{{ route('categories.create')}}"> Create Category </a>

                </header>
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif
                <table class="table table-striped ">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Parent</th>
                        <th scope="col">Date</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $cat)

                      <tr>
                        <td>{{ $loop->iteration }}</td>
            <td>{{ $cat->id }}</td>
            <td><a href="{{ route('categories.clothes', [$cat->id]) }}">{{ $cat->name }}</a></td>
            <td>{{ $cat->parent->name }}</td>
            <td>{{ $cat->created_at }}</td>
            <td>
                @can('update',$cat)
                <div class="col-xs-12 ">
                    <button>  <a href="{{ route('categories.edit', [$cat->id]) }}" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a>
                        @endcan
                        @can('delete',$cat)
                    <form method="post" action="{{ route('categories.delete', [$cat->id]) }}" class="form-inline d-inline"></button>
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm waves-effect waves-light " >Delete</button>
                    </form>
                    @endcan

                </div>

            </td>
                      </tr>
                      @empty
                      <tr>
                        <td colspan="5" style=color:red>No Categories Found!</td>
                    </tr>
                    @endforelse
                    </tbody>
                  </table>
                </div>

					</div>

				</div>

			</div>

                  <br><br><br><br><br><br><br><br><br>
        <footer class="footer">
            <ul class="list-inline">
                <li>2020 © Mohammed Sami</li>

            </ul>
        </footer>

			</div>

		</div>




@endsection














