<div>
    <div class="sidebar p-4 mt-5 bg-dark" id="sidebar">
        <h5 class="mb-4 text-white">Menu</h5>
        <li>
            <a class="text-white" href="/home">
            <i class="bi bi-house mr-2"></i>
            Home
            </a>
        </li>
        <li>
            <a class="text-white" href="/film">
                <i class="bi bi-film mr-2"></i>
                Film
            </a>
            </li>
        <li>
            <a class="text-white" href="/about">
            <i class="bi bi-fire mr-2"></i>
            About
            </a>
        </li>
    </div>
</div>

<script>
    document.getElementById("button-toggle").addEventListener("click", () => {
        document.getElementById("sidebar").classList.toggle("active-sidebar");
        document.getElementById("main-content").classList.toggle("active-main-content");
    });

</script>