<div>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
</div>
<form method="POST" action="{{ route('register') }}">
    @csrf
    <input type="text" name="name" placeholder="Name">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Register</button>
</form>
