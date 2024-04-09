<x-layout>
<div class="container table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Hospital/Ward</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $key => $val)
            <tr>
                <td>{{ $val->id }}</td>
                <td>{{ $val->title }}</td>
                <td>{{ $val->firstname }}</td>
                <td>{{ $val->lastname }}</td>
                <td>{{ $val->name }}<br>{{ $val->department }}
                <td><a href="{{ url('/editpatient') }}/{{ $val->id }}" class="btn btn-primary">Edit Patient</a></td>
                <td>
                    <form class="form" method="POST" name="addtreattreatment-form" action="{{ url('/addpatienttreatment') }}">
                        @csrf
                        <input type="hidden" name="patientId" value="{{ $val->id }}">
                        <input type="hidden" name="hospitalId" value="{{ $val->hospital_id }}">
                        <input type="hidden" name="wardId" value="{{ $val->ward_id }}">
                        <button type="submit" class="btn btn-primary" name="addpatienttreatment-btn">Add Patient Treatment</button>
                    </form>
                </td>
                <td><a href="{{ url('/patienthistory') }}/{{ $val->id }}" class="btn btn-primary">Patient Treatment History</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-layout>