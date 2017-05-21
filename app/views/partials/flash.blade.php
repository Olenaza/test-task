<div class = "container">

    @if ($alert = Session::get('message'))

        <div class="alert alert-success">{{ $alert }}</div>

    @endif

</div>
