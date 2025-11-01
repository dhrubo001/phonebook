@extends('master.auth_pages_master')

@section('content')
    <!-- Contact List Table -->
    @livewire('contact-list', ['contacts' => $contacts])
@endsection
