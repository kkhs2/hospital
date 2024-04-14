<x-layout>
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
        <a href="{{ url('/handover') }}" class="btn"><i class="fas fa-h-square icon"></i></a>
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
