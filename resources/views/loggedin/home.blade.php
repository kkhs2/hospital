<x-layout>
<div class="container-fluid mb-2 nhs-color">
  <div class="container pt-4 pb-4">
    <h1 class="display-5 fw-bold">{{ $staff->firstname }} {{ $staff->lastname }} dashboard</h1>
    <p>Welcome to the home page. Please see below for all options available to you.</p>
  </div>
</div>
<div class="container">
  <div class="card-group">
    <div class="card">
      <div class="card-header">
        <span>My Profile</span>
      </div>
      <div class="card-body">
        <a href="{{ url('/myprofile') }}" class="btn"><i class="far fa-address-card icon "></i></a>
      </div>
    </div>
    @if ($staff->job == 'Administrator')
    <div class="card">
      <div class="card-header">
        <span>Admissions</span>
      </div>
      <div class="card-body">
        <a href="{{ url('/admissions') }}" class="btn"><i class="far fa-address-card icon "></i></a>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <span>Discharge</span>
      </div>
      <div class="card-body">
        <a href="{{ url('/discharges') }}" class="btn"><i class="far fa-address-card icon "></i></a>
      </div>
    </div>
    @endif
    <div class="card">
      <div class="card-header">
        <span>Handover notes</span>
      </div>
      <div class="card-body">
        <a href="{{ url('/handover') }}/{{ $staff->id }}" class="btn"><i class="fas fa-h-square icon"></i></a>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <span>Your patients</span>
      </div>
      <div class="card-body">
        <a href="{{ url('/searchpatientsonyourward') }}" class="btn"><i class="fas fa-user-nurse icon"></i></a>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <span>Patients search</span>
      </div>
      <div class="card-body">
        <a class="btn" href="{{ url('/patientssearch') }}"><i class="fas fa-search icon"></i></a>        
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <span>NHS Information</span>   
      </div>
      <div class="card-body">
        <a class="btn" href="{{ url('/information') }}"><i class="fas fa-circle-info icon"></i></a>
      </div>
    </div>
  </div>
</div>
</x-layout>
