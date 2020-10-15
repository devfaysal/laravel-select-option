<div class="row">
    <div class="col-md-12">
        <x-select-field name="select" value="{{ $option->select }}" label="Select" :data="$selects"/>
    </div>
    <div class="col-md-12">
        <x-text-field name="value" value="{{ $option->value }}" label="Value"/>
    </div>
    <div class="col-md-12">
        <x-text-field name="display" value="{{ $option->display }}" label="Display"/>
    </div>
</div>

<div class="form-group">
    <input type="submit" class="btn btn-sm btn-success" value="{{ $buttonText }}">
</div>