<template>
    <Head title="Basic Information"/>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Basic Informations Update
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-2xl sm:p-6 md:p-6 lg:p-8"
                >
                    <form @submit.prevent="submit" enctype="multipart/form-data">
                        <div class="lg:flex">
                            <div class="lg:basis-1/2 p-2">
                                <InputLabel
                                    for="site_title"
                                    value="Site Title"
                                />

                                <TextInput
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.site_title"
                                    required
                                    autocomplete="site_title"
                                    placeholder="Site Title"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.site_title"
                                />
                            </div>

                            <div class="lg:basis-1/2 p-2">
                                <InputLabel
                                    for="site_sub_title"
                                    value="Site Sub Title"
                                />

                                <TextInput
                                    class="mt-1 block w-full"
                                    type="text"
                                    v-model="form.site_sub_title"
                                    required
                                    autocomplete="site_sub_title"
                                    placeholder="Site Sub Title"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.site_sub_title"
                                />
                            </div>
                        </div>
                        <div class="lg:flex">
                            <div class="lg:basis-1/2 p-2">
                                <InputLabel for="name" value="Name"/>

                                <TextInput
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.name"
                                    required
                                    autocomplete="name"
                                    placeholder="Full Name"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.name"
                                />
                            </div>

                            <div class="lg:basis-1/2 p-2">
                                <InputLabel for="email" value="Email"/>

                                <TextInput
                                    type="email"
                                    class="mt-1 block w-full"
                                    v-model="form.email"
                                    required
                                    autocomplete="email"
                                    placeholder="email"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.email"
                                />
                            </div>
                        </div>
                        <div class="lg:flex">
                            <div class="lg:basis-1/2 p-2">
                                <InputLabel for="phone" value="Phone"/>

                                <TextInput
                                    id="name"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.phone"
                                    required
                                    autocomplete="phone"
                                    placeholder="Phone"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.phone"
                                />
                            </div>

                            <div class="lg:basis-1/2 p-2">
                                <InputLabel for="github" value="Github Link"/>

                                <TextInput
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.github"
                                    required
                                    autocomplete="github"
                                    placeholder="Github Link"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.github"
                                />
                            </div>
                        </div>
                        <div class="lg:flex">
                            <div class="lg:basis-1/2 p-2">
                                <InputLabel
                                    for="linkedin"
                                    value="Linkedin Link"
                                />

                                <TextInput
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.linkedin"
                                    required
                                    autocomplete="linkedin"
                                    placeholder="Linkedin Link"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.name"
                                />
                            </div>

                            <div class="lg:basis-1/2 p-2">
                                <InputLabel
                                    for="twitter"
                                    value="Twitter Link"
                                />

                                <TextInput
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.twitter"
                                    required
                                    autocomplete="twitter"
                                    placeholder="Twitter Link"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.twitter"
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

                        <div class="flex items-center justify-end mt-4 p-2">
                            <Link
                                :href="route('dashboard')"
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
                                Update
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
import {Head, Link, useForm} from "@inertiajs/vue3";

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
        basic: Object,
    },
    data() {
        return {
            form: useForm({
                _method: "POST",
                site_title: this.basic ? this.basic.site_title : "",
                site_sub_title: this.basic ? this.basic.site_sub_title : "",
                name: this.basic ? this.basic.name : "",
                email: this.basic ? this.basic.email : "",
                phone: this.basic ? this.basic.phone : "",
                github: this.basic ? this.basic.github : "",
                linkedin: this.basic ? this.basic.linkedin : "",
                twitter: this.basic ? this.basic.twitter : "",
                image: null,
            }),
        };
    },

    methods: {
        submit() {
            this.form.post(route("basic.update"));
        },
    },
};
</script>
