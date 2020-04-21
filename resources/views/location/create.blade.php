@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('location.location.create') }} {{ trans('location.location.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route('locations.store') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="name">{{ trans('global.name') }}*</label>
                    <input type="text" id="name" name="name" class="form-control">
                </div>
                <div>
                    <input class="btn btn-success" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>
@endsection
