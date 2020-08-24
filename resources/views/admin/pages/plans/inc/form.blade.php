<div class="form-row">
    <div class="form-group col-md-6">
        <i class="fab fa-product-hunt fa-1x"></i>
        <label for="name">Name</label>
        <input type="text"  name="name" value="{{$plan->name ?? old('name')}}" class="form-control" id="name">
        @error('name')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group col-md-6">
        <i class="fa fa-money-check fa-1x"></i>
        <label for="price">Price</label>
        <input type="text"  name="price" value="{{ $plan->price ?? old('price')}}" class="form-control" id="price">
        @error('price')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
</div>
<div class="form-group">
    <i class="fas fa-paragraph"></i>
    <label for="description">Description</label>
    <textarea cols="5" rows="5" class="form-control" id="description" name="description" >{{ $plan->description ?? old('description')}}</textarea>
    @error('description')
    <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<button type="submit" class="btn btn-primary">Save</button>
