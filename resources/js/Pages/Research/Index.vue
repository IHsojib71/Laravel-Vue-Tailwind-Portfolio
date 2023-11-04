<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             Research Works
            </h2>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 rounded-2xl bg-white p-4 mt-16">
           <div class="my-2 flex justify-between">

            <input class="rounded-2xl" v-model="search" type="text" name="search"  placeholder="search" />

            <Link :href="route('research.create')">
                <PrimaryButton class="ml-4">Add new</PrimaryButton>
            </Link>
           </div>

            <table class="w-full border-collapse bg-white text-center text-sm text-gray-500 table-auto">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Title</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Subtitle</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Teachers</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Description</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Link</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Action</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                    <tr v-for="(research, index) in researches.data" :key="index" class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{research.title}}</td>
                        <td class="px-6 py-4">{{research.sub_title}}</td>
                        <td class="px-6 py-4">{{research.teachers}}</td>
                        <td class="px-6 py-4">{{research.description}}</td>
                        <td class="px-6 py-4">
                            <a :href="research.link" target="_blank" v-if="research.link">
                                <font-awesome-icon class="mr-2" title="Click To Visit" icon="fa-solid fa-link" />
                            </a>
                            <span v-else>N/A</span>
                        </td>
                        <td class="d-flex">
                            <Link :href="route('research.edit', research)"> <font-awesome-icon class="text-green-500 mr-2" title="Edit" icon="fa-solid fa-pencil" /></Link>
                            <Link method="delete" :href="route('research.destroy', research)"><font-awesome-icon title="Delete" class="text-red-500 ml-2" icon="fa-solid fa-trash-can" /></Link>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

        <div class="max-w-7xl mx-auto flex justify-end">
            <Paginator :links="researches.links"
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
        researches : [Array, Object]
    },
    data(){
        return {
            search : null,
        }
    },
    watch :{
        search(val) {
             this.$inertia.get(this.route('research.index'), {search : val} , {
                preserveScroll: true,
                preserveState: true,
                replace: true,
            });
        },
    }
}


</script>
