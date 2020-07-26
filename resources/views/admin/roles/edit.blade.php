@extends('admin.admin')
@section('content')
@section('title','Roles')

<div id="wrapper">
    <div class="main-content">
        <div class="row small-spacing">
            <div class=" col-xs-12">
                <div class="box-content card white">
                    <h4 class="box-title" style="text-align:center;" >{{__('Edit Roles')}} </h4>
                    <!-- /.box-title -->
                    <div class="card-content">
                        <form method ="post" action="{{ route('roles.update',[$role->id])}}">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="name">{{ __('Name')}}</label>
                                <input type="text" name = "name" class="form-control"  id="name" value="{{old('name',$role->name)}}">

                            </div>
                            <div class="form-group">
                                <label for="name" style="color: #006dcc" ><h4>Permissions</h4></label>
                                <div>
                                    @foreach(config('permissions') as $code => $label)
                                        <div class="form-check">
                                            <input class="form-check-input" @if(in_array($code,$role_permissions))checked @endif type="checkbox" name="permissions[]" value="{{$code}}" id="{{$code}}">
                                            <label class="form-check-label" for="{{$code}}">
                                                {{$label}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
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
    </div>
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














