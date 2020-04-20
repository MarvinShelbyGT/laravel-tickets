@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            <?php \Jenssegers\Date\Date::setLocale('fr') ?>
            <h3 class="card-title">Détails du ticket | Il y a {{ str_replace('après', '', Jenssegers\Date\Date::now()->diffForHumans($ticket->created_at)) }}</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Priorité</span>
                                    @if($ticket->priority == "critical")
                                        <span class="info-box-number text-center mb-0" style="color: darkred; font-weight: bold">Critique</span>
                                    @elseif($ticket->priority == "high")
                                        <span class="info-box-number text-center mb-0" style="color: #8b4400; font-weight: bold">Haut</span>
                                    @elseif($ticket->priority == "normal")
                                        <span class="info-box-number text-center mb-0" style="color: #e1d200; font-weight: bold">Normal</span>
                                    @elseif($ticket->priority == "low")
                                        <span class="info-box-number text-center mb-0" style="color: #678b83; font-weight: bold">Bas</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Catégorie</span>
                                    <span class="info-box-number text-center text-muted mb-0">{{ ucfirst($ticket->category) }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Emplacement</span>
                                    <span class="info-box-number text-center text-muted mb-0">{{ ucfirst($ticket->place) }}<span>
                    </span></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h4>@if($activities->count() > 1) Commentaires @else Commentaire @endif</h4>

                            @foreach($activities as $activity)
                                <div class="post">
                                    <div class="user-block">
                                    <span>
                                        <a href="#">{{ \App\User::find($activity->user_id)->name }}</a>
                                    </span> <br>
                                        <small>Il y a {{ str_replace('après', '', Jenssegers\Date\Date::now()->diffForHumans($activity->created_at)) }}</small>
                                    </div>
                                    <!-- /.user-block -->
                                    <p>
                                        @if($activity->status != null)
                                            <button class="btn btn-danger btn-sm" style="cursor: default">{{$activity->status}}</button>
                                        @endif
                                        {!! $activity->content !!}
                                    </p>
                                    @if($activity->filename != null)
                                    <p>
                                        <a href="{{ route('activities.download', $activity->filename) }}" class="link-black text-sm"><i class="fas fa-link mr-1"></i> {{ $activity->filename }}</a>
                                    </p>
                                    @endif
                                </div>
                            @endforeach

                            <div class="post">
                                <form action="{{ route("activities.store") }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                    <div class="form-group row">
                                        <label for="content" class="col-sm-2 col-form-label">{{ trans('Message') }}</label>
                                        <div class="col-sm-10">
                                            <textarea id="summernote" name="content" class="form-control" required></textarea>
                                            <p class="helper-block">
                                                <small>{{ trans('Merci de décrire le plus précisément le problème') }}</small>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="state" class="col-sm-2 col-form-label">{{ trans('Status') }}</label>
                                        <div class="col-sm-10">
                                            <select name="state" id="state" class="form-control" required>
                                                <option value="New" {{ $ticket->state == "New" ? "selected" : '' }} >Nouveau</option>
                                                <option value="Closed" {{ $ticket->state == "Closed" ? "selected" : '' }}>Clôturer</option>
                                                <option value="Re-Opened" {{ $ticket->state == "Re-Opened" ? "selected" : '' }}>Ré-Ouvert</option>
                                                <option value="Pending" {{ $ticket->state == "Pending" ? "selected" : '' }}>En cours</option>
                                                <option value="Solved" {{ $ticket->state == "Solved" ? "selected" : '' }}>Résolu</option>
                                                <option value="Bug" {{ $ticket->state == "Bug" ? "selected" : '' }}>Bug</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fichier" class="col-sm-2 col-form-label">{{ trans('Fichier') }}</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control-file" id="fichier" name="fichier">
                                        </div>
                                    </div>
                                    <div>
                                        <input class="btn btn-success float-right" type="submit" value="{{ trans('Ajouter le commentaire') }}">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <h3 class="text-primary">{{ $ticket->subject }}</h3>
                    <p class="text-muted">{!! $ticket->content !!} </p>
                    <br>
                    <div class="text-muted">
                        <p class="text-sm">État du ticket
                            @if($ticket->state == "New")
                                <b class="d-block" style="color:green">Nouveau</b>
                            @elseif($ticket->state == "Closed")
                                <b class="d-block" style="color: #186107">Fermé</b>
                            @elseif($ticket->state == "Re-Opened")
                                <b class="d-block" style="color: #71001f">Re-Ouvert</b>
                            @elseif($ticket->state == "Pending")
                                <b class="d-block" style="color:orange">En cours</b>
                            @elseif($ticket->state == "Solved")
                                <b class="d-block" style="color:lawngreen">Résolu</b>
                            @elseif($ticket->state == "Bug")
                                <b class="d-block" style="color:red">Bug</b>
                            @endif
                        </p>
                        <p class="text-sm">Responsable
                            <b class="d-block">Dahlen Marvin</b>
                        </p>
                        <p class="text-sm">Dernière mise à jour
                            <b class="d-block">Il y a {{ str_replace('après', '', Jenssegers\Date\Date::now()->diffForHumans($ticket->updated_at)) }}</b>
                        </p>
                    </div>

                    <h5 class="mt-5 text-muted">Les fichiers</h5>
                    <ul class="list-unstyled">
                        @foreach($files as $file)
                            @php
                                $extension = explode('.',$file->filename);
                            @endphp
                            @if($extension[1] == "docx" || $extension[1] == "doc")
                                <li>
                                    <a href="{{ route('activities.download', $file->filename) }}" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> {{ $file->filename }}</a>
                                </li>
                            @elseif($extension[1] == "pdf")
                                <li>
                                    <a href="{{ route('activities.download', $file->filename) }}" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> {{ $file->filename }}</a>
                                </li>
                            @elseif($extension[1] == "mln")
                                <li>
                                    <a href="{{ route('activities.download', $file->filename) }}" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> {{ $file->filename }}</a>
                                </li>
                            @elseif($extension[1] == "png")
                                <li>
                                    <a href="{{ route('activities.download', $file->filename) }}" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> {{ $file->filename }}</a>
                                </li>
                            @elseif($extension[1] == "xlsx" || $extension[1] == "xls")
                                <li>
                                    <a href="{{ route('activities.download', $file->filename) }}" class="btn-link text-secondary"><i class="far fa-fw fa-file-excel "></i> {{ $file->filename }}</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('activities.download', $file->filename) }}" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> {{ $file->filename }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    <div class="mt-5 mb-3">
                        <a href="#" class="btn btn-sm btn-primary">Ajouter un fichier</a>
                        <a href="#" class="btn btn-sm btn-warning">Modifier les informations</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@endsection()
