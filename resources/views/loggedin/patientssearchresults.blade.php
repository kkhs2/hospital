<x-layout>
<div class="container table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address 1</th>
                <th>Town/City</th>
                <th>Hospital/Ward</th>
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
                <td>{{ $val->address1 }}</td>
                <td>{{ $val->towncity }}</td>
                <td>{{ $val->name }}<br>{{ $val->department }}</td>
                <td><a href="{{ url('/editpatient') }}/{{ $val->id }}" name="editpatient" class="btn btn-primary">Edit Patient</a></td>
                <td><a href="{{ url('/patienthistory') }}/{{ $val->id }}" name="patienthistory" class="btn btn-primary">See Patient History</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-layout>