<x-layout>
<div class="container">
    @foreach ($patient as $p)
    <h2>Treatment History for {{ $p->title }} {{ $p->firstname }} {{ $p->lastname }}</h2>
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Staff Name</th>
                <th>Position</th>
                <th>Treatment Description</th>
                <th>Date/Time (24 hours format)</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($treatments as $key => $val)
            <tr>
                <td>{{ $val->title }} {{ $val->firstname }} {{ $val->lastname }}</td>
                <td>{{ $val->job }}</td>
                <td>{{ $val->description }}</td>
                <td>{{ \Carbon\Carbon::parse($val->created_at)->format('l jS F Y H:i') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endforeach
</div>
</x-layout>