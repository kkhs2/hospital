<x-layout>
<div class="container table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Patient Name</th>
                <th>Hospital/Ward</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $key => $val)
            <tr>
                <td>{{ $val->title }} {{ $val->firstname }} {{ $val->lastname }}</td>
                <td>{{ $val->name }}</td>
                <td><a href="{{ url('/patientdetails') }}/{{ $val->id }}" name="patientdetails" class="btn btn-primary nhs-color">Patient Details</a></td>
                <td><a href="{{ url('/patienthistory') }}/{{ $val->id }}" name="patienthistory" class="btn btn-primary nhs-color">See Patient History</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-layout>