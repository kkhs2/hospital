<x-layout>
<div class="container table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Patient</th>
                <th>Hospital/Ward</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $key => $val)
            <tr>
                <td>{{ $val->title }} {{ $val->firstname }} {{ $val->lastname }}</td>
                <td>{{ $val->hospitalname }}<br>{{ $val->wardname }}</td>
                <td>
                    <a class="btn btn-primary" href="/patienttreatment/{{$val->hospital_id }}/{{ $val->id }}/{{ $val->ward_id }}">Treatments</a>  
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-layout>