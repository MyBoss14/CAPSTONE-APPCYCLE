@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
    <h1>Edit Product</h1>

    </div>

    <div class="section-body">


    <div class="row">
        <div class="col-12 ">
        <div class="card">
            <div class="card-header">
            <h4>Edit Product</h4>

            </div>
            <div class="card-body">
                {{-- form --}}
                <form action="{{route('admin.products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Preview Image</label>
                    <br>
                    <img src="{{asset($product->thumb_image)}}" alt="" style="width: 200px;">
                </div>
                <div class="form-group">
                    <label>Product Image</label>
                    <input name="image" type="File" class="form-control">
                </div>

                <div  class="form-group">
                    <label>Product Name</label>
                    <input name="name" type="text" class="form-control" value="{{$product->name}}">
                </div>


                <div class="form-group">
                    <label for="inputState">Category</label>
                    <select name="category" id="inputState" class="form-control">
                        @foreach ( $categories as $category)
                        <option {{$category->id == $product->category_id ? 'selected' : ''}} value="{{$category->id}}" >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div  class="form-group">
                    <label>Remark</label>
                    <input name="remark" type="text" class="form-control" value="{{@$product->remark}}">
                </div>

                <div  class="form-group">
                    <label>Price</label>
                    <input name="price" type="text" class="form-control" value="{{$product->price}}">
                </div>

                <div  class="form-group">
                    <label>Stock Quantity</label>
                    <input name="qty" type="number" class="form-control" value="{{$product->qty}}">
                </div>

                <div  class="form-group">
                    <label>Video Link</label>
                    <input name="video_link" type="text" class="form-control" value="{{$product->video_link}}">
                </div>

                <div  class="form-group">
                    <label>Short Description</label>
                    <textarea name="short_description" class="form-control " >{!!$product->short_description!!}</textarea>
                </div>

                <div  class="form-group">
                    <label>Long Description</label>
                    <textarea name="long_description" class="form-control " >{!!$product->long_description!!}</textarea>
                </div>



                <div class="form-group">
                    <label for="inputState">Is Featured</label>
                    <select name="is_featured" id="inputState" class="form-control">
                      <option {{$product->status == 1 ? 'selected': ''}} value="1">Yes</option>
                      <option {{$product->status == 0 ? 'selected': ''}} value="0">No</option>
                    </select>
                </div>

                <div  class="form-group">
                    <label>Seo Title</label>
                    <input name="seo_title" type="text" class="form-control" value="{{$product->seo_title}}">
                </div>

                <div  class="form-group">
                    <label>Seo Description</label>
                    <textarea name="seo_description" class="form-control ">{!!$product->seo_description!!}</textarea>
                </div>


                <div class="form-group">
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
</section>

@endsection
