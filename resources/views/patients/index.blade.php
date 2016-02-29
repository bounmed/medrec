@extends('layouts.master')

@section('content')

<h1>Patients</h1>
<p class="lead">Patient List <a href="/patients/create" class="btn btn-primary" role="button">Add New</a></p>
<hr>

@foreach($patients as $patient)
    <h3>{{ $patient->lastname }} , {{ $patient->firstname }}</h3>
    <p>
        <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-info">View </a>
        <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-primary">Edit </a>
    </p>
    <hr>
@endforeach

@stop