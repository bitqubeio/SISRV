<div id="field_{{ $id }}"{!! Html::classes(['form-group', 'has-danger' => $hasErrors]) !!}>
    <label for="{{ $id }}" class="form-control-label">
        {{ $label }}:
    </label>

    @if ($required)
        <span class="text-danger">*</span>
    @endif

    <div class="controls">
        {!! $input !!}
        @foreach ($errors as $error)
            <div class="form-control-feedback">{{ $error }}</div>
        @endforeach
    </div>
</div>
