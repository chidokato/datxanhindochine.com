@extends('admin.layout.main')

@section('content')
@include('admin.layout.header')
@include('admin.alert')
<?php use App\Models\CategoryTranslation; ?>
<div class="d-sm-flex align-items-center justify-content-between mb-3 flex">
    <h2 class="h3 mb-0 text-gray-800 line-1 size-1-3-rem">{{__('lang.category')}}</h2>
    <a class="add-iteam" href="{{route('category.create')}}"><button class="btn-success form-control" type="button"><i class="fa fa-plus" aria-hidden="true"></i> {{__('lang.add')}}</button></a>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ul class="nav nav-pills">
                    <li><a data-toggle="tab" class="nav-link active" href="#tab1">{{__('lang.all')}}</a></li>
                    <!-- <li><a data-toggle="tab" class="nav-link " href="#tab2">Hiển thị</a></li> -->
                    <!-- <li><a data-toggle="tab" class="nav-link" href="#tab3">Ẩn</a></li> -->
                </ul>
            </div>
            <div class="tab-content overflow">
                <div class="tab-pane active" id="tab2">
                    @if(count($category) > 0)
                    <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>View</th>
                                    <th>Slug</th>
                                    <th>Sort By</th>
                                    <th>date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($category as $val)
                                @if($val->parent == 0)
                                <tr id="category">
                                    <input type="hidden" value="{{$val->category->id}}" name="id">
                                    <td></td>
                                    <td>
                                        <a href="{{route('category.edit',[$val->category_id])}}">{{$val->name}}</a>
                                    </td>
                                    <td><input type="text" id="view" value="{{$val->category->view}}" name="" class="form-control cat_view"></td>
                                    <td>{{$val->category->slug}}</td>
                                    <td>{{$val->category->sort_by}}</td>
                                    <td>{{$val->updated_at}}</td>
                                    <td>
                                        <!-- <a href="{{route('category.edit',[$val->category_id])}}" class="mr-2"><i class="fas fa-edit" aria-hidden="true"></i></a> -->
                                        <form action="{{route('category.destroy',[$val->category_id])}}" method="POST">
                                          @method('DELETE')
                                          @csrf
                                          <button class="button_none" onclick="return confirm('xác nhận')"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                    <?php $sub_cats = CategoryTranslation::where('parent', $val->id)->get(); ?>
                                    @foreach($sub_cats as $sub_cat)
                                    <tr id="category">
                                        <input type="hidden" value="{{$sub_cat->category->id}}" name="id">
                                        <td></td>
                                        <td>
                                            <a href="{{route('category.edit',[$sub_cat->category_id])}}">__{{$sub_cat->name}}</a>
                                        </td>
                                        <td><input type="text" id="view" value="{{$sub_cat->category->view}}" name="" class="form-control cat_view"></td>
                                        <td>{{$sub_cat->category->slug}}</td>
                                        <td>{{$val->category->sort_by}}</td>
                                        <td>{{$sub_cat->updated_at}}</td>
                                        <td>
                                            <!-- <a href="{{route('category.edit',[$val->category_id])}}" class="mr-2"><i class="fas fa-edit" aria-hidden="true"></i></a> -->
                                            <form action="{{route('category.destroy',[$sub_cat->category_id])}}" method="POST">
                                              @method('DELETE')
                                              @csrf
                                              <button class="button_none" onclick="return confirm('xác nhận')"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                                @endforeach
                            </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection