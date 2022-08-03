
  <div class="form-group">
    <label >Add title</label>
    <input type="text" class="form-control w-25" value="{{old('title',optional($post ?? null)->title)}}" id="exampleInputEmail1" name="title" aria-describedby="emailHelp" placeholder="Enter title">
    @error('title')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="form-group">
  <div class="form-outline">
  <label class="form-label" for="textAreaExample">Content</label>
  <textarea class="form-control  w-25" name="content"   rows="4">{{old('content',optional($post ?? null)->content)}}</textarea>
  @error('content')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
</div>
  </div>