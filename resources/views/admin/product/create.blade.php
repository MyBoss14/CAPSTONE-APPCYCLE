@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
    <h1>Product</h1>

    </div>

    <div class="section-body">


    <div class="row">
        <div class="col-12 ">
        <div class="card">
            <div class="card-header">
            <h4>Create Product</h4>

            </div>
            <div class="card-body">
                {{-- form --}}
                <form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                

                <div class="form-group">
                    <label>Product Image</label>
                    <input name="image" type="File" class="form-control">
                </div>

                {{-- e include nalang ang model dri  --}}



                {{-- may categorythen sa model... review nalang --}}

                <div class="form-group">
                    <label for="inputState">Category <code></code></label>
                    <select name="category" id="inputState" class="form-control">
                        @foreach ( $categories as $category)
                        {{-- sa value category name ang naa sa model --}}
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div  class="form-group">
                    <label>Product Name</label>
                    <input name="name" type="text" class="form-control" value="{{old('name')}}">
                </div>

                <div  class="form-group">
                    <label>Price</label>
                    <input name="price" type="text" class="form-control" value="{{old('price')}}">
                </div>

                <div  class="form-group">
                    <label>Stock Quantity</label>
                    <input name="qty" type="number" class="form-control" value="{{old('qty')}}">
                </div>

                <div  class="form-group" hidden>
                    <label>Video Link</label>
                    <input name="video_link" type="text" class="form-control" value="https://www.youtube.com/watch?v=KYj1f3c_re4">
                </div>

                <div  class="form-group">
                    <label> Description</label>
                    <textarea name="short_description" class="form-control " value="{{old('short_description')}}"></textarea>
                </div>

                <div  class="form-group" hidden>
                    <label>Long Description</label>
                    <textarea name="long_description" class="form-control " value="{{old('long_description')}}">Long Description</textarea>
                </div>



                <div class="form-group">
                    <label for="inputState">Is Featured</label>
                    <select name="is_featured" id="inputState" class="form-control">
                      <option value="1">Yes</option>
                      <option value="0">No</option>
                    </select>
                </div>

                <div  class="form-group" hidden>
                    <label>Seo Title</label>
                    <input name="seo_title" type="text" class="form-control" value="Seo Title">
                </div>

                <div  class="form-group" hidden>
                    <label>Seo Description</label>
                    <textarea name="seo_description" class="form-control "> seo description</textarea>
                </div>


                <div class="form-group">
                    <label for="inputState">Status</label>
                    <select name="status" id="inputState" class="form-control">
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
                </div>

                {{-- may button na sa model..... append nalng either kuhaon nalang ang html sa button tas e replace dri--}}

                {{--  --}}
                <p><code></code></p>
                <button type="submit" class="btn btn-primary" > Submit </button>

                </form>

            </div>

        </div>
        </div>

    </div>

    </div>
</section>

@endsection

@push('scripts')
{{-- AI model scripts here --}}

@endpush
