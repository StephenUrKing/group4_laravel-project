@extends('myLayout.king')
@section('title', 'Location')

@section('content')
<div class="container my-5 py-5">

    <!--Section: Design Block-->
    <section>
        <div class="col-md-8 mb-4">
          <div class="card mb-4">
            <div class="card-header py-3">
              <h5 class="mb-0 text-font text-uppercase">Add New Location</h5>
            </div>
            <div class="card-body">

            <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                 @csrf
                 @isset($edit)
                 @method('PATCH')
                 @endisset
                <div class="row mb-4">
                  <div class="col">
                    <div class="form-outline">
                      <input type="text" id="name" name="name" class="form-control  @error('name') is-invalid  @enderror" value="{{ request()->old('name', $alllocation->name) }}"/>
                      <label class="form-label" for="name">Location name</label>
                      @error('name')
                         <div class="text-danger">{{ $message }}</div>
                     @enderror
                    </div>
                  </div>


                <!-- locationId -->
                <div class="form-outline mb-4">
                  <input type="text" id="locationId" name="locationId" class="form-control  @error('locationId') is-invalid  @enderror" value="{{ request()->old('locationId', $alllocation->locationId) }}"/>
                  <label class="form-label" for="locationId">Location ID</label>
                  @error('locationId')
                         <div class="text-danger">{{ $message }}</div>
                     @enderror
                </div>

                <!-- description -->

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
  <script>
    document.getElementById("description").value="{{ request()->old('description', $alllocation->description) }}";
  </script>
@endsection


