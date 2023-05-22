@if ($alertFm = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $alertFm }}</strong>
    </div>
@endif
