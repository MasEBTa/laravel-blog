@extends('layouts.main2')

@section('container')
    <button class="btn btn-primary btn-sm collapsed d-md-none center-block mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        Menu
    </button>
    <div class="container-fluid">
        <div class="row">
            
            @include('dashboard.layouts.sidebar')
            
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('containerDashboard')
            </main>
        </div>
    </div>
@endsection