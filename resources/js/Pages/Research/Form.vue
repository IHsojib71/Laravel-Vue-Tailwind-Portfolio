<template>
    <Head title="Add Research" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add Research
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
                                    value="Title"
                                />

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
                                    for="sub_title"
                                    value="Sub Title"
                                />

                                <TextInput
                                    class="mt-1 block w-full"
                                    type="text"
                                    v-model="form.sub_title"
                                    autocomplete="sub_title"
                                    placeholder="Sub Title"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.sub_title"
                                />
                            </div>
                        </div>
                        <div class="lg:flex">
                            <div class="lg:basis-1/2 p-2">
                                <InputLabel for="teachers" value="Teachers" />

                                <textarea
                                
                                class="mt-1 block w-full rounded border-slate-300"
                                    v-model="form.teachers"
                                    autocomplete="teachers"
                                    placeholder="Teachers"
                                    rows="6"
                                ></textarea>

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.teachers"
                                />
                            </div>

                            <div class="lg:basis-1/2 p-2">
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
                        <div class="lg:flex">
    
                            <div class="w-full p-2">
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

                        



                        <div class="flex items-center justify-end mt-4 p-2">
                            <Link
                                :href="route('research.index')"
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
                                {{ research ? 'Update' : 'Create' }}
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
        research: Object,
    },
    data() {
        return {
            form: useForm({
                title: this.research ? this.research.title : "",
                sub_title: this.research ? this.research.sub_title : "",
                teachers: this.research ? this.research.teachers : "",
                description: this.research ? this.research.description : "",
                link: this.research ? this.research.link : "",

            }),
        };
    },

    methods: {
        submit() {
            if(this.research)
                this.form.put(this.route("research.update", this.research));
            else
                this.form.post(this.route("research.store"));
        },
    },
};
</script>
