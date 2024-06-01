<x-layout>
<div class="container table-responsive">
    <table class="table">
        <thead>
          <th>Patient</th>
          <th>Handover</th>
        </thead>
        <tbody>
            @foreach ($patients as $key => $val)
              <tr>
                <td>{{ $val->title }} {{ $val->firstname }} {{ $val->lastname }}</td>
                <td>{{ $val->handover }}</td>
                <td>
                  <form class="form" method="POST" name="addtreattreatment-form" action="{{ url('addpatienttreatment') }}">
                    @csrf
                    <input type="hidden" name="patientId" value="{{ $val->patient_id }}">
                    <input type="hidden" name="hospitalId" value="{{ $val->hospital_id }}">
                    <input type="hidden" name="wardId" value="{{ $val->ward_id }}">
                  </form>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-layout>