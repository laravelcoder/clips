@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.clips.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.clips.fields.title')</th>
                            <td field-key='title'>{{ $clip->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.description')</th>
                            <td field-key='description'>{!! $clip->description !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.notes')</th>
                            <td field-key='notes'>{!! $clip->notes !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.video')</th>
                            <td field-key='video'>
                            <video controls poster="">
                              <source src="{{ asset(env('UPLOAD_PATH').'/' . $clip->video) }}" type="video/mp4">
                              Your browser does not support the video tag.
                            </video>
                            @if($clip->video)<a href="{{ asset(env('UPLOAD_PATH').'/' . $clip->video) }}" target="_blank">Download file</a>@endif
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('global.clips.fields.images')</th>
                            <td field-key='images'> 
                                @foreach($clip->getMedia('images') as $media)
                                <p class="form-group">
                                    <a href="{{ $media->getUrl() }}" target="_blank">{{ $media->name }} ({{ $media->size }} KB)</a>
                                    {{ $media }}
                                </p>
                                @endforeach</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.clips.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop

@section('javascript')
    @parent
    <script src="//cdn.ckeditor.com/4.5.4/full/ckeditor.js"></script>
    <script>
        $('.editor').each(function () {
                  CKEDITOR.replace($(this).attr('id'),{
                    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
            });
        });
    </script>

@stop
