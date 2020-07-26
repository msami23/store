@extends('admin.admin')
@section('content')
@section('title','Products')
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class=" col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title" style="text-align:center;">Products </h4>


                     <a class="btn btn-primary waves-effect waves-ligh" href="{{ route('products.create')}}"> Create product </a>

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
                        <th scope="col">image</th>
                        <th scope="col">price</th>
                        <th scope="col">category</th>
                        <th scope="col">Date</th>

                      </tr>
                    </thead>
                    <tbody>

                        @foreach($products as $pro)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$pro->id }} </td>
                        <td>{{$pro->name}}</td>
                        <td><img src="{{asset('storage/'.$pro->image)}}"width="60" ></td>
                        <td>{{$pro->price}}</td>
                        <td>{{$pro->category->name}} </td>
                        <td>{{$pro->created_at}}</td>

            <td>

                <div class="col-xs-12 ">
                    <button>  <a href="{{ route('products.edit',[$pro->id]) }}" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a>


                    <form method="post" action="{{ route('products.delete',[$pro->id])}}" class="form-inline d-inline"></button>
                        @csrf

                        <button type="submit" class="btn btn-danger btn-sm waves-effect waves-light " >Delete</button>
                    </form>


                </div>

            </td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>

                </div>
                <form method="get" action="{{route('products')}}">
                    itmes perpage: <select name="perpage">
                     <option value = "1">1</option>
                     <option value = "2">2</option>
                     <option value = "10">10</option>
                     <option value = "all">All</option>

                     </select>
                     <button type="submit" class="btn btn-danger ">apply</button>


                     </form>
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














