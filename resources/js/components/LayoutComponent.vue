<template>
    <div>

<!--      This is the code for navbar on the top-->
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark  bg-dark">
                <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <router-link class="nav-link" to="/"> Home  <span class="sr-only">(current)</span> </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" to="/showResult"> All Users </router-link>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</template>

<script>
export default {
    name: "LayoutComponent"
}
</script>

<style scoped>

</style>
