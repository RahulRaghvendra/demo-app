
@props([
    'name', 
    'id', 
    'value', 
    'label', 
    'checked' => null, 
    'heading' => null, 
    'class' => ''
])
@if ($heading)
<label class="form-label">{{ $heading }}</label>
<br>
@endif

    <input type="checkbox" name="{{ $name }}" id="{{ $id }}" value="{{ $value }}" style="margin: 1px 0px 0px 5px;"
        {{ is_array($checked) ? (in_array($value, $checked) ? 'checked' : '') : ($value == $checked ? 'checked' : '') }}
        class="{{ $class ?? '' }}">
    <label class="" for="{{ $id }}" style="font-weight:400">
        {{ $label }} 
    </label>