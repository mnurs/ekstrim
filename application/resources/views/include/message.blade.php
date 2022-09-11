<div class="col-md-12">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ __(session('success')) }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="ik ik-x"></i>
        </button>
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ __(session('error')) }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="ik ik-x"></i>
        </button>
    </div>
    @endif
</div>

@if ($errors->any())
    <div class="col-md-12">
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ __($error) }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="ik ik-x"></i>
                </button>
            </div>
        @endforeach
    </div>
@endif