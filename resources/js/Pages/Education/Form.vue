<template>
    <Head title="Education Information" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               Add Education Information
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg sm:p-6 md:p-6 lg:p-8"
                >
                    <form @submit.prevent="submit" enctype="multipart/form-data">
                        <div class="lg:flex">
                            <div class="lg:basis-1/2 p-2">
                                <InputLabel
                                    for="course_name"
                                    value="Course Name"
                                />

                                <TextInput
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.course_name"
                                    autocomplete="course_name"
                                    placeholder="Course Name"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.course_name"
                                />
                            </div>

                            <div class="lg:basis-1/2 p-2">
                                <InputLabel
                                    for="course_duration"
                                    value="Course Duration"
                                />

                                <TextInput
                                    class="mt-1 block w-full"
                                    type="text"
                                    v-model="form.course_duration"
                                    autocomplete="course_name"
                                    placeholder="Course Duration"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.course_name"
                                />
                            </div>
                        </div>
                        <div class="lg:flex">
                            <div class="lg:basis-1/2 p-2">
                                <InputLabel for="passing_year" value="Passing Year" />

                                <TextInput
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.passing_year"
                                    autocomplete="passing_year"
                                    placeholder="Passing Year"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.passing_year"
                                />
                            </div>

                            <div class="lg:basis-1/2 p-2">
                                <InputLabel for="institute" value="Institute" />

                                <TextInput
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.institute"
                                    autocomplete="institute"
                                    placeholder="Institute"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.institute"
                                />
                            </div>
                        </div>
                        <div class="lg:flex">
                            <div class="lg:basis-1/2 p-2">
                                <InputLabel for="result" value="Result" />

                                <TextInput
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.result"
                                    autocomplete="result"
                                    placeholder="Result"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.result"
                                />
                            </div>

                            <div class="lg:basis-1/2 p-2">
                                <InputLabel for="link" value="Link" />

                                <TextInput
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.link"
                                    autocomplete="link"
                                    placeholder="Link"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.link"
                                />
                            </div>
                        </div>
                       
                          <div class="p-2">
                            <InputLabel for="course_works" value="Course Works" />
                            <textarea
                            class="mt-1 block w-full rounded border-slate-300"
                            placeholder="Course Works"
                            rows="6"
                            v-model="form.course_works"
                            >
                            </textarea>
                            <InputError
                                    class="mt-2"
                                    :message="form.errors.course_works"
                                />
                          </div>  
                            
                        

                        <div class="flex items-center justify-end mt-4 p-2">
                            <Link
                                :href="route('education.index')"
                                class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >
                                <PrimaryButton
                                    class="mr-4 bg-red-600 hover:bg-red-400"
                                >
                                    Cancel
                                </PrimaryButton>
                            </Link>

                            <PrimaryButton
                                class="ml-4"
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                {{ education ? 'Update' : 'Create' }}
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
export default {
    components: {
        AuthenticatedLayout,
        InputError,
        InputLabel,
        PrimaryButton,
        TextInput,
        Head,
        Link,
        useForm,
    },
    props: {
        education: Object,
    },
    data() {
        return {
            form: useForm({
                course_name: this.education ? this.education.course_name : "",
                course_duration: this.education ? this.education.course_duration : "",
                passing_year: this.education ? this.education.passing_year : "",
                institute: this.education ? this.education.institute : "",
                result: this.education ? this.education.result : "",
                course_works: this.education ? this.education.course_works : "",
                link: this.education ? this.education.link : "",

            }),
        };
    },

    methods: {
        submit() {
            if(this.education)
                this.form.put(route("education.update", this.education));

            this.form.post(route("education.store"));
        },
    },
};
</script>
