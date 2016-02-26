@extends('layouts.master')

@section('content')

<h1>Patients</h1>
<p class="lead">Patient Record Management</p>
<hr>

<a href="{{ route('patients.index') }}" class="btn btn-info">View Patients</a>
<a href="{{ route('patients.create') }}" class="btn btn-primary">Add New Patient</a>

@stop