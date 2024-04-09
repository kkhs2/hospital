<x-layout>
<div class="container table-responsive">
    <table class="table">
        <thead>
            <th>Patient</th>
            <th>Instructions</th>
            <th>Conditions</th>
            <th>Hospital/Ward</th>
            <th>Treatment</th>
        </thead>
        <tbody>
            @foreach ($patients as $key => $val)
                <tr>
                    <td>{{ $val->title }} {{ $val->firstname }} {{ $val->lastname }}</td>
                    <td>{{ $val->instructions }}</td>
                    <td>{{ $val->conditions }}</td>
                    <td>{{ $val->name }}<br>{{ $val->department }}</td>
                    <td>
                        <form class="form" method="POST" name="addtreattreatment-form" action="{{ url('/addpatienttreatment') }}">
                            @csrf
                            <input type="hidden" name="patientId" value="{{ $val->patient_id }}">
                            <input type="hidden" name="hospitalId" value="{{ $val->hospital_id }}">
                            <input type="hidden" name="wardId" value="{{ $val->ward_id }}">
                            <button type="submit" class="btn btn-primary" name="addpatienttreatment-btn">Add Patient Treatment</button>
                        </form>
                    </td>
                    <td><a href="{{ url('/patienthistory') }}/{{ $val->patient_id }}" class="btn btn-primary">Patient Treatment History</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-layout>