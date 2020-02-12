@if (session('success'))

<div class="alert alert-success alert-dismissible fade show   m-alert m-alert--air" role="success">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    </button>
    <strong>Succès !</strong> {{ session('success') }}.
</div>


@endif 

@if (session('error'))

<div class="alert alert-danger alert-dismissible fade show   m-alert m-alert--air" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    </button>
    <strong>Erreur !</strong> {{ session('error') }}.
</div>

@endif

@if ($errors->any())

        @foreach ($errors->all() as $error)

        <div class="alert alert-danger alert-dismissible fade show   m-alert m-alert--air" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            <strong>Alerte !</strong> {{ $error }}.
        </div>


        
        @endforeach
 
@endif