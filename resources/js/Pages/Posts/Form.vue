<template>
    <Head title="Add Test Score" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add New Post
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
                            <div class="w-full p-2">
                                <InputLabel for="title" value="Post Title" />

                                <TextInput
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.title"
                                    autocomplete="title"
                                    placeholder="Post Title"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.title"
                                />
                            </div>


                        </div>
                        <div class="lg:flex">
                            <div class="w-full p-2">
                                <InputLabel
                                    for="post"
                                    value="Post Editor"
                                />
                                        <Editor
                                        api-key="n1fwfi5b7zv3vvy6aeewj08fcs8lnk0256ipmou0oha6pjkp"
                                        :init="{
                                            plugins: 'lists link image table code help wordcount'
                                        }"
                                        />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.description"
                                />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4 p-2">
                            <Link
                                :href="route('tests.index')"
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
                                {{ testscore ? "Update" : "Create" }}
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
import Editor from '@tinymce/tinymce-vue'
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
        Editor
    },
    props: {
        post: Object,
    },
    data() {
        return {
            form: useForm({
                title: this.post ? this.post.title : "",
                post: this.post ? this.post.post : "",
                description: this.post ? this.post.description : "",
            }),
        };
    },

    methods: {
        submit() {
            if (this.testscore)
                this.form.put(this.route("post.update", this.post));
            else this.form.post(this.route("post.store"));
        },
    },
};
</script>
