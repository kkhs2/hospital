<x-layout>
<div class="container-fluid mb-2 nhs-color">
  <div class="container pt-4 pb-4">
    <h1 class="display-5 fw-bold">Information from the NHS</h1>
    <p>Useful information below straight from the NHS portal to help you carry out your jobs if needed.</p>
  </div>
</div>
<div class="container">
    <div class="card-group">
      <div class="card">
        <div class="card-header">
          <span>Behind the Headlines</span>
        </div>
        <div class="card-body">
          <a href="{{ url('information/news') }}"><i class="fas fa-newspaper icon"></i></a>
        </div>
        
      </div>
      <div class="card">
        <div class="card-header">
          <span>Condition</span>
        </div>
        <div class="card-body">
          <a href="{{ url('information/conditions') }}"><i class="fas fa-heartbeat icon"></i></a>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <span>Live Well</span>
        </div>
        <div class="card-body">
          <a href="{{ url('information/live-well') }}"><i class="fas fa-spa icon"></i></a>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <span>Medicines</span>
        </div>
        <div class="card-body">
          <a href="{{ url('information/medicines') }}"><i class="fas fa-prescription-bottle-alt icon"></i></a>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <span>Video</span>
        </div>
        <div class="card-body">
          <a href="{{ url('information/video') }}"><i class="fas fa-video icon"></i></a>
        </div>
      </div>
      <div class="card">
        <div class="card-header"></div>
        <i class="fas fa-search icon"></i>
        <form method="POST" class="form" id="searchApiWord" name="searchApiWord" action="{{ url('searchApiContent') }}">
          @csrf
          <input type="text" name="query" class="form-control" placeholder="Enter word to search">
          <h2><button type="submit" class="btn btn-primary">Search</button></h2>
        </form>
      </div>
      <div class="card">
        <div class="card-header">

        </div>
        <i class="fas fa-sitemap icon"></i>
        <form method="POST" class="form" id="searchApiOrg" name="searchApiOrg" action="{{ url('orgApiContent') }}"> 
          @csrf
          <select name="organisation" class="form-control">
            <option value="">Please Select</option>
            <option value="hospitals">Hospitals</option>
            <option value="gppractices">GP Practices</option>
            <option value="dentists">Dentists</option>
            <option value="pharmacies">Pharmacies</option>
            <option value="careproviders">Care Provides</option>
            <option value="careorganisations">Care Organisations</option>
            <option value="opticians">Opticians</option>
            <option value="clinics">Clinics</option>
            <option value="ambulancetrusts">Ambulance Trusts</option>
            <option value="mentalhealthtrusts">Mental Health Trusts</option>
          </select>
          <h2><button type="submit" class="btn btn-primary">Search</button></h2>
        </form>
  
    </div>
  </div>
</div>
</x-layout>