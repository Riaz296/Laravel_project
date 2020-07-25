@if ($errors->any())
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-lable="close">&times;</a>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(\Illuminate\Support\Facades\Session::has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

@if(\Illuminate\Support\Facades\Session::has('errors'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
