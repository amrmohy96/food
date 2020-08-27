
    <div class="form-group">
        <i class="fab fa-product-hunt fa-1x"></i>
        <label for="name">Name</label>
        <input type="text"  name="name" value="{{$profile->name ?? old('name')}}" class="form-control" id="name">
        @error('name')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <i class="fas fa-paragraph"></i>
        <label for="description">Description</label>
        <textarea cols="5" rows="5" class="form-control" id="description" name="description" >{{ $profile->description ?? old('description')}}</textarea>
        @error('description')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
<button type="submit" class="btn btn-primary">Save</button>
