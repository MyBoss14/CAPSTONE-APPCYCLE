@extends('seller.layouts.master')
@section('title')
{{$settings->site_name}} || Edit Product
@endsection
@section('content')

<section id="wsus__dashboard">
    <div class="container-fluid">
      @include('seller.layouts.sidebar')

      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> Edit Product</h3>
            <div class="wsus__dashboard_profile">

              <div class="wsus__dash_pro_area">


                {{-- form --}}
                <form action="{{route('seller.products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group wsus__input">
                        <label>Preview Image</label>
                        <img src="{{asset($product->thumb_image)}}" alt="" style="width: 200px;">
                    </div>
                    <div class="form-group wsus__input">
                        <label>Product Image</label>
                        <input name="image" type="File" class="form-control">
                    </div>

                    <div  class="form-group wsus__input ">
                        <label>Product Name</label>
                        <input name="name" type="text" class="form-control" value="{{$product->name}}">
                    </div>


                    <div class="form-group wsus__input">
                        <label for="inputState">Category</label>
                        <select name="category" id="inputState" class="form-control">
                            @foreach ( $categories as $category)
                            <option {{$category->id == $product->category_id ? 'selected' : ''}} value="{{$category->id}}" >{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div  class="form-group wsus__input">
                        <label>Price</label>
                        <input name="price" type="text" class="form-control" value="{{$product->price}}">
                    </div>

                    <div  class="form-group wsus__input">
                        <label>Stock Quantity</label>
                        <input name="qty" type="number" class="form-control" value="{{$product->qty}}">
                    </div>

                    <div  class="form-group wsus__input" hidden>
                        <label>Video Link</label>
                        <input name="video_link" type="text" class="form-control" value="https://www.youtube.com/watch?v=KYj1f3c_re4">
                    </div>

                    <div  class="form-group wsus__input">
                        <label> Description </label>
                        <textarea name="short_description" class="form-control " >{!!$product->short_description!!}</textarea>
                    </div>

                    <div  class="form-group wsus__input" hidden>
                        <label>Long Description</label>
                        <textarea name="long_description" class="form-control " >{!!$product->long_description!!}</textarea>
                    </div>



                    <div class="form-group wsus__input">
                        <label for="inputState" hidden>Is Featured</label>
                        <select name="is_featured" id="inputState" class="form-control">
                          <option {{$product->status == 1 ? 'selected': ''}} value="1">Yes</option>
                          <option {{$product->status == 0 ? 'selected': ''}} value="0">No</option>
                        </select>
                    </div>

                    <div class="form-group wsus__input">
                        <label for="inputState" hidden>Is Featured</label>
                        <select name="is_approved" id="inputState" class="form-control">
                          <option {{$product->is_approved == 1 ? 'selected': ''}} value="1">Approved</option>
                          <option {{$product->is_approved == 0 ? 'selected': ''}} value="0">Pending</option>
                          <option {{$product->is_approved == 2 ? 'selected': ''}} value="2">Disapproved</option>
                        </select>
                    </div>

                    <div  class="form-group wsus__input" hidden>
                        <label>Seo Title  (key word of your products in search engine)</label>
                        <input name="seo_title" type="text" class="form-control" value="{{$product->seo_title}}">
                    </div>

                    <div  class="form-group wsus__input" hidden>
                        <label>Seo Description  (description of your products in search engine)</label>
                        <textarea name="seo_description" class="form-control ">{!!$product->seo_description!!}</textarea>
                    </div>


                    <div class="form-group wsus__input">
                        <label for="inputState">Status</label>
                        <select name="status" id="inputState" class="form-control">
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>
                    </div>


                    <button type="submit" class="btn btn-primary" > Update</button>

                    </form>


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection

@push('scripts')

@endpush
