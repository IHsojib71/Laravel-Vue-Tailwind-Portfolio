<template>
    <Head title="Add Test Score" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add Skills
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
                                <InputLabel for="languages" value="Languages" />
                                <textarea
                                    class="mt-1 block w-full rounded border-slate-300"
                                    placeholder="Languages"
                                    rows="4"
                                    v-model="form.languages"
                                >
                                </textarea>
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.languages"
                                />
                            </div>
                        </div>
                        <div class="lg:flex">
                            <div class="w-full p-2">
                                <InputLabel
                                    for="frameworks"
                                    value="Frameworks"
                                />
                                <textarea
                                    class="mt-1 block w-full rounded border-slate-300"
                                    placeholder="Frameworks"
                                    rows="4"
                                    v-model="form.frameworks"
                                >
                                </textarea>
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.frameworks"
                                />
                            </div>
                        </div>
                        <div class="lg:flex">
                            <div class="w-full p-2">
                                <InputLabel for="softwares" value="Softwares" />
                                <textarea
                                    class="mt-1 block w-full rounded border-slate-300"
                                    placeholder="softwares"
                                    rows="4"
                                    v-model="form.softwares"
                                >
                                </textarea>
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.softwares"
                                />
                            </div>
                        </div>
                        <div class="lg:flex">
                            <div class="w-full p-2">
                                <InputLabel
                                    for="operating_systems"
                                    value="Operating systems"
                                />
                                <textarea
                                    class="mt-1 block w-full rounded border-slate-300"
                                    placeholder="Operating Systems"
                                    rows="4"
                                    v-model="form.operating_systems"
                                >
                                </textarea>
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.operating_systems"
                                />
                            </div>
                        </div>

                        <div class="lg:flex">
                            <div class="w-full p-2">
                                <InputLabel for="extra" value="Extra" />
                                <textarea
                                    class="mt-1 block w-full rounded border-slate-300"
                                    placeholder="Extra Skills"
                                    rows="4"
                                    v-model="form.extra"
                                >
                                </textarea>
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.extra"
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
                                {{ skill ? "Update" : "Create" }}
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
        skill: Object,
    },
    data() {
        return {
            form: useForm({
                languages: this.skill ? this.skill.languages : "",
                frameworks: this.skill ? this.skill.frameworks : "",
                softwares: this.skill ? this.skill.softwares : "",
                operating_systems: this.skill
                    ? this.skill.operating_systems
                    : "",
                databases: this.skill ? this.skill.databases : "",
                extra: this.skill ? this.skill.extra : "",
            }),
        };
    },

    methods: {
        submit() {
            if (this.skill)
                this.form.post(this.route("skill.update", this.skill));
            else this.form.post(this.route("skill.store"));
        },


    },
};
</script>
