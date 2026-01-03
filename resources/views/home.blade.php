@extends('layouts.invitation')

@section('content')
    @include('layouts.invitations.cover')
    @include('layouts.invitations.header')
    @include('layouts.invitations.couple')
    @include('layouts.invitations.story')
    @include('layouts.invitations.venue')
    @include('layouts.invitations.gift')
    @include('layouts.invitations.wishes')
    @include('layouts.invitations.footer')
@endsection