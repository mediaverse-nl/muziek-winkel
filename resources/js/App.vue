<template>
    <div>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <div class="container">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ path : '/' }">
                            Home
                        </router-link>
                    </li>
                    <!--UNLOGGED-->
                    <li class="nav-item" v-if="!$auth.check()" v-for="(route, key) in routes.unlogged" v-bind:key="route.path">
                        <router-link class="nav-link" :to="{ name : route.path }" :key="key">
                            {{route.title}}
                        </router-link>
                    </li>
                    <!--LOGGED USER-->
                    <li class="nav-item" v-if="$auth.check(1)" v-for="(route, key) in routes.user" v-bind:key="route.path">
                        <router-link class="nav-link" :to="{ name : route.name }" :key="key">
                            {{route.title}}
                        </router-link>
                    </li>
                    <!--LOGGED ADMIN-->
                    <li class="nav-item"  v-if="$auth.check(2)" v-for="(route, key) in routes.admin" v-bind:key="route.path">
                        <router-link class="nav-link" :to="{ name : route.name }" :key="key">
                            {{route.title}}
                        </router-link>
                    </li>
                </ul>
                <ul class="navbar-nav float-right">
                    <!--LOGOUT-->
                    <li class="nav-item" v-if="$auth.check()">
                        <a href="#" @click.prevent="$auth.logout()" class="nav-link">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div>
                <transition name="fade">
                    <router-view></router-view>
                </transition>
            </div>
        </div>
    </div>
</template>

<style>
    body{
        margin-top: 80px;
    }
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s
    }
    .fade-enter, .fade-leave-active {
        opacity: 0
    }
</style>

<script>
    export default{

        data() {
            // console.log('auth:', auth)
            return {
                routes: {
                    // UNLOGGED
                    unlogged: [
                        {
                            title: 'registreren',
                            name: 'auth.register',
                            path: 'register'
                        },
                        {
                            title: 'inloggen',
                            name: 'auth.login',
                            path: 'login'
                        }
                    ],
                    // LOGGED USER
                    user: [
                        {
                            title: 'Dashboard',
                            name: 'auth.dashboard',
                            path: 'dashboard'
                        },
                        {
                            title: 'Library',
                            name: 'auth.library.index',
                            path: 'library'
                        }
                    ],
                    // LOGGED ADMIN
                    admin: [
                        {
                            title: 'Admin Dashboard',
                            name: 'admin.dashboard',
                            path: 'admin/dashboard'
                        }
                    ]
                }
            }
        },
        mounted() {
            //
        }
    }
</script>
