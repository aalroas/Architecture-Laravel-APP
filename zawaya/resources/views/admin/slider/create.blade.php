@extends('admin.layouts.app')
@section('main-content')


<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>{{ trans('backend.sliders') }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">{{ trans('backend.dashboard') }}</a></li>

                            <li class="breadcrumb-item active" aria-current="page"></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-12 text-right hidden-xs">

                    @include('includes.messages')

                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">

              <form role="form" action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}


                  <div class="row clealfix">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="header">
                                    <h2>{{ trans('backend.image') }}</h2>
                                </div>
                                <div class="body">
                                    <input type="file" class="dropify"
                                        data-default-file=""
                                        data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG" name="image" required>
                                </div>
                            </div>
                        </div>
                  </div>



                  <div class="row clealfix">
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="header">
                                    <h2>{{ trans('backend.title') }} AR</h2>
                                </div>
                                <div class="body">

                                    <input type="text" class="form-control" id="title_ar" name="title_ar">

                                </div>
                            </div>
                        </div>


                        <div class="col-sm-4">
                            <div class="card">
                                <div class="header">
                                    <h2>{{ trans('backend.title') }} EN</h2>
                                </div>
                                <div class="body">

                                    <input type="text" class="form-control" id="title_en" name="title_en">

                                </div>
                            </div>
                        </div>


                        <div class="col-sm-4">
                            <div class="card">
                                <div class="header">
                                    <h2>{{ trans('backend.title') }} TR</h2>
                                </div>
                                <div class="body">

                                    <input type="text" class="form-control" id="title_tr" name="title_tr">

                                </div>
                            </div>
                        </div>

                    </div>


<div class="row clealfix">
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="header">
                                <h2>{{ trans('backend.text') }} AR</h2>
                            </div>
                            <div class="body">


                                <textarea  type="text" class="form-control" name="text_ar"></textarea>

                            </div>
                        </div>
                    </div>


                    <div class="col-sm-4">
                        <div class="card">
                            <div class="header">
                                <h2>{{ trans('backend.text') }} EN</h2>
                            </div>
                            <div class="body">
<textarea  type="text" class="form-control" name="text_en"></textarea>


                            </div>
                        </div>
                    </div>


                    <div class="col-sm-4">
                        <div class="card">
                            <div class="header">
                                <h2>{{ trans('backend.text') }} TR</h2>
                            </div>
                            <div class="body">

                                <textarea  type="text" class="form-control" name="text_tr"></textarea>


                            </div>
                        </div>
                    </div>

                </div>


<div class="row clealfix">
    <div class="col-sm-6">
        <div class="card">
            <div class="header">
                <h2>{{ trans('backend.date') }}</h2>
            </div>
            <div class="body">

        <input data-provide="datepicker" autocomplete="off" name="date" data-date-autoclose="true" class="form-control">

            </div>
        </div>
    </div>

<div class="col-sm-6">
    <div class="card">
        <div class="header">
            <h2>{{ trans('backend.url') }}</h2>
        </div>
        <div class="body">

            <input  type="text" autocomplete="off" name="url" class="form-control">

        </div>
    </div>
</div>

</div>

<div class="row clealfix">
    <div class="col-sm-6">
        <div class="card">
            <div class="header">
                <h2>{{ trans('backend.type') }}</h2>
            </div>
            <div class="body">
<div class="multiselect_div">
        <select id="single-selection" name="type" class="multiselect multiselect-custom">
            <option value="1">{{ trans('backend.interior_design') }}</option>
            <option value="2">{{ trans('backend.exterior_design') }}</option>
            <option value="3">{{ trans('backend.restoration') }}</option>

        </select>
    </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card">
            <div class="header">
                <h2>{{ trans('backend.status') }}</h2>
            </div>
            <div class="body">
                <div class="multiselect_div">
                    <select id="single-selection" name="status" class="multiselect multiselect-custom">
                        <option value="1">{{ trans('backend.yes') }}</option>
                        <option value="0">{{ trans('backend.no') }}</option>
                    </select>
                </div>
            </div>
        </div>
    </div>




</div>



            <div class="box-footer">
              <button type="submit" class="btn btn-primary">{{ trans('backend.save') }}</button>
              <a  type="button"  class="btn btn-warning" href="{{   route('slider.index')   }}">{{ trans('backend.back') }}</a>
            </div>
          </form>

          </div>
        </div>
        </div>
        </div>
        </div>
        </div>

        </div>
        </div>


        @endsection
