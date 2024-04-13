<x-layout>
<div class="container">
    <form method="POST" name="edit-patient-form" class="form edit-patient-form" id="edit-patient-form" action="{{ url('/patientdetails') }}">
        @csrf
        @foreach ($patient as $p)
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="title" id="title" value="{{ $p->title }}" disabled>
            <label for="title" class="form-label">Title</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="firstname" id="firstname" value="{{ $p->firstname }}" disabled>
            <label for="firstName" class="form-label">First Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="lastname" id="lastname" value="{{ $p->lastname }}" disabled>
            <label for="lastname" class="form-label">Last Name</label>
        </div>
        <div class="form-floating mb-3"> 
            <input type="text" class="form-control" name="address1" id="address1" value="{{ $p->address1 }}" disabled>
            <label for="address1" class="form-label">Address1</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="address2" id="address2" value="{{ $p->address2 }}" disabled>
            <label for="address2" class="form-label">Address2</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="towncity" id="towncity" value="{{ $p->towncity }}" disabled>
            <label for="towncity" class="form-label">Town/City</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="county" id="county" value="{{ $p->county }}" disabled>
            <label for="county" class="form-label">County</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="postcode" id="editpatient-postcode" value="{{ $p->postcode }}" disabled>
            <label for="postcode" class="form-label">Post Code</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="gender" id="gender" value="{{ $p->gender }}" disabled>
            <label for="gender" class="form-label">Gender</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="dob" id="editpatient-dob" value="{{ date('d-m-Y', strtotime($p->dob)) }}" disabled>
            <label for="dob" class="form-label">Date Of Birth</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="height" id="height" value="{{ $p->height }}" disabled>
            <label for="height" class="form-label">Height</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="weight" id="weight" value="{{ $p->weight }}" disabled>
            <label for="weight" class="form-label">Weight</label>
        </div>
        <input type="hidden" name="patientId" value="{{ $p->id }}">
        <!--<button type="submit" class="btn btn-primary" name="editpatient-button" id="editpatient-button" value="editpatient-savechanges">Save Changes</button>-->
        @endforeach
    </form>
</div>
</x-layout>