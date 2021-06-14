@extends('layouts.admin')

@section('title')
    <title>Edit product</title>
@endsection
@section('css')
    <link href="{{ asset('vendor\select2\select2.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admins\product\add\add.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('admins\product\index\edit.css') }}"/>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'product', 'key'=>'edit'])
    <!-- /.content-header -->
        <!-- Main content -->
        <form action="{{ route('product.update', ['id'=>$product->id]) }}" method="post" enctype="multipart/form-data">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            @csrf
                            <div class="form-group">
                                <label>Ten san pham</label>
                                <input type="text"
                                       class="form-control"
                                       name="name"
                                       placeholder="Nhap ten san pham"
                                       value = "{{$product->name}}"
                                       >
                            </div>
                            <div class="form-group">
                                <label>Gia san pham</label>
                                <input type="text"
                                       class="form-control"
                                       name="price"
                                       placeholder="Nhap gia san pham"
                                       value = "{{$product->price}}"
                                       >
                            </div>
                            <div class="form-group">
                                <label>Anh dai dien</label>
                                <input type="file"
                                       class="form-control-file"
                                       name='feature_image_path'>
                                <div class="col-md-12 feature_image">
                                    <div class="row">
                                        <img class="product_image_250_200" src="{{$product->feature_image_path}}" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Anh chi tiet</label>
                                <input type="file"
                                       multiple
                                       class="form-control-file"
                                       name='image_path[]'>
                                <div class="col-md-12 container_image_detail">
                                    <div class="row">
                                        @foreach($product->productImages as $productImageItem)
                                            <div class="col-md-3">
                                                <img class="image_detail" src="{{$productImageItem->image_path}}" alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Chon danh muc</label>
                                <select class="form-control select2_init" name='category_id'>
                                    <option value="0">Chon danh muc</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tags</label>
                                <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                                    @foreach($product->tags as $tagItem)
                                        <option value="{{$tagItem->name}}" selected>{{$tagItem->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nhap noi dung</label>
                                <textarea class="form-control tinymce_editor_init" rows="20" name='contents'>{{$product->content}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
        </form>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('js')

    <script src="{{ asset('vendor\select2\select2.min.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{ asset('admins\product\add\add.js') }}"></script>

@endsection
