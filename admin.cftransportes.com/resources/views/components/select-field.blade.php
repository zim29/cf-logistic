<div class="form-floating my-3">
    <select id="{{ $name }}"
            name="{{ $name }}"
            value="{{ $value }}"
            placeholder="{{ __($label) }}"
            class="{{ $class }} form-select @error($model) is-invalid @enderror"
            @if ($tabindex) tabindex="{{ $tabindex }}" @endif
            @if ($disabled) disabled @endif
            @if ($model) wire:model.change="{{ $model }}" @endif
            {{ $attributes }}
    >
        <option value="">{{ $label }}</option>
        @foreach ($options as $key => $value)
            <option value="{{ $key }}" @if ($key == $selected) selected @endif>{{ $value }}</option>
        @endforeach
    </select>
    @if ($label)
        <label for="{{ $name }}">{{ __($label) }}</label>
    @endif
    @error($model) <div class="invalid-feedback">{{ __($message) }}</div> @enderror
</div>
