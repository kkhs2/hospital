<x-layout>
<div class="container">
    <h2>Edit Patient</h2>
    <form method="POST" name="edit-patient-form" class="form edit-patient-form" id="edit-patient-form" action="{{ url('/editpatientsavechanges') }}">
        @csrf
        @foreach ($patient as $p)
        <div class="form-group">
            <label>Title</label> <span class="required">*</span>
            <select class="form-control" id="editpatient-title" name="title" required>
                <option value="">Please select</option>
                @foreach ($titles as $t)
                    @if ($t == $p->title)
                        <option value="{{ $p->title }}" selected>{{ $p->title }}</option>
                    @else
                        <option value="{{ $t }}">{{ $t }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>First Name</label> <span class="required">*</span>
            <input type="text" class="form-control" name="firstname" id="editpatient-firstname" value="{{ $p->firstname }}" required>
        </div>
        <div class="form-group">
            <label>Middle Name</label>
            <input type="text" class="form-control" name="middlename" id="editpatient-middlename" value="{{ $p->middlename }}">
        </div>
        <div class="form-group">
            <label>Last Name</label> <span class="required">*</span>
            <input type="text" class="form-control" name="lastname" id="editpatient-lastname" value="{{ $p->lastname }}" required>
        </div>
        <div class="form-group">
            <label>Address1</label> <span class="required">*</span>
            <input type="text" class="form-control" name="address1" id="editpatient-address1" value="{{ $p->address1 }}" required>
        </div>
        <div class="form-group">
            <label>Address2</label>
            <input type="text" class="form-control" name="address2" id="editpatient-address2" value="{{ $p->address2 }}">
        </div>
        <div class="form-group">
            <label>Address3</label>
            <input type="text" class="form-control" name="address3" id="editpatient-address3" value="{{ $p->address3 }}">
        </div>
        <div class="form-group">
            <label>Town/City</label> <span class="required">*</span>
            <input type="text" class="form-control" name="towncity" id="editpatient-towncity" value="{{ $p->towncity }}">
        </div>
        <div class="form-group">
            <label>County</label>
            <input type="text" class="form-control" name="county" id="editpatient-county" value="{{ $p->county }}">
        </div>
        <div class="form-group">
            <label>Post Code</label> <span class="required">*</span>
            <input type="text" class="form-control" name="postcode" id="editpatient-postcode" value="{{ $p->postcode }}" required>
        </div>
        <div class="form-group">
            <label>Gender</label> <span class="required">*</span>
            <input type="text" class="form-control" name="gender" id="editpatient-gender" value="{{ $p->gender }}" disabled>
        </div>
        <div class="form-group">
            <label>Date Of Birth</label> <span class="required">*</span>
            <input type="text" class="form-control" name="dob" id="editpatient-dob" value="{{ date('d-m-Y', strtotime($p->dob)) }}" disabled>
        </div>
        <input type="hidden" name="patientId" value="{{ $p->id }}">
        <button type="submit" class="btn btn-primary" name="editpatient-button" id="editpatient-button" value="editpatient-savechanges">Save Changes</button>
        @endforeach
    </form>
</div>
</x-layout>