<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Education Informations
            </h2>
        </template>
    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 rounded-2xl bg-white p-4 mt-16">
           <div class="my-2 flex justify-between">
           
            <input class="rounded-2xl" v-model="search" type="text" name="search"  placeholder="search" />
        
            <Link :href="route('education.create')">
                <PrimaryButton class="ml-4">Add new</PrimaryButton>
            </Link>
           </div>     
            
            <table class="w-full border-collapse bg-white text-center text-sm text-gray-500">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Course Name</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Course Duration</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Passing Year</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Institute</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Result</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Course Works</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Link</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Action</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                    <tr v-for="(education, index) in educations.data" :key="index" class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{education.course_name}}</td>
                        <td class="px-6 py-4">{{education.course_duration}}</td>
                        <td class="px-6 py-4">{{education.passing_year}}</td>
                        <td class="px-6 py-4">{{education.institute}}</td>
                        <td class="px-6 py-4">{{education.result}}</td>
                        <td class="px-6 py-4">{{education.course_works}}</td>
                        <td class="px-6 py-4">{{education.link}}</td>
                        <td class="px-6 py-4">
                            <Link :href="route('education.edit', education)"> <PrimaryButton class="ml-4 bg-green-600 hover:bg-green-400">Edit</PrimaryButton></Link>
                            <Link method="delete" :href="route('education.destroy', education)"> <PrimaryButton class="ml-4 bg-red-600 hover:bg-red-400">Delete</PrimaryButton></Link>
                        </td>

                    </tr>
    
    
                </tbody>
            </table>   
            
        </div>
        
        <div class="max-w-7xl mx-auto flex justify-end">
            <Paginator :links="educations.links"
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
    Paginator
    },
    props:{
        educations : Array
    },
    data(){
        return {
            search : null,
        }
    },
    watch :{
        search(val) {
             this.$inertia.get(this.route('education.index'), {search : val} , {
                preserveScroll: true,
                preserveState: true,
                replace: true,
            });
        },
    }
}


</script>