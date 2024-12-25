<!-- resources/views/layouts/navbar.blade.php -->
<nav>
    <ul>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/rekomendasi') }}">Rekomendasi</a></li>
        <li><a href="{{ url('/artikel') }}">Artikel</a></li>
        <li><a href="{{ url('/wishlist') }}">Wishlist</a></li>
    </ul>
</nav>

<style>
    nav {
        background-color: #58A3FC;
        padding: 10px;
    }

    nav ul {
        list-style-type: none;
    }

    nav ul li {
        display: inline;
        margin-right: 20px;
    }

    nav ul li a {
        color: white;
        text-decoration: none;
    }
</style>