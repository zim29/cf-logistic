<div>
    <form 
            @if ($name) name="{{ $name }}" @endif
            @if ($method) method="{{ $method }}" @endif
            @if ($action) action="{{ $action }}" @endif
            @if ($submitAction) wire:submit="{{ $submitAction }}" @endif
            {{ $attributes }}
    >
        {{ $slot }}
    </form>
</div>