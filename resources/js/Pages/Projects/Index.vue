<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             Projects
            </h2>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 rounded-2xl bg-white p-4 mt-16">
           <div class="my-2 flex justify-between">

            <input class="rounded-2xl" v-model="search" type="text" name="search"  placeholder="search" />

            <Link :href="route('project.create')">
                <PrimaryButton class="ml-4">Add new</PrimaryButton>
            </Link>
           </div>

            <table class="w-full border-collapse bg-white text-center text-sm text-gray-500 table-auto">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Project Title</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Duration</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Github Link</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Live Link</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Image</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Description</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Action</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                    <tr v-for="(project, index) in projects.data" :key="index" class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{project.title}}</td>
                        <td class="px-6 py-4">{{project.duration}}</td>
                        <td class="px-6 py-4">
                            <a :href="project.github" target="_blank" v-if="project.github">
                                <font-awesome-icon class="mr-2" title="Click To Visit" icon="fa-solid fa-link" />
                            </a>
                            <span v-else>N/A</span>
                        </td>
                        <td class="px-6 py-4">
                            <a :href="project.live" target="_blank" v-if="project.live">
                                <font-awesome-icon class="mr-2" title="Click To Visit" icon="fa-solid fa-link" />
                            </a>
                            <span v-else>N/A</span>
                        </td>
                        <td class="px-6 py-4">
                            <img :src="'/'+project.image" :alt="project.title" width="100">
                        </td>
                        <td class="px-6 py-4">{{project.description}}</td>
                        
                        <td class="d-flex">
                            <Link :href="route('project.edit', project)"> <font-awesome-icon class="text-green-500 mr-2" title="Edit" icon="fa-solid fa-pencil" /></Link>
                            <Link method="delete" :href="route('project.destroy', project)"><font-awesome-icon title="Delete" class="text-red-500 ml-2" icon="fa-solid fa-trash-can" /></Link>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

        <div class="max-w-7xl mx-auto flex justify-end">
            <Paginator :links="projects.links"
                       class="mt-4">
            </Paginator>
        </div>


    </AuthenticatedLayout>

</template>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Paginator from "@/Components/Paginator.vue";

export default{
    components:{
    AuthenticatedLayout,
    Link,
    Head,
    PrimaryButton,
    Paginator,
    },
    props:{
        projects : [Array, Object]
    },
    data(){
        return {
            search : null,
        }
    },
    watch :{
        search(val) {
             this.$inertia.get(this.route('project.index'), {search : val} , {
                preserveScroll: true,
                preserveState: true,
                replace: true,
            });
        },
    }
}


</script>
