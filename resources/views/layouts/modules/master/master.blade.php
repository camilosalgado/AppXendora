@extends('layouts.app')

@section('content')
    <b-col cols="12">
        <b-card title="Card Title" no-body>
            <b-card-header header-tag="nav">
                <b-nav card-header tabs>
                    <b-nav-item href="/applications">Statistics</b-nav-item>
                    <b-nav-item href="{{ route('master.users') }}">Users</b-nav-item>
                    <b-nav-item href="{{ route('master.roles') }}">Roles</b-nav-item>
                    <b-nav-item href="{{ route('master.permissions') }}">Permissions</b-nav-item>
                    <b-nav-item href="{{ route('master.applications') }}">Applications</b-nav-item>
                    <b-nav-item href="{{ route('master.modules') }}">Modules</b-nav-item>
                </b-nav>
            </b-card-header>

            <b-card-body class="text-center">
                @yield('mastercontent')
            </b-card-body>
        </b-card>
    </b-col>
@endsection
