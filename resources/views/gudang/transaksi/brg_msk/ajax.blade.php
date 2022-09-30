@foreach ($ajax as $y)
<div class="form-group">
    <label>Harga</label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Rp</span>
        </div>
        <input type="text" class="form-control" id="harga" value="{{ $y->harga }}" readonly required>
    </div>
</div>
@endforeach
