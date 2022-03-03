@extends('layouts.app')

@section('content')
  <section class="row py-5">
    <div class="col-md-10 mx-auto">
      @include('partials.page-header')
      @if (!have_posts())
        <div class="alert alert-warning text-center">
          <h2 class="text-center mb-2">404</h2>
          <p class="text-center mb-0">The page you were trying to view does not exist</p>
          <a class="d-block text-center" href="{{ home_url('/') }}">
            Home
          </a>
        </div>
      @endif
    </div>
  </section>
@endsection
