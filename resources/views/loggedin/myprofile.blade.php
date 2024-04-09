<x-layout>
<div class="container-fluid mb-2 nhs-color">
  <div class="container pt-4 pb-4">
    <h1 class="display-5 fw-bold">My Profile</h1>
    <p>Check / update your details</p>
  </div>
</div>
<div class="container">
    <form method="POST" action="{{ url('myprofile') }}" id="myprofile-form" name="myprofile-form" class="form myprofile-form">
    @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $staff->title }}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">First Name</label>
            <input type="text" name="firstname" id="firstname" class="form-control" value="{{ $staff->firstname }}" disabled>
        </div>

        <div class="mb-3">
            <label class="form-label">Last Name</label>
            <input type="text" name="lastname" id="lastname" class="form-control" value="{{ $staff->lastname }}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">address1</label>
            <input type="text" name="address1" id="address1" class="form-control" value="{{ $staff->address1 }}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">address2</label>
            <input type="text" name="address2" id="address2" class="form-control" value="{{ $staff->address2 }}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">address2</label>
            <input type="text" name="address2" id="address2" class="form-control" value="{{ $staff->address2 }}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Town/City</label>
            <input type="text" name="towncity" id="towncity" class="form-control" value="{{ $staff->towncity }}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">County</label>
            <input type="text" name="county" id="county" class="form-control" value="{{ $staff->county }}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Post Code</label>
            <input type="text" name="postcode" id="postcode" class="form-control" value="{{ $staff->postcode }}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Job</label>
            <input type="text" name="job" id="job" class="form-control" value="{{ $staff->job }}" disabled>
        </div>
        <div class="mb-3">
          <button type="submit" class="btn btn-primary" id="myprofile-btn" name="myprofile-btn" value="update">Update</button>
        </div>
      </form>
</div>
</x-layout>