@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            <?php \Jenssegers\Date\Date::setLocale('fr') ?>
            <h3 class="card-title">Détails du ticket | {{ Jenssegers\Date\Date::now()->diffForHumans($ticket->updated_at) }}</h3>

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
                            <h4>Activité récente</h4>
                            <div class="post">
                                <div class="user-block">
                                    <span>
                                        <a href="#">Jonathan Burke Jr.</a>
                                    </span> <br>
                                    <span>Shared publicly - 7:45 PM today</span>
                                </div>
                                <!-- /.user-block -->
                                <p>
                                    Lorem ipsum represents a long-held tradition for designers,
                                    typographers and the like. Some people hate it and argue for
                                    its demise, but others ignore.
                                </p>

                                <p>
                                    <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v2</a>
                                </p>
                            </div>
                            <div class="post">
                                <div class="user-block">
                                    <span>
                                        <a href="#">Jonathan Burke Jr.</a>
                                    </span> <br>
                                    <span>Shared publicly - 7:45 PM today</span>
                                </div>
                                <!-- /.user-block -->
                                <p>
                                    Lorem ipsum represents a long-held tradition for designers,
                                    typographers and the like. Some people hate it and argue for
                                    its demise, but others ignore.
                                </p>

                                <p>
                                    <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v2</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <h3 class="text-primary">{{ $ticket->subject }}</h3>
                    <p class="text-muted">{!! $ticket->content !!} </p>
                    <br>
                    <div class="text-muted">
                        <p class="text-sm">Propriétaire
                            <b class="d-block">&nbsp;</b>
                        </p>
                        <p class="text-sm">Responsable
                            <b class="d-block">Dahlen Marvin</b>
                        </p>
                    </div>

                    <h5 class="mt-5 text-muted">Les fichiers</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Functional-requirements.docx</a>
                        </li>
                        <li>
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
                        </li>
                        <li>
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>
                        </li>
                        <li>
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                        </li>
                        <li>
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-10_12_2014.docx</a>
                        </li>
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
