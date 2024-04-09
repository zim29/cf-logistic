<div class="@if ($fullSize) v-stack w-100 @endif">
    <button type="{{ $type }}"
        class="btn btn-{{ $color }} 
        {{ $class }} 
        @if ($fullSize) w-100 @endif"
        {{ $attributes }}>
        {{ $label }}
        @if ($model) {{ $model }} @endif
    </button>
</div>
