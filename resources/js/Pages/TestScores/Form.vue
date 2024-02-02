<template>
    <Head title="Add Test Score" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add Test Score
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
                                <InputLabel for="topic" value="Topic" />

                                <TextInput
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.topic"
                                    autocomplete="topic"
                                    placeholder="Topic"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.topic"
                                />
                            </div>

                            <div class="lg:basis-1/2 p-2">
                                <InputLabel for="result" value="Result" />

                                <TextInput
                                    class="mt-1 block w-full"
                                    type="text"
                                    v-model="form.result"
                                    autocomplete="result"
                                    placeholder="Result"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.result"
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
        testscore: Object,
    },
    data() {
        return {
            form: useForm({
                topic: this.testscore ? this.testscore.topic : "",
                result: this.testscore ? this.testscore.result : "",
                description: this.testscore ? this.testscore.description : "",
            }),
        };
    },

    methods: {
        submit() {
            if (this.testscore)
                this.form.put(this.route("tests.update", this.testscore));
            else this.form.post(this.route("tests.store"));
        },
    },
};
</script>
