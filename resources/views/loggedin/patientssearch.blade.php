<x-layout>
<div class="container-fluid mb-2 nhs-color">
  <div class="container pt-4 pb-4">
    <h1 class="display-5 fw-bold">Search for Patient</h1>
  </div>
</div>
<div class="container">
    <div class="row">
        <div class="col"> 
            <form method="POST" class="form patient-medical-searchname-form" id="patient-medical-searchname-form" name="patient-medical-searchname-form" action="{{ url('patientsearchname') }}">
              @csrf
                <div class="input-group mb-3">
                  <input type="text" name="patient[firstname]" class="form-control" placeholder="First Name" required> 
                </div>
                <div class="input-group mb-3"> 
                    <input type="text" name="patient[lastname]" class="form-control" placeholder="Last Name" required>
                </div>
                <button type="submit" class="btn btn-primary" name="patient-medical-searchname" value="patient-medical-searchname">Search</button>
            </form>
        </div>
        <div class="col">
            <form method="POST" class="form patient-medical-searchhospitalward-form" id="patient-medical-searchhospital-form" name="patient-medical-searchhospitalward-form" action="{{ url('/patientssearchhospitalward') }}">
            @csrf
            <div class="input-group mb-3">
                <select class="form-select" name="patient[hospital_id]" placeholder="Select Hospital" required>
                    <option value="">Please Select</option>
                    @foreach ($hospitals as $key => $val)
                        <option value="{{ $val->id }}">{{ $val->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3">
                <select class="form-select" name="patient[ward_id]" placeholder="Select Ward" required>
                    <option value="">Please Select</option>
                    @foreach ($wards as $key => $val)
                        <option value="{{ $val->id }}">{{ $val->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="patient-medical-searchhospitalward" value="patient-medical-searchhospitalward">Search</button>
        </form>
    </div>
</div>
</div>
</x-layout>