@extends('layouts.master')

@section('content')

<h1>Patient Details</h1>
<p class="lead">{{ $patient->lastname }} , {{ $patient->firstname }}</p>
<hr>

<a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-primary">Edit </a>
<a href="{{ route('patients.index') }}" class="btn btn-info">Back to List</a>

<div class="pull-right">
     {!! Form::open([
            'method' => 'DELETE',
            'route' => ['patients.destroy', $patient->id]
        ]) !!}
            {!! Form::submit('Delete ', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
</div>

@stop