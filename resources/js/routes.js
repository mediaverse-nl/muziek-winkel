import VueRouter from 'vue-router'

//pages
import Home from './components/HomeComponent.vue';

import AuthDashboard from './components/Auth/DashboardComponent.vue'
import AuthAlbum from './components/Auth/AlbumComponent.vue'
import AuthLibrary from './components/Auth/LibraryComponent.vue'
import AuthLogin from './components/Auth/LoginComponent.vue'
import AuthRegister from './components/Auth/RegisterComponent.vue'

import AdminDashboard from './components/Admin/DashboardComponent.vue';
import AdminCreateArtist from './components/Admin/CreateArtistComponent.vue';
import AdminShowArtist from './components/Admin/ShowArtistComponent.vue';
import AdminShowAlbums from './components/Admin/ShowAlbumComponent.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        path: '/home',
        component: Home
    },
    {
        name: 'album',
        path: '/album/:id',
        component: AuthAlbum
    },
    {
        name: 'song',
        path: '/song/:id',
        component: Home
    },

    //auth
    {
        name: 'auth.library.index',
        path: '/library',
        component: AuthLibrary,
        meta: {
            auth: true
        }
    },
    {
        name: 'auth.dashboard',
        path: '/dashboard',
        component: AuthDashboard,
        meta: {
            auth: true
        }
    },
    {
        path: '/login',
        name: 'login',
        component: AuthLogin,
        meta: {
            auth: false
        }
    },
    {
        path: '/register',
        name: 'register',
        component: AuthRegister,
        meta: {
            auth: false
        }
    },

    //admin
    {
        name: 'admin.dashboard',
        path: '/admin/dashboard',
        component: AdminDashboard,
        meta: {
            auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
        }
    },
    {
        name: 'admin.album.show',
        path: '/admin/album/:id',
        component: AdminShowAlbums,
        meta: {
            auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
        }
    },
    {
        name: 'admin.artists.index',
        path: '/admin/artist/index',
        component: Home,
        meta: {
            auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
        }
    },
    {
        name: 'admin.artists.show',
        path: '/admin/artist/:id',
        component: AdminShowArtist,
        meta: {
            auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
        }
    },
    {
        name: 'admin.artists.create',
        path: '/admin/artist/create',
        component: AdminCreateArtist,
        meta: {
            auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
        }
    },
];

const router = new VueRouter({
    history: true,
    mode: 'history',
    routes
});

export default router

