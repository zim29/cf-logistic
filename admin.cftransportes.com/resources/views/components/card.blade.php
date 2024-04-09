<div class="card custom-card">
    @if($title)
        <div class="card-header justify-content-between">
            <div class="card-title"> {{ __($title) }} </div> 
        </div>
    @endif
        <div class="card-body">
            {{ $slot }}
        </div>
    </div>