<template>
    <Head title="Add Test Score" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add Certification
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg sm:p-6 md:p-6 lg:p-8"
                >
                    <form
                        @submit.prevent="submit"
                        enctype="multipart/form-data"
                    >
                        <div class="lg:flex">
                            <div class="lg:basis-1/2 p-2">
                                <InputLabel for="title" value="Title" />

                                <TextInput
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.title"
                                    autocomplete="title"
                                    placeholder="Title"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.title"
                                />
                            </div>

                            <div class="lg:basis-1/2 p-2">
                                <InputLabel
                                    for="issue_date"
                                    value="Issue date"
                                />

                                <TextInput
                                    class="mt-1 block w-full"
                                    type="date"
                                    v-model="form.issue_date"
                                    autocomplete="issue_date"
                                    placeholder="Issue date"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.issue_date"
                                />
                            </div>
                        </div>

                        <div class="lg:flex">
                            <div class="w-full p-2">
                                <InputLabel for="link" value="Link" />

                                <TextInput
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.link"
                                    autocomplete="link"
                                    placeholder="link"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.link"
                                />
                            </div>
                        </div>
                        <div class="lg:flex">
                            <div class="w-full p-2">
                                <InputLabel
                                    for="description"
                                    value="Description"
                                />
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
                                :href="route('certification.index')"
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
                                {{ certification ? "Update" : "Create" }}
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
        certification: Object,
    },
    data() {
        return {
            form: useForm({
                title: this.certification ? this.certification.title : "",
                issue_date: this.certification ? this.certification.issue_date : "",
                link: this.certification ? this.certification.link : "",
                description: this.certification
                    ? this.certification.description
                    : "",
            }),
        };
    },

    methods: {
        submit() {
            if (this.certification)
                this.form.put(
                    this.route("certification.update", this.certification)
                );
            else this.form.post(this.route("certification.store"));
        },
    },
};
</script>
