@extends('layouts.admin')
@section('content')

    <div class="card">
        <a href="{{ route('tickets.create') }}" class="btn btn-success">Créer un ticket</a>
        <div class="card-header">
            <h3 class="card-title">Tickets</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                <tr>
                    <th style="width: 1%">
                        #
                    </th>
                    <th style="width: 30%">
                        Sujet
                    </th>
                    <th style="width: 10%">
                        Status
                    </th>
                    <th style="width: 10%">
                        Mise à jour
                    </th>
                    <th style="width: 8%">
                        Priorité
                    </th>
                    <th style="width: 8%">
                        Catégorie
                    </th>
                    <th style="width: 15%">
                    </th>
                </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                        <tr>
                            <td>
                                {{ $ticket->id }}
                            </td>
                            <td>
                                <a href="{{ route('tickets.show', $ticket->id) }}">
                                    {{ $ticket->subject }}
                                </a>
                            </td>
                            <td>
                                @if($ticket->state == "New")
                                    <span style="color:green">{{ $ticket->state }}</span>
                                @elseif($ticket->state == "Closed")
                                    <span style="color: #186107">{{ $ticket->state }}</span>
                                @elseif($ticket->state == "Re-opened")
                                    <span style="color: #71001f">{{ $ticket->state }}</span>
                                @elseif($ticket->state == "Pending")
                                    <span style="color:orange">{{ $ticket->state }}</span>
                                @elseif($ticket->state == "Solved")
                                    <span style="color:lawngreen">{{ $ticket->state }}</span>
                                @elseif($ticket->state == "Bug")
                                    <span style="color:red">{{ $ticket->state }}</span>
                                @else
                                    <span>{{ $ticket->state }}</span>
                                @endif
                            </td>
                            <td>
                                <?php \Jenssegers\Date\Date::setLocale('fr') ?>
                                Il y a {{ str_replace('après', '', Jenssegers\Date\Date::now()->diffForHumans($ticket->updated_at)) }}
                            </td>
                            <td>
                                {{ $ticket->priority }}
                            </td>
                            <td>
                                {{ $ticket->category }}
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="{{ route('tickets.show', $ticket->id) }}">
                                    <i class="fas fa-folder">
                                    </i>
                                    Afficher
                                </a>
                                <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" onsubmit="return confirm('Etes-vous sûr ?');" style="display: inline-block;">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
