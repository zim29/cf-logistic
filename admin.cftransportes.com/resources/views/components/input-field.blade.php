<div class="form-floating my-3">
    <input  type="text"
            id="{{ $name }}"
            name="{{ $name }}"
            value="{{ $value }}"
            placeholder="{{ __($label) }}"
            class="{{ $class }} form-control @error($model) is-invalid @enderror"
            @if ($tabindex) tabindex="{{ $tabindex }}" @endif
            @if ($disabled) disabled @endif
            @if ($model) wire:model.live="{{ $model }}" @endif
            {{ $attributes }}
    >
    <label for="{{ $name }}">{{ __($label) }}</label>
    @error($model) <div class="invalid-feedback">{{ __($message) }}</div> @enderror
</div>