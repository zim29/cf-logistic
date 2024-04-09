<div class="form-check">
    <input  class="form-check-input" 
            type="checkbox" 
            id="{{$name}}" 
            @if($model) wire:model.change="{{$model}}" @endif
            @if ($disabled) disabled @endif
            {{ $attributes }}>
    <label class="form-check-label fw-normal" for="{{$name}}">
        {{ __($label)}}
    </label>
</div>