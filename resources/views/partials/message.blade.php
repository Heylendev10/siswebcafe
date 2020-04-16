
@if ($message=Session::has('errors'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error!</strong> <br>
                <ul> <?php $errors = Session::get('errors'); ?>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif


@if ($message=Session::has('success'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <p>{{Session::get('success')}}</p>
            </div>
        </div>
    </div>
@endif

@if ($message=Session::has('error'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <p>{{Session::get('error')}}</p>
            </div>
        </div>
    </div>
@endif
