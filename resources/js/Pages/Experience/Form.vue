<template>
    <Head title="Add Experience" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add Experience
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
                                    for="organization"
                                    value="Organization"
                                />

                                <TextInput
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.organization"
                                    autocomplete="organization"
                                    placeholder="Organization"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.organization"
                                />
                            </div>

                            <div class="lg:basis-1/2 p-2">
                                <InputLabel
                                    for="role"
                                    value="Role"
                                />

                                <TextInput
                                    class="mt-1 block w-full"
                                    type="text"
                                    v-model="form.role"
                                    autocomplete="role"
                                    placeholder="Role"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.role"
                                />
                            </div>
                        </div>
                        <div class="lg:flex">
                            <div class="lg:basis-1/2 p-2">
                                <InputLabel for="start_date" value="Starting Date" />

                                <TextInput
                                    type="date"
                                    class="mt-1 block w-full"
                                    v-model="form.start_date"
                                    autocomplete="start_date"
                                    placeholder="Starting Date"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.start_date"
                                />
                            </div>

                            <div class="lg:basis-1/2 p-2">
                                <InputLabel for="end_date" value="End Date (Leave Blank If Currently Working)" />

                                <TextInput
                                    type="date"
                                    class="mt-1 block w-full"
                                    v-model="form.end_date"
                                    autocomplete="end_date"
                                    placeholder="End Date"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.end_date"
                                />
                            </div>
                        </div>
                        <div class="lg:flex">
                            <div class="lg:basis-1/2 p-2">
                                <InputLabel for="milestones" value="Milestones" />

                                <TextInput
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.milestones"
                                    autocomplete="milestones"
                                    placeholder="Milestones"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.milestones"
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
                            <InputLabel for="note" value="Note" />
                            <textarea
                                class="mt-1 block w-full rounded border-slate-300"
                                placeholder="Note"
                                rows="6"
                                v-model="form.note"
                            >
                            </textarea>
                            <InputError
                                class="mt-2"
                                :message="form.errors.note"
                            />
                        </div>



                        <div class="flex items-center justify-end mt-4 p-2">
                            <Link
                                :href="route('experience.index')"
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
                                {{ experience ? 'Update' : 'Create' }}
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
        experience: Object,
    },
    data() {
        return {
            form: useForm({
                organization: this.experience ? this.experience.organization : "",
                role: this.experience ? this.experience.role : "",
                start_date: this.experience ? this.experience.start_date : "",
                end_date: this.experience ? this.experience.end_date : "",
                milestones: this.experience ? this.experience.milestones : "",
                note: this.experience ? this.experience.note : "",
                link: this.experience ? this.experience.link : "",

            }),
        };
    },

    methods: {
        submit() {
            if(this.experience)
                this.form.put(this.route("experience.update", this.experience));
            else
                this.form.post(this.route("experience.store"));
        },
    },
};
</script>
