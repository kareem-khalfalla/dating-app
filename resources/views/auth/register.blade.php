<form action="{{ route('register') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="fullname">
    <input type="email" name="email" placeholder="email">
    <input type="text" name="username" placeholder="username">
    <input type="password" name="password" placeholder="password">
    <input type="password" name="password_confirmation" placeholder="password_confirmation">
    <button type="submit">register</button>
</form>