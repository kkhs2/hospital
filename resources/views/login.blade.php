<x-layout>
<div class="container mt-5">
  <form class="form login-form" id="login-form" name="login-form" method="POST" action="{{ url('/login') }}">
    @csrf
    <div class="form-floating mb-3">
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputEmail" class="form-label">Email address</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <label for="inputPassword" class="form-label">Password</label>
    </div>
    <button class="btn btn-primary" type="submit">Log In</button>
  </form>
</div>
</x-layout>