<div class="col">
    <div class="card shadow-sm">
      <div class="card-body">
        <p class="card-text">{{ $course->name }}</p>
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <a href="{{ route('course.show', ['course'=>$course->id]) }}" class="btn btn-sm btn-outline-secondary">View</a>
            @if (Auth::user()->role =='superadmin' || 'admin')
            <a href="{{ route('course.edit', [ 'course'=>$course->id]) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
            @endif
            @if (Auth::user()->role =='superadmin')
            <button type="button" class="btn btn-outline-danger btn-sm" onclick="deleteCourse(this)">
              Delete
              <form action="{{ route('course.destroy', [ 'course'=>$course->id]) }}" method="POST">
                  @csrf
                  @method('DELETE')
              </form>
          </button>
          @endif
          </div>
          <small class="text-body-secondary">{{ $course->duration }}</small>
        </div>
      </div>
    </div>
  </div>
 