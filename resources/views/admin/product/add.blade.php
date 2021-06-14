@extends('layouts.admin')

@section('title')
    <title>Add product</title>
@endsection
@section('css')
    <link href="{{ asset('vendor\select2\select2.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admins\product\add\add.css') }}" rel="stylesheet"/>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'product', 'key'=>'add'])
    <!-- /.content-header -->
        <!-- Main content -->
        <div class="col-md-12">
{{--            @if ($errors->any())--}}
{{--                <div class="alert alert-danger">--}}
{{--                    <ul>--}}
{{--                        @foreach ($errors->all() as $error)--}}
{{--                            <li>{{ $error }}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            @endif--}}
        </div>
        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">

                            @csrf
                            <div class="form-group">
                                <label>Ten san pham</label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       name='name'
                                       value = "{{old('name')}}"
                                       placeholder="Nhap ten san pham">

                                @error('name')
                                <div class="alert alert-danger alert-css">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Gia san pham</label>
                                <input type="text"
                                       class="form-control @error('price') is-invalid @enderror"
                                       name='price'
                                       value = "{{old('price')}}"
                                       placeholder="Nhap gia san pham">

                                @error('price')
                                <div class="alert alert-danger alert-css">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Anh dai dien</label>
                                <input type="file"
                                       class="form-control-file"
                                       name='feature_image_path'>
                            </div>
                            <div class="form-group">
                                <label>Anh chi tiet</label>
                                <input type="file"
                                       multiple
                                       class="form-control-file"
                                       name='image_path[]'>
                            </div>


                            <div class="form-group">
                                <label>Chon danh muc</label>
                                <select class="form-control select2_init @error('category_id') is-invalid @enderror" name='category_id'>
                                    <option value="0">Chon danh muc</option>
                                    {!! $htmlOption !!}
                                </select>
                                @error('category_id')
                                <div class="alert alert-danger alert-css">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tags</label>
                                <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">

                                </select>
                            </div>


                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nhap noi dung</label>
                                <textarea class="form-control tinymce_editor_init @error('contents') is-invalid @enderror " rows="20" name='contents' >{{old('contents')}}</textarea>
                            </div>
                            @error('contents')
                            <div class="alert alert-danger alert-css">{{ $message }}</div>
                            @enderror
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
