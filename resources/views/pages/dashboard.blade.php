@extends('master.auth_pages_master')
@section('content')
    <!-- Add contact form -->
    @livewire('add-contact')

    <!-- Contact List Table -->
    @livewire('contact-list')
@endsection
