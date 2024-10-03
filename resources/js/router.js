import Vue from 'vue';
import Router from 'vue-router';

import Login from './components/Login.vue';
import Register from './components/Register.vue';
import NoteList from './components/NoteList.vue';
import NoteForm from './components/NoteForm.vue';

Vue.use(Router);

export default new Router({
  mode: 'history',
  routes: [
    { path: '/login', component: Login },
    { path: '/register', component: Register },
    { path: '/notes', component: NoteList },
    { path: '/notes/create', component: NoteForm },
    { path: '/notes/edit/:id', component: NoteForm },
  ]
});
