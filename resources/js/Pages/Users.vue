<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import BreezeNavLink from '@/Components/NavLink.vue';
</script>
<template >
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users 's Management
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <table class="w-full ">
                            <thead>
                                <tr class="text-left font-bold">
                                    <th >#</th>
                                    <th >Name</th>
                                    <th >E-Mail</th>
                                    <th colspan="2"> Locations</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="user in users" :key="user.id">
                                    <td >{{user.id}}</td>
                                    <td >{{user.name}}</td>
                                    <td >{{user.email}}</td>
                                    <td>
                                        <a type="button" :href="route('user-locations',{'id':user.id})" class="btn btn-secondary">
                                            Manage
                                        </a>
                                    </td>
                                    <td>
                                        <BreezeNavLink :href="route('user-map-locations',{'id':user.id})" >
                                            <img src="assets/images/5686534-middle.png" />
                                        </BreezeNavLink>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>

</template>

<script>
export default {
    name: "Users",
    props: {
        users: Object,
    },
}
</script>

<style scoped>
th , td{
    padding-left: .75rem;
    padding-right: .75rem;
    padding-top: .5rem;
    padding-bottom: .5rem;
    border-width: 1px;
}

img{
    width:100px ;
}
</style>
