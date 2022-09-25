@extends('admin.layouts.master')

@section('head-tag')
<title>منو</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">منو</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد منو</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                  ایجاد منو
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.content.menu.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('admin.content.menu.store') }}" method="post">
                    @csrf
                <section class="row">

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">عنوان منو</label>
                                <input type="text" name="name" class="form-control form-control-sm" value="{{ old('name') }}">
                            </div>
                            @error('name')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                        </section>
                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="">نوع منو</label>
                            <select name="menu_type" id="type" class="form-control form-control-sm">
                                <option value="1" @if(old('menu_type') == 1) selected @endif>منوی اصلی</option>
                                <option value="2" @if(old('menu_type') == 2) selected @endif>زیر منوی اصلی</option>
                                <option value="3" @if(old('menu_type') == 3) selected @endif>فرزند زیر منوی اصلی</option>
                            </select>
                        </div>
                    </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">منو والد</label>
                                <select name="parent_id" id="main-menus" class="form-control form-control-sm" disabled>
                                    <option value=""> منوی اصلی را انتخاب کنید.</option>
                                    @foreach ($menus as $menu)

                                    <option value="{{ $menu->id }}"  @if(old('parent_id') == $menu->id) selected @endif
                                    data-url="{{ route('admin.content.menu.get-sub-menus', $menu->id) }}"
                                    >{{ $menu->name }}</option>

                                    @endforeach

                                </select>
                            </div>
                            @error('parent_id')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                        </section>

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">آدرس URL</label>
                                <input type="text" name="url" value="{{ old('url') }}" class="form-control form-control-sm">
                            </div>
                            @error('url')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                        </section>

                    <section class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="sub_menu_id">زیر منو</label>
                            <select name="sub_menu_id" class="form-control form-control-sm" id="sub-menus" disabled>
                                <option selected>زیر منو را انتخاب کنید</option>
                            </select>
                        </div>
                        @error('sub_menu_id')
                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                    </section>

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="status">وضعیت</label>
                                <select name="status" id="" class="form-control form-control-sm" id="status">
                                    <option value="0" @if(old('status') == 0) selected @endif>غیرفعال</option>
                                    <option value="1" @if(old('status') == 1) selected @endif>فعال</option>
                                </select>
                            </div>
                            @error('status')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                        </section>


                        <section class="col-12">
                            <button class="btn btn-primary btn-sm">ثبت</button>
                        </section>
                    </section>
                </form>
            </section>

        </section>
    </section>
</section>

@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#main-menus').change(function() {
                var element = $('#main-menus option:selected');
                var url = element.attr('data-url');
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function(response) {

                        if (response.status) {
                            let subMenus = response.subMenus;
                            console.log(subMenus);
                            $('#sub-menus').empty();
                            subMenus.map((subMenu) => {
                                $('#sub-menus').append($('<option/>').val(subMenu.id).text(subMenu
                                    .name))
                            })
                        } else {
                            errorToast('خطا پیش آمده است')
                        }
                    },
                    error: function() {
                        errorToast('خطا پیش آمده است')
                    }
                })
            })
        })
    </script>

    <script>
        $("#type").change(function(){

            if($('#type').find(':selected').val() == '2') {
                $('#main-menus').removeAttr('disabled');
            }
            else if($('#type').find(':selected').val() == '3'){
                $('#main-menus').removeAttr('disabled');
                $('#sub-menus').removeAttr('disabled');
            }
            else if($('#type').find(':selected').val() == '1'){
                $('#main-menus').attr('disabled', 'disabled');
                $('#sub-menus').attr('disabled', 'disabled');
            }
        });

    </script>
@endsection
