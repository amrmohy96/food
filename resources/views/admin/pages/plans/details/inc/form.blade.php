<div class="form-row">
    <div class="col">
        <input type="text" name="name" value="{{$detail->name ?? old('name')}}" class="form-control" placeholder="name">
        @error('name')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="col">
        <button class="btn btn-dark"> Save</button>
    </div>
</div>
