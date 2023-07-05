@extends('myLayout.king')

@section('title', 'Students')
@section('content')

<section class="py-5 text-center container">

    <div class="col-lg-6 col-md-8 mx-auto">
      <h1 class="fw-light">All Students</h1>
      @if (Auth::user()->role == 'superadmin' || 'admin')
        <a href="{{ route('student.create') }}" class="btn btn-primary my-2">Add Student</a>
      @endif
      </p>
    </div>


<div class="album py-5 bg-body-tertiary">
  <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      @foreach ($students as $student)
      <div class="col">
        <div class="card shadow-sm">
          <div class="card-body">
            <p class="card-text">Student Name :{{ $student->name }}</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a href="{{ route('student.show', ['student'=>$student->student]) }}" class="btn btn-sm btn-outline-secondary">View</a>
                @if (Auth::user()->role == 'superadmin' || 'admin')
                <a href="{{ route('student.edit', [ 'student'=>$student->student]) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                <button type="button" class="btn btn-outline-danger btn-sm" onclick="deletestudent(this)">
                  Delete
                  <form action="{{ route('student.destroy', [ 'student'=>$student->student]) }}" method="POST">
                      @csrf
                      @method('DELETE')
                  </form>
              </button>
              @if (Auth::user()->role == 'superadmin' || 'admin')
              </div>
              <small class="text-body-secondary">{{ $student->duration }}</small>
            </div>
          </div>
        </div>
      </div>
@endforeach
</section>
{{ $students->links() }}
<script>
  function deletestudent(buttonElement) {
      const confirmed = confirm('Are you sure you want to delete this?');
      if (confirmed) {
          const form = buttonElement.querySelector('form');
          form.submit();
      }
  }
</script>






























@endsection
