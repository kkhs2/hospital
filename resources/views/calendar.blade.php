<x-layout>
  <div class="container">
    <div class="row">
    @for ($i = 1; $i <= $days; $i++)
    <div class="col">
      <div class="card">
        {{ $i }}
      </div>
    </div>
    @endfor
  </div>
  </div>
</x-layout>