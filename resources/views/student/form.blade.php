@extends('myLayout.king')
@section('title', 'Course')

@section('content')
<div class="container my-5 py-5">

    <!--Section: Design Block-->
    <section>
        <div class="col-md-8 mb-4">
          <div class="card mb-4">
            <div class="card-header py-3">
              <h5 class="mb-0 text-font text-uppercase">Add New Student</h5>
            </div>
            <div class="card-body">

            <form action="{{ $do }}" method="POST" enctype="multipart/form-data">
                 @csrf
                 @isset($edit)
                 @method('PATCH')
                 @endisset
                <div class="row mb-4">
                  <div class="col">
                    <div class="form-outline">
                      <input type="text" id="name" name="name" class="form-control  @error('name') is-invalid  @enderror" value="{{ request()->old('name', $allstudent->name) }}"/>
                      <label class="form-label" for="name">Student name</label>
                      @error('name')
                         <div class="text-danger">{{ $message }}</div>
                     @enderror
                    </div>
                  </div>
                  <div class="col">
                    <!-- studentId -->
                    <div class="form-outline">
                      <input type="text" id="studentId" name="studentId" class="form-control  @error('studentId') is-invalid  @enderror" value="{{ request()->old('studentId', $allstudent->studentId) }}"/>
                      <label class="form-label" for="studentId">Student Id</label>
                      @error('studentId')
                         <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>

                <!-- email -->
                <div class="form-outline mb-4">
                  <input type="text" id="email" name="email" class="form-control  @error('email') is-invalid  @enderror" value="{{ request()->old('email', $allstudent->email) }}"/>
                  <label class="form-label" for="email">Email</label>
                  @error('email')
                         <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <!-- gender -->
                <div class="form-outline mb-4">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male"
                    @checked(request()->old('gender', $allstudent->gender) == 'male')>
                <label class="form-check-label" for="male">
                    Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="female" value="female"
                    @checked(request()->old('gender', $allstudent->gender) == 'female')>
                <label class="form-check-label" for="female">
                    Female
                </label>
            </div>
            <label class="form-label" for="description">Gender</label>
            @error('gender')
                <div class="text-danger">{{ $message }}</div>
            @enderror
           </div>

                </div>

                <div class="form-outline mb-4">
                    <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" name="dob" placeholder="Date of Birth"
                    value="{{ request()->old('dob', $allstudent->dob) }}">
                @error('dob')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>

                <div class="form-outline mb-4">
                    <label for="location_id" class="form-label">Course</label>
                    <select class="form-control" name="location_id" id="location_id">
                        @foreach ($locations as $location)
                        <option value="{{$location->location}}">{{$location->name}}</option>
                        @endforeach
                    </select>
                    @error('location_id')
                    <span class="error">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                   </div>
              </form>
            </div>

          </div>

        </div>
      </div>

    </section>
  </div>

@endsection
