<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>
<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Locations 's Management
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Create
                        </button>
                        <hr>
                        <table class="w-full ">
                            <thead>
                            <tr class="text-left font-bold">
                                <th >#</th>
                                <th >lat</th>
                                <th >lng</th>
                                <th>info</th>
                                <th>rate</th>
                                <th > </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="location in locations" :key="location.id">
                                <td >{{location.id}}</td>
                                <td >{{location.lat}}</td>
                                <td >{{location.lng}}</td>
                                <td>{{location.info}}</td>
                                <td>{{location.rate}}</td>
                                <td>
                                    <a type="button" :href="route('delete-locations',{'id':location.id})" class="btn btn-danger">Delete</a>
                                </td>

                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form method="post" action="/user/locations">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="lat" class="form-label">Lat</label>
                            <input type="text" name="lat" required class="form-control" id="lat" >
                        </div>
                        <div class="mb-3">
                            <label for="lng" class="form-label">Lng</label>
                            <input type="text" name="lng" required class="form-control" id="lng" >
                        </div>
<!--                        <div class="mb-3">-->
<!--                            <label for="rate" class="form-label">Rate</label>-->
<!--                            <input name="rate" type="number" max="5" min="0" step="1" class="form-control" id="rate" >-->
<!--                        </div>-->
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Info</label>
                            <textarea name="info" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

                        <input name="user_id" type="hidden" :value="userId" />


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
export default {
    name: "User-Locations",
    props: {
        locations: Array,
        userId: Number,
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
</style>
