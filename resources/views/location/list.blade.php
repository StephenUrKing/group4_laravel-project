@extends('myLayout.king')
@section('title', 'Locations')
@section('content')

<section class="py-5 text-center container">

      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">All Available Locations</h1>
        @if (Auth::user()->role =='superadmin' || 'admin')
          <a href="{{ route('location.create') }}" class="btn btn-primary my-2">Add Location</a>
        @endif
        </p>
      </div>


 <div class="album py-5 bg-body-tertiary">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        {{--  @foreach ($locations as $location)
            <x-location.location-item :location="$location" />
        @endforeach  --}}
</section>
{{ $locations->links() }}
<script>
    function deleteLocation(buttonElement) {
        const confirmed = confirm('Are you sure you want to delete this?');
        if (confirmed) {
            const form = buttonElement.querySelector('form');
            form.submit();
        }
    }
</script>

@endsection

















