<template>
    <Head title="Add Project" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add Project
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
                                    for="title"
                                    value="Project Title"
                                />

                                <TextInput
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.title"
                                    autocomplete="title"
                                    placeholder="Project Title"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.title"
                                />
                            </div>
                            <div class="lg:basis-1/2 p-2">
                                <InputLabel
                                    for="duration"
                                    value="Duration"
                                />
                                <TextInput
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.duration"
                                    autocomplete="duration"
                                    placeholder="Duration"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.duration"
                                />
                            </div>


                        </div>
                        <div class="lg:flex">
                            <div class="lg:basis-1/2 p-2">
                                <InputLabel
                                    for="github"
                                    value="Github Link"
                                />

                                <TextInput
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.github"
                                    autocomplete="github"
                                    placeholder="Github Link"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.github"
                                />
                            </div>
                            <div class="lg:basis-1/2 p-2">
                                <InputLabel
                                    for="live"
                                    value="Live Link"
                                />
                                <TextInput
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.live"
                                    autocomplete="live"
                                    placeholder="Live Link"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.live"
                                />
                            </div>


                        </div>
                        <div class="p-2">
                            <label for="formFile" class="mb-2 inline-block"
                            >Image</label
                            >
                            <input
                                @input="form.image = $event.target.files[0]"
                                class="relative m-0 block w-full min-w-0 flex-auto rounded cursor-pointer border border-slate-100 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                                type="file"
                            />

                            <InputError
                                class="mt-2"
                                :message="form.errors.image"
                            />
                        </div>

                        <div class="lg:flex">
                          
                            <div class="w-full p-2">
                            <InputLabel for="description" value="Description" />
                            <textarea
                                class="mt-1 block w-full rounded border-slate-300"
                                placeholder="Description"
                                rows="6"
                                v-model="form.description"
                            >
                            </textarea>
                            <InputError
                                class="mt-2"
                                :message="form.errors.description"
                            />
                              </div>
                        </div>

                        <div class="flex items-center justify-end mt-4 p-2">
                            <Link
                                :href="route('project.index')"
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
                                {{ project ? 'Update' : 'Create' }}
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
        project: Object,
    },
    data() {
        return {
            form: useForm({
                title: this.project ? this.project.title : "",
                duration: this.project ? this.project.duration : "",
                description: this.project ? this.project.description : "",
                github: this.project ? this.project.github : "",
                live: this.project ? this.project.live : "",
                image: null,
            }),
        };
    },
    methods: {
        submit() {
            if(this.project)
                this.form.put(this.route("project.update", this.project));
            else
                this.form.post(this.route("project.store"));
        },
    },
};
</script>
