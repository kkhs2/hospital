<x-layout>
<div class="container table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Patient</th>
                <th>Hospital/Ward</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $key => $val)
            <tr>
                <td>{{ $val->title }} {{ $val->firstname }} {{ $val->lastname }}</td>
                <td>{{ $val->hospitalname }}<br>{{ $val->wardname }}</td>
                <td><a href="{{ url('/patientmedicalstats') }}/{{ $val->id }}" class="btn btn-primary">Medical Information</a></td>
                <td>
                    <form class="form" method="POST" name="addtreattreatment-form" action="{{ url('/addpatienttreatment') }}">
                        @csrf
                        <input type="hidden" name="patientId" value="{{ $val->id }}">
                        <input type="hidden" name="hospitalId" value="{{ $val->hospital_id }}">
                        <input type="hidden" name="wardId" value="{{ $val->ward_id }}">
                        <button type="submit" class="btn btn-primary" name="addpatienttreatment-btn">Treatment</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-layout>