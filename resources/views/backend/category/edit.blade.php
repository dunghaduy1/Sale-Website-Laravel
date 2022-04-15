@extends('backend.master')
@section('title','Cập nhật danh mục')
@section('namepage','Danh mục')
@section('main')

	<div class="card">
		<div class="card-body">
			{{-- <h4 class="card-title text-red">Cập nhật danh mục</h4> --}}
			<form action="{{route('category.update',$category_id->id)}}" method="POST" role="form">
				@csrf
				@method('PUT')
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="name">Tên danh mục</label>
							<input type="text" class="form-control" id="name" placeholder="Nhập tên danh mục" name="name" onkeyup="ChangeToSlug()" value="{{$category_id->name}}">
							@error('name')
							<span class="text-red">{{$message}}</span>
							@enderror
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="slug">Slug</label>
							<input type="text" class="form-control" id="slug" placeholder="Slug"  name="slug" value="{{$category_id->slug}}">
							@error('slug')
							<span class="text-red">{{$message}}</span>
							@enderror
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Loại danh mục</label>
							<div class="radio">
								<label>
									<input type="radio" name="type" id="input" value="1"
									{{($category_id->type)==1?'checked':''}}>
									Danh mục sản phẩm
								</label>
								<div>
									<label>
										<input type="radio" name="type" id="input" value="0" {{($category_id->type)==0?'checked':''}}>
										Danh mục tin tức
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Status</label>
							<div class="radio">
								<label>
									<input type="radio" name="status" id="input" value="1" {{($category_id->status)==1?'checked':''}}>
									Hiện
								</label>
								<label>
									<input type="radio" name="status" id="input" value="0"
									{{($category_id->status)==0?'checked':''}}>
									Ẩn
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<label for="">Danh mục cha</label>
						<div class="form-group">
							<select class="custom-select" id="classCoverageDistribution" aria-label="Example select with button addon" name="parent_id">
								<option value="0">--Không---</option>
								@foreach ($category as $value)
								<option value="{{$value->id}}"
									{{($category_id->parent_id==$value->id)?'selected':''}}
								>
									{{$value->name}}
								</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<button class="btn btn-primary" type="submit">Cập nhật</button>
			</form>
		</div>
	</div>
	<!-- end card -->

@stop
