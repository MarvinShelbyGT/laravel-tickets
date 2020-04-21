@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.role.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("locations.update", [$location]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="name">{{ trans('global.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $location->name }}">
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
