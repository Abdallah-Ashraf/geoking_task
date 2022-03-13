<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>
<template>
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users 's Locations
            </h2>
            <div>
                Zoom Map in or out to show user 's Markers
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div style="height: 100vh">
                            <GMapMap
                                :center="{lat: 30.044420, lng: 31.235712}"
                                :zoom="8"
                                map-type-id="terrain"
                                style="width: 100vw; height: 100vh"
                            >
                                <GMapCluster>
                                    <GMapMarker
                                        :key="marker.id"
                                        v-for="marker in locations"
                                        :position="getPosition(marker.lat,marker.lng)"
                                        :clickable="true"
                                        @click="openMarker(marker.id,true)"

                                    >
                                        <GMapInfoWindow
                                            :closeclick="true"
                                            @closeclick="openMarker(marker.id,false)"
                                            :opened="marker.view"
                                            :options=" {
                                                      pixelOffset: {
                                                        width: 10, height: 0
                                                      },
                                                      maxWidth: 320,
                                                      maxHeight: 320,
                                               }" >
                                            <div class="marker-map-info">
                                                {{marker.info}}


                                            </div>
                                        </GMapInfoWindow>
                                    </GMapMarker>
                                </GMapCluster>
                            </GMapMap>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
export default {
    name: "User-Locations-Map",
    props: {
        locations: Array,
    },
    data() {
        return {
            openedMarkerID: null,
            center: {lat: 30.044420, lng: 31.235712}
        }
    },
    methods: {
        openMarker(id,flag) {
            this.openedMarkerID = id
            var location = this.locations.find(x => x.id === id)
            location.view = flag
        },
        getPosition(lat,lng){
            console.log({'lat':parseFloat(lat),'lng':parseFloat(lng)});
            return {'lat':parseFloat(lat),'lng':parseFloat(lng)}
        }

    }
}
</script>

<style scoped>
.vue-map-container{
    height: 100vh;
}
.marker-map-info{
    font-weight: bold;
    padding: 5px;
}
</style>
