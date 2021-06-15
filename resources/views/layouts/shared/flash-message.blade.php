@if (session('success'))
    <div class="alert alert-success">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        <strong>{{ session('error') }}</strong>
        <button type="button" class="close" data-dismiss="alert">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-warning">
        <strong>{{ session('warning') }}</strong>
        <button type="button" class="close" data-dismiss="alert">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('info'))
    <div class="alert alert-info">
        <strong>{{ session('info') }}</strong>
        <button type="button" class="close" data-dismiss="alert">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('status'))
<div class="alert alert-danger">
    <strong>{{ session('status') }}</strong>
    <button type="button" class="close" data-dismiss="alert">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>	
    <strong>Ocorreu um erro em sua requisição!</strong>	
</div>
@endif
