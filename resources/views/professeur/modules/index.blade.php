@extends('layouts.app')

@section('title')
    Module a ensignes
@endsection

@section('content')
<div class="card">

    <div class="card-header">
        <h5 class="card-title">Module Schedule</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
    @if ($modules->isEmpty())
        <div class="alert alert-info">
            No modules available.
        </div>
    @else
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th><i class="fas fa-book"></i> Module</th>
                    <th><i class="fas fa-heading"></i> Title</th>
                    <th>Classe</th>
                    <th>Filier</th>
                    <th>Departement</th>
                    <th>Chef Departement</th>
                    <th>Coordinateur</th>
                    <th>Start at</th>
                    <th>End at</th>
                    <th>Day of the Week</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($modules as $module)
                    <tr>
                        <td>{{ $module->module ?? 'No module' }}</td>
                        <td>{{ $module->title ?? 'No title' }}</td>
                        <td>{{ $module->promoName ?? 'No class' }}</td>
                        <td>{{ $module->filierName ?? 'No filier' }}</td>
                        <td>{{ $module->departement ?? 'No departement' }}</td>
                        <td>{{ $module->chefDepartement ?? 'No chef departement' }}</td>
                        <td>{{ $module->cordinateur ?? 'No coordinateur' }}</td>
                        <td>{{ $module->start_time ?? 'No start time' }}</td>
                        <td>{{ $module->end_time ?? 'No end time' }}</td>
                        <td>{{ $module->day ?? 'No day' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
</div>
    </div>
</div>

@endsection



