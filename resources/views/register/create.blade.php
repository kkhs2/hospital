<x-layout>
<div class="container mt-5">
<form class="form registerForm" id="registerForm" name="registerForm" method="POST" action="{{ url('/register') }}">
  @csrf
  <div class="mb-3">
  <div class="form-floating">
    <select class="form-select" name="register[position_id]" id="positions" required>
      <option value="">Please Select</option>
      @foreach ($positions as $position)
        <option value="{{ $position->id }}">{{ $position->job }}</option>
      @endforeach
    </select>
    <label for="positions">Positions</label>
  </div>
</div>
  <x-titles></x-titles>
    <div class="form-floating mb-3">
      <input type="text" name="register[firstname]" id="firstname" class="form-control" placeholder="First Name" required>
      <label for="firstname" class="form-label">First Name</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" name="register[lastname]" id="lastname" class="form-control" placeholder="Last Name" required>
      <label for="lastname" class="form-label">Last Name</label>
    </div>
    <x-addressfields></x-addressfields>
    <div class="form-floating mb-3">
      <input type="email" name="register[email]" class="form-control" id="email" placeholder="Email Address" required>
      <label for="email" class="form-label">Email</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" name="register[password]" class="form-control" id="postcode" placeholder="Password" required>
      <label for="password" class="form-label">Password</label>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
  </form>
</div>
</x-layout>