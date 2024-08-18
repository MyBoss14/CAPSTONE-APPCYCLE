@extends('seller.layouts.master')
@section('title')
{{$settings->site_name}} || Create Product
@endsection
@section('content')

<section id="wsus__dashboard">
    <div class="container-fluid">
      @include('seller.layouts.sidebar')

      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">

          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> Upload Product through Google Teachable Machine Authentication</h3>
            <div class="wsus__dashboard_profile">

              <div class="wsus__dash_pro_area">

                <form action="{{route('seller.store-with-ai')}}" method="POST" enctype="multipart/form-data">
                    @csrf






                    @include('seller.product.model')








                    <div  class="form-group wsus__input">
                        <label>Product Name</label>
                        <input name="name" type="text" class="form-control" value="{{old('name')}}">
                    </div>




                    <div  class="form-group wsus__input">
                        <label>Price</label>
                        <input name="price" type="text" class="form-control" value="{{old('price')}}">
                    </div>

                    <div  class="form-group wsus__input">
                        <label>Stock Quantity</label>
                        <input name="qty" type="number" class="form-control" value="{{old('qty')}}">
                    </div>

                    <div  class="form-group wsus__input" hidden>
                        <label>Video Link</label>
                        <code>please put a valid url!</code>
                        <input name="video_link" type="text" class="form-control" value="https://www.youtube.com/watch?v=KYj1f3c_re4">
                    </div>

                    <div  class="form-group wsus__input">
                        <label> Description</label>
                        <textarea name="short_description" class="form-control " value="{{old('short_description')}}"></textarea>
                    </div>

                    <div  class="form-group wsus__input" hidden>
                        <label>Long Description</label>
                        <textarea name="long_description" class="form-control " value="long description">long description</textarea>
                    </div>



                    <div class="form-group wsus__input" hidden>
                        <label for="inputState">Is Featured</label>
                        <select name="is_featured" id="inputState" class="form-control">
                          <option value="1">Yes</option>
                          <option value="0">No</option>
                        </select>
                    </div>

                    <div  class="form-group wsus__input" hidden>
                        <label>Seo Title (key word of your products in search engine)</label>
                        <input name="seo_title" type="text" class="form-control" value="seo title">
                    </div>

                    <div  class="form-group wsus__input" hidden>
                        <label>Seo Description (description of your products in search engine) </label>
                        <textarea name="seo_description" class="form-control " value="Seo Description"></textarea>
                    </div>


                    <div class="form-group wsus__input">
                        <label for="inputState">Status</label>
                        <select name="status" id="inputState" class="form-control">
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>
                    </div>

                    <div class="form-group wsus__input" id="submitButton" hidden>

                        <br>
                        <button  type="submit" class="btn btn-success" >Submit</button> <code>Fill out the form first before submitting</code>
                    </div>



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
