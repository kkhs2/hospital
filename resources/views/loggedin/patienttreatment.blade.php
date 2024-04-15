<x-layout>
  <div class="container">
    <form method="POST" name="patienttreatment" id="patienttreatment" action="{{ url('patienttreatment') }}">
      @csrf
      <div class="form-floating mb-3">
        <textarea class="form-control" name="treatment[description]" id="description" required></textarea>
        <label for="patienttreatment">Add treatment</label>
      </div>
      <input type="hidden" name="treatment[hospitalId]" value="{{ $hospital->id }}">
      <input type="hidden" name="treatment[patientId]" value="{{ $patient->id }}">
      <input type="hidden" name="treatment[staffId]" value="{{ $staff_id }}">
      <input type="hidden" name="treatment[wardId]" value="{{ $ward->id }}">
      <button type="submit" name="patienttreatment" class="btn btn-primary">Add</button>
    </form>
  </div>

  <div class="container">
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>Description</th>
            <th>Provided By</th>
            <th>Date/Time</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($treatments as $key => $val)
          <tr>  
            <td>{{ $val->description }}</td>
            <td>{{ $val->job }} - {{ $val->staff_title }} {{ $val->staff_firstname }} {{ $val->staff_lastname }}</td>
            <td>{{ $val->created_at }}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>

</x-layout>