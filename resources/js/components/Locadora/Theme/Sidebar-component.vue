<template>
    <nav class="nav">
        <div>
            <a href="/home" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i>
                <span class="nav_logo-name">
                    Locadora de Carros
                </span>
            </a>
            <div v-for="menu in menus" class="nav_list">
                <a :href="menu.url" class="nav_link active">
                    <i :class="menu.icon"></i>
                    <span class="nav_name">
                        {{menu.label}}
                    </span>
                </a>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    props:{
        menus: Object,
    }
}
</script>
