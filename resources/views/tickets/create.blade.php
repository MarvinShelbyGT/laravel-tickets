@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('Création d\'un nouveau ticket') }}
        </div>

        <div class="card-body">
            <form action="{{ route("tickets.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="subject" class="col-sm-2 col-form-label">{{ trans('Sujet') }}</label>
                    <div class="col-sm-10">
                        <input type="text" id="subject" name="subject" class="form-control" required>
                        <p class="helper-block">
                            <small>{{ trans('Renseigner le sujet du problème') }}</small>
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="content" class="col-sm-2 col-form-label">{{ trans('Description') }}</label>
                    <div class="col-sm-10">
                        <textarea id="summernote" name="content" class="form-control" required></textarea>
                        <p class="helper-block">
                            <small>{{ trans('Merci de décrire le plus précisément le problème') }}</small>
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="priority" class="col-sm-2 col-form-label">{{ trans('Priorité') }}</label>
                    <div class="col-sm-10">
                        <select name="priority" id="priority" class="form-control" required>
                            <option value="critical">Critique</option>
                            <option value="high">Haute</option>
                            <option value="normal">Normal</option>
                            <option value="low">Faible</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="category" class="col-sm-2 col-form-label">{{ trans('Catégorie') }}</label>
                    <div class="col-sm-10">
                        <select name="category" id="category" class="form-control" required>
                            <option value="magasins">Magasins</option>
                            <option value="production">Production</option>
                            <option value="desk">Bureau</option>
                        </select>
                        <p class="helper-block">
                            <small>{{ trans('Production : Merci de saisir le nom de l\'opérateur et le nom de l\'allée dans la description') }}</small>
                        </p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="place" class="col-sm-2 col-form-label">{{ trans('Emplacement') }}</label>
                    <div class="col-sm-10">
                        <select name="place" id="place" class="form-control" required>
                            @foreach($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div>
                    <input class="btn btn-success float-right" type="submit" value="{{ trans('Créer le ticket') }}">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endsection()
