@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.testimony.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.testimonies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.testimony.fields.id') }}
                        </th>
                        <td>
                            {{ $testimony->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimony.fields.name') }}
                        </th>
                        <td>
                            {{ $testimony->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimony.fields.photo') }}
                        </th>
                        <td>
                            @if($testimony->photo)
                                <a href="{{ $testimony->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $testimony->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimony.fields.testimony') }}
                        </th>
                        <td>
                            {!! $testimony->testimony !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.testimony.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Testimony::STATUS_RADIO[$testimony->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.testimonies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection