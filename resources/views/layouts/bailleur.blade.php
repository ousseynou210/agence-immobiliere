@extends('layouts.app')

@section('content')
    <div class="d-flex">
        @include('components.sidebar')

        <main class="flex-grow-1 p-4">
            @yield('dashboard-content')
        </main>
    </div>
@endsection