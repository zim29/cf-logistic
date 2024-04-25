@props([
    'class' => '',
])
<div class="card custom-card {{ $class }}" {{ $attributes }}>
    @if($title)
        <div class="card-header justify-content-between">
            <div class="card-title"> {{ __($title) }} </div> 
        </div>
    @endif
        <div class="card-body">
            {{ $slot }}
        </div>
    </div>