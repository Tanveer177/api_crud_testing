<div>
    <!-- Life is available only in the present moment. - Thich Nhat Hanh -->
</div>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Login</button>
</form>
