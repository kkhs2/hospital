<x-layout>
<div class="container">
    <form method="POST" id="addpatienttreatment-form" name="addpatienttreatment-form" class="form" action="{{ url('/addpatienttreatmentrecord') }}">
        @csrf
        @foreach ($patient as $p)
        <div class="form-group">
            <h2>Provide treatment details you provided for {{ $p->title }} {{ $p->firstname }} {{ $p->lastname }}<br>
            {{ $p->name }} - {{ $p->department }}</h2>
            <textarea class="form-control" rows="10" cols="100" name="description" id="addpatienttreatment-description"></textarea>
        </div>
        <div class="form-group">
            <input type="hidden" name="patientId" id="addpatienttreatment-patientid" class="form-control" value="{{ $p->patient_id }}">
        </div>
        <input type="hidden" name="hospitalId" class="form-control" value="{{ $p->hospital_id }}">
        <input type="hidden" name="wardId" class="form-control" value="{{ $p->ward_id }}">
        <input type="hidden" name="staffId" class="form-control" value="{{ $staffId }}"> 
        <button type="submit" class="btn btn-primary" id="addpatienttreatment-description" name="description-btn">Add</button>
        @endforeach
    </form>
</div>
</x-layout>