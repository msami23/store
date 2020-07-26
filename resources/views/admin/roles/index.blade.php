@extends('admin.admin')
@section('content')
@section('title','Roles')
<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class=" col-xs-12">
                <div class="box-content card white">
                    <h4 class="box-title" style="text-align:center;" >Roles  </h4>


                    <a class="btn btn-primary waves-effect waves-ligh" href="{{ route('roles.create')}}"> Create Category </a>

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
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($roles as $role)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $role->id }}</td>
                                <td><a href="{{ route('roles.edit', [$role->id]) }}">{{ $role->name }}</a></td>
                                <td>
                                    <div class="col-xs-12 ">
                                        <button>  <a href="{{ route('roles.edit', [$role->id]) }}" class="btn btn-primary btn-sm waves-effect waves-light">Edit</a>
                                            <form method="post" action="{{ route('roles.destroy', [$role->id]) }}" class="form-inline d-inline"></button>
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm waves-effect waves-light">Delete</button>
                                        </form>

                                    </div>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style=color:red>No Roles Found!</td>
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














