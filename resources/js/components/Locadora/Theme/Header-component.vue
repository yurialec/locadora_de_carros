<template>
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-start">
                <div class="header_toggle">
                    <i class='bx bx-menu' id="header-toggle"></i>
                </div>
            </div>

            <div class="col d-flex justify-content-end">
                <div class="dropdown">
                    <a href="#" class="link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                        <span style="color: rgb(0, 107, 150);">
                            <i class="fa-regular fa-user fa-lg"></i>
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Perfil</a></li>
                        <li><a class="dropdown-item" href="#" @click="logout()">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:{
        
    },
    methods:{
        logout(){
            
        },
    },
}
</script>
